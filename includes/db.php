<?php
$db_username = 'localhost';
$db_host = 'root';
$db_password = '';
$db_name = 'bookstore';

$connection = mysqli_connect($db_username, $db_host, $db_password, $db_name);
if(!$connection){
  die("Connection Failed");
}
?>