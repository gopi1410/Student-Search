<?php

require("config.php");
$con = mysql_connect($dbhost,$dbuser,$dbpassword);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($database, $con);

?>
