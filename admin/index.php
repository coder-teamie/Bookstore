<!-- db -->
<?php include "../includes/db.php"; ?>

<!-- Header -->
<?php include "./includes/admin_header.php"; ?>

<?php

    if($_SESSION['user_role'] == 'subscriber'){

        include "./includes/client_admin.php";

    } 
    
    else{

?>

<!-- Header -->
<?php include "./includes/admin_navigation.php"; ?>

<!-- Side Nav -->
<?php include "./includes/admin_sidebar.php"; ?>

      <!-- page content -->
      <section class="section">
        <h1>welcome to admin <?php echo $_SESSION['username']; ?></h1>

        <div class="admin-widgets">
          <!-- single widget -->
          <div class="widget">
            <div class="widget-icon">
              <i class="fa-solid fa-book"></i>
            </div>
            <div class="count">

            <?php
              $stmt = "SELECT * FROM books";
              $fetch_books = mysqli_query($connection, $stmt);
              $books_count = mysqli_num_rows($fetch_books);
              echo "<h2>{$books_count}</h2>";
            ?>

              <p>Books</p>
            </div>
            <span><a href="books.php">View Details</a></span>
            <span class="icon"><a href="books.php"><i class="fa fa-arrow-circle-right"></i></a></span>
          </div>
          <!-- end of single widget -->

          <!-- single widget -->
          <div class="widget">
            <div class="widget-icon">
              <i class="fa-solid fa-comments"></i>
            </div>
            <div class="count">
            
            <?php
              $stmt = "SELECT * FROM comments";
              $fetch_comments = mysqli_query($connection, $stmt);
              $comments_count = mysqli_num_rows($fetch_comments);
              echo "<h2>{$comments_count}</h2>";
            ?>

              <p>Comments</p>
            </div>
            <span><a href="comments.php">View Details</a></span>
            <span class="icon"><a href="comments.php"><i class="fa fa-arrow-circle-right"></i></a></span>
          </div>
          <!-- end of single widget -->

          <!-- single widget -->
          <div class="widget">
            <div class="widget-icon">
              <i class="fa-solid fa-users"></i>
            </div>
            <div class="count">
            <?php
              $stmt = "SELECT * FROM users";
              $fetch_users = mysqli_query($connection, $stmt);
              $users_count = mysqli_num_rows($fetch_users);
              echo "<h2>{$users_count}</h2>";
            ?>
              <p>Users</p>
            </div>
            <span><a href="users.php">View Details</a></span>
            <span class="icon"><a href="users.php"><i class="fa fa-arrow-circle-right"></i></a></span>
          </div>
          <!-- end of single widget -->

          <!-- single widget -->
          <div class="widget">
            <div class="widget-icon">
              <i class="fa-solid fa-list-ul"></i>
            </div>
            <div class="count">
            <?php
              $stmt = "SELECT * FROM categories";
              $fetch_categories = mysqli_query($connection, $stmt);
              $categories_count = mysqli_num_rows($fetch_categories);
              echo "<h2>{$categories_count}</h2>";
            ?>

              <p>Category</p>
            </div>
            <span><a href="categories.php">View Details</a></span>
            <span class="icon"><a href="categories.php"><i class="fa fa-arrow-circle-right"></i></a></span>
          </div>
          <!-- end of single widget -->
        </div>

        <?php

$stmt = "SELECT * FROM books WHERE book_status = 'published'";
$fetch_published_books = mysqli_query($connection, $stmt);
$books_published_count = mysqli_num_rows($fetch_published_books);

$stmt = "SELECT * FROM books WHERE book_status = 'draft'";
$fetch_draft_books = mysqli_query($connection, $stmt);
$books_draft_count = mysqli_num_rows($fetch_draft_books);

$stmt = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
$fetch_unapproved_comments = mysqli_query($connection, $stmt);
$comments_unapproved_count = mysqli_num_rows($fetch_unapproved_comments);

$stmt = "SELECT * FROM users WHERE user_role = 'subscriber'";
$fetch_subscribed_users = mysqli_query($connection, $stmt);
$subscribed_users_count = mysqli_num_rows($fetch_subscribed_users);




        ?>

        <script
          type="text/javascript"
          src="https://www.gstatic.com/charts/loader.js"
        ></script>
        <script type="text/javascript">
          google.charts.load('current', { packages: ['bar'] });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Data', 'Count'],
              <?php
                $element_text = ['All Books','Active Books', 'Draft Books', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
                $element_count = [$books_count, $books_published_count, $books_draft_count , $comments_count, $comments_unapproved_count, $users_count, $subscribed_users_count, $categories_count];

                for($i = 0; $i < 8; $i++) {

                  echo "['{$element_text[$i]}'" . " , " . "{$element_count[$i]}],";
                }
              ?>
              // ['Books', 1000],
            ]);

            // ADD SUBTITLE LATER

            var options = {
              chart: {
                title: 'Bookstore Records',
                subtitle: '',
              },
            };

            var chart = new google.charts.Bar(
              document.getElementById('columnchart_material')
            );

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        </script>
        <!-- change width to auto later -->
        <div
          id="columnchart_material"
          style="width: 1200px; height: 700px"
        ></div>
      </section>

<?php } ?>
      <!-- footer -->
      <?php include "./includes/admin_footer.php"; ?>