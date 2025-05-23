<?php
    $category_id = isset($_GET['category_id']);

    if ($category_id > 0) {
        $query_prod = "SELECT * FROM products WHERE category_id = $category_id ORDER BY ID DESC";
    } else {
        $query_prod = "SELECT * FROM products ORDER BY ID DESC";
    }

    if (isset($_POST['add_prod'])) {
        $name=$_POST['name'];
        $description=$_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category'];
        $query_prod1 = "INSERT INTO products (productname, description , price , category_id) VALUES ('$name', '$description','$price','$category_id')";
        mysqli_query($conn, $query_prod1);
        $url = $_SERVER['REQUEST_URI'];
            header("Location: $url");
            exit(); 
    }
    if (isset($_GET['drop_prod'])) {
        $id = $_GET['drop_prod'];
        $query_delete = mysqli_query($conn,"DELETE FROM products Where ID='$id'");
        $url=$_SERVER['PHP_SELF'];
        header("location: $url");
    }

    $result_prod = mysqli_query($conn, $query_prod);
?>
<table>
        <caption>Products</caption>
        <thead>
            <tr>
            <th>ID</th>
            <th>სახელი</th>
            <th>აღწერა</th>
            <th>ფასი</th>
            <th>შექმნა</th>
            <th>შეცვლა  </th>
            <th>რედაქტირება</th>
            <th>წაშლა</th>
            <th>დამატება</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($data_prod = mysqli_fetch_assoc($result_prod)){
                   //print_r($data_prod);
            ?>
        <tr>
            <td><?=$data_prod['ID']?></td>
            <td><?=$data_prod['productname']?></td>
            <td><?=$data_prod['description']?></td>
            <td><?=$data_prod['price']?></td>
            <td><?=$data_prod['created_at']?></td>
            <td><?=$data_prod['updated_at']?></td>
            <td><a href="?edit_prod=<?=$data_prod["ID"]?>" class="crud_but">Edit</a></td>
            <td><a href="?drop_prod=<?=$data_prod["ID"]?>" class="crud_but">Delete</a></td>
            <td><a href="?add_prod=<?=$data_prod["category_id"]?>" class="crud_but">Add</a></td>
        </tr>
        <?php
                }
        ?>
        </tbody>
</table>
<?php
            if (isset($_GET['add_prod'])) {
                include "add_prod.php";
            }elseif (isset($_GET['edit_prod'])) {
                include "edit_prod.php";
            }
        ?>