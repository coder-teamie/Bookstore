<!-- Header -->
<?php ob_start(); ?>

<?php session_start(); ?>

<!-- db -->
<?php include "../includes/db.php"; ?>

<!-- functions -->
<?php  //include "functions.php"; ?>

<!-- redirect users !admin -->
<?php
// if(!isset($_SESSION['user_role'])){
//   header("Location: ../index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/main.css" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-6.0.0-web/css/all.min.css"
    />
    <title>Admin Panel</title>
  </head>

  <!-- body -->

  <body>
    <main class="main">
      <!-- header -->
      <header class="header">

<?php

  if(isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

  $stmt = "SELECT * FROM users WHERE username = '$username' ";
  $fetch_user_by_id = mysqli_query($connection, $stmt);

  while($row = mysqli_fetch_array($fetch_user_by_id)) {
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
    $user_gender = $row['user_gender'];
    $user_country = $row['user_country'];
    $user_city = $row['user_city'];
    $user_street_address = $row['user_street_address'];
    $user_zip_code = $row['user_zip_code'];
    $user_password = $row['user_password'];
  }
  }

  if(isset($_POST['update_user'])){
  
  $user_firstname = $_POST['firstname'];
  $user_lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $user_email = $_POST['email'];
  $user_role = $_POST['user_role'];
  $user_gender = $_POST['user_gender'];
  $user_country = $_POST['country'];
  $user_city = $_POST['city'];
  $user_street_address = $_POST['street_address'];
  $user_zip_code = $_POST['zip_code'];
  $user_password = $_POST['password'];

  if(!empty($user_password)){
      
      $query = "SELECT user_password FROM users WHERE username = '{$username}' ";
      $edit_user_password_query = mysqli_query($connection, $query);

      confirmQuery($edit_user_password_query);

      $row = mysqli_fetch_array($edit_user_password_query);
      $db_user_password = $row['user_password'];
      

      if($db_user_password !== $user_password){

        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

      }

  $stmt = "UPDATE users SET ";
  $stmt .="user_firstname = '{$user_firstname}', ";
  $stmt .="user_lastname = '{$user_lastname}', ";
  $stmt .="username = '{$username}', ";
  $stmt .="user_email = '{$user_email}', ";
  $stmt .="user_country = '{$user_country}', ";
  $stmt .="user_street_address = '{$user_street_address}', ";
  $stmt .="user_city = '{$user_city}', ";
  $stmt .="user_zip_code = '{$user_zip_code}', ";
  $stmt .="user_gender = '{$user_gender}', ";
  $stmt .="user_role = '{$user_role}', ";
  $stmt .="user_password = '{$hashed_password}' ";
  $stmt .="WHERE username = '{$username}' ";

  $update_user = mysqli_query($connection, $stmt);
  confirmQuery($update_user);
}
  }

?>

<!-- Header -->
<nav class="nav" id="nav">
  <div class="nav-center">
    <!-- nav header -->
    <div class="nav-header">
      <h2>Admin Panel</h2>
      <button class="nav-btn" id="nav-btn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <!-- end of nav header -->
    <!-- nav links -->
    <ul class="nav-links">
      <li>
        <a href="index.php">dashboard</a>
      </li>
      <li>
        <a href="./profile.php">profile</a>
      </li>
      <li>
        <a href="../index.php">Home</a>
      </li>
    </ul>
    <!-- end of nav links -->
    <!-- user icon -->
    <div class="dropdown">
      <div class="user-icon">
        <button class="user-icon" id="dropBtn"><?php echo $_SESSION['username']; ?>
          <i class="fa-solid fa-circle-user"></i>
        </button>
        <div class="dropdown-content" id="dropdown">
          <a href="./profile.php" class="dropdown-link">Profile</a>
          <a href="../includes/logout.php" class="dropdown-link">Logout</a>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- end of navbar -->
<!-- || Sidebar || -->
        <aside id="sidebar" class="sidebar">
          <div>
            <button class="close-btn" id="close-btn">
              <i class="fas fa-times"></i>
            </button>

            <!-- sidebar links -->
            <ul class="sidebar-links">
              <li>
                <a href="index.php">dashboard</a>
              </li>
              <li>
                <a href="index.php">profile</a>
              </li>
              <li>
                <a href="../index.php">Home</a>
              </li>
            </ul>
            <!-- end of sidebar links -->
          </div>
        </aside>
        <!-- end of sidebar -->
      </header>
      <!-- end of header -->

<style>
th,td {
    padding: 0.1rem 0.5rem;
  }
  th {
    font-weight: bolder;
  }
  table {
    border-collapse: collapse;
  }
</style>

      <!-- page content -->
      <section class="section">
        <!-- section title -->
      <h1>User Profile</h1>
      <!-- end of section title -->
      <div class="section-center">

      <!-- registration form -->
<div class="reg-form">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="reg-form-row">
      <label for="">Firstname:</label>
      <input
        type="text"
        class="form-control"
        name="firstname"
        value="<?php echo $user_firstname; ?>"
        required
      />
    </div>
    <div class="reg-form-row">
      <label for="">Lastname:</label>
      <input
        type="text"
        class="form-control"
        name="lastname"
        required
        value="<?php echo $user_lastname; ?>"
      />
    </div>
    <div class="reg-form-row">
      <label for="username">Username:</label>
      <input
        type="text"
        class="form-control"
        name="username"
        required
        value="<?php echo $username; ?>"
      />
    </div>
    <div class="reg-form-row">
      <label for="">Email:</label>
      <input
        type="email"
        class="form-control"
        name="email"
        required
        value="<?php echo $user_email; ?>"
      />
    </div>
    <div class="reg-form-row">
      <label for="user_role">User Role</label>
      <select name="user_role" class="form-control" id="user_role">
        <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>;

      <?php
        if($user_role === 'admin') {
          echo "<option value='subscriber'>subscriber</option>";
        } else {
          echo "<option value='admin'>admin</option>";
        }
      ?>
      </select>
    </div>
    <div class="reg-form-row">
      <label for="user_gender">Gender:</label>
      <select name="user_gender" class="form-control" id="user_gender">
      <option value='<?php echo $user_gender; ?>'><?php echo $user_gender; ?></option>;
      <option value="female">female</option>
      <option value="male">male</option>
      <option value="prefer-not-to-say">prefer not to say</option>
      </select>
    </div>
    <div class="rows">
      <div class="reg-form-row">
        <label for="">Country:</label>
        <input
          type="text"
          class="form-control"
          name="country"
          required
          value="<?php echo $user_country; ?>"
        />
      </div>
      <div class="reg-form-row">
        <label for="">City:</label>
        <input
          type="text"
          class="form-control"
          name="city"
          required
          value="<?php echo $user_city; ?>"
        />
      </div>
    </div>
    <div class="rows">
      <div class="reg-form-row">
        <label for="">Street Address:</label>
        <input
          type="text"
          class="form-control"
          name="street_address"
          required
          value="<?php echo $user_street_address; ?>"
        />
      </div>
      <div class="reg-form-row">
        <label for="">Zip Code:</label>
        <input
          type="number"
          class="form-control"
          name="zip_code"
          value="<?php echo $user_zip_code; ?>"
        />
      </div>
    </div>
    <div class="reg-form-row">
        <label for="">Password:</label>
        <input
          type="password"
          class="form-control"
          name="password"
          value="<?php echo $user_password; ?>"
        />
      </div>
    <input type="submit" value="update profile" name="update_user" class="btn" />
  </form>
</div>
<!-- end of registration form -->

      </div>
      </section>

      <!-- footer -->
      <?php include "./includes/admin_footer.php"; ?>