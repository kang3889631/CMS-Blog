<?php
if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];
    }
    $query = "SELECT * FROM users WHERE user_id={$the_user_id}";
    $select_user_by_id = mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_user_by_id)){
    //$post_id = $row['post_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    
//        $post_content = $row['post_content'];
//        $post_comment_count = $row['post_comment_count'];
//        $post_date = $row['post_date'];
    }

if(isset($_POST['edit_user'])){
    
//    $user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //$post_date = date('d-m-y');
    //$post_comment_count = 4;
    
//    move_uploaded_file($post_image_temp,"../images/$post_image");
//  
    $query="SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    if(!$select_randsalt_query){
        die("Query failed" . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($select_randsalt_query);
    $salt = $row['randSalt'];
    $hashed_password = crypt($user_password, $salt);
    
    
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$hashed_password}' ";
//    $query .= "post_content = '{$post_content}', ";
//    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE user_id = {$the_user_id}";

    $update_user = mysqli_query($connection, $query);

    confirmQuery($update_user);
    echo "<p class='bg-success'>User Updated. <a href='./users.php'>View Users?</a></p>";
}
    

?>
    

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_author">Firstname</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
    </div>
    
    <div class="form-group">
    <select name="user_role" id="">
        <?php
        if($user_role=='admin'){
            echo "<option value='admin'>Admin</option>";
            echo "<option value='subscriber'>Subscriber</option>";
        }else{
            echo "<option value='subscriber'>Subscriber</option>";
            echo "<option value='admin'>Admin</option>";
        }
        ?>
        
    </select>
    </div>
    

    
<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
-->
    
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="post_content">Email</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="post_content">Password</label>
        <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update">
    </div>

</form>