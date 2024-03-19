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
                    </select>
                    <label>Match Adversarie:</label>
                    <select name="ad_id">
                        <option value="Select your match referee...">Select your match referee...</option>
                    </select>
                    <button type="submit" name="add_match">Add Match...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>