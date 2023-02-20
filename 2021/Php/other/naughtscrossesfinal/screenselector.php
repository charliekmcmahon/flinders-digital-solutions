<?php
session_start();

if($_SESSION["isPlaying"] == 1) { // User is already playing a game, restart the game.
	$_SESSION["isPlaying"] = '0';
	header('Location: /');
}
else { // Load the menu selection screen
	include('elements/startMenu.php');
}

?>