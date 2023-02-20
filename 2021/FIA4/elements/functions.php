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

    try {
        $result_numRows = mysqli_num_rows($result);
        $result_array = $result->fetch_array();
        $result_true = false;
    }
    catch(Error $e) {
        // Result is empty; aka true
        $result_numRows;
        $result_array;
        
        $result_true = true;
    }
    if ($result_true == true) {
        $row;
    }
    else if ($result_numRows == 0) {
        echo "<br> Result returned zero rows <br>";
        $row;
    }
    else if ($result_true == false) {
        echo "<br> Result returned something & it has been inserted into an array.";
        echo "<br> raw returned data: " . var_dump($result);
        $row = $result_array;
    }
    else {
        echo "there was an error!";
        $row = "ERROR  -functions.php line 61";
    }
    $conn-> close();

    return $row;
}


?>