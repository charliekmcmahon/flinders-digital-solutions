<?php

// Generate random number w/ values chosen in menu dependant on gamemode
$numberToGuess = random_int($_COOKIE['start_number'], $_COOKIE['end_number']);

// Set a cookie with the rand number
setcookie("number_to_guess", $numberToGuess, time() + 3600);

?>