<?php
// connect to database with PDO
$db_host = 'dzone.mfac.edu.au';
$db_name = '22-011112';
$db_user = '22-011112';
$db_password = 'McMahon';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user, $db_password);
    echo "<br> Successfully Connected to Database.";
}
catch (PDOException $e) {
    echo "Error: Oh dear, something is wrong --> ". $e->getmessage();
    die(); 
}

    echo "working";

    // insert data into database
    $query = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        birthday VARCHAR(30) NOT NULL
    )";

    echo "working2";

    // $result = $db->query($query);

    echo "working3";

    // check if data is inserted
    if ($result) {
        echo "Data inserted successfully";
    }

    // close connection
    mysqli_close($connection);


?>