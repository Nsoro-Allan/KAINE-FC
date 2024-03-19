<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaine Fc - Matches</title>
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
                <h1>View Matches</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <div class="buttons">
                    <a href="./add_match.php">Add Match...</a>
                </div>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Play Ground</th>
                        <th>Referee</th>
                        <th>Adversarie</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `matches`");
                    if(mysqli_num_rows($select)>0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>

                    <tr>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['play_ground'];?></td>
                        <td><?php echo $row['ref_id'];?></td>
                        <td><?php echo $row['ad_id'];?></td>
                        <td><?php echo $row['user_id'];?></td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="delete_match.php?mt_id=<?php echo $row['mt_id'];?>">Delete</a>
                        </td>
                    </tr>
                    
                    <?php
                        }
                    }
                    else{
                        echo"<h1>No Matches Available...</h1>";
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>