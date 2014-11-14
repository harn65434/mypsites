<?php
function opendb()
{
  global $DBUSER,$DBPASS;
  $dbh = mysql_connect('localhost',$DBUSER,$DBPASS);
  return $dbh;
}

function get_studio()
{
  list ($dummy,$studio,$dummy) = split("/",$_SERVER['PHP_SELF']);
  return ($studio);
}

function imgclass($status,$ext)
{
  $classes = array('new','downloading','offsite','onsite','archived','mirrored');

  $class = "$classes[$status]$ext";
  $exists = $classes[$status];
  return array($class, $exists); 
}

function check_ext()
{
  # liefert true, wenn externe IP oder false, falls intern
  global $intern;
  $p = $_SERVER["REMOTE_ADDR"];
  if ( preg_match($intern,$p) )
  {
    return (false);
  } else {
    return (true);
  }
}
?>
