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
    <header>
        <div class="header">
            <a href="#" class="logo">LOGO</a>
            <a class="bars"></a>
            <ul class="navigation">
                <li><a href="#about">Categories</a></li>
                <li><a href="#services">About</a></li>
                <li><a href="#services">Support</a></li>
                <li><a href="#services">contact</a></li>
                <div><a href="login.php" class="login"><span class="alt">Login</span><i class="fas fa-sign-in-alt"></i></a></div>
            </ul>
        </div>
    </header>

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
        window.addEventListener("scroll", function(){
            const header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0)
        });
        var bars = document.querySelector(".bars");
        bars.addEventListener("click", () => {
            bars.classList.toggle("active");
            let nav = document.querySelector(".navigation");
            nav.classList.toggle('active');
        })
    </script>
</body>
</html>