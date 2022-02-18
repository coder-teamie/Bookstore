<!-- || Header || -->
<?php include "includes/header.php"; ?>      

<!-- || Navigation || -->
<?php include "includes/navigation.php"; ?>      

</header>
<!-- end of header -->

    <!-- single book content -->
    <section class="page-contents">
      <div class="section-center single-book-center">
        

      <?php

      if(isset($_GET['b_id'])) {
        $the_book_id = $_GET['b_id'];
      }

      $stmt = "SELECT * FROM books WHERE book_id = $the_book_id ";
      $result = mysqli_query($connection, $stmt);
      
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_publisher = $row['book_publisher'];
        $book_author = $row['book_author'];
        $book_price = $row['book_price'];
        $book_image = $row['book_image'];
        $book_category_id = $row['book_category_id'];
        
      
        ?>


        <div class="sinlge-book-img">
          <img src="./images/<?php echo $book_image; ?>" alt="<?php echo $book_name; ?>">
        </div>
        <div class="book-info">
          <h4><?php echo $book_name; ?></h4>
            <p>by <?php echo $book_author; ?></p>
            <p><?php echo $book_publisher; ?></p>
            
            <!-- Category Query -->
            <?php
            $stmt = "SELECT * FROM categories WHERE category_id = {$book_category_id}";
            $select_categories = mysqli_query($connection, $stmt);

            while($row = mysqli_fetch_assoc($select_categories)) {
              $cat_id = $row['category_id'];
              $cat_title = $row['category'];
            }
            ?>
            <p><?php echo $cat_title; ?></p>

            <p>price: $<?php echo $book_price; ?></p>
            <?php } ?>
            <div class="action-btns">
              <a href="checkout.php?b_id=<?php echo $book_id; ?>" class="btn">Buy</a>
              <a href="rental.php" class="btn">Rent</a>
            </div>
        </div>
        <div class="comment-center">
        <div class="comment-section">

    <?php

    if(isset($_POST['create_comment'])) {

      $the_book_id = $_GET['b_id'];

      $comment_author = $_POST['comment_author'];
      $comment_email = $_POST['comment_email'];
      $comment_content = $_POST['comment_content'];

      $stmt = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
      $stmt .= "VALUES($the_book_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

      $comment_query = mysqli_query($connection, $stmt);

      confirmQuery($comment_query);

      $stmt = "UPDATE books SET book_comment_count = book_comment_count + 1 ";
      $stmt .= "WHERE book_id = $the_book_id";

      $update_comment_count = mysqli_query($connection, $stmt);

    }
        ?>

            <form action="" method="post">
              <div class="reg-form-row">
                <label for="comment_author">Name</label>
              <input
                type="text"
                class="form-control"
                name="comment_author"
                required
                />
              </div>
            <div class="reg-form-row">
              <label for="comment_author">Email</label>
              <input
                type="email"
                class="form-control"
                name="comment_email"
                required
              />
            </div>
            <div class="reg-form-row">
              <label for="comment_author">Comment</label>
              <textarea  name="comment_content" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" value="submit" name="create_comment" class="btn" />
          </form>
        </div>
        
        <?php
          $stmt =  "SELECT * FROM comments WHERE comment_post_id = {$the_book_id} ";
          $stmt .= "AND comment_status = 'approved' ";
          $stmt .= "ORDER BY comment_id DESC";
          $fetch_comments = mysqli_query($connection, $stmt);
          
          while ($row = mysqli_fetch_assoc($fetch_comments)) {
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];
            
            ?>
            <div class="comments">
            <h4><?php echo $comment_author; ?></h4>
            <p><?php echo $comment_content; ?></p>
            <p><?php echo $comment_date; ?></p>
          </div>

          <?php } ?>
        </div>
      </div>
    </section>
    <!-- end of single book content -->

  <!-- || Footer|| -->
  <?php include "includes/footer.php"; ?>
