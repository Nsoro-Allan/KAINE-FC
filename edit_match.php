<?php
include("connection.php");
include("sessions.php");

$mt_id=$_GET['mt_id'];

// Select Data
$select=$con->query("SELECT * FROM `matches` WHERE `mt_id`='$mt_id'");
$row=mysqli_fetch_assoc($select);
$date=$row['date'];
$play_ground=$row['play_ground'];
$ref_id=$row['ref_id'];
$ad_id=$row['ad_id'];

// Update Data
if(isset($_POST['edit_match'])){
    $date=mysqli_real_escape_string($con, $_POST['date']);
    $play_ground=mysqli_real_escape_string($con, $_POST['play_ground']);
    $ref_id=mysqli_real_escape_string($con, $_POST['ref_id']);
    $ad_id=mysqli_real_escape_string($con, $_POST['ad_id']);

    $update=$con->query("UPDATE `matches` SET `date`='$date', `play_ground`='$play_ground', `ref_id`='$ref_id', `ad_id`='$ref_id' WHERE `mt_id`='$mt_id'");

    if($update){
        header("location: matches.php");
    }

    else{
        echo
        "
            <script>
                alert('Failed to update match...');
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
    <title>Kaine Fc - Edit Match</title>
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
                <h1>Edit Match</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <form action="" method="post">
                    <label>Match Date:</label>
                    <input type="text" name="date" value="<?php echo $date;?>">
                    <label>Play Ground:</label>
                    <input type="text" name="play_ground" value="<?php echo $play_ground;?>">
                    <label>Match Referee:</label>
                    <input type="text" value="<?php
                             $ref_id=$row['ref_id'];
                             $select1=$con->query("SELECT * FROM `referees` WHERE `ref_id`='$ref_id'");
                             $ref=mysqli_fetch_assoc($select1);
                             $f_name=$ref['f_name'];
                             $l_name=$ref['l_name'];
                             echo $f_name;echo $l_name;
                            ?>" disabled>
                    <label>New Match Referee:</label>
                    <select name="ref_id">
                        <option value="<?php echo $ref_id;?>">Select your match referee...</option>
                        <?php
                        $select1=$con->query("SELECT * FROM `referees`");
                        while($referee=mysqli_fetch_assoc($select1)){
                        ?>
                        <option value="<?php echo $referee['ref_id'];?>"><?php echo $referee['f_name'];?><?php echo $referee['l_name'];?></option>
                        <?php    
                        }
                        ?>
                    </select>
                    <label>Match Adversarie:</label>
                    <input type="text" value="<?php
                             $ad_id=$row['ad_id'];
                             $select2=$con->query("SELECT * FROM `adversaries` WHERE `ad_id`='$ad_id'");
                             $ad=mysqli_fetch_assoc($select2);
                             $name=$ad['name'];
                             echo $name;
                            ?>" disabled>
                    <label>New Match Adversarie:</label>
                    <select name="ad_id">
                        <option value="<?php echo $ad_id;?>">Select your match adversarie...</option>
                        <?php
                        $select2=$con->query("SELECT * FROM `adversaries`");
                        while($adversarie=mysqli_fetch_assoc($select2)){
                        ?>
                        <option value="<?php echo $adversarie['ad_id'];?>"><?php echo $adversarie['name'];?></option>
                        <?php    
                        }
                        ?>
                    </select>
                    <button type="submit" name="edit_match">Edit Match...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>