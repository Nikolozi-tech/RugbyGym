<?php
       $data_result=[];
    if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        $query = "SELECT * FROM products WHERE category_id='$cat'";
        $result = mysqli_query($conn,$query);
        $data_result=mysqli_fetch_all($result);
        //print_r($data_result);
    }else {
        $query_all = "SELECT * from products";
        $result_all = mysqli_query($conn,$query_all);
        $data_result_all = mysqli_fetch_all($result_all);
        //print_r($data_result_all);
        ?>
        <div class="container">
            <h2>Products</h2>
            <div class="product-list">
            <?php
                        for ($i=0; $i <count($data_result_all) ; $i++) { 
                    ?>
                <div class="product-item">
                    <img src="<?=$data_result_all[$i][8]?>" alt="" width="50%" height="50%">
                    <h3 class="name"><?=$data_result_all[$i][1]?></h3>
                    <p class="description"><?=$data_result_all[$i][2]?></p>           
                    <p class="price"><?=$data_result_all[$i][3]?> <span class="gel"> GEL</span></p>
                    <button type="submit">add to cart</button>
                </div>
                <?php
                        }
                    }
                    ?>
        </div>
        

            
            <div class="product-list">
            <?php
                        for ($i=0; $i <count($data_result) ; $i++) { 
                    ?>
                <div class="product-item">
                            <img src="<?=$data_result[$i][8]?>" alt="" width="50%" height="50%">
                    <h3 class="name"><?=$data_result[$i][1]?></h3>
                    <p class="description"><?=$data_result[$i][2]?></p>           
                    <p class="price"><?=$data_result[$i][3]?><span class="gel"> GEL</span></p>
                    <button type="submit">add to cart</button>
                </div>
                <?php
                        }
                    ?>
        </div>