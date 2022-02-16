<!-- Header -->
<?php include "./includes/admin_header.php"; ?>

<!-- Header -->
<?php include "./includes/admin_navigation.php"; ?>

<!-- Side Nav -->
<?php include "./includes/admin_sidebar.php"; ?>

<style>
th,td {
    padding: 1rem 2rem;
  }
</style>

      <!-- page content -->
      <section class="section">
      <div class="categories-section">
      <?php insert_categories(); ?>

        <form action="" method="post">
          <label for="cat_title">Add Category</label>
          <div class="form-group">
            <input type="text" class="form-control" required id="cat_title" name="cat_title">
          </div>
          <div class="form-group">
            <input type="submit" value="add category" class="btn add-category" name="submit">
          </div>
        </form>
        
        <?php
        if(isset($_GET['edit'])) {
          $cat_id = $_GET['edit'];

          // UPDATE CATEGORIES
          
          include "includes/update_categories.php";
        }
        ?>

        <div class="category-table">
        <table border="1">
          <thead>
            <tr>
              <th>Id</th>
              <th>Category Title</th>
            </tr>
          </thead>
          <tbody>
            
        <!-- || FETCH CATEGORIES || -->
        <?php fetch_all_categories(); ?>

          <!-- || DELETE CATEGORIES -->
        <?php delete_category();  ?>
            </tbody>
          </table>
        </div>
      </div>
      </section>

      <!-- footer -->
      <?php include "./includes/admin_footer.php"; ?>