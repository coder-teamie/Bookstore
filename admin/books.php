<!-- Header -->
<?php include "./includes/admin_header.php"; ?>

<!-- Header -->
<?php include "./includes/admin_navigation.php"; ?>

<!-- Side Nav -->
<?php include "./includes/admin_sidebar.php"; ?>

<style>
th,td {
    padding: 0.1rem 0.5rem;
  }
  th {
    font-weight: bolder;
  }
  table {
    border-collapse: collapse;
  }
</style>

      <!-- page content -->
      <section class="section books-center">
        <!-- section title -->
      <!-- <h2>All books</h2> -->
      <!-- end of section title -->
      <div class="page-content">
        <?php

        if(isset($_GET['source'])){
          $source = $_GET['source'];
        } else {
          $source = '';
        }

        switch ($source){
          case 'add_book';
            include "includes/add_book.php";
            break;

          case 'edit_book';
            include "includes/edit_book.php";
            break;

          case '200';
            echo "Nice 200";
            break;

          default:
            include "includes/view_all_books.php";
            break;
        }
        ?>
      </div>
      </section>

      <!-- footer -->
      <?php include "./includes/admin_footer.php"; ?>