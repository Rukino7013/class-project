<?php 
    include('includes/db.php');
    session_start();

    
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a318b4f621.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="menu">
    <header>
      <div class="header">
        <div class="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <a href="#" class="logo">LOGO</a>
      </div>

      <div class="login-container">
        <?php 
            if(empty($_SESSION['username'])){
                ?>
                <a href="login.php" class="login-btn">Login</a>
            <?php }else{
                ?>
                    <a href="profile-edit.php" class="user"><?php echo $_SESSION['username']; ?></a>
                <?php
            }
        ?>
      </div>
    </header>
    <nav>
      <ul>
        <li><a href="/">Categories</a></li>
        <li><a href="/">About</a></li>
        <li><a href="/">Support</a></li>
        <li><a href="/">Contact</a></li>
      </ul>
    </nav>
  </div>

    <section class="search-foods">
        <div class="search-container">
            <h2>Tell Us What You Like</h2>

            <div class="search">
                <form action="search.php" method="get">
                    <input type="text" placeholder="Search..." name="search-item">
                    <button name="submit">Find</button>
                </form>
            </div>
        </div>
    </section>
    
    <script>
        // window.addEventListener("scroll", function(){
        //     const header = document.querySelector(".header");
        //     header.classList.toggle("sticky", window.scrollY > 0)
        // });

        const burger = document.querySelector('.burger')
        const nav = document.querySelector('nav')

        burger.addEventListener('click', (e) => {
        nav.classList.toggle('open')
        burger.classList.toggle('open')
        })
    </script>
</body>
</html>