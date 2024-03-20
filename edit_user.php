<?php
include("connection.php");
include("sessions.php");

if(isset($_POST['add_adversarie'])){
    $name=mysqli_real_escape_string($con, $_POST['name']);

        $insert=$con->query("INSERT INTO `adversaries` (`ad_id`, `name`) VALUES ('','$name')");
        if($insert){
            header("Location: adversaries.php");
        }
        else{
            echo
            "
                <script>
                    alert('Failed to add new adversarie...');
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
    <title>Kaine Fc - Edit User</title>
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
                <h1>Edit User</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <form action="" method="post">
                    <label>Username:</label>
                    <input type="text" name="username" value="<?php echo $username;?>" required>
                    <label>Password:</label>
                    <input type="text" name="password" value="<?php echo $password;?>" required>
                    <label>Tel:</label>
                    <input type="text" name="tel" value="<?php echo $tel;?>" required>
                    <label>Role:</label>
                    <input type="text" name="role" value="<?php echo $tel;?>" required>
                    <button type="submit" name="edit_user">Edit User...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>