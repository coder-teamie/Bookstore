<form action="" method="post">
          <label for="cat_title">Edit Category</label>
          <div class="form-group">

          <?php
          if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];

            $stmt = "SELECT * FROM categories WHERE category_id = {$cat_id} ";
            $select_categories = mysqli_query($connection, $stmt);

            while($row = mysqli_fetch_assoc($select_categories)) {
              $cat_id = $row['category_id'];
              $cat_title = $row['category'];

              $msg = "";
          ?>

                <input type="text" value="<?php if(isset($cat_title)){ echo $cat_title; } ?>" class="form-control" id="cat_title" name="cat_title">

                
        <?php } } ?>

        <?php 

        // UPDATE CATEGORY

        if(isset($_POST['update_category'])){
            $the_cat_title = $_POST['cat_title'];

            $stmt = "UPDATE categories SET category = '{$the_cat_title}' WHERE category_id = {$cat_id} ";
            $update_category = mysqli_query($connection, $stmt);

            if(!$update_category){
              die("QUERY FAILED" . mysqli_error($connection));
            }

            header("Location: ./categories.php");

            $msg = "Category Updated";

          }
        ?>
        
        </div>
        <div class="form-group">
            <?php echo $msg; ?>
            <input type="submit" value="update category" class="btn add-category" name="update_category">
          </div>
        </form>