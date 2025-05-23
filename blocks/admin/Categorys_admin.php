<?php
    $query_cat = "SELECT * FROM categorys ORDER BY id DESC";
    $result_cat = mysqli_query($conn, $query_cat);
    
    if (isset($_POST['add_cat'])) {
            $name=$_POST['name'];
            $description=$_POST['description'];
            $query = "INSERT INTO categorys (name, description) VALUES ('$name', '$description')";
            mysqli_query($conn, $query);
            $url = $_SERVER['REQUEST_URI'];
            header("Location: $url");
            exit(); 
        }
    if (isset($_GET['drop'])) {
        $id = $_GET['drop'];
        $query_delete = mysqli_query($conn,"DELETE FROM categorys Where ID='$id'");
        $url=$_SERVER['PHP_SELF'];
        header("location: $url");
    }

?>
<table>
        <caption>Category</caption>
        <thead>
            <tr>
            <th>ID</th>
            <th>სახელი</th>
            <th>აღწერა</th>
            <th>შექმნა</th>
            <th>შეცვლა</th>
            <th>რედაქტირება</th>
            <th>წაშლა</th>
            <th>დამატება</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            while($data_cat = mysqli_fetch_assoc($result_cat)){
            
        ?>
        <tr>
            <td><?=$data_cat["ID"]?></td>
            <td><?=$data_cat["name"]?></td>
            <td><?=$data_cat["description"]?></td>
            <td><?=$data_cat["created-at"]?></td>
            <td><?=$data_cat["updated_at"]?></td>
            <td><a href="?edit=<?=$data_cat["ID"]?>" class="crud_but">Edit</a></td>
            <td><a href="?drop=<?=$data_cat["ID"]?>" class="crud_but">Delete</a></td>
            <td><a href="?add" class="crud_but">Add</a></td>
        </tr>
        <?php
          }
        ?>
        </tbody>
    </table>
    <?php
           if (isset($_GET['add'])) {
                include "add.php";
           }elseif(isset($_GET['edit']))(
                include "edit.php"
           )
        ?>

