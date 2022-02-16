<nav class="nav" id="nav">
          <div class="nav-center">
            <!-- nav header -->
            <div class="nav-header">
              <h2>Admin Panel</h2>
              <button class="nav-btn" id="nav-btn">
                <i class="fas fa-bars"></i>
              </button>
            </div>
            <!-- end of nav header -->
            <!-- nav links -->
            <ul class="nav-links">
              <li>
                <a href="index.php">dashboard</a>
              </li>
              <li>
                <a id="postDropBtn">books
                  <button class="user-icon">
                    <i class="fa-solid fa-caret-down"></i>
                  </button>
                </a>
                <div class="dropdown-content" id="postDropdown">
                  <a href="./books.php" class="dropdown-link">View Books</a>
                  <a href="books.php?source=add_book" class="dropdown-link">Add Book</a>
                </div>
              </li>
              <li>
                <a href="categories.php">categories</a>
              </li>
              <li>
                <a href="./includes/view_all_bookings.php">bookings</a>
              </li>
              <li>
                <a href="index.php">users</a>
              </li>
              <li>
                <a href="./profile.php">profile</a>
              </li>
              <li>
                <a href="../index.php">Home</a>
              </li>
            </ul>
            <!-- end of nav links -->
            <!-- user icon -->
            <div class="dropdown">
              <div class="user-icon">
                <button class="user-icon" id="dropBtn">John
                  <i class="fa-solid fa-circle-user"></i>
                </button>
                <div class="dropdown-content" id="dropdown">
                  <a href="" class="dropdown-link">Profile</a>
                  <a href="" class="dropdown-link">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <!-- end of navbar -->
