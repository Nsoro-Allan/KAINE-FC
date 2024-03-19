<?php
session_start();
include("connection.php");

if(!isset($_SESSION['fc_user'])){
    header("location: index.php?msg=Loggin First...");
}
?>