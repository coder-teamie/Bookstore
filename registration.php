<!-- || Header || -->
<?php include ("includes/header.php") ?>      

<!-- || Navigation || -->
<?php include ("includes/navigation.php") ?>

    <section class="section-center registration-form">
      <div class="section-title">
        <!-- section title -->
        <h1>sign <span> up</span></h1>
        <div class="underline"></div>
      </div>
      <!-- end of section title -->
      <!-- registration -->
      <div class="registration">
        <article class="contact-img">
          <img src="./images/join-us.jpg" alt="" />
        </article>
        <!-- registration form -->
        <div class="reg-form">
          <form action="" method="post" autocomplete="off" autocapitalize="on">
            <div class="reg-form-row">
              <input
                type="text"
                class="form-control"
                name="firstname"
                placeholder="firstname"
                required
              />
            </div>
            <div class="reg-form-row">
              <input
                type="text"
                class="form-control"
                name="lastname"
                placeholder="lastname"
                required
              />
            </div>
            <div class="reg-form-row">
              <input
                type="email"
                class="form-control"
                name="email"
                placeholder="enter your email"
                required
              />
            </div>
            <div class="rows">
              <div class="reg-form-row">
                <input
                  type="text"
                  class="form-control"
                  name="country"
                  placeholder="country"
                  required
                />
              </div>
              <div class="reg-form-row">
                <input
                  type="text"
                  class="form-control"
                  name="city"
                  placeholder="city"
                  required
                />
              </div>
            </div>
            <div class="rows">
              <div class="reg-form-row">
                <input
                  type="text"
                  class="form-control"
                  name="address"
                  placeholder="address"
                  required
                />
              </div>
              <div class="reg-form-row">
                <input
                  type="text"
                  class="form-control"
                  name="zip code"
                  placeholder="zip code"
                />
              </div>
            </div>
            <input type="submit" value="register" class="btn" />
          </form>
        </div>
        <!-- end of registration form -->
      </div>
      <!-- end of registration -->
    </section>
  
  <!-- || Footer|| -->
  <?php include ("includes/footer.php") ?>