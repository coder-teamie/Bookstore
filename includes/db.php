<?php
$db_username = 'u785212331_bookstore_host';
$db_host = 'localhost';
$db_password = '#Bookstore2022';
$db_name = 'u785212331_bookstore';

$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if(!$connection){
  die("Connection Failed");
}
?>