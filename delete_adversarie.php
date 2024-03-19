<?php
session_start();
include("connection.php");
include("sessions.php");

$ad_id=$_GET['ad_id'];

$delete=$con->query("DELETE FROM `adversaries` WHERE `ad_id`='$ad_id'");

if($delete){
    header("Location: adversaries.php");
}

else{
    header("Location: adversaries.php?msg=Failed to delete adversarie...");
}

?>