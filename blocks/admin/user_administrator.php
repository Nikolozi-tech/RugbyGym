<?php
    $query="SELECT * FROM users";
    $result_user = mysqli_query($conn,$query);

    if (isset($_POST['add_user'])) {
       $name = $_POST['name'];
       $password = $_POST['password'];
       $email = $_POST['email'];
       $role = $_POST['role'];
       $query_add = mysqli_query($conn,"INSERT INTO users (username,password,email,role) VALUES('$name','$password','$email','$role')");
        $url = $_SERVER['REQUEST_URI'];
        header("location: $url");
        exit();
    }
 
        if (isset($_GET['drop_user'])) {
            $id = $_GET['drop_user'];
            $delete_query = mysqli_query($conn,"DELETE FROM  users WHERE id='$id'");
           $url= $_SERVER['PHP_SELF'];
           header("location: $url");
        }
?>
<table>
        <caption>Users</caption>
        <thead>
            <tr>
            <th>ID</th>
            <th>სახელი</th>
            <th>პაროლი</th>
            <th>მეილი</th>
            <th>როლი</th>
            <th>რედაქტირება</th>
            <th>წაშლა</th>
            <th>დამატება</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($data_user = mysqli_fetch_assoc($result_user)) {
                
            ?>
        <tr>
            <td><?=$data_user['ID']?></td>
            <td><?=$data_user['username']?></td>
            <td><?=$data_user['password']?></td>
            <td><?=$data_user['email']?></td>
            <td><?=$data_user['role']?></td>
            <td><a href="?edit_user=<?=$data_user["ID"]?>" class="crud_but">Edit</a></td>
            <td><a href="?drop_user=<?=$data_user["ID"]?>" class="crud_but">Delete</a></td>
            <td><a href="?add_user=<?=$data_user["ID"]?>" class="crud_but">Add</a></td>
        </tr>
        <?php
            }
        ?>
        </tbody>
</table>
<?php
    if (isset($_GET['add_user'])) {
        include "blocks/admin/add_user.php";
    }elseif(isset($_GET['edit_user'])){
        include "blocks/admin/edit_user.php";
    }
?>