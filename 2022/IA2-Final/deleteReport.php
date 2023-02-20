<?php
session_start();

if (isset($_POST["report"])) {
    require('connectDB.php');
    // delete the report
    $sql = "DELETE FROM reports WHERE ReportID = " . $_POST["report"];
    $result = $mysqli->query($sql);
    // redirect to the dashboard
    header("Location: ./adminDashboard");
}
else {
    header("Location: ./adminDashboard");
}

?>