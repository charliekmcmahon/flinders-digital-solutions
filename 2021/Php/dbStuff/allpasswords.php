<?php

include'functions.php';
$db = connection();

// start SQL quey

$sql = 'SELECT * FROM tblusers';
$results=$db->query($sql);
// end query

foreach($results as $row) {
    echo $row['username']. ', ' .$row['password']. ', ' .$row['access']. ', ' .$row['joined']. ', ' .$row['suspended']. '</br>';
}
?>