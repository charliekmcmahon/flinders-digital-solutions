<?php
session_start();

$sql = "SELECT `bookingID` FROM `tblBookingData` WHERE `instructorID` = '". $_SESSION["selectedInstructorID"] . "' AND `date` = '" . $lessonDate . "' AND `startTime` = '" . $startTime . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Error - there is already another booking
    echo "Error - there is already another booking for that selected date and time. Please try again.";
    echo '<form action="book.php" method="POST" class="m-3"><button type="submit" name="try-book-again" class="btn btn-primary">Back to Book <i class="fi fi-br-arrow-right"></i></button></form>';
}
else {
    // get client id
    $sql = "SELECT `clientID` FROM `tblClientData` WHERE `email` = '" . $_SESSION["userEmail"] . "'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    $clientID = $result["clientID"];

    // insert the booking
    $sql = "INSERT INTO `tblBookingData` (`instructorID`, `clientID`, `date`, `startTime`, `duration`, `pickupLocation`, `dropoffLocation`, `lessonType`) VALUES ('" . $_SESSION["selectedInstructorID"] . "', '" . $clientID . "', '" . $lessonDate . "', '" . $startTime . "', '" . $duration . "', '" . $pickUpAddress . "', '" . $dropOffAddress . "', '" . 
    $lessonType . "')";
    $result = $conn->query($sql);

    // Success
    echo '<div class="text-center mb-5">';
    echo '<div class="feature bg-success bg-gradient text-white rounded-3 mb-3"><i class="fi fi-br-checkbox"></i></div>';
    echo '<h2 class="fw-bolder">Congrats! Your booking has been made.</h2>';
    echo 'Date: ' . $lessonDate . '<br>';
    echo 'Time: from ' . $startTime . ' to ' . ($startTime + $duration) . '<br>';
    echo 'Instructor ID: ' . $_SESSION["selectedInstructorID"] . '<br>';
    echo 'Your instructor will pick you up from ' . $pickUpAddress . ', and drop you off at ' . $dropOffAddress . '.<br>';
    echo 'Your lesson type is ' . $lessonType . '.<br>';
    echo '<form action="book.php" method="POST" class="m-3"><button type="submit" name="back-to-index" class="btn btn-primary">Back to home <i class="fi fi-br-arrow-right"></i></button></form></div>';
}

echo $result->num_rows;

?>