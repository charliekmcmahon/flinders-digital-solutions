<?php
session_start();
require('../connectDB.php');

if (!isset($_SESSION['nickname'])) {
    header("Location: ../login/");
}
if (!isset($_POST['machineId'])) {
    header("Location: ../dashboard/");
}


$machineID = $_POST["machineId"];
$_SESSION["machineId"] = $machineID;
$userNickname = $_SESSION["nickname"];

// Get seconds since epoch
$timeNow = time();
$lastCheckIn = time();

// check if user is an a queue
$sql = "SELECT * FROM queues WHERE userNickname = '$userNickname'";

// if any results are found, then delete them
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $mysqli->close();

        require('../connectDB.php');
        $sql = "DELETE FROM queues WHERE userNickname = '$userNickname'";
        $mysqli->query($sql);
        $mysqli->close();
    }
    require('../connectDB.php');
    // if no results are found, then insert a new row
    $sql = "INSERT INTO queues (userNickname, machineID, addedTime, lastCheckIn) VALUES ('$userNickname', '$machineID', '$timeNow', '$lastCheckIn')";
    $mysqli->query($sql);
    if ($mysqli->error) {
        echo "fatal error. <br>";
        echo $mysqli->error;
        exit;
    }
    $mysqli->close();
    
} else {
    echo "<br> Error:mm " . $sql . "<br>" . $mysqli->error;
}

//require('../partials/removeInactivePlayers.php');

echo '<iframe src="../partials/queue.php" title="Netclaw | Queue" sandbox="allow-top-navigation allow-scripts allow-forms"></iframe>';
//require('../partials/queue.php');

?>


