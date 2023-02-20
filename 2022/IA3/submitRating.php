<?php
session_start();

if (isset($_POST["submitRating"]) && isset($_SESSION["username"]) && isset($_POST["movieID"])){
    $rating = filter_var($_POST["ratingValue"], FILTER_SANITIZE_NUMBER_INT);
    $movieID = filter_var($_POST["movieID"], FILTER_SANITIZE_STRING);
    $review = filter_var($_POST["inputReview"], FILTER_SANITIZE_STRING);
    $usernick = $_SESSION["username"];
    
    require('connectDB.php');

    // Upload review to DB
    $sql = "INSERT INTO `reviews` (`username`, `movieID`, `rating`, `review`) VALUES ('$usernick', '$movieID', '$rating', '$review')";
    $result = $mysqli->query($sql);
    $mysqli->close();

    header('Location: search.php?review=success');

}
else {
    header('Location: search.php');
}

?>