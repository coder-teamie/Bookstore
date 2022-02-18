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
    <h2>Payments Page</h2>
    <div class="underline"></div>
  </div>
  <!-- end of section title -->
  <div class="payment">
    
<?php
  if(isset($_GET['b_id'])){
  $purchase_id = $_GET['b_id'];

  $query = "SELECT * FROM purchases WHERE id = $purchase_id";
  $result = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($result)){

    $purchase_id = $row['id'];
    $db_book_name = $row['book_name'];
    $db_book_author = $row['book_author'];
    $db_book_price = $row['book_price'];
    $db_client_firstname = $row['client_firstname'];
    $db_client_lastname = $row['client_lastname'];
    $db_client_email = $row['client_email'];
    $db_client_street_address = $row['client_street_address'];
    $db_client_city = $row['client_city'];
    $db_purchase_date = $row['purchase_date'];
  }
  

?>

<?php

if(isset($_POST['complete_booking'])){
  $payment_method = $_POST['payment_methods'];

  $query = "UPDATE purchases SET ";
  $query .= "payment_status = 'Paid', ";
  $query .= "payment_method = '{$payment_method}' WHERE id = {$purchase_id}";

  $result = mysqli_query($connection, $query);

  header('Location: complete.php');
}


?>

<form action="" method="post">
<div class="form-group">
  <p>Book Name : <?php echo ucwords($db_book_name); ?></p>
  <p>Author: <?php echo ucwords($db_book_author); ?></p>
  <p>Price : $ <?php echo $db_book_price; ?></p>
  <p>Customer Name : <?php echo ucwords($db_client_firstname) . " " . ucwords($db_client_lastname); ?></p>
  <p>Email : <?php echo $db_client_email; ?></p>
  <p>Delivery Address : <?php echo ucwords($db_client_street_address) . ' '. ucwords($db_client_city) .'City'; ?></p>
  <p>Purchase Date : <?php echo $db_purchase_date; ?></p>
</div>


<?php
}

?>

<div class="form-group">
  <p>Choose Your Payment Method:</p>
  <select class="form-control" name="payment_methods" id="">
    <option value="cash">Cash</option>
    <option value="mastercard">MasterCard</option>
    <option value="paypal">PayPal</option>
  </select>
</div>

<div class="form-group">
  <input type="submit" class="btn btn-primary" name="complete_booking" value="Complete Booking">
</div>
</form>

  </div>
</div>

  <!-- || Footer|| -->
  <?php include "includes/footer.php"; ?>