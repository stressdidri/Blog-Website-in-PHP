<?php
   if(isset($_POST['create_user'])) {
   
            $user_id= $_POST['user_id'];
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $role = $_POST['role'];
            // $post_image = $_FILES['image']['name'];
            // $post_image_temp = $_FILES['image']['tmp_name'];
   
            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            // $post_date = date('d-m-y');

        // move_uploaded_file($post_image_temp, "../images/$post_image" );

        $query = "INSERT INTO users(user_id, user_firstname, user_lastname, role , username,user_email,user_password) ";

        $query .= "VALUES({$user_id},'{$user_firstname}','{$user_lastname}','{$role}','{$user_email}','{$user_password}', '{$username}') ";

        $create_user_query = mysqli_query($connection, $query); 

        confirmQuery($create_user_query);
   }   
?>
    <form action="" method="post" enctype="multipart/form-data">    
    <div class="form-group">
       <label for="user_firstname">Firstname</label>
       <input type="text" class="form-control" name="user_firstname">      
    </div>  

    <div class="form-group">
       <label for="user_lastname">Lastname</label>
       <input type="text" class="form-control" name="user_lastname">
    </div>
      

       <div class="form-group">
       <select name="role" id="">
<!-- <?php 
      $query = "SELECT * FROM users";
      $select_user = mysqli_query($connection,$query);
      confirmQuery($select_user);
      while($row=mysqli_fetch_assoc($select_user))
      {
          $user_id= $row["user_id"];
          $user_role= $row["role"];
          echo "<option value='$user_id'>$role</option>";
      }
      
?> -->
       <option value="subscriber">Select Option</option>
       <option value="admin">Admin</option>
       <option value="subscriber">Subscriber</option>
      </select>
    </div>

   
    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
    </div> -->

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
      
    <div class="form-group">
        <label for="user_email">Email</label>
        <input class="form-control "name="user_email" id="body"></input>
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input class="form-control "name="user_password" id="body" ></input>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>
    