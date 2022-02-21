<!-- <form action="" method="post"> -->
  <div class="books-page">

    <h2>All books</h2>
<table border="1" >
  <thead>
    <tr>
      <th>Id</th>
      <th>Title/Name</th>
      <th>Publisher</th>
      <th>Author</th>
      <th>Price</th>
      <th>Category</th>
      <th>Tags</th>
      <th>Image</th>
      <th>Status</th>
      <th>Comments</th>
      <th>Date</th>
      <th>View Book</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    

    <?php
      $stmt = "SELECT * FROM books";
      $fetch_books = mysqli_query($connection, $stmt);

      while($row = mysqli_fetch_assoc($fetch_books)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_publisher = $row['book_publisher'];
        $book_price = $row['book_price'];
        $book_category_id = $row['book_category_id'];
        $book_author = $row['book_author'];
        $book_image = $row['book_image'];
        $book_tags = $row['book_tags'];
        $book_status = $row['book_status']; 
        $upload_date = $row['upload_date']; 
        $book_comment_count = $row['book_comment_count']; 

        echo "<tr>";
        echo "<td>{$book_id}</td>";
        echo "<td>{$book_name}</td>";
        echo "<td>{$book_publisher}</td>";
        echo "<td>{$book_author}</td>";
        echo "<td> $ {$book_price}</td>";

      // Catgories
        $stmt = "SELECT * FROM categories WHERE category_id = {$book_category_id}";
        $select_categories = mysqli_query($connection, $stmt);

        while($row = mysqli_fetch_assoc($select_categories)) {
          $cat_id = $row['category_id'];
          $cat_title = $row['category'];
          echo "<td>{$cat_title}</td>";
        }



        echo "<td>{$book_tags}</td>";
        echo "<td><img width='50' height='50' src='../images/$book_image' alt='{$book_name}'></td>";
        echo "<td>{$book_status}</td>";
        echo "<td>{$book_comment_count}</td>";
        echo "<td>{$upload_date}</td>";
        echo "<td><a href='../single-book.php?b_id={$book_id}'>View Book</a></td>";
        echo "<td><a href='books.php?source=edit_book&b_id={$book_id}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='books.php?delete={$book_id}'>Delete</a></td>";
        echo "</tr>";

      }
    ?>

      
    
  </tbody>
</table>
<!-- </form> -->
</div>
<?php delete_book(); ?>