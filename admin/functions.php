<?php

// CONFIRM QUERY
function confirmQuery ($result){
  global $connection;
  if(!$result){
    die("QUERY FAILED" . mysqli_error($connection));
  }
}

// FIND ALL CATEGORIES
function fetch_all_categories(){
  global $connection;

  $stmt = "SELECT * FROM categories";
  $fetch_categories = mysqli_query($connection, $stmt);

  while($row = mysqli_fetch_assoc($fetch_categories)) {
    $cat_id = $row['category_id'];
    $cat_title = $row['category'];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
  }
}


// INSERT CATEGORIES
function insert_categories(){
  global $connection;
  if(isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        $stmt = "INSERT INTO categories(category) VALUES ('$cat_title')";
        $add_categorry = mysqli_query($connection, $stmt);

        if(!$add_categorry){
          die("QUERY FAILED" . mysqli_error($connection));
    }
  }
}

// DELETE CATEGORY
function delete_category() {
  global $connection;

  if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];

    $stmt = "DELETE FROM categories WHERE category_id = {$the_cat_id} ";
    $delete_category = mysqli_query($connection, $stmt);

    header("Location: categories.php");
  }
}

// DELETE CATEGORY
function delete_comment() {
  global $connection;

  if(isset($_GET['delete'])){
    $the_comment_id = $_GET['delete'];

    $stmt = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_category = mysqli_query($connection, $stmt);

    header("Location: comments.php");
  }
}

// APPROVE CATEGORY
function approve_comment() {
  global $connection;

  if(isset($_GET['approve'])){
    $the_comment_id = $_GET['approve'];

    $stmt = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
    $unapproved_query = mysqli_query($connection, $stmt);
    confirmQuery($unapproved_query);
    header("Location: comments.php");
  }
}
// APPROVE CATEGORY
function unapprove_comment() {
  global $connection;

  if(isset($_GET['unapprove'])){
    $the_comment_id = $_GET['unapprove'];

    $stmt = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
    $unapproved_query = mysqli_query($connection, $stmt);
    confirmQuery($unapproved_query);
    header("Location: comments.php");
  }
}

// DELETE BOOK
function delete_book(){
  global $connection;

  if(isset($_GET['delete'])) {
    $book_id = $_GET['delete'];

    $stmt = "DELETE FROM books WHERE book_id = ${book_id}";
    $result = mysqli_query($connection, $stmt);

    confirmQuery($result);

    header("Location: books.php");
  }
}

// DELETE USER
function delete_user(){
  global $connection;

  if(isset($_GET['delete'])) {
    $user_id = $_GET['delete'];

    $stmt = "DELETE FROM users WHERE user_id = ${user_id}";
    $delete_user = mysqli_query($connection, $stmt);

    confirmQuery($delete_user);

    header("Location: users.php");
  }
}

// SWITCH TO ADMIN
function switch_to_admin() {
  global $connection;

  if(isset($_GET['admin'])){
    $the_user_id = $_GET['admin'];

    $stmt = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    $make_admin_query = mysqli_query($connection, $stmt);

    confirmQuery($make_admin_query);

    header("Location: users.php");
  }
}
// SWITCH TO SUBSCRIBER
function switch_to_subscriber() {
  global $connection;

  if(isset($_GET['subscriber'])){
    $the_user_id = $_GET['subscriber'];

    $stmt = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
    $make_subscriber_query = mysqli_query($connection, $stmt);

    confirmQuery($make_subscriber_query);

    header("Location: users.php");
  }
}

# || CHECKING IF LOGGED IN ||
function isLoggedIn(){
  if(isset($_SESSION['user_role'])){

    return true;

  }
    return false;

}

 # CHHECKING IF USER IS ADMIN
  function is_admin(){

    global $connection;

    if(isLoggedIn()){

    $query = "SELECT user_role FROM users WHERE user_id =".$_SESSION['user_id']."";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if($row['user_role'] == 'admin'){

      return true;

    } else {

      return false;

    }
  }
  return false;
}

# || APPROVE PURCHASE ||
function approve_purchase () {
  global $connection;

  if(isset($_GET['complete_purchase'])){
  $purchase_id = $_GET['complete_purchase'];
  $query = "UPDATE purchases SET purchase_status = 'Completed' WHERE id = $purchase_id ";
  $approve_query = mysqli_query($connection, $query);

  header("Location: purchases.php");
  }
}

# || DECLINE PURCHASE ||

function decline_purchase () {
  global $connection;

  if(isset($_GET['decline_purchase'])){
  $purchase_id = $_GET['decline_purchase'];
  $query = "UPDATE purchases SET purchase_status = 'Declined' WHERE id = $purchase_id ";
  $reject_query = mysqli_query($connection, $query);

  header("Location: purchases.php");
  }
}

# || DELETING PURCHASE ||
function delete_purchase () {
  global $connection;
  if(isset($_GET['delete'])){
  $purchase_id = $_GET['delete'];
  
  $query = "DELETE FROM purchases WHERE id = {$purchase_id} ";
  $delete_query = mysqli_query($connection, $query);

  header("Location: purchases.php");
  }
}

?>