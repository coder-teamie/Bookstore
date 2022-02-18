<!-- || Header || -->
<?php include "includes/header.php"; ?>      
<?php session_start(); ?>
<!-- || Navigation || -->
<?php include "includes/navigation.php"; ?>      

</header>
<!-- end of header -->

<?php

?>

<div class="section section-center">
  <!-- section title -->
  <div class="section-title">
    <h2>Thank you! <?php echo " ". $_SESSION['username'] . ". "; ?></h2>
    <div class="underline"></div>
  </div>
  <!-- end of section title -->
  <div class="process">
    <p>Your payment has been posted, kindly give us a moment to ship your order!</p>
    <a href="index.php" class="btn checkout-btn">Back Home</a>
  </div>
</div>

  <!-- || Footer|| -->
  <?php include "includes/footer.php"; ?>