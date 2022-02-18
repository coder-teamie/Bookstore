<?php session_start(); ?>

<?php

  $_SESSION['user_firstname'] = null;
  $_SESSION['user_lastname'] = null;
  $_SESSION['username'] = null;
  $_SESSION['user_email'] = null;
  $_SESSION['user_country'] = null;
  $_SESSION['user_street_address'] = null;
  $_SESSION['user_city'] = null;
  $_SESSION['user_zip_code'] = null;
  $_SESSION['user_gender'] = null;
  $_SESSION['user_role'] = null;
  $_SESSION['user_password'] = null;

  header("Location: ../index.php");

?>