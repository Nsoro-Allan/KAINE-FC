<div class="dashboard-left">
<div class="title">
    <img src="./imgs/icon.ico" alt="">
    <h1>KAINE Football Club</h1>
    <div class="line"></div>
</div>
<div class="links">
    <a href="./dashboard.php"><img src="./imgs/dashboard.ico" alt=""> Dashboard</a>
    <a href="./matches.php"><img src="./imgs/matches.ico" alt=""> Matches</a>
    <a href="./adversaries.php"><img src="./imgs/adversarie.ico" alt=""> Adversaries</a>
    <a href="./referees.php"><img src="./imgs/referees.ico" alt=""> Referees</a>
    <a href="./users.php"><img src="./imgs/users.ico" alt=""> Users</a>
    <a href="./settings.php"><img src="./imgs/settings.ico" alt=""> Settings</a>
</div>
<div class="end">
    <p>Hi, <?php echo $_SESSION['fc_user'];?></p>
    <a href="./logout.php">Logout</a>
</div>
</div>