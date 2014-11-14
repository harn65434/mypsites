#!/usr/bin/php
<?php
include "config.php";
include "utils.php";

function dl_thumb($thumburl,$picurl,$type,$basedir,$date,$tag)
{
  $localnames = array('main','details');
  if ( ! file_exists("$basedir/scenes/$date-$tag/pic-$localnames[$type].jpg") )
  {
    if ( $type == 0 )
    {
      mkdir("$basedir/scenes/$date-$tag");
    }
    $tnurl = sprintf("%s/sets/%s",$thumburl,$picurl);
    $urlfh = fopen("$tnurl",'rb');
    if ($urlfh)
    {
      $tnfile = fopen("$basedir/scenes/$date-$tag/_pic.jpg","wb");
      if ($tnfile)
      {
        while (!feof($urlfh))
        {
          fwrite($tnfile,fread($urlfh, 8192), 8192);
        }
        fclose($tnfile);
        $src = imagecreatefromjpeg("$basedir/scenes/$date-$tag/_pic.jpg");
        $xx = ImageSX($src);
        $yy = ImageSY($src);
        $dest = imagecreatetruecolor($xx, $yy);
        imagecopy($dest, $src, 0, 0, 0, 0, $xx, $yy);
        imagejpeg($dest,"$basedir/scenes/$date-$tag/pic-$localnames[$type].jpg",70);
        imagedestroy($dest);
        imagedestroy($src);
        unlink ("$basedir/scenes/$date-$tag/_pic.jpg");
      }
    } 
    return(true);
  } else {
    return(false);
  }
}

function get_model($url,$tag)
{
  global $thumburl, $basedir, $date;
  $cont = file("$url/$tag");
  $i = 0;
  $found = false;
  while ( ! $found )
  {
    if ( preg_match('<title>',$cont[$i]) )
    {
      $models = preg_replace("'.*<title>(.*) - .*'",'$1',$cont[$i]);
      $dummy = split(' - ',$models);
      $mypat = array ( "' and '", "','", "'\.'", "' '" );
      $myrepl = array ( "_", "_", "", "" );
      $models = preg_replace($mypat,$myrepl,$dummy[0]);    
    } 
    if ( preg_match("'poster='",$cont[$i]) || $i == count($cont) )
    {
      $found = true;
      $picurl = preg_replace("'.*poster=\"$thumburl/sets/'","",$cont[$i]);
      $picurl = preg_replace("'\">'","",$picurl);
      $picurl = trim($picurl);
      dl_thumb($thumburl,$picurl,1,$basedir,$date,$tag); 
    }
    $i++;
  }
  return ($models);
}

function db_insert($tag,$title,$myts,$model)
{
  global $database;
  $sqlcmd = sprintf("replace into joymii(tag,title,myts,model) values (\"%s\",\"%s\",\"%s\",\"%s\");", $tag,$title,$myts,$model);
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
# $mypat = array ("'<img src=.*content/'","' alt='","' />'","'<h4>'","'</h4>'",'/"/');
$mypat = array ("'<img src=.*sets/'","' alt='","' />'","'<h4>'","'</h4>'",'/"/');
$myrepl = array ("","@@","","","","");
foreach ( $cont as $line )
{
  // Wir brauchen nur die Zeilen mit "img src" und "h4" (da steht das Datum drin)
  if ( preg_match ( '/img src/', $line ) || preg_match ( '/<h4>/', $line ) )
  {
    $line = trim ($line);
    // ein paar unnoetige Tags entfernen
    $line = preg_replace($mypat,$myrepl,$line);
    array_push($html,$line);
  }
}

/* Hauptprogramm
   Fuehre die Schleife aus, bis entweder alle Zeilen durch sind oder sie auf
   ein bekanntes Element stoesst.
*/

$basedir = "$wwwroot/mypsites/$subdir";
$sqlpat = array('/&/','/"/');
$sqlrepl = array('\&','""');
$fill = true;
$i = 0;
while ( $fill &&  $i < count($html) )
{
  // Suchen, bis auf bekanntes Thumbnail gestossen wird
  {
    // Wenn noch kein Thumbnail existiert, lade auch Infos runter, ansonsten Abbruch. Da die Liste
    // von neu nach alt abgearbeitet wird, haben wir die weiteren Infos schon

    // Routine geht davon aus, dass immer abwechselnd link zum Thumb und titel in einer Zeile und Datum in der naechsten
    // Zeile steht 

    list ($picurl,$title) = split('@@',$html[$i]);
    $tag = preg_replace("'.*sets/'",'',$picurl);
    $tag = preg_replace("'/cover.*'",'',$tag);
    $i++;
    echo "$html[$i]\n";
    # $date = date_format(date_create($html[$i]),'Ymd');
    $date = "20141010";
    $i++;

    if ( dl_thumb($thumburl,$picurl,0,$basedir,$date,$tag) )
    {
      $model = get_model($detailurl,$tag);
      db_insert($tag,$title,$date,$model);
    } else {
      $fill = false;
    } 
  }
}

// Seite zusammenbauen
$sqlcmd = "select tag as tag ,title as title ,model as model ,myts as myts from joymii order by myts desc;";
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
  fprintf($table,"<td><?php inspic_jm(\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\$new_array['%s']);?></td>\n",$subdir,$row['tag'],$row['title'],$row['model'],$row['myts'],$row['tag']);
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

