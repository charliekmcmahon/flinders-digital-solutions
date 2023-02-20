<?php
session_start();

$_SESSION["nickname"] = "Charlie";

if (isset($_POST["submitRating"]) && isset($_SESSION["nickname"]) && isset($_POST["movieID"])){
    $rating = filter_var($_POST["ratingValue"], FILTER_SANITIZE_NUMBER_INT);
    $movieID = filter_var($_POST["movieID"], FILTER_SANITIZE_STRING);
    $review = filter_var($_POST["inputReview"], FILTER_SANITIZE_STRING);
    $usernick = $_SESSION["nickname"];
    
    require('connectDB.php');

    // Upload review to DB
    $sql = "INSERT INTO `reviews` (`userNickname`, `movieID`, `rating`, `review`) VALUES ('$usernick', '$movieID', '$rating', '$review')";
    $result = $mysqli->query($sql);
    $mysqli->close();

    header('Location: grid.php?review=success');

}
else {
    header('Location: grid.php');
}

?>