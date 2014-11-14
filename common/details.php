<?php
$mode = $_GET['mode'];
if ( $mode == 'dj' )
{ 
  $studioarr = array ( 's' => 'ox', 'k' => 'lesbea', 'm' => 'momxxx', 'mr' => 'massagerooms' );
  $prefix = $_GET['prefix'];
  $studio = $studioarr["$prefix"] ;
  $clipid = $_GET['clipid'];
}

$tag=$_GET['tag'];

echo <<<EOD
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="de-DE" lang="de-DE" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Nagios</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <div>
      <h2>Title</h2>
      <h3>Models</h3>
      <div align="center">
EOD;

if ( $mode == 'dj' )
{
  printf ('<img src="/%s/scenes/%s%d/pic-big.jpg" alt="" border="0" />',$studio,$prefix,$clipid);
  printf ('<div><div align="center">');
  for ($i=1; $i<=4; $i++)
  {
    printf('<img src="/%s/scenes/%s%d/pic-%d.jpg" alt="" border="0" />',$studio,$prefix,$clipid,$i);
  }
}

if ( $mode == 'xa' )
{
  printf ('<img src="/xart/scenes/%s/pic-big.jpg" alt="" border="0" />',$tag);
  printf ('<div><div align="center">');
  for ($i=1; $i<=3; $i++)
  {
    printf('<img src="/xart/scenes/%s/pic-%s.jpg" alt="" border="0" />',$tag,$i);
  }
}

if ( $mode == 'jm' )
{
  printf ('<img src="/joymii/scenes/%s/pic-details.jpg" alt="" border="0" />',$tag);
  printf ('<div><div align="center">');
}

echo <<<EOD
      </div>
    </div>
  </body>
</html>
EOD;
?>
