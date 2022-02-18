<div class="section-center add-books-section">


<?php
if(isset($_POST['create_book'])){

  $book_category_id = $_POST['book_category'];
  $book_name = $_POST['book_name'];
  $book_publisher = $_POST['book_publisher'];
  $book_price = $_POST['book_price'];
  $book_author = $_POST['book_author'];
  $upload_date = date('d-m-y');
  
  
  $book_image = $_FILES['image']['name'];
  $book_image_temp = $_FILES['image']['tmp_name'];
  
  $book_tags = $_POST['book_tags'];
  $book_status = $_POST['book_status'];
  // $book_comment_count = 4;
  
  move_uploaded_file($book_image_temp, "../images/$book_image" );

  $stmt = "INSERT INTO books(book_category_id, book_name, book_publisher, book_price, book_author,book_image, book_tags, book_status, upload_date) ";
  $stmt .= "VALUES('$book_category_id', '{$book_name}', '{$book_publisher}', {$book_price}, '{$book_author}', '{$book_image}', '{$book_tags}', '{$book_status}', now())";

  $create_book_query = mysqli_query($connection, $stmt);

  confirmQuery($create_book_query);

  // $the_book_id = mysqli_insert_id($connection);

  echo "Book Added: " . " " . "<a href='./books.php'>View Books</a>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="reg-form-row">
    <input
      type="text"
      class="form-control"
      name="book_name"
      placeholder="book name"
      required
    />
  </div>
  <div class="reg-form-row">
    <input
      type="text"
      class="form-control"
      name="book_publisher"
      placeholder="publisher"
      required
    />
  </div>
  <div class="reg-form-row">
    <input
      type="number"
      class="form-control"
      name="book_price"
      step="0.01"
      placeholder="book price"
      required
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
      ?>
      </select>
    </div>
  
    <div class="reg-form-row">
      <input
        type="text"
        class="form-control"
        name="book_author"
        placeholder="author"
        required
      />
    </div>
    <div class="reg-form-row">
      <input
        type="text"
        class="form-control"
        name="book_tags"
        placeholder="tags"
        required
      />
    </div>
  
    <div class="reg-form-row">
      <input
        type="file"
        class="form-control"
        name="image"
        required
      />
    </div>
    <div class="reg-form-row">
      <input
        type="text"
        class="form-control"
        name="book_status"
        placeholder="status"
        required
      />
    </div>
  
  <input type="submit" value="publish" name="create_book" class="btn" />
</form>
</div>