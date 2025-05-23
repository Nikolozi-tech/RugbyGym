<?php
    $id = $_GET['edit'];
    $query=mysqli_query($conn,"SELECT * FROM categorys WHERE ID='$id'");
    $data = mysqli_fetch_assoc($query);
    //print_r($data);

    if (isset($_POST['edit_cat'])) {
       $name = $_POST['name'];
       $description = $_POST['description'];
       $id = $_GET['edit'];
       $time = date("Y-m-d H:i:s");
     mysqli_query($conn, "UPDATE categorys SET name='$name', description='$description', updated_at='$time'  WHERE id='$id'");
        $url = $_SERVER['REQUEST_URI'];
        header("location: $url");
        exit();
    }
    
?>
<div class="con">
    <form  method="post">
    <label for="name">სახელი</label>
    <input type="text" name="name" value="<?=$data['name']?>">
    <br>
    <label for="description">აღწერა</label>
    <input type="text" name="description" value="<?=$data['description']?>">
    <br>
    <input type="submit" name="edit_cat">
    </form>
    
</div>