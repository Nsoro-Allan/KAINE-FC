<?php
session_start();
include("connection.php");
include("sessions.php");

$user_id=$_GET['user_id'];

$delete=$con->query("DELETE FROM `users` WHERE `user_id`='$user_id'");

if($delete){
    header("Location: users.php");
}

else{
    header("Location: users.php?msg=Failed to delete user...");
}

?>