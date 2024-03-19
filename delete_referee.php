<?php
session_start();
include("connection.php");
include("sessions.php");

$ref_id=$_GET['ref_id'];

$delete=$con->query("DELETE FROM `referees` WHERE `ref_id`='$ref_id'");

if($delete){
    header("Location: referees.php");
}

else{
    header("Location: referees.php?msg=Failed to delete referee...");
}

?>