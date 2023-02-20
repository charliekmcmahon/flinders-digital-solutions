<?php
  $db_host = 'dzone.mfac.edu.au';
  $db_user = '22-011112';
  $db_password = 'McMahon';
  $db_db = '22-011112';
  $db_port = 3306;

  $mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
?>