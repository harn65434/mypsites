#!/usr/bin/php
<?php
include "config.php";
include "utils.php";

function dl_thumb($url,$basedir,$tag)
{
  global $sqlpat,$sqlrepl;
  $tag1 = preg_replace($sqlpat,$sqlrepl,$tag);
  if ( ! file_exists("$basedir/scenes/$tag1/pic-main.jpg") )
  {
    # erstes Feld leer, spart Umrechnung des Index
    $localnames = array('','big','main','1','2','3');

    mkdir("$basedir/scenes/$tag1");
    for ( $num=1; $num<=5; $num++)
    {
      $urlfh = fopen("$url/$tag/thumb_$num.jpg",'rb');
      if ($urlfh)
      {
        $tnfile = fopen("$basedir/scenes/$tag1/_pic.jpg","wb");
        if ($tnfile)
        {
          while (!feof($urlfh))
          {
            fwrite($tnfile,fread($urlfh, 8192), 8192);
          }
          fclose($tnfile);
          $src = imagecreatefromjpeg("$basedir/scenes/$tag1/_pic.jpg");
          $xx = ImageSX($src);
          $yy = ImageSY($src);
          $dest = imagecreatetruecolor($xx, $yy);
          imagecopy($dest, $src, 0, 0, 0, 0, $xx, $yy);
          imagejpeg($dest,"$basedir/scenes/$tag1/pic-$localnames[$num].jpg",70);
          imagedestroy($dest);
          imagedestroy($src);
          unlink ("$basedir/scenes/$tag1/_pic.jpg");
        } 
      }
    }
    $src = imagecreatefromjpeg("$basedir/scenes/$tag1/pic-main.jpg");
    $dest = imagecreatetruecolor(300, 200);
    imagecopy($dest, $src, 0, 0, 0, 125, 300, 200);
    imagejpeg($dest,"$basedir/scenes/$tag1/thumb.jpg",80);
    imagedestroy($dest);
    imagedestroy($src);
    unlink("$basedir/scenes/$tag1/pic-main.jpg");
    rename("$basedir/scenes/$tag1/thumb.jpg","$basedir/scenes/$tag1/pic-main.jpg");
    return(true);
  } else {
    return(false);
  }
}

function get_model($url,$tag)
{
  $cont = file("$url/$tag");
  $i = 0;
  $found = false;
  while ( ! $found )
  {
    if ( preg_match('/Model\(s\)/',$cont[$i]) || $i == count($cont) )
    {
      $found = true;
      $models = preg_replace('/.*strong> (.*)<\/li>/','$1',trim($cont[$i]));
      $models = preg_replace('/> *</','>@@<',$models);
      $modarr = split('@@',$models);
      $modstr = "";
      foreach ($modarr as $amod)
      {
        $amod = preg_replace('/.*>(.*)<.*/','$1',$amod);
	if ( $modstr == '' ) 
        {
          $modstr = $amod;
        } else {
          $modstr = $modstr."_".$amod;
        }
      }
    } 
    $i++;
  }
  $modstr = str_replace(' ','',$modstr);
  return ($modstr);
}

function db_insert($tag,$title,$date,$myts,$model,$blurb)
{
  global $sqlpat,$sqlrepl,$database;
  $tag = preg_replace($sqlpat,$sqlrepl,$tag);
  $blurb = preg_replace($sqlpat,$sqlrepl,$blurb);
  $sqlcmd = sprintf("replace into xart(tag,title,date,myts,model,blurb) values (\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\");", $tag,$title,$date,$myts,$model,$blurb);
  $dbh = opendb();
  mysql_select_db($database);
  mysql_query($sqlcmd, $dbh);
  mysql_close($dbh);
}

function mydate($title)
{
  echo ("$title\t\t");
  echo (date('H:i:s'));
  echo ("\n");
}

// Webseite einlesen
// Header, Ende und leere Zeilen entfernen
$cont = file("$url");
$html = array();
$skip = true;
$mypat = array ("'</span>'","'<li>'","'</li>'","'<br />'","'</a>'");
foreach ( $cont as $line )
{
  if ( preg_match('<ul class="gallery">',$line) || preg_match('<!--ContentEnd-FooterStart-->',$line) )
  {
    $line = "";
    $skip = !$skip;
  }
  if ( !$skip )
  {
    $line = trim ($line);
    // ein paar unnoetige Tags entfernen
    $line = preg_replace($mypat,'',$line);
    if ( ! ($line == '' || preg_match('<span class="subbox">',$line)) )
    {
      array_push($html,$line);
    }
  }
}
/* Hauptprogramm
   Fuehre die Schleife aus, bis entweder alle Zeilen durch sind oder sie auf
   ein bekanntes Element stoesst.
*/

$basedir = "$wwwroot/mypsites/$subdir";
$sqlpat = array('/&/','/"/');
$sqlrepl = array('and','""');
$fill = true;
$i = 0;
while ( $fill )
{
  // Titel suchen, die anderen Tags stehen in bekannten Zeilen davor oder dahinter
  if ( preg_match("'<span class=\"title\"><b>'",$html[$i]) ) 
  { 
    $index = $i;
    // Bevor wir weitermachen, ermitteln wir den Typ. Auf der Seite gibt es ein paar Links zu Galerien, 
    // die wir nicht haben wollen. Dafuer benoetigen wir den Link zum Thumbnail, der zwei Zeilen unter
    // dem Titel liegt.

    $tn = preg_replace('/.* src="/','',$html[$index-1]);
    $tn = preg_replace('/jpg".*/','jpg',$tn);
    $dummy = split('/',$tn);
    $type = $dummy[3];  
    if ( $type == 'videos' )
    {
      $tag = preg_replace('/&/','\&',$dummy[4]);
      $tag = $dummy[4];
      $title = preg_replace('/.*<b>(.*)<\/b>/','$1',$html[$index]);
      $date = preg_replace('/<.*>(.*)/','$1',$html[$index+1]);
      $myts = date_format(date_create($date),'Ymd');
      $blurb = preg_replace('/<span class="blurb"><p>(.*)<\/p>/','$1',$html[$index+2]);
      $blurb = preg_replace($sqlpat,$sqlrepl,$blurb);
      // Wenn noch kein Thumbnail existiert, lade auch Infos runter, ansonsten Abbruch. Da die Liste 
      // von neu nach alt abgearbeitet wird, haben wir die weiteren Infos schon
      $model="";
      if ( dl_thumb($url1,$basedir,$tag) )
      {
        $model = get_model($url1,$tag);
        db_insert($tag,$title,$date,$myts,$model,$blurb);
      } else {
        $fill = false;
      }
    }
    $i = $i + 4;
  } else {
    $i++;
  }
  if ( $i >= count($html) )
  {
    $fill = false;
  }
}

// Seite zusammenbauen
$sqlcmd = "select date as date,tag as tag ,title as title ,model as model ,myts as myts from xart order by myts desc;";
$dbh = opendb();
mysql_select_db($database);
$results = mysql_query($sqlcmd,$dbh);
$col = 0;
$table=fopen("$basedir/index.php","w");
fprintf($table,"%s",file_get_contents("head.tmpl"));
fprintf($table,"%s",file_get_contents('dbphp.tmpl'));
while ( $row = mysql_fetch_assoc($results) )
{
  if ( $col == 0 ) fprintf($table,"<tr>\n");
  fprintf($table,"<td><?php inspic_xa(\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\$new_array['%s']);?></td>\n",$subdir,$row['date'],$row['tag'],$row['title'],$row['model'],$row['myts'],$row['tag']);
  $col++;
  if ( $col == 3 )
  {
    $col = 0;
    fprintf($table,"</tr>\n<tr>\n");
  }
}
fprintf($table,file_get_contents("tail.tmpl"));
fclose($table);
mysql_close($dbh);
?>

