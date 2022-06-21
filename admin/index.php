<?php 
    include('includes/db.php');
    session_start();
    if(empty($_SESSION['username'])){
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://use.fontawesome.com/1347010625.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                <div class="logo_name">Project</div>
            </div>
            <i class="fa fa-bars" aria-hidden="true" id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span class="links_name">Home</span>
                </a>
                <!-- <span class="tooltip">Home</span> -->
            </li>
            <li>
                <a href="#">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <span class="links_name">Products</span>
                </a>
                <!-- <span class="tooltip">Home</span> -->
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span class="links_name">Contact</span>
                </a>
                <!-- <span class="tooltip">Home</span> -->
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span class="links_name">About</span>
                </a>
                <!-- <span class="tooltip">Home</span> -->
            </li>
        </ul>
    </div>












    <div class="user-container">
    <?php 
        if(empty($_SESSION['username'])){
            ?>
                <a href="login.php">login</a>
                <?php
        }else{
            ?>
            <div class="user-profile">
                <div class="profile"></div>
                <div class="username"><a href="profile-edit.php"><i class="fa fa-user"><?php echo $_SESSION['username']; ?></i></a></div>
            </div>
        <?php
        }
    ?>
    </div>
</body>
</html>