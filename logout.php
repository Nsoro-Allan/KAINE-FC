<?php
session_start();
include("connection.php");
unset($_SESSION['fc_user']);
session_destroy();

header("Location: index.php");

?>