<?php
include("connection.php");
include("sessions.php");

$ad_id=$_GET['ad_id'];

// Select Data
$select=$con->query("SELECT * FROM `adversaries` WHERE `ad_id`='$ad_id'");
$row=mysqli_fetch_assoc($select);
$name=$row['name'];

// Update Data
if(isset($_POST['edit_adversarie'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);

    $update=$con->query("UPDATE `adversaries` SET `name`='$name' WHERE `ad_id`='$ad_id'");
    if($update){
        header("Location: adversaries.php");
    }
    else{
        echo
        "
            <script>
                alert('Failed to update adversarie info...');
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
    <title>Kaine Fc - Edit Adversarie</title>
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
                <h1>Edit Adversarie</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <form action="" method="post">
                    <label>Adversarie Name:</label>
                    <input type="text" name="name" value="<?php echo $name;?>">

                    <button type="submit" name="edit_adversarie">Edit Adversarie...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>