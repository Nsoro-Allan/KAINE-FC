<?php
include("connection.php");
include("sessions.php");

$ref_id=$_GET['ref_id'];

// Select Data
$select=$con->query("SELECT * FROM `referees` WHERE `ref_id`='$ref_id'");
$row=mysqli_fetch_assoc($select);
$f_name=$row['f_name'];
$l_name=$row['l_name'];
$age=$row['age'];
$gender=$row['gender'];
$tel=$row['tel'];

// Update Data
if(isset($_POST['edit_referee'])){
    $f_name=mysqli_real_escape_string($con,$_POST['f_name']);
    $l_name=mysqli_real_escape_string($con,$_POST['l_name']);
    $age=mysqli_real_escape_string($con,$_POST['age']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $tel=mysqli_real_escape_string($con,$_POST['tel']);

    $update=$con->query("UPDATE `referees` SET `f_name`='$f_name', `l_name`='$l_name', `age`='$age', `gender`='$gender', `tel`='$tel' WHERE `ref_id`='$ref_id'");
    if($update){
        header("Location: referees.php");
    }
    else{
        echo
        "
            <script>
                alert('Failed to update referee account...');
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
    <title>Kaine Fc - Edit Referee</title>
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
                <h1>Edit Referee</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <form action="" method="post">
                    <label>Firstname:</label>
                    <input type="text" name="f_name" value="<?php echo $f_name;?>">
                    <label>Lastname:</label>
                    <input type="text" name="l_name" value="<?php echo $l_name;?>">
                    <label>Age:</label>
                    <input type="text" name="age" value="<?php echo $age;?>">
                    <label>Current Gender:</label>
                    <input type="text" value="<?php echo $gender;?>" disabled>
                    <label>New Gender:</label>
                    <select name="gender">
                        <option value="<?php echo $gender;?>">Select new gender...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label>Tel:</label>
                    <input type="text" name="tel" value="<?php echo $tel;?>">
                    <button type="submit" name="edit_referee">Edit Referee...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>