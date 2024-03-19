<?php
session_start();
include("connection.php");

if(isset($_POST['login'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $login=$con->query("SELECT * FROM `users`");
    if(mysqli_num_rows($login)>0){
        while($row=mysqli_fetch_assoc($login)){
            if($username == $row['username'] && $password == $row['password']){
                $_SESSION['fc_user']=$username;
                header("Location: dashboard.php");
            }
            else if($username != $row['username'] && $password == $row['password']){
                echo
                "
                    <script>
                        alert('Invalid Username...');
                    </script>
                ";
            }
            else if($username == $row['username'] && $password != $row['password']){
                echo
                "
                    <script>
                        alert('Invalid Password...');
                    </script>
                ";
            }
            else{
                echo
                "
                    <script>
                        alert('Invalid Username and Password...');
                    </script>
                ";
            }
        }
    }
    else{
        echo
        "
            <script>
                alert('No User Found int the database...');
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
    <title>Kaine Fc - Login</title>
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <img src="./imgs/img1.jpg" alt="">
        </div>
        <div class="login-right">
            <form action="" method="post">
                <div class="title">
                    <h1>KAINE FC - Login</h1>
                    <div class="line"></div>
                </div>
                <div class="content">
                <label>Username:</label>
                <input type="text" placeholder="Enter your username..." name="username" required>
                <label>Password:</label>
                <input type="password" placeholder="Enter your password..." name="password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't Have An Account? <a href="./register.php">Register</a>.</p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>