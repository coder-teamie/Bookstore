<div class="section-center add-books-section">


<?php
if(isset($_POST['add_user'])){

  $user_firstname = $_POST['firstname'];
  $user_lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $user_email = $_POST['email'];
  $user_role = $_POST['user_role'];
  $user_gender = $_POST['user_gender'];
  $user_country = $_POST['country'];
  $user_city = $_POST['city'];
  $user_street_address = $_POST['street_address'];
  $user_zip_code = $_POST['zip_code'];
  $user_password = $_POST['password'];
  $query = "SELECT randSalt FROM users";

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

  $stmt = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_country, user_street_address, user_city,  user_zip_code, user_gender, user_role, user_password) ";
  $stmt .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_email}', '{$user_country}', '{$user_street_address}', '{$user_city}', $user_zip_code, '{$user_gender}', '{$user_role}','{$user_password}')";

  $create_user = mysqli_query($connection, $stmt);

  confirmQuery($create_user);

  echo "<p class='message'>User Created: " . " " . "<a href='users.php'>View Users</a></p>";
}
?>


<!-- section title -->
  <h2>Add User</h2>
<!-- end of section title -->
<!-- registration form -->
<div class="reg-form">
  
  <form action="" method="post" autocomplete="off" autocapitalize="on">
    <div class="reg-form-row">
      <label for="">Firstname:</label>
      <input
        type="text"
        class="form-control"
        name="firstname"
        required
      />
    </div>
    <div class="reg-form-row">
      <label for="">Lastname:</label>
      <input
        type="text"
        class="form-control"
        name="lastname"
        required
      />
    </div>
    <div class="reg-form-row">
      <label for="username">Username:</label>
      <input
        type="text"
        class="form-control"
        name="username"
        required
      />
    </div>
    <div class="reg-form-row">
      <label for="">Email:</label>
      <input
        type="email"
        class="form-control"
        name="email"
        required
      />
    </div>
    <div class="reg-form-row">
      <label for="user_role">User Role:</label>
      <select name="user_role" class="form-control" id="user_role">
      <option value="subscriber">---Select Options---</option>
      <option value="admin">admin</option>
      <option value="subscriber">subscriber</option>
      </select>
    </div>
    <div class="reg-form-row">
      <label for="user_gender">Gender:</label>
      <select name="user_gender" class="form-control" id="user_gender">
      <option value="null">---Select Options---</option>
      <option value="female">female</option>
      <option value="male">male</option>
      <option value="prefer-not-to-say">prefer not to say</option>
      </select>
    </div>
    <div class="rows">
      <div class="reg-form-row">
        <label for="">Country:</label>
        <input
          type="text"
          class="form-control"
          name="country"
          required
        />
      </div>
      <div class="reg-form-row">
        <label for="">City:</label>
        <input
          type="text"
          class="form-control"
          name="city"
          required
        />
      </div>
    </div>
    <div class="rows">
      <div class="reg-form-row">
        <label for="">Street Address:</label>
        <input
          type="text"
          class="form-control"
          name="street_address"
          required
        />
      </div>
      <div class="reg-form-row">
        <label for="">Zip Code:</label>
        <input
          type="number"
          class="form-control"
          name="zip_code"
        />
      </div>
    </div>
    <div class="reg-form-row">
        <label for="">Password:</label>
        <input
          type="password"
          class="form-control"
          name="password"
        />
      </div>
    <input type="submit" value="add user" name="add_user" class="btn" />
  </form>
</div>
<!-- end of registration form -->
</div>