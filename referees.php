<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaine Fc - Referees</title>
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
                <h1>View Referees</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <div class="buttons">
                    <a href="./add_referee.php">Add Referee...</a>
                </div>
                <table>
                    <tr>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Tel</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `referees`");
                    if(mysqli_num_rows($select)>0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>

                    <tr>
                        <td><?php echo $row['f_name'];?></td>
                        <td><?php echo $row['l_name'];?></td>
                        <td><?php echo $row['age'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['tel'];?></td>
                        <td>
                            <a href="edit_referee.php?ref_id=<?php echo $row['ref_id'];?>">Edit</a>
                            <a href="delete_referee.php?ref_id=<?php echo $row['ref_id'];?>">Delete</a>
                        </td>
                    </tr>
                    
                    <?php
                        }
                    }
                    else{
                        echo"<h1>No Referees Available...</h1>";
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>