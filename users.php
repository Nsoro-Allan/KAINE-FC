<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaine Fc - Users</title>
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
                <h1>View Users</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Tel</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `users`");
                    if(mysqli_num_rows($select)>0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>

                    <tr>
                        <td><?php echo $row['user_id'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['password'];?></td>
                        <td><?php echo $row['tel'];?></td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="delete_user.php?user_id=<?php echo $row['user_id'];?>">Delete</a>
                        </td>
                    </tr>
                    
                    <?php
                        }
                    }
                    else{
                        echo"<h1>No User Available...</h1>";
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>