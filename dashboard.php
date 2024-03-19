<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaine Fc - Dashboard</title>
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
                <h1>Dashboard</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <div class="right-content-container">
                <div class="links">
                    <a href="https://www.ferwafa.rw">Ferwafa</a>
                    <a href="https://www.fifa.rw">Fifa</a>
                    <a href="https://www.moh.gov.rw">Minisante</a>
                </div>    
                <div class="card-container">
                    <div class="card">
                        <img src="./imgs/icon.ico" alt="">
                        <h3>President of club:</h3>
                        <p>Jeff MUHINYUZA</p>
                    </div>
                    <div class="card">
                        <img src="./imgs/icon.ico" alt="">
                        <h3>Manager of club:</h3>
                        <p>Dreck GATO</p>
                    </div>
                    <div class="card">
                        <img src="./imgs/icon.ico" alt="">
                        <h3>Secretary of club:</h3>
                        <p>Jeanne KAYITERA</p>
                    </div>
                    <div class="card">
                        <img src="./imgs/icon.ico" alt="">
                        <h3>Captain of club:</h3>
                        <p>Rico Pie</p>
                    </div>
                    <div class="card">
                        <img src="./imgs/icon.ico" alt="">
                        <h3>Accountant of club:</h3>
                        <p>Monday Chrito</p>
                    </div>
                </div>
                </div>
                <div class="right-title">
                <h1>View Matches</h1>
                <div class="line"></div>
                </div>
                <?php
                    $select=$con->query("SELECT * FROM `matches` ORDER BY mt_id DESC LIMIT 10");
                    if(mysqli_num_rows($select)>0){
                        while($row=mysqli_fetch_assoc($select)){
                ?>

                <div class="match-container">
                    <div class="match-card">
                        <h4>KAINE FC</h4>
                        <h4>VS</h4>
                        <h4><?php
                             $ad_id=$row['ad_id'];
                             $select1=$con->query("SELECT * FROM `adversaries` WHERE `ad_id`='$ad_id'");
                             $ad=mysqli_fetch_assoc($select1);
                             $name=$ad['name'];
                             echo $name;
                        ?></h4>
                    </div>
                    <div class="match-description">
                        <p>At <?php echo $row['play_ground'];?> Playground On <?php echo $row['date'];?>.</p>
                    </div>
                </div>

                <?php
                        }
                    }
                    else{
                        echo"<h1>No Matches Available...</h1>";
                    }
                    ?>

            </div>
        </div>
    </div>
</body>
</html>