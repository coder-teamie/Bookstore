<!-- sidebar -->
    <div class="categories">
      <!-- Blog Search Well -->
      <div class="well">
          <h4>Search</h4>
          <form action="./search.php" method="post">
          <div class="input-group">
              <input type="text" name="search" class="search-form">
              <span class="input-group-btn">
                  <button name="submit" class="search-btn" type="submit">
                    <span>
                      <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
              </button>
              </span>
          </div>
          </form> <!--form search -->
      </div>

      <!-- Blog Categories Well -->
      <div id="search" class="well">
          <h4>Available Categories</h4>
          <div class="row">
            <ul class="category-list">
                  <?php
                  $stmt = "SELECT * FROM categories";
                  $result = mysqli_query($connection, $stmt);

                  while($row = mysqli_fetch_assoc($result)) {
                    $cat_id = $row['category_id'];
                    $cat_title = $row['category'];
                    echo "<li><a href='#'>{$cat_title}</a>
                      </li>";
                  }
                  ?>
                
              </ul>
              </div>
          <!-- /.row -->
      </div>

      <!-- Side Widget Well -->
      <div class="well">
          <h4>Extra Information Later</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
      </div>

  </div>

    <!-- end of sidebar -->
</div>