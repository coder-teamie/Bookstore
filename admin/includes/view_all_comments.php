<table border="1" >
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response To</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unpprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    

    <?php
      $stmt = "SELECT * FROM comments";
      $fetch_comments = mysqli_query($connection, $stmt);

      while($row = mysqli_fetch_assoc($fetch_comments)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $stmt = "SELECT * FROM books WHERE book_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($connection, $stmt);

        while($row = mysqli_fetch_array($select_post_id_query)){
          $book_id = $row['book_id'];
          $book_name = $row['book_name'];

          echo "<td><a href='../single-book.php?b_id=$book_id'> $book_name </a></td>";
        }

        echo "<td>{$comment_date}</td>";

        echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \"  href='comments.php?delete={$comment_id}'>Delete</a></td>";
        echo "</tr>";

      }
    ?>

      
    
  </tbody>
</table>

<?php approve_comment(); ?>
<?php unapprove_comment(); ?>
<?php delete_comment(); ?>