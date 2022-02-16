<!-- || Header || -->
<?php include "includes/header.php"; ?>      

<!-- || Navigation || -->
<?php include "includes/navigation.php"; ?>      

</header>
<!-- end of header -->

    <!-- single book content -->
    <section class="page-contents">
      <div class="section-center single-book-center">
        <!-- single book img -->
        <div class="sinlge-book-img">
          <img src="./images/clean-code.jpg" alt="">
        </div>
        <div class="book-info">
          <h4>Book Name</h4>
          <p>By Aristotle</p>
          <p>$79</p>
        </div>
        <div class="comment-center">
        <div class="comment-section">

            <form action="">
              <div class="reg-form-row">
              <input
                type="text"
                class="form-control"
                name="comment_author"
                placeholder="Enter Your Name"
                required
                />
              </div>
            <div class="reg-form-row">
              <input
                type="email"
                class="form-control"
                name="comment_email"
                placeholder="Enter Your Email"
                required
              />
            </div>
            <div class="reg-form-row">
              <textarea placeholder="Enter your comments" name="comment_content" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
          </form>
        </div>
        <div class="comments">
          <h4>Jim Carey</h4>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, ab maxime odit omnis doloribus sit!</p>
        </div>
        </div>
      </div>
    </section>
    <!-- end of single book content -->

  <!-- || Footer|| -->
  <?php include "includes/footer.php"; ?>
