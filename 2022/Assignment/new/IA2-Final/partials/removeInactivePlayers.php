<?php
// Remove inactive players from the queue
session_start(); 

require('../connectDB.php');

$timeNow = time();

// find entries in the database where the checkin time is more than 10 seconds ago
$sql = "SELECT * FROM queues WHERE lastCheckIn < " . "'" . ($timeNow - 15) . "'";

// run the query
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $mysqli->close();
        require('../connectDB.php');
        // if any results are found, then delete them
        $sql = "DELETE FROM queues WHERE lastCheckIn < " . "'" . ($timeNow - 10) . "'";
        $mysqli->query($sql);
    }
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

// Remove inactive players for the now playing table

require('../connectDB.php');

$timeNow = time();

// find entries in the database where the checkin time is more than 10 seconds ago
$sql = "SELECT * FROM currentlyPlaying WHERE addedTime < " . "'" . ($timeNow - 65) . "'";

// run the query
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $mysqli->close();
        require('../connectDB.php');
        // if any results are found, then delete them
        $sql = "DELETE FROM currentlyPlaying WHERE addedTime < " . "'" . ($timeNow - 65) . "'";
        $mysqli->query($sql);
    }
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

?>