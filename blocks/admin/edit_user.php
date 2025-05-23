<?php
    $id = $_GET['edit_user'];
    $query=mysqli_query($conn,"SELECT * FROM users WHERE ID='$id'");
    $data = mysqli_fetch_assoc($query);
    //print_r($data);

    if (isset($_POST['edit_user'])) {
       $name = $_POST['name'];
       $password = $_POST['password'];
       $email = $_POST['email'];
       $role = $_POST['role'];
       $id = $_GET['edit_user'];
       $time = date("Y-m-d H:i:s");
        $update_query = mysqli_query($conn, "UPDATE users SET username='$name', password='$password', email='$email' , role='$role'  WHERE id='$id'");
        $url = $_SERVER['REQUEST_URI'];
        header("location: $url");
        exit();
    }
    
?>
<div class="con">
    <form  method="post">
    <label for="name">სახელი</label>
    <input type="text" name="name" value="<?=$data['username']?>">
    <br>
    <label for="password">პაროლი</label>
    <input type="text" name="password" value="<?=$data['password']?>">
    <br>
    <label for="email">მეილი</label>
    <input type="text" name="email" value="<?=$data['email']?>">
    <br>
    <label for="role">როლი</label>
    <p>Admin</p><input type="radio" value="admin" name="role">
    <p>User</p><input type="radio" value="user" name="role">
    <br>
    <input type="submit" name="edit_user">
    </form>
    
</div>