<?php

include "utils.php";
include "config.php";

if ( check_ext() )
{
  $ext="ext";
} else {
  $ext="";
}


function upd_xa($set,$status)
{
  global $database;
  $dbh = opendb();
  mysql_select_db($database);
  $sqlcmd = sprintf("update xart set status=%d where tag='%s'",$status, $set);
  $results = mysql_unbuffered_query($sqlcmd,$dbh);
  mysql_close($dbh);
}

function upd_dj($pre,$set,$status)
{
  global $database;
  $dbh = opendb();
  mysql_select_db($database);
  $sqlcmd = sprintf("update danejones set status=%d where `index`='%s' and prefix='%s'",$status, $set, $pre);
  $results = mysql_unbuffered_query($sqlcmd,$dbh);
  mysql_close($dbh);
}

function upd_jm($set,$status)
{
  global $database,$DBUSER,$DBPASS;
  $dbh = opendb();
  mysql_select_db($database);
  $sqlcmd = sprintf("update joymii set status=%d where tag='%s'",$status, $set);
  $results = mysql_unbuffered_query($sqlcmd,$dbh);
  mysql_close($dbh);
}

$synclock="/var/lock/synclock";
if (file_exists("$synclock"))
{
  $class="readonly";
} else {
  $set=preg_replace('/.*\//','',$_GET['set']);
  $status=$_GET['status'];
  $mode = $_GET['mode'];

  list($class,$exists) = imgclass($status,$ext);

  if ( $mode == 'dj' ) 
  { 
    $pre=$_GET['pre'];
    upd_dj($pre,$set,$status); 
  }
  if ( $mode == 'xa' ) { upd_xa($set,$status); }
  if ( $mode == 'jm' ) { upd_jm($set,$status); }

}
header('Content-Type: text/html; charset=utf-8'); // sorgt für die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE
echo "$class:$exists";
?>

