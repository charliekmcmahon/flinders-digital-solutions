<?php
session_start(); 

if(!isset($_SESSION['nickname'])){
    header("Location: ../login/");
}

// Remove the user from the currentlyPlaying table
require('../connectDB.php');

$sql = "DELETE FROM currentlyPlaying WHERE machineId = '" . $_SESSION["machineId"] . "' AND userNickname = '" . $_SESSION["nickname"] . "'";
$mysqli->query($sql);
$mysqli->close();

// Add one to the user's play count
require('../connectDB.php');

$sql = "UPDATE users SET totalPlays = totalPlays + 1 WHERE nickname = '" . $_SESSION["nickname"] . "'";
$mysqli->query($sql);
$mysqli->close();


// Redirect to the dashboard
header("Location: ../dashboard/");
exit;


?>