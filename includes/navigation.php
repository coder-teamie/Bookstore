<?php
if(session_status() == PHP_SESSION_NONE) session_start();
?>
      <!-- || Navbar || -->
      <nav class="nav" id="nav">
        <div class="nav-center">
          <!-- nav header -->
          <div class="nav-header">
            <img src="./images/logo.svg" class="nav-logo" alt="nav logo" />
            <button class="nav-btn" id="nav-btn">
              <i class="fas fa-bars"></i>
            </button>
          </div>
          <!-- end of nav header -->
          <!-- nav links -->
          <ul class="nav-links">
            <li>
              <a href="index.php">home</a>
            </li>
            <li>
              <a href="about.php">about</a>
            </li>
            <li>
              <a href="contact.php">contact</a>
            </li>
            <?php if(isLoggedIn()): ?>
              <li>
                <a href="./admin/index.php">account</a>
              </li>
              <?php else: ?>
            <li>
              <a href="registration.php">register</a>
            </li>
            <?php endif; ?>
          </ul>
          <!-- end of nav links -->
          <?php if(isLoggedIn()): ?>
          <a href="includes/logout.php" class="btn login-btn">Log Out</a>
          <?php else: ?>
          <a href="login.php" class="btn login-btn">Log In</a>
          <?php endif; ?>
        </div>
      </nav>
      <!-- end of navbar -->

      <!-- || Sidebar || -->
      <aside id="sidebar" class="sidebar">
        <div>
          <button class="close-btn" id="close-btn">
            <i class="fas fa-times"></i>
          </button>

          <!-- sidebar links -->
          <ul class="sidebar-links">
            <li>
              <a href="index.php">home</a>
            </li>
            <li>
              <a href="about.php">about</a>
            </li>
            <li>
              <a href="contact.php">contact</a>
            </li>
            <li>
              <a href="#search">search</a>
            </li>

            <?php if(isLoggedIn()): ?>

              <li>
                <a href="./admin/index.php">account</a>
              </li>
              <li>
                <a href="includes/logout.php">logout</a>
              </li>

              <?php else: ?>

            <li>
              <a href="registration.php">register</a>
            </li>

          <?php endif; ?>
          </ul>
          <!-- end of sidebar links -->
          <!-- social icons -->
          <ul class="social-icons">
            <li>
              <a href="https://www.twitter.com" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="https://www.twitter.com" class="social-icon">
                <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="https://www.twitter.com" class="social-icon">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="https://www.twitter.com" class="social-icon">
                <i class="fab fa-squarespace"></i>
              </a>
            </li>
            <li>
              <a href="https://www.twitter.com" class="social-icon">
                <i class="fab fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <!-- end of sidebar -->