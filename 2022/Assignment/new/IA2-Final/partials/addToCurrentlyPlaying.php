<?php
session_start(); 
require('../connectDB.php');

// Add the user to the currently playing table
$sql = "INSERT INTO currentlyPlaying (machineId, userNickname, addedTime) VALUES ('" . $_SESSION["machineId"] . "', '" . $_SESSION["nickname"] . "', '" . time() . "')";
// run the query
if ($result = $mysqli->query($sql)) {
    // Successfully added the user to the currently playing table
    echo "success";
}
else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();


?>