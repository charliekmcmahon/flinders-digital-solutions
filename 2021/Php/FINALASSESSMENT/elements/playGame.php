<?php
session_start();

// This code is run when the 'play' button is pressed.
$_SESSION['difficulty'] = $_POST["difficulty"];
$_SESSION['theme'] = $_POST["theme"];
$_SESSION["currentPlayer"] = '1';
$_SESSION["isPlaying"] = '1';
$_SESSION["boardArray"] = array();

if ($_SESSION['theme'] == "1"){
	// classic
	$_SESSION["xImage"] = "X";
	$_SESSION["oImage"] = "O";
	$_SESSION["themeCSS"] = "classic.css";
	$_SESSION["headerLogo"] = "Premium Naughts and Crosses";

}
else if ($_SESSION['theme'] == "2"){
	// christmas
	$_SESSION["xImage"] = '<img class="gridImage" src="../assets/christmas-x.png" alt="X"></img>';
	$_SESSION["oImage"] = '<img class="gridImage" src="../assets/christmas-o.png" alt="O"></img>';
	$_SESSION["themeCSS"] = "christ2.css";
	$_SESSION["headerLogo"] = '<img style="max-height: 4rem;" class="headerImage" src="../assets/christmasLogo.png" alt="Logo"></img>';

}
else if ($_SESSION['theme'] == "3"){
	// valentines
	$_SESSION["xImage"] = '<img class="gridImage" src="../assets/val-x.png" alt="X"></img>';
	$_SESSION["oImage"] = '<img class="gridImage" src="../assets/val-o.png" alt="O"></img>';
	$_SESSION["themeCSS"] = "valentines.css";
	$_SESSION["headerLogo"] = '<img style="max-height: 4rem;" class="headerImage" src="../assets/valLogo.png" alt="Logo"></img>';

}
header('Location: /playing');

?>