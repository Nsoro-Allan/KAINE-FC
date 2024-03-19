<?php
session_start();
include("connection.php");
include("sessions.php");

$mt_id=$_GET['mt_id'];

$delete=$con->query("DELETE FROM `matches` WHERE `mt_id`='$mt_id'");

if($delete){
    header("Location: matches.php");
}

else{
    header("Location: matches.php?msg=Failed to delete match...");
}

?>