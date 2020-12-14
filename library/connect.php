<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "glasses";
const DBUTF8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
const TIMEZONE = "Asia/Ho_Chi_Minh";
date_default_timezone_set(TIMEZONE);
date_default_timezone_get();

try {
  $obj = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, DBUTF8);
  $obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
