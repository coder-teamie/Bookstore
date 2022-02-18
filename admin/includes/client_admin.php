<!-- ob start -->
<?php ob_start(); ?>

<?php //session_start(); ?>

<!-- db -->
<?php include "../includes/db.php"; ?>

<!-- functions -->
<?php  //include "functions.php"; ?>

<!-- redirect users !admin -->
<?php
if(!isset($_SESSION['user_role'])){
  header("Location: ../index.php");
}
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
    <style>
      th,td {
    padding: 0.1rem 0.5rem;
    border: 1px solid black;
  }
  th {
    font-weight: bolder;
    border: 1px solid black;
  }
  table {
    border-collapse: collapse;
    border: 1px solid black;
  }
    </style>
  </head>

  <!-- body -->

  <body>
    <main class="main">
      <!-- header -->
      <header class="header">
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
        <a href="./client_profile.php">profile</a>
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
          <a href="./client_profile.php" class="dropdown-link">Profile</a>
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
        <a href="./client_profile.php">profile</a>
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



  <div class="section section-center">
  <div class="purchases client-purchases">
    <table class="purchases-table">
    <thead>
        <tr>
            <th>Purchase Id</th>
            <th>Book Name/Title</th>
            <th>Book Author(s)</th>
            <th>Category</th>
            <th>Price</th>
            <th>Date Purchased</th>
            <th>Payment Method</th>
            <th>Purchase Status</th>
            <th>Payment Status</th>
            <th>Click To Pay</th>
        </tr>
    </thead>
<tbody>

<?php
if(isset($_SESSION['user_role'])){

    $lastname = $_SESSION['user_lastname'];    
    
    $query = "SELECT * FROM purchases WHERE client_lastname = '{$lastname}' ";
    $display_purchase_info = mysqli_query($connection, $query);
    
    confirmQuery($display_purchase_info);
    
    while($row = mysqli_fetch_assoc($display_purchase_info)){
        $purchase_id = $row['id'];
        $db_book_name = $row['book_name'];
        $db_book_author = $row['book_author'];
        $db_book_category_id = $row['book_category'];
        $db_book_price = $row['book_price'];
        $db_purchase_date = $row['purchase_date'];
        $db_purchase_status = $row['purchase_status'];
        $db_payment_method = $row['payment_method'];
        $db_payment_status = $row['payment_status'];
        
        echo "<tr>";
        
        echo "<td><strong>BID{$purchase_id}</strong></td>";

        echo "<td> ". ucwords($db_book_name) . " </td>";
        echo "<td> " . ucwords($db_book_author) . " </td>";

        $venue_query = "SELECT * FROM categories WHERE category_id = {$db_book_category_id} ";
        $fetch_category = mysqli_query($connection, $venue_query);

        while($row = mysqli_fetch_array($fetch_category)){
        $cat_id = $row['category_id'];
        $category = $row['category'];
        echo "<td> " . ucwords($category) . "</td>";
        }

        echo "<td>$ {$db_book_price}</td>";
        echo "<td>{$db_purchase_date}</td>";
        echo "<td> " . ucwords($db_payment_method) . " </td>";

        if($db_purchase_status === 'Completed'){
            echo "<td style='background-color: green; color: white;'> " . ucwords($db_purchase_status) . " </td>";
        } else if($db_purchase_status === 'Declined') {
            echo "<td style='background-color: red; color: white;'> " . ucwords($db_purchase_status) . " </td>";
        }
        else {
            echo "<td style='background-color: yellow; color: black;'> " . ucwords($db_purchase_status) . " </td>";
        }

        echo "<td> " . ucwords($db_payment_status) . " </td>";
        if($db_payment_status !== 'Paid'){
            echo "<td><a href='../payment.php?b_id=${purchase_id}' class='btn'>Pay Now</a></td>";
        }
        echo "</tr>";
    }
}
    ?>
        </tbody>
    </table>
  </div>
  </div>
</main>



<script>
const navbar = document.querySelector('#nav');
const navBtn = document.querySelector('#nav-btn');
const closeBtn = document.querySelector('#close-btn');
const sidebar = document.querySelector('#sidebar');
const date = document.querySelector('#date');

// add fixed class to navbar

window.addEventListener('scroll', function () {
  if (window.pageYOffset > 100) {
    navbar.classList.add('navbar-fixed');
  } else {
    navbar.classList.remove('navbar-fixed');
  }
});
// show sidebar
navBtn.addEventListener('click', function () {
  sidebar.classList.add('show-sidebar');
});
closeBtn.addEventListener('click', function () {
  sidebar.classList.remove('show-sidebar');
});
// set year
// date.innerHTML = new Date().getFullYear();

const dropBtn = document.getElementById('dropBtn');
const dropdown = document.getElementById('dropdown');

dropBtn.addEventListener('click', function () {
  dropdown.classList.toggle('show-dropdown');
});

</script>
</body>
</html>