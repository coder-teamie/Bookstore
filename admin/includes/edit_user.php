<div class="section-center add-books-section">
<?php

if(isset($_GET['edit_user'])){
  $the_user_id = $_GET['edit_user'];


  $stmt = "SELECT * FROM users WHERE user_id = $the_user_id ";
  $fetch_user_by_id = mysqli_query($connection, $stmt);

  while($row = mysqli_fetch_array($fetch_user_by_id)) {
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
    $user_gender = $row['user_gender'];
    $user_country = $row['user_country'];
    $user_city = $row['user_city'];
    $user_street_address = $row['user_street_address'];
    $user_zip_code = $row['user_zip_code'];
    $user_password = $row['user_password'];
  }
}

if(isset($_POST['edit_user'])){
  
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

  if(!empty($user_password)){
    $query = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
    $edit_user_password_query = mysqli_query($connection, $query);

    confirmQuery($edit_user_password_query);

    $row = mysqli_fetch_array($edit_user_password_query);
    $db_user_password = $row['user_password'];
    

    if($db_user_password !== $user_password){

      $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

    }
      
  

  $stmt = "UPDATE users SET ";
  $stmt .="user_firstname = '{$user_firstname}', ";
  $stmt .="user_lastname = '{$user_lastname}', ";
  $stmt .="username = '{$username}', ";
  $stmt .="user_email = '{$user_email}', ";
  $stmt .="user_country = '{$user_country}', ";
  $stmt .="user_street_address = '{$user_street_address}', ";
  $stmt .="user_city = '{$user_city}', ";
  $stmt .="user_zip_code = '{$user_zip_code}', ";
  $stmt .="user_gender = '{$user_gender}', ";
  $stmt .="user_role = '{$user_role}', ";
  $stmt .="user_password = '{$hashed_password}' ";
  $stmt .="WHERE user_id = {$the_user_id} ";

  $update_user = mysqli_query($connection, $stmt);
  confirmQuery($update_user);
  }
}

?>

  <h1>Edit User</h1>
<!-- registration form -->
<div class="reg-form">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="reg-form-row">
      <label for="">Firstname:</label>
      <input
        type="text"
        class="form-control"
        name="firstname"
        value="<?php echo $user_firstname; ?>"
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
        value="<?php echo $user_lastname; ?>"
      />
    </div>
    <div class="reg-form-row">
      <label for="username">Username:</label>
      <input
        type="text"
        class="form-control"
        name="username"
        required
        value="<?php echo $username; ?>"
      />
    </div>
    <div class="reg-form-row">
      <label for="">Email:</label>
      <input
        type="email"
        class="form-control"
        name="email"
        required
        value="<?php echo $user_email; ?>"
      />
    </div>
    <div class="reg-form-row">
      <label for="user_role">User Role</label>
      <select name="user_role" class="form-control" id="user_role">
        <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>;

      <?php
        if($user_role === 'admin') {
          echo "<option value='subscriber'>subscriber</option>";
        } else {
          echo "<option value='admin'>admin</option>";
        }
      ?>
      </select>
    </div>
    <div class="reg-form-row">
      <label for="user_gender">Gender:</label>
      <select name="user_gender" class="form-control" id="user_gender">
      <option value='<?php echo $user_gender; ?>'><?php echo $user_gender; ?></option>;
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
          value="<?php echo $user_country; ?>"
        />
      </div>
      <div class="reg-form-row">
        <label for="">City:</label>
        <input
          type="text"
          class="form-control"
          name="city"
          required
          value="<?php echo $user_city; ?>"
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
          value="<?php echo $user_street_address; ?>"
        />
      </div>
      <div class="reg-form-row">
        <label for="">Zip Code:</label>
        <input
          type="number"
          class="form-control"
          name="zip_code"
          value="<?php echo $user_zip_code; ?>"
        />
      </div>
    </div>
    <div class="reg-form-row">
        <label for="">Password:</label>
        <input
          type="password"
          class="form-control"
          name="password"
          value="<?php echo $user_password; ?>"
        />
      </div>
    <input type="submit" value="update" name="edit_user" class="btn" />
  </form>
</div>
<!-- end of registration form -->
</div>
