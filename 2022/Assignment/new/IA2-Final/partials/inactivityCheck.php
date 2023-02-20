<?php
session_start(); 

require('../connectDB.php');

$timeNow = time();
$userNickname = $_SESSION["nickname"];

// update the lastCheckIn time for the user
$sql = "UPDATE queues SET lastCheckIn = '$timeNow' WHERE userNickname = '$userNickname'";

// run the query
if ($result = $mysqli->query($sql)) {

} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

?>