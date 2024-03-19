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
    <title>Kaine Fc - Add Adversarie</title>
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
                <h1>Add Adversarie</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <form action="" method="post">
                    <label>Adversarie Name:</label>
                    <input type="text" name="name" placeholder="Enter your adversarie name..." required>
                    <button type="submit" name="add_adversarie">Add Adversarie...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>