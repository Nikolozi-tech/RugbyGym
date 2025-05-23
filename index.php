<?php
    session_start();
    include "config/conf.php";
    include "admin/user_admin.php";
    $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rugby Gear Hub</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body>
    <header>
        <div class="container">
            <h1>Rugby Gear Hub</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#categories">Categories</a></li>
                    <li><a href="#products">Products</a></li>
                    <?php
                        if (!isset($_SESSION['username'])) {
                    ?>
                    <li><a href="?sign=in">Sign In</a></li>
                    <li><a href="?sign=up">Sign Up</a></li>
                    <?php
                        }else{
                    ?>
                    <li><a href="?sign=out" >SignOut</a></li>
                    <li class="username"><?=$_SESSION['username']?></li>
                        <?php
                        }
                        ?>
                </ul>
            </nav>
        </div>
    </header>
                <?php
                   if ($role=="admin") {
                        include 'blocks/admin/Categorys_admin.php';
                        include "blocks/admin/Products_admin.php";
                        include "blocks/admin/user_administrator.php";
                   }else {
            ?>
    <section id="home">
        <div class="containerr">
            <h2>Welcome to Rugby Gear Hub</h2>
            <img src="img/Rubygym.png" alt="" width="100%" height="100%">
            <p>შეიძინეთ ყველაზე მაღალ ხარისხიანი სარაგბო დარბაზის ატრიბუტები ჩვენთან</p>
            <p>განავითარე შენი რაგბის ძალა</p>
        </div>
    </section>

    <section id="categories">
                <?php
                    include "blocks/categorys.php";
                ?>
        </div>
    </section>
    <section id="products">
        <?php
                include "blocks/products.php";     
        ?>
    </section>
     <?php
        if (isset($_GET['sign']) && $_GET['sign']=='in'  && !isset($_SESSION['username'])) {
     ?>
    <section id="signin">
        <?php
            include "blocks/signin.php";     
        ?>
        </div>
    </section>
    <?php
        }elseif (isset($_GET['sign']) && $_GET['sign']=='up'  && !isset($_SESSION['username'])) {
            
     ?>
    <section id="signup">
        <?php
            include "blocks/signup.php";
        ?>
    </section>
            <?php
                  }
            ?>
            <?php
                   }            
            ?>
    <footer>
        <div class="container">
            <p>&copy; 2024 Rugby Gear Hub. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
