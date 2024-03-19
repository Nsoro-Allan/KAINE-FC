<?php
include("connection.php");
include("sessions.php");

$uname=$_SESSION['fc_user'];
// Select Data
$select=$con->query("SELECT * FROM `users` WHERE `username`='$uname'");
$row=mysqli_fetch_assoc($select);
$username=$row['username'];
$password=$row['password'];

// Update Data
if(isset($_POST['update_account'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $update=$con->query("UPDATE `users` SET `username`='$username', `password`='$password' WHERE `username`='$uname'");

    if($update){
        $_SESSION['fc_user']=$username;
        echo
        "
            <script>
                alert('Just Updated your account...');
            </script>
        ";
    }
    else{
        echo
        "
            <script>
                alert('Failed to update account...');
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
    <title>Kaine Fc - Settings</title>
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <?php 
            include("sidebar.php");
        ?>
        <div class="dashboard-right">
            <div class="right-title">
                <h1>Account Settings</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <form action="" method="post">
                    <label>Current Username:</label>
                    <input type="text" name="username" value="<?php echo $username;?>" required>
                    <label>Current Password:</label>
                    <input type="text" name="password" value="<?php echo $password;?>" required>
                    <button type="submit" name="update_account">Update Account...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>