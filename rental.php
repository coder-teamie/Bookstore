<!-- || Header || -->
<?php include "includes/header.php"; ?>      
<?php session_start(); ?>
<!-- || Navigation || -->
<?php include "includes/navigation.php"; ?>      

</header>
<!-- end of header -->

<?php
if(!isset($_SESSION['user_role'])) {
  header("Location: login.php");
} else {

?>

<div class="section section-center process">
  <!-- section title -->
  <div class="section-title">
    <h2>Book Rental</h2>
    <div class="underline"></div>
  </div>
  <!-- end of section title -->
  <div class="process">
    <p>Sorry <?php echo $_SESSION['username']; ?>, this book is currently not available for rental.</p>
    <a href="index.php" class="btn checkout-btn">Back Home</a>
  </div>
</div>
<?php } ?>
  <!-- || Footer|| -->
  <?php include "includes/footer.php"; ?>