<?php
include("connection.php");
include("sessions.php");

if(isset($_POST['add_referee'])){
    $f_name=mysqli_real_escape_string($con, $_POST['f_name']);
    $l_name=mysqli_real_escape_string($con, $_POST['l_name']);
    $age=mysqli_real_escape_string($con, $_POST['age']);
    $gender=mysqli_real_escape_string($con, $_POST['gender']);
    $tel=mysqli_real_escape_string($con, $_POST['tel']);

    if($gender != "Select your gender..."){
        $insert=$con->query("INSERT INTO `referees`(`ref_id`, `f_name`, `l_name`, `age`, `gender`, `tel`) VALUES ('','$f_name','$l_name','$age','$gender','$tel')");
        if($insert){
            header("Location: referees.php");
        }
        else{
            echo
            "
                <script>
                    alert('Failed to add new referee...');
                </script>
            ";
        }
    }
    else{
        echo
        "
            <script>
                alert('Please Select your gender...');
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
    <title>Kaine Fc - Add Referee</title>
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
                <h1>Add Referee</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <form action="" method="post">
                    <label>Firstname:</label>
                    <input type="text" name="f_name" placeholder="Enter your firstname..." required>
                    <label>Lastname:</label>
                    <input type="text" name="l_name" placeholder="Enter your lastname..." required>
                    <label>Age:</label>
                    <input type="text" name="age" placeholder="Enter your age..." required>
                    <label>Gender:</label>
                    <select name="gender">
                        <option value="Select your gender...">Select your gender...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label>Tel:</label>
                    <input type="tel" name="tel" placeholder="Enter your tel..." required>
                    <button type="submit" name="add_referee">Add Referee...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>