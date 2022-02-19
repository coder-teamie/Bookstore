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


<?php



if(isset($_GET['b_id'])) {
  $the_book_id = $_GET['b_id'];

  $query = "SELECT * FROM books WHERE book_id = $the_book_id ";
  $fetch_book = mysqli_query($connection, $query);

  if(!$fetch_book){
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while($row = mysqli_fetch_array($fetch_book)){
    $db_book_id = $row['book_id'];
    $db_book_name = $row['book_name'];
    $db_book_author = $row['book_author'];
    $db_book_category_id = $row['book_category_id'];
    $db_book_price = $row['book_price'];
  }
}

if(isset($_POST['checkout'])){
  $book_name = $_POST['book_name'];
  $book_author = $_POST['book_author'];
  $book_category_id = $_POST['book_category'];
  $book_price = $_POST['book_price'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $city = $_POST['user_city'];
  $street_address = $_POST['user_street_address'];
  
  $stmt = "INSERT INTO purchases(book_name, book_author, book_category, book_price, client_firstname, client_lastname, client_username, client_email, client_city, client_street_address, purchase_status, purchase_date, payment_method, payment_status) ";
  $stmt .= "VALUES('{$book_name}', '{$book_author}', {$book_category_id}, {$book_price}, '{$firstname}', '{$lastname}', '{$username}', '{$email}', '{$city}', '{$street_address}', 'pending', now(), 'pending payment', 'pending payment')";
  
  $checkout_query = mysqli_query($connection, $stmt);

  if(!$checkout_query){
    die("QUERY FAILED". mysqli_error($connection));
  }

  header("Location: process.php");
  
}
?>

<div class="section section-center checkout-page">
  <!-- section title -->
  <div class="section-title">
    <h2>checkout</h2>
    <div class="underline"></div>
  </div>
  <!-- end of section title -->
  <div class="checkout">
    <div class="item-info">
      <form action="" method="post">
        
        <input type="text" name="book_name" value="<?php echo ucwords($db_book_name); ?>" class="form-control" readonly>
        <input type="text" name="book_author" value="<?php echo ucwords($db_book_author); ?>" class="form-control" readonly>
        <input type="text" name="book_category" value="<?php echo ucwords($db_book_category_id); ?>" class="form-control" readonly>
        <input type="text" name="book_price" value="<?php echo ucwords($db_book_price); ?>" class="form-control" readonly>
        <h4>Client Details</h4>
        <?php 
        if(isset($_SESSION['user_role'])){
          $db_username  = $_SESSION['username'];
          $db_user_firstname  = $_SESSION['user_firstname'];
          $db_user_lastname  = $_SESSION['user_lastname'];
          $db_user_city  = $_SESSION['user_city'];
          $db_user_street_address  = $_SESSION['user_street_address'];
          $db_user_email  = $_SESSION['user_email'];
          ?>

        <input type="text" name="firstname" value="<?php echo ucwords($db_user_firstname); ?>" class="form-control" readonly>
        <input type="text" name="lastname" value="<?php echo ucwords($db_user_lastname); ?>" class="form-control" readonly>
        <input type="text" name="username" value="<?php echo ucwords($db_username); ?>" class="form-control" readonly>
        <input type="text" name="email" value="<?php echo $db_user_email; ?>" class="form-control" readonly>
        <input type="text" name="user_city" value="<?php echo ucwords($db_user_city); ?>" class="form-control" readonly>
        <input type="text" name="user_street_address" value="<?php echo ucwords($db_user_street_address); ?>" class="form-control" readonly>
<?php } ?>
    </div>
    <input type="submit" name="checkout" value="checkout" class="btn">
    </form>
  </div>
</div>

<?php } ?>
  <!-- || Footer|| -->
  <?php include "includes/footer.php"; ?>