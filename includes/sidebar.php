<!-- sidebar -->
<div class="categories">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Search</h4>
        <form action="./search.php" method="post">
        <div class="input-group">
            <input type="text" name="search" class="search-form">
            <span class="sinput-group-btn">
                <button name="submit" class="search-btn" type="submit">
                <span>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
            </button>
            </span>
        </div>
        </form> <!--form search -->
    </div>

    <!-- Log n -->
    <div class="well">
        <?php  if(isset($_SESSION['user_role'])): ?>

    <h4>Logged in as <?php echo $_SESSION['username'] ?></h4>

        <a href="/bookstore/includes/logout.php" class="btn btn-primary">Log Out</a>

        <?php else: ?>
        
        <h4>Sign-In</h4>
        <form action="includes/login.php" method="post">
        <div class="reg-form">
            <input type="text" name="username" placeholder="Username" class="form-control login-form">
            <input type="password" name="password" placeholder="Password" class="form-control login-form">
        </div>
        <input type="submit" name="login" value="Sign-in" class="btn">
        </form> <!--form search -->
        <?php  endif; ?>
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
                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }
                ?>
            
            </ul>
            </div>
        <!-- /.row -->
    </div>

</div>

<!-- end of sidebar -->
</div>