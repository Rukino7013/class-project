<?php 
    include('includes/db.php');
    session_start();

    if(isset($_POST['submit'])){
        include('includes/db.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(empty($email)){
            header('location: login.php?error=emptyEmail');
            exit;
        }
    
        if(empty($password)){
            header('location: login.php?error=emptyPassword');
            exit;
        }
        
        if(!empty($email) && !empty($password)){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('location: login.php?error=invalidEmail');
                exit;
            }
            $email = strip_tags(mysqli_real_escape_string($conn, $_POST['email']));
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "SELECT * FROM `register` WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $data = mysqli_fetch_object($result);

                if(!$data->email == $email){
                    header('location: login.php?error=wrongEmail');
                }else{
                    if(password_verify($password, $data->password)){
                        header('location: index.php');
                        $_SESSION['username'] = $data->username;
                        exit;
                    }else{
                        header("location: login.php?error=wrongPassword");
                    }
                }
            }else{
                header('location: login.php?error=userMismatch');
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login-form.css">
    <title>Document</title>
</head>
<body>
<?php 
        if(isset($_GET['error'])){
            ?>
                <div class="error-header">
                    <?php
                        if($_GET['error'] == "emptyEmail"){
                            ?>
                            <p class="error"><?php echo "Empty Email"?></p>
                            <?php
                        }else if($_GET['error'] == "emptyPassword"){
                            ?>
                            <p class="error"><?php echo "Empty Password"?></p>
                            <?php
                        }else if($_GET['error'] == "invalidEmail"){
                            ?>
                            <p class="error"><?php echo "Invalid Email"?></p>
                            <?php
                        }else if($_GET['error'] == "wrongPassword"){
                            ?>
                            <p class="error"><?php echo "Wrong password"?></p>
                            <?php
                        }else if($_GET['error'] == "wrongEmail"){
                            ?>
                            <p class="error"><?php echo "Wrong Email"?></p>
                            <?php
                        }
                    ?>
                </div>
            <?php
        }
    ?>

<?php 
        if(isset($_GET['success'])){
            ?>
                <div class="error-header">
                    <?php
                        if($_GET['success'] == "userCreated"){
                            ?>
                            <p class="error"><?php echo "Login Now"?></p>
                            <?php
                        }else if($_GET['success'] == "signOut"){
                            ?>
                            <p class="error"><?php echo "Sign Out Success"?></p>
                            <?php
                        }
                    ?>
                </div>
            <?php
        }
    ?>
<div class="login-form-container">
        <div class="login-form">
            <h1>Login</h1>
            <form action="login.php" method="POST">
                <input type="text" placeholder="Email" class="input" name="email" autofocus>
                <br>
                <input type="password" placeholder="Password" name="password" class="input" >
                <br>
                <label for="signup" class="label">Don't have an account?</label>
                <a href="signup.php" id="signup">Sign Up</a>
                <br>
                <input type="submit" value="Login" name="submit" class="submit">
                <br>
            </form>
        </div>
    </div>
</body>
</html>