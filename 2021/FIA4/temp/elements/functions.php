<?php

$output; 

function runQuery($inputQuery) {

    // Run a query (from the function) - example

    /*
    $testQuery = runQuery("SELECT * FROM `Test`"); // returns an array
    echo $testQuery[0];
    */

    $user = '22-011112';
    $password = 'McMahon';
    $db = '22-011112';
    $host = 'dzone.mfac.edu.au';
    $port = 3306;

    $conn = new mysqli($host,$user,$password,$db,$port);

    if ($conn->connect_error) {
        die("<br> Connection failed: " . $conn->connect_error);
        echo " error";
    } 
    else{
        echo "<br> connection successful <br>";
    }

    $sql = $inputQuery;

    $result = $conn->query($sql);

    if (!$result) {
        echo "<br> Result returned zero rows <br>";
        $row;
    }
    else if ($result == true){
        echo "<br> Query completed successfully";
        $row = true;
    }
    else {
        echo "<br> Result returned something!";
        //echo "<br> raw returned data: " . var_dump($result);
        $row = $result -> fetch_array();
    }

    $conn-> close();

    return $row;
}


?>