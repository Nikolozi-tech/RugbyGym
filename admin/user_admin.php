<?php
    if(isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        // echo $email;
        // echo "<hr>";
        // echo $password;
        $sign_query = mysqli_query($conn, "SELECT username, id , role  FROM users WHERE email='$email' AND password='$password'");
        // print_r($sign_query);
        if(mysqli_num_rows($sign_query)==1){
            $user = mysqli_fetch_assoc($sign_query);
             //print_r($user['username']);
           $_SESSION['username']=$user['username'];
            $_SESSION['role']=$user['role'];
           //print_r($role);
        }else{

        }
    }

    if(isset($_GET['sign']) && $_GET['sign']=='out'){
        unset($_SESSION['user']);
        session_destroy();
    }
?>