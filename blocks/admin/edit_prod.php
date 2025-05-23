<?php
    $id = $_GET['edit_prod'];
    $query=mysqli_query($conn,"SELECT * FROM products WHERE ID='$id'");
    $data = mysqli_fetch_assoc($query);
    //print_r($data);

    if (isset($_POST['edit_prod'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $cat_id = $_POST['category'];
        $id = $_GET['edit_prod'];
        $time = date("Y-m-d H:i:s");
        
        $update_query = "UPDATE products SET productname='$name', description='$description', price='$price', category_id='$cat_id', updated_at='$time' WHERE id='$id'";
        mysqli_query($conn, $update_query);

        $url = $_SERVER['REQUEST_URI'];
        header("Location: $url");
        exit();
        
    }


?>
<div class="con">
    <form  method="post">
    <label for="name">სახელი</label>
    <input type="text" name="name" value= "<?=$data['productname']?>">
    <br>
    <label for="description">აღწერა</label>
    <textarea name="description" value= "<?=$data['description']?>"></textarea>
    <br>
    <label for="price">ფასი</label>
    <input type="number" name="price" value= "<?=$data['price']?>">
    <br>
    <label for="category">კატეგორია</label>
    <input type="number" name="category" value="<?=$data['category_id']?>">
    <br>
    <input type="submit" name="edit_prod" >
    </form>
    
</div>