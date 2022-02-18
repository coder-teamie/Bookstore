<!-- || Header || -->
<?php include "includes/header.php"; ?>      
<?php session_start(); ?>
<!-- || Navigation || -->
<?php include "includes/navigation.php"; ?>      

</header>
<!-- end of header -->

<?php

?>

<div class="section login-page section-center">
  <!-- section title -->
  <!-- <div class="section-title">
    <h2>Sign In</h2>
    <div class="underline"></div>
  </div> -->
  <!-- end of section title -->
  <div class="login">
    <h2>Login Form</h2>
    <form action="includes/login.php" method="post">
        <div class="reg-form">
            <input type="text" name="username" placeholder="Username" class="form-control login-form">
            <input type="password" name="password" placeholder="Password" class="form-control login-form">
        </div>
        <input type="submit" name="login" value="Login" class="btn">
        </form>
  </div>
</div>

  <!-- || Footer|| -->
  <?php include "includes/footer.php"; ?>