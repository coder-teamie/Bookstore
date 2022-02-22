<div class="users">
  <h2>All Users</h2>
  <table border="1" >
    <thead>
    <tr>
      <th>Id</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Username</th>
      <th>Email</th>
      <th>Street Address</th>
      <th>City</th>
      <th>Zip Code</th>
      <th>Gender</th>
      <th>Role</th>
      <th>Admin</th>
      <th>Subscriber</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    

    <?php
      $stmt = "SELECT * FROM users";
      $fetch_users = mysqli_query($connection, $stmt);

      while($row = mysqli_fetch_assoc($fetch_users)) {
        $user_id = $row['user_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_street_address = $row['user_street_address'];
        $user_city = $row['user_city'];
        $user_zip_code = $row['user_zip_code'];
        $user_gender = $row['user_gender'];
        $user_role = $row['user_role'];
        $user_password = $row['user_password'];
        

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_street_address}</td>";
        echo "<td>{$user_city}</td>";
        echo "<td>{$user_zip_code}</td>";
        echo "<td>{$user_gender}</td>";
        echo "<td>{$user_role}</td>";

        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve?'); \"  href='users.php?admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?subscriber={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \"  href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";

      }
    ?>

      
    
  </tbody>
</table>
</div>

<?php switch_to_admin(); ?>
<?php switch_to_subscriber(); ?>
<?php delete_user(); ?>