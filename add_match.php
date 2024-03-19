<?php
include("connection.php");
include("sessions.php");

$uname=$_SESSION['fc_user'];
$select3=$con->query("SELECT * FROM `users` WHERE `username`='$uname'");
$view=mysqli_fetch_assoc($select3);
$u_id=$view['user_id'];

if(isset($_POST['add_match'])){
    $date=mysqli_real_escape_string($con, $_POST['date']);
    $play_ground=mysqli_real_escape_string($con, $_POST['play_ground']);
    $ref_id=mysqli_real_escape_string($con, $_POST['ref_id']);
    $ad_id=mysqli_real_escape_string($con, $_POST['ad_id']);
    $user_id=$u_id;

        $insert=$con->query("INSERT INTO `matches`(`mt_id`, `date`, `play_ground`, `ref_id`, `ad_id`, `user_id`) VALUES ('','$date','$play_ground','$ref_id','$ad_id','$user_id')");
        if($insert){
            header("Location: matches.php");
        }
        else{
            echo
            "
                <script>
                    alert('Failed to add new match...');
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
    <title>Kaine Fc - Add Match</title>
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
                <h1>Add Match</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <form action="" method="post">
                    <label>Match Date:</label>
                    <input type="date" name="date" required>
                    <label>Play Ground:</label>
                    <input type="text" name="play_ground" placeholder="Enter your play ground..." required>
                    <label>Match Referee:</label>
                    <select name="ref_id">
                        <option value="Select your match referee...">Select your match referee...</option>
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
                    <select name="ad_id">
                        <option value="Select your match referee...">Select your match adversarie...</option>
                        <?php
                        $select2=$con->query("SELECT * FROM `adversaries`");
                        while($adversarie=mysqli_fetch_assoc($select2)){
                        ?>
                        <option value="<?php echo $adversarie['ad_id'];?>"><?php echo $adversarie['name'];?></option>
                        <?php    
                        }
                        ?>
                    </select>
                    <button type="submit" name="add_match">Add Match...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>