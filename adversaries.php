<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaine Fc - Adversaries</title>
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
                <h1>View Adversaries</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <div class="buttons">
                    <a href="add_adversarie.php">Add Adversarie...</a>
                </div>
                <table>
                    <tr>
                        <th>Adversarie Name</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `adversaries`");
                    if(mysqli_num_rows($select)>0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>

                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td>
                            <a href="edit_adversarie.php?ad_id=<?php echo $row['ad_id'];?>">Edit</a>
                            <a href="delete_adversarie.php?ad_id=<?php echo $row['ad_id'];?>">Delete</a>
                        </td>
                    </tr>
                    
                    <?php
                        }
                    }
                    else{
                        echo"<h1>No Adversarie Available...</h1>";
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>