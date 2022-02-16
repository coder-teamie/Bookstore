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

// DELETE QUERY
function delete_category() {
  global $connection;

  if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];

    $stmt = "DELETE FROM categories WHERE category_id = {$the_cat_id} ";
    $delete_category = mysqli_query($connection, $stmt);

    header("Location: categories.php");
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

?>