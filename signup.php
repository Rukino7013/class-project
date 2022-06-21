<?php 
    include("includes/db.php");

    if(isset($_POST['submit'])){
        $username = strip_tags(mysqli_real_escape_string($conn, $_POST['username']));
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if(empty($username)){
            header('location: signup.php?error=emptyUsername');
            exit;
        }
        if(empty($email)){
            header('location: signup.php?error=emptyEmail');
            exit;
        }
        if(empty($password)){
            header('location: signup.php?error=emptyPassword');
            exit;
        }
        if(!empty($username) && !empty($email) && !empty($password)){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('location: signup.php?error=invalidEmail');
                exit;
            }
            
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $password = password_hash(mysqli_real_escape_string($conn, $password), PASSWORD_DEFAULT);
    
            $emailcheck = "SELECT * FROM register WHERE email='$email'";
            $checkresult = mysqli_query($conn, $emailcheck);
            if($checkresult){
                $data = mysqli_fetch_object($checkresult);
                if($data->email == $email){
                    header('location: signup.php?error=emailAlreadyExist');
                    exit;
                }else{
                    $sql = "INSERT INTO register (username, email, password, created_at) VALUES ('$username', '$email', '$password',now())";
                    $insert = mysqli_query($conn, $sql);
                    if($insert){
                        header('location: login.php?success=userCreated');
                        exit;
                    }else{
                        header('location: signup.php?error=userCreateFailed');
                        exit;
                    }
                }
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
                        if($_GET['error'] == "emptyUsername"){
                            ?>
                            <p class="error"><?php echo "Empty Username"?></p>
                            <?php
                        }else if($_GET['error'] == "emptyEmail"){
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
                        }else if($_GET['error'] == "userCreateFailed"){
                            ?>
                            <p class="error"><?php echo "User Create Failed"?></p>
                            <?php
                        }else if($_GET['error'] == "emailAlreadyExist"){
                            ?>
                            <p class="error"><?php echo "Email already exist"?></p>
                            <?php
                        }
                    ?>
                </div>
            <?php
        }
    ?>
<div class="login-form-container">
        <div class="login-form">
            <h1>Sign Up</h1>
            <form action="signup.php" method="POST">
                <input type="text" placeholder="Username" class="input" name="username" autofocus value="<?php if(isset($username)){echo $username;}?>">
                <br>
                <input type="text" placeholder="Email" name="email" class="input" >
                <br>
                <input type="password" placeholder="Password" name="password" class="input" >
                <br>
                <label for="signup" class="label">Already have an account?</label>
                <a href="login.php">Login</a>
                <br>
                <input type="submit" value="SignUp" name="submit" class="submit">
                <br>
            </form>
        </div>
    </div>
</body>
</html>