#!/usr/bin/php
<?php
include "config.php";
include "utils.php";

function dl_thumb($baseurl,$basedir,$pre,$id,$tag)
{
  $tnfname = sprintf("scenes/%s%s/pic-main.jpg",$pre,$id);
  if ( ! file_exists("$basedir/$tnfname") )
  {
    $suff = array('thumb_1','thumb_2','thumb_3','thumb_4','player','video_main');
    $localnames = array('1','2','3','4','big','main');
    mkdir("$basedir/scenes/$pre$id");
    for ( $num=0; $num<count($suff); $num++ )
    {
      $tnfname = sprintf("%s%s/%s%s_%s_%s.jpg",$pre,$id,$pre,$id,$tag,$suff[$num]);
      $urlfh = fopen("$baseurl/tour/scenes/$tnfname",'rb');
      if ($urlfh)
      {
        $tnfile = fopen("$basedir/scenes/_pic.jpg","wb");
        if ($tnfile)
        {
          while (!feof($urlfh))
          {
            fwrite($tnfile,fread($urlfh, 8192), 8192);
          }
          fclose($tnfile);
         
          $src = imagecreatefromjpeg("$basedir/scenes/_pic.jpg");
          $xx = ImageSX($src);
          $yy = ImageSY($src);
          $dest = imagecreatetruecolor($xx, $yy);
          imagecopy($dest, $src, 0, 0, 0, 0, $xx, $yy);
          imagejpeg($dest,"$basedir/scenes/$pre$id/pic-$localnames[$num].jpg",70);
          imagedestroy($dest);
          imagedestroy($src);
          unlink ("$basedir/scenes/_pic.jpg");
        } 
      }
    }
    return(true);
  } else {
    return(false);
  } 
}

function get_details($baseurl,$id)
{
  $cont = file("$baseurl/tour/video.php?id=$id");
  $i = 0;
  $found = 0;
  $patmod = '/\>Model(s*):/';
  $modstr = "";
  while ( $found < 2 && $i < count($cont) )
  {
    if ( preg_match($patmod,$cont[$i]) )
    {
      $found++;
      $models = preg_replace('/<br.*/','',trim($cont[$i]));
      $models = strip_tags($models); 
      $models = preg_replace('/.*:/','',$models);
      $models = preg_replace('/,&nbsp;/','@@',$models);
      $models = preg_replace('/ /','',$models);
      $modarr = split('@@',$models);
      foreach ($modarr as $amod)
      {
	if ( $modstr == '' ) 
        {
          $modstr = $amod;
        } else {
          $modstr = $modstr."_".$amod;
        }
      }
    } 

    if ( preg_match('/class=\"title\"/', $cont[$i]) )
    {
      // ox hat <div class="title">
      $found++;
      $title = preg_replace('/.*"title">(.*)<\/div>/','$1',trim($cont[$i]));
    }

    if ( preg_match('/<h2>/', $cont[$i]) )
    { 
      // andere danejones haben entweder <h2>..</h2> oder <h2><em>..</em></h2>
      $tagpat = array('/<\/*h2>/','/<\/*em>/');
      $title = preg_replace($tagpat,'',trim($cont[$i]) );
    }
    $i++;
  }
  return array($modstr,$title);
}

function db_insert($pre, $id, $tag, $title, $model)
{
  global $sqlpat,$sqlrepl,$database;
  $tag = preg_replace($sqlpat,$sqlrepl,$tag);
  $title = preg_replace($sqlpat,$sqlrepl,$title);
  $sqlcmd = sprintf("replace into danejones(prefix,`index`,tag,title,model) values (\"%s\",\"%s\",\"%s\",\"%s\",\"%s\");", $pre, $id, $tag, $title,$model);
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

// Finde Links zu den Videos auf Startseite
$vidurl= "$baseurl/tour/videos.php";
$cont = file("$vidurl");
$ids = array();
$mypat = array ("'.*/$pre'","'_video_main\.jpg.*'");
foreach ( $cont as $line )
{
  if ( preg_match('/video.php/',$line) )
  {
    $line = trim ($line);
    $line = preg_replace($mypat,'',$line);
    array_push($ids,$line);
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
while ( $fill &&  $i < count($ids) )
{
  // Suchen, bis auf bekanntes Thumbnail gestossen wird
  { 
    // Wenn noch kein Thumbnail existiert, lade auch Infos runter, ansonsten Abbruch. Da die Liste 
    // von neu nach alt abgearbeitet wird, haben wir die weiteren Infos schon
  
    $id = split('_',$ids[$i]);
    $undid = $id[0]."_";
    $tag = preg_replace("'$undid'",'',$ids[$i]); 
    $i++;
    
    if ( dl_thumb($baseurl,$basedir,$pre,$id[0],$tag) )
    {
      list($model,$title) = get_details($baseurl,$id[0]);
      db_insert($pre, $id[0], $tag, $title, $model);
    } else {
      $fill = false;
    } 
  } 
}

// Seite zusammenbauen
$sqlcmd = "select `index` as id, tag as tag, title as title, model as model, status as status from danejones where prefix=\"$pre\" order by id desc;";
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
  fprintf($table,"<td><?php inspic_dj(\"%s\",\"%s\",%s,\"%s\",\"%s\",\"%s\",\$new_array['%s']);?></td>\n",$subdir,$pre,$row['id'],$row['tag'],$row['title'],$row['model'],$row['id']);
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
