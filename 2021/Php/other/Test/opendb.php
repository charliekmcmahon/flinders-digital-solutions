<?php
 $dbhost = "dzone.mfac.edu.au";
 $dbuser = "22-011112";
 $dbpass = "McMahon";
 $db = "22-011112";

$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$db);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>