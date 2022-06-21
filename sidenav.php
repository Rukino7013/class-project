<?php 
    include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    

    <script>
        var buttons = document.querySelectorAll("ul li a");
        var navbar = document.querySelector(".nav-bar");

        navbar.addEventListener("click", function(){
            let ul = document.querySelector("ul");
            let bars = document.querySelector(".bars");
            let nav = document.querySelector(".nav");
            ul.classList.toggle("active");
            bars.classList.toggle("active");
            nav.classList.toggle("active");
        })
        buttons.forEach( button =>{
            button.addEventListener("click", function(){
                buttons.forEach( btn =>{
                    btn.classList.remove("active");
                    this.classList.add("active");
                })
            })
        })
        
    </script>
</body>
</html>
