<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Guessing Game </title>
    <link rel="stylesheet" href="css/site.css">    
</head>


<?php // Dev: Charlie McMahon
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    echo "The page has been submitted";
    $_SESSION["game_size"] = $_POST["game_size"];
    $_SESSION["low_score_expert"] = 1000;
    echo '</br>game_size = '.$_SESSION["game_size"];
    echo '</br>low_score_expert = '.$_SESSION["low_score_expert"];
    $_SESSION["number_to_guess"] = rand(0, $_SESSION["game_size"]);
    $_SESSION["active_game"] = 1;
    echo '</br>number to guess = '.$_SESSION["number_to_guess"];
    header("Location:game.php");
  
} else {
    //echo "No selection has been made"
    $_SESSION["active_game"] = 0;
}

echo '<div id="container">';

//-- header.php
echo '<header>';
include('header.php'); 
echo '</header>';

//-- menu.php
echo '<main>';
include('menu.php'); 
echo '</main>';

//--footer.php 
echo '<footer>';
include('footer.php'); 
echo '</footer>';

echo '</div>';
?>


