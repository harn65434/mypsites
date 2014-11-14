<?php

include "config.php";
include "utils.php";

function inspic_dj($subdir,$prefix,$id,$tag,$title,$models,$status)
{
  if ( check_ext() )
  {
    $imgsrc = "/media/hidden/thumb.png";
    $ext = "ext";
  } else {
    $ext = "";
    $imgsrc = "/$subdir/scenes/$prefix$id/pic-main.jpg";
  }
  $statarr = array('new','downloading','offsite','onsite','archived','mirrored');
  $exists = "undef";
  $imgattr=' width="313" height="149" ';
  
  list($class,$exists) = imgclass($status, $ext);

  $dummy = str_replace("_"," ",$tag);
  $dummy = ucwords($dummy);
  $dummy = str_replace(" ","",$dummy);
  $models = str_replace(" ","",$models);
  $models = str_replace("_",", ",$models);
  $pat = array('/\./','/, /');
  $repl = array('','And');
  $mods = preg_replace($pat,$repl,$models);
  $fname = sprintf("%s%s_%s.%s.mp4",$prefix,$id,$mods,$dummy);
  echo "<img $imgattr class=\"$class\" id=\"$prefix$id\" src=\"$imgsrc\" alt=\"$title\">";

  $called_from = $_SERVER['PHP_SELF'];
  if ( $called_from != '/index.php' )
  {
    echo "<br />";
  }
  echo "<select onchange=\"setRequestDDDJ('".$prefix."','".$id."')\" id=\"stat$prefix$id\" size=\"1\">";
  for ($index = 0; $index < count($statarr); $index++)
  {
    $selected = "";
    if ( $index == $status )
    {
      $selected = " selected";
    }
    echo "<option $selected value=\"$index\">$statarr[$index]</option>";
  }
  echo "</select>";
   
  $href = "<br><a href=\"/media/details.php?mode=dj&prefix=$prefix&tag=$tag&clipid=$id\">$title: <span id=\"txt$id\">$exists</span><br></a><b>Models: $models<br>$fname</b>";
  echo "$href";
}

function inspic_xa($subdir,$date,$tag,$title,$models,$myts,$status)
{
  if ( check_ext() )
  {
    $imgsrc = "/media/hidden/thumb.png";
    $ext = "ext";
  } else {
    $ext = "";
    $imgsrc = "/$subdir/scenes/$tag/pic-main.jpg";
  }

  $statarr = array('new','downloading','offsite','onsite','archived','mirrored');
  $db = "database";
  $exists = "undef";
  $imgattr = ' width="300" ';

  list($class,$exists) = imgclass($status, $ext);

  $dummy = str_replace("_"," ",$tag);
  $dummy = ucwords($dummy);
  $dummy = str_replace(" ","",$dummy);
  $models = str_replace(" ","",$models);
  $models = str_replace("_",", ",$models);
  $pat = array('/\./','/, /');
  $repl = array('','And');
  $mods = preg_replace($pat,$repl,$models);
  $fname = sprintf("%s_%s.%s.mp4",$myts,$mods,$dummy);
  echo "<img $imgattr class=\"$class\" id=\"$tag\" src=\"$imgsrc\" alt=\"$title\">";
  
 
  $called_from = $_SERVER['PHP_SELF'];
  if ( $called_from != '/index.php' )
  {
    echo "<br />";
  }
  echo "<select onchange=\"setRequestDD('".$tag."','xa')\" id=\"stat$tag\" size=\"1\">";
  for ($index = 0; $index < count($statarr); $index++)
  {
    $selected = "";
    if ( $index == $status )
    {
      $selected = " selected";
    }
    echo "<option $selected value=\"$index\">$statarr[$index]</option>";
  }
  echo "</select>";

  $href = "<br><a href=\"/media/details.php?mode=xa&tag=$tag\">$title: <span id=\"txt$tag\">$exists</span><br></a><b>Models: $models<br>$fname</b>";
  echo "$href";
}

function inspic_jm($subdir,$tag,$title,$models,$myts,$status)
{
  if ( check_ext() )
  {
    $imgsrc = "/media/hidden/thumb.png";
    $ext = "ext";
  } else {
    $ext = "";
    $imgsrc = "/$subdir/scenes/$myts-$tag/pic-main.jpg";
  }

  $statarr = array('new','downloading','offsite','onsite','archived','mirrored');
  $db = "database";
  $exists = "undef";
  $imgattr = ' width="300" ';

  list($class,$exists) = imgclass($status, $ext);

  $dummy = ucwords(strtolower($title));
  $mypat = array("'&amp;'",'/"/'); 
  $myrepl = array("And","");
  $dummy = preg_replace($mypat,$myrepl,$dummy);
  $dummy = str_replace(" ","",$dummy);
  $models = str_replace(" ","",$models);
  $models = str_replace("_",", ",$models);
  $pat = array('/\./','/, /');
  $repl = array('','And');
  $mods = preg_replace($pat,$repl,$models);
  $fname = sprintf("%s-%s.%s.mp4",$tag,$mods,$dummy);
  echo "<img $imgattr class=\"$class\" id=\"$tag\" src=\"$imgsrc\" alt=\"$title\">";
  

  $called_from = $_SERVER['PHP_SELF'];
  if ( $called_from != '/index.php' )
  {
    echo "<br />";
  }
  echo "<select onchange=\"setRequestDD('".$tag."','jm')\" id=\"stat$tag\" size=\"1\">";
  for ($index = 0; $index < count($statarr); $index++)
  {
    $selected = "";
    if ( $index == $status )
    {
      $selected = " selected";
    }
    echo "<option $selected value=\"$index\">$statarr[$index]</option>";
  }
  echo "</select>";

  $href = "<br><a href=\"/media/details.php?mode=jm&tag=$myts-$tag\">$title: <span id=\"txt$tag\">$exists</span><br></a><b>Models: $models<br>$fname</b>";
  echo "$href";
}


function inspic($detail,$tag,$title,$models,$fname,$orgname)
{
  $p=$_SERVER["REMOTE_ADDR"];
  $intern='/192.168/';
  if ( ! preg_match($intern,$p) )
  {
    $imgsrc="/media/hidden/thumb.png";
    $ext="ext";
  } else {
    $ext="";
    $imgsrc="scenes/$tag/thumb.jpg";
  }

  $db="database";
  $exists="undef";
  $href="<a href=\"javascript:setRequest('".$tag."')\">";
  $imgattr=' width="290" height="162" ';
  if (! file_exists("$db/$tag"))
  {
    $class="unavail$ext";
    $exists="nein";
  } else {
    $class="avail$ext";
    $exists="ja";
  }
  echo "$href<img $imgattr class=\"$class\" id=\"$tag\" src=\"$imgsrc\" alt=\"$tag\"></a>";
  echo "<br>";
  $href="<br><a href=\"$detail\">$title: <span id=\"txt$tag\">$exists</span><br></a><b>Models: $models<br>$orgname<br>$fname</b>";
  echo "$href";
}

?>
