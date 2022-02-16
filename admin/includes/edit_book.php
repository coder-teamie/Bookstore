<div class="section-center add-books-section">
<?php

if(isset($_GET['b_id'])){
  $the_book_id = $_GET['b_id'];
}

$stmt = "SELECT * FROM books WHERE book_id = {$the_book_id} ";
$fetch_books_by_id = mysqli_query($connection, $stmt);

while($row = mysqli_fetch_assoc($fetch_books_by_id)) {
  $book_id = $row['book_id'];
  $book_name = $row['book_name'];
  $book_publisher = $row['book_publisher'];
  $book_price = $row['book_price'];
  $book_author = $row['book_author'];
  $book_image = $row['book_image'];
  $book_tags = $row['book_tags'];
  $book_status = $row['book_status'];
  $upload_date = $row['upload_date'];
  $book_category_id = $row['book_category_id'];
}

if(isset($_POST['update_book'])){
  
  $book_name = $_POST['book_name'];
  $book_publisher = $_POST['book_publisher'];
  $book_price = $_POST['book_price'];
  $book_category_id = $_POST['book_category'];
  $book_author = $_POST['book_author'];
  $book_tags = $_POST['book_tags'];
  $book_status = $_POST['book_status'];
  $book_image = $_FILES['image']['name'];
  $book_image_temp = $_FILES['image']['tmp_name'];

  move_uploaded_file($book_image_temp, "../images/$book_image" );

  if(empty($book_image)){
    $query = "SELECT * FROM books WHERE book_id = $the_book_id ";
    $select_image = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_array($select_image)){
      $book_image = $row['book_image'];
    }
  }

  $stmt = "UPDATE books SET ";
  $stmt .="book_category_id = '{$book_category_id}', ";
  $stmt .="book_publisher = '{$book_publisher}', ";
  $stmt .="book_price = '{$book_price}', ";
  $stmt .="book_author = '{$book_author}', ";
  $stmt .="book_image = '{$book_image}', ";
  $stmt .="book_tags = '{$book_tags}', ";
  $stmt .="book_status = '{$book_status}', ";
  $stmt .="upload_date = now() ";
  $stmt .="WHERE book_id = {$the_book_id} ";

  $update_book = mysqli_query($connection, $stmt);
  confirmQuery($update_book);
}

?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="reg-form-row">
    <input
      type="text"
      class="form-control"
      name="book_name"
      placeholder="book name"
      value="<?php echo $book_name; ?>"
    />
  </div>
  <div class="reg-form-row">
    <input
      type="text"
      class="form-control"
      name="book_publisher"
      placeholder="publisher"
      value="<?php echo $book_publisher; ?>"
    />
  </div>
  <div class="reg-form-row">
    <input
      type="number"
      class="form-control"
      name="book_price"
      step="0.01"
      placeholder="book price"
      value="<?php echo $book_price; ?>"
    />
  </div>
    <div class="reg-form-row">
      <select name="book_category" class="form-control" id="book_category">
      <?php
      
      $stmt = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection, $stmt);

      confirmQuery($select_categories);

      while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['category_id'];
        $cat_title = $row['category'];
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
      }

      
        // header("Location: books.php");
      
      ?>
      </select>


    </div>
    <div class="reg-form-row">
      <input
        type="text"
        class="form-control"
        name="book_author"
        placeholder="author"
        value="<?php echo $book_author; ?>"
      />
    </div>
    <div class="reg-form-row">
      <input
        type="text"
        class="form-control"
        name="book_tags"
        placeholder="tags"
        value="<?php echo $book_tags; ?>"
      />
    </div>
    <div class="form-control">
      <img height="400" style="width: 300px;" src="../images/<?php echo $book_image; ?>" alt="">
      <input type="file" name="image">
    </div>
    <div class="reg-form-row">
      <input
      type="text"
      class="form-control"
      name="book_status"
      placeholder="status"
      value="<?php echo $book_status; ?>"
      />
    </div>
    <input type="submit" value="update" name="update_book" class="btn" />
  </form>
</div>
</div>