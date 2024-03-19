<?php
include("connection.php");

if(isset($_POST['register'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $tel=mysqli_real_escape_string($con,$_POST['tel']);

    $insert=$con->query("INSERT INTO `users` VALUES('','$username','$password','$tel')");

    if($insert){
        header("Location: index.php");
    }

    else{
        echo
        "
            <script>
                alert('Failed to create account...');
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaine Fc - Register</title>
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <img src="./imgs/img1.jpeg" alt="">
        </div>
        <div class="login-right">
            <form action="" method="post">
                <div class="title">
                    <h1>KAINE FC - Register</h1>
                    <div class="line"></div>
                </div>
                <div class="content">
                <label>Username:</label>
                <input type="text" placeholder="Enter your username..." name="username" required>
                <label>Password:</label>
                <input type="password" placeholder="Enter your password..." name="password" required>
                <label>Tel:</label>
                <input type="tel" placeholder="Enter your tel..." name="tel" required>
                <button type="submit" name="register">Register</button>
                <p>Already Have An Account? <a href="./index.php">Login</a>.</p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>