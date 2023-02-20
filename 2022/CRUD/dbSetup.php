<?php
$db_host = 'dzone.mfac.edu.au';
$db_name = '22-011112';
$db_user = '22-011112';
$db_password = 'McMahon';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user, $db_password);
}
catch (PDOException $e) {
    echo "Error: Oh dear, something is wrong --> ". $e->getmessage();
    die(); 
}
?>