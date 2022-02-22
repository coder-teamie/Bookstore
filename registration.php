<!-- || Header || -->
<?php include ("includes/header.php") ?>      

<!-- || Navigation || -->
<?php include ("includes/navigation.php") ?>


<?php

if(isset($_POST['register'])) {

  $user_firstname = $_POST['firstname'];
  $user_lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $user_email = $_POST['email'];
  $user_gender = $_POST['user_gender'];
  $user_city = $_POST['city'];
  $user_street_address = $_POST['street_address'];
  $user_zip_code = $_POST['zip_code'];
  $user_password = $_POST['user_password'];

  $user_firstname = mysqli_real_escape_string($connection,$user_firstname);
  $user_lastname = mysqli_real_escape_string($connection,$user_lastname);
  $username = mysqli_real_escape_string($connection,$username);
  $user_email = mysqli_real_escape_string($connection,$user_email);
  $user_gender = mysqli_real_escape_string($connection,$user_gender);
  $user_city = mysqli_real_escape_string($connection,$user_city);
  $user_street_address = mysqli_real_escape_string($connection,$user_street_address);
  $user_zip_code = mysqli_real_escape_string($connection,$user_zip_code);
  $user_password = mysqli_real_escape_string($connection,$user_password);

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=> 12));

  $stmt = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_street_address, user_city,  user_zip_code, user_gender, user_role, user_password) ";
  $stmt .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_email}', '{$user_street_address}', '{$user_city}', $user_zip_code, '{$user_gender}', 'subscriber','{$user_password}')";
  
  $create_user = mysqli_query($connection, $stmt);
  
  confirmQuery($create_user);

  $message = "Registration form submitted!";
} else {
  $message = "";
}

?>

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
          <h4><?php echo $message; ?></h4>
          <form action="" method="post" autocomplete="off" autocapitalize="on">
            <div class="rows">
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
            </div>
            <div class="reg-form-row">
              <select class="form-control" name="user_gender" id="">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="prefer not to say">Prefer not to say</option>
              </select>
            </div>
            <div class="reg-form-row">
              <input
                type="text"
                class="form-control"
                name="username"
                placeholder="username"
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
            <div class="reg-form-row">
              <input
                type="text"
                class="form-control"
                name="street_address"
                placeholder="address"
                required
              />
            </div>
            <div class="rows">
              <div class="reg-form-row">
                <input
                  type="text"
                  class="form-control"
                  name="city"
                  placeholder="city"
                  required
                />
              </div>
              <div class="reg-form-row">
                <input
                  type="number"
                  class="form-control"
                  name="zip_code"
                  placeholder="zip code"
                />
              </div>
            </div>
            <div class="reg-form-row">
                <input
                  type="password"
                  class="form-control"
                  name="user_password"
                  placeholder="enter your password"
                />
              </div>
            <input type="submit" name="register" value="register" class="btn" />
          </form>
        </div>
        <!-- end of registration form -->
      </div>
      <!-- end of registration -->
    </section>
  
  <!-- || Footer|| -->
  <?php include ("includes/footer.php") ?>