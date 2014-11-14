<?php

function print_intern($dbh,$sites,$prefix,$threshold)
{
  echo "<h1>Threshold: $threshold</h1>";
  echo "<h3><a href=\"joymii\">Joymii</a></h3>";
  $sqljm = "select tag as tag, title as title, model as model, myts as myts, status as status from joymii where status<$threshold order by myts desc";
  $results = mysql_query($sqljm,$dbh);
  while ( $row = mysql_fetch_assoc($results) )
  {
    echo "<div>";
    inspic_jm('joymii',$row['tag'],$row['title'],$row['model'],$row['myts'],$row['status']);
    echo "</div><br>";
  }

  echo "<h3><a href=\"xart\">xart</a></h3>";
  $sqlxa = "select date as date, tag as tag, title as title, model as model, myts as myts, status as status from xart where status<$threshold order by myts desc";
  $results = mysql_query($sqlxa,$dbh);
  while ( $row = mysql_fetch_assoc($results) )
  {
    echo "<div>";
    inspic_xa('xart',$row['date'],$row['tag'],$row['title'],$row['model'],$row['myts'],$row['status']);
    echo "</div><br>";
  }

  for ( $i=0; $i<count($sites); $i++)
  {
    echo "<h3><a href=\"$sites[$i]\">$sites[$i]</a></h3>";
    $sqldj = "select `index` as id, tag as tag, title as title, model as model, status as status from danejones where prefix=\"$prefix[$i]\" and status<$threshold order by id desc";
    $results = mysql_query($sqldj,$dbh);
    while ( $row = mysql_fetch_assoc($results) )
    {
      echo "<div>";
      inspic_dj($sites[$i],$prefix[$i],$row['id'],$row['tag'],$row['title'],$row['model'],$row['status']);
      echo "</div><br>";
    }
  }
}

function print_extern($dbh,$prefix)
{
  $sql = "select status,count(*) as cnt from joymii where status<3 group by status";
  $results = mysql_query($sql,$dbh);
  while ( $row = mysql_fetch_assoc($results) )
  {  
    echo "jm: $row[status] - $row[cnt]<br>";
  }

  $sql = "select status,count(*) as cnt from xart where status<3 group by status";
  $results = mysql_query($sql,$dbh);
  while ( $row = mysql_fetch_assoc($results) )
  {  
    echo "xa: $row[status] - $row[cnt]<br>";
  }

  $sql = "select prefix,status,count(*) as cnt from danejones where status<3 group by prefix,status";
  $results = mysql_query($sql,$dbh);
  while ( $row = mysql_fetch_assoc($results) )
  { 
    echo "dj - $row[prefix]: $row[status] - $row[cnt]<br>";
  } 
}

echo <<<EOD
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Nagios</title>
<meta name="generator" content="Bluefish">
<meta name="author" content="">
<meta name="date" content="">
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<script type="text/javascript" src="/media/jsscript.js"></script>
<link href="/media/pics.css" rel="stylesheet" type="text/css" />
</head>
<body id="txtbody">
EOD;

  include "../common/config.php";
  include "../common/inspic.php";
  $sites = array('ox','lesbea','massagerooms','momxxx');
  $prefix = array('s','k','mr','m');
  $threshold = 3;
  if ( isset ($_GET['th']) )
  {
    $threshold = $_GET['th'];
  }
  $dbh = opendb();
  mysql_select_db($database);

  if ( check_ext() )
  { 
    print_extern($dbh,$prefix);
  } else {
    print_intern($dbh,$sites,$prefix,$threshold);
  }

echo "</body></html>";
?>
