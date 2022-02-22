<!-- Header -->
<?php include "./includes/admin_header.php"; ?>

<!-- Header -->
<?php include "./includes/admin_navigation.php"; ?>

<!-- Side Nav -->
<?php include "./includes/admin_sidebar.php"; ?>

<div class="section section-center purchases-center">
  <div class="section-title purchases-title">
    <h2>purchases </h2>
  </div>

  <div class="purchases">

    <table class="purchases-table">
      <thead>
        <tr>
            <th>Purchase Id</th>
            <th>Book Name/Title</th>
            <th>Book Author(s)</th>
            <th>Category</th>
            <th>Price</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>City</th>
            <th>Street</th>
            <th>Date Purchased</th>
            <th>Purchase Status</th>
            <th>Payment Status</th>
            <th>Payment Method</th>
            <th>Approve</th>
            <th>Decline</th>
            <th>Delete</th>
            <th>Click To Pay</th>
        </tr>
    </thead>
<tbody>

<?php
  
    
$query = "SELECT * FROM purchases";
$display_purchase_info = mysqli_query($connection, $query);

confirmQuery($display_purchase_info);

while($row = mysqli_fetch_assoc($display_purchase_info)){
    $purchase_id = $row['id'];
    $db_book_name = $row['book_name'];
    $db_book_author = $row['book_author'];
    $db_book_category_id = $row['book_category'];
    $db_book_price = $row['book_price'];
    $db_client_firstname = $row['client_firstname'];
    $db_client_lastname = $row['client_lastname'];
    $db_client_email = $row['client_email'];
    $db_client_street_address = $row['client_street_address'];
    $db_client_city = $row['client_city'];
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
    echo "<td> " . ucwords($db_client_firstname) . " </td>";
    echo "<td> " . ucwords($db_client_lastname) . " </td>";
    echo "<td>$db_client_email</td>";
    echo "<td> " . ucwords($db_client_city) . " </td>";
    echo "<td> " . ucwords($db_client_street_address) . " </td>";
    echo "<td>{$db_purchase_date}</td>";

    if($db_purchase_status === 'Completed'){
        echo "<td style='background-color: green; color: white;'> " . ucwords($db_purchase_status) . " </td>";
    } else if($db_purchase_status === 'Declined') {
        echo "<td style='background-color: red; color: white;'> " . ucwords($db_purchase_status) . " </td>";
    }
    else {
        echo "<td style='background-color: yellow; color: black;'> " . ucwords($db_purchase_status) . " </td>";
    }

    echo "<td> " . ucwords($db_payment_status) . " </td>";
    echo "<td> " . ucwords($db_payment_method) . " </td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve?'); \" href='purchases.php?complete_purchase={$purchase_id}'>Approve</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to decline?'); \" href='purchases.php?decline_purchase={$purchase_id}'>Decline</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='purchases.php?delete={$purchase_id}'>Delete</a></td>";
    if($db_payment_status !== 'Paid'){
        echo "<td><a href='../payment.php?b_id=${purchase_id}' class='btn pay-btn'>Pay Now</a></td>";
    }
    echo "</tr>";
}

?>
      </tbody>
    </table>
  </div>
</div>


<?php approve_purchase(); ?>
<?php decline_purchase(); ?>
<?php delete_purchase(); ?>

<!-- footer -->
      <?php include "./includes/admin_footer.php"; ?>