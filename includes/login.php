<?php include "db.php"; ?>

<?php session_start(); ?>

<?php //include "admin/functions.php"; ?>

<?php

  if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username =  mysqli_real_escape_string($connection, $username);
    $password =  mysqli_real_escape_string($connection, $password);

    $stmt = "SELECT * FROM users WHERE username = '{$username}' ";
    $fetch_user_query = mysqli_query($connection, $stmt);

    if(!$fetch_user_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($fetch_user_query)){

    $db_user_id = $row['user_id'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_username = $row['username'];
    $db_user_email = $row['user_email'];
    $db_user_street_address = $row['user_street_address'];
    $db_user_city = $row['user_city'];
    $db_user_zip_code = $row['user_zip_code'];
    $db_user_gender = $row['user_gender'];
    $db_user_role = $row['user_role'];
    $db_user_password = $row['user_password'];


    }

    $password = crypt($password, $db_user_password);

    if($username === $db_username && $password === $db_user_password) {
      
      $_SESSION['user_firstname'] = $db_user_firstname;
      $_SESSION['user_lastname'] = $db_user_lastname;
      $_SESSION['username'] = $db_username;
      $_SESSION['user_email'] = $db_user_email;
      $_SESSION['user_street_address'] = $db_user_street_address;
      $_SESSION['user_city'] = $db_user_city;
      $_SESSION['user_zip_code'] = $db_user_zip_code;
      $_SESSION['user_gender'] = $db_user_gender;
      $_SESSION['user_role'] = $db_user_role;
      $_SESSION['user_password'] = $db_user_password;

      header("Location: ../admin");
    } else {
      header("Location: ../index.php");
    } 
  }

?>