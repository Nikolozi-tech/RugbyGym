<?php
    $query = "SELECT id , name FROM categorys ";
    $result = mysqli_query($conn,$query);
    $data_res = mysqli_fetch_all($result);
    //print_r($data_res);
    
?>
<div class="container">
            <h2>Categories</h2>
            <ul class="category-list">
                <li><a href="index.php">All Products</a></li>
                <?php
                    for ($i=0; $i <count($data_res) ; $i++) { 
                                    
                ?>
                <li><a href="?cat=<?=$data_res[$i][0]?>"><?=$data_res[$i][1]?></a></li>
                <?php
                    }             
                ?>
            </ul>