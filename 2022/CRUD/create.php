<?php 

//redirect to the index page
header("Location: index.php");

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

// pass data from POST form
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$birthday = $_POST['birthday'];
$submit = $_POST['submit'];

if (!isset($submit)) {
    echo "<br> <p style='color: red;'>error. user did not post any data.</p>";
}
else {

    // echo the variables for debugging purposes
    echo "<br> <p style='color: red;'>username: $username</p>";
    echo "<br> <p style='color: red;'>first_name: $first_name</p>";
    echo "<br> <p style='color: red;'>last_name: $last_name</p>";
    echo "<br> <p style='color: red;'>email: $email</p>";
    echo "<br> <p style='color: red;'>phone: $phone</p>";
    echo "<br> <p style='color: red;'>password: $password</p>";
    echo "<br> <p style='color: red;'>birthday: $birthday</p>";

    // sanitise variables
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $birthday = filter_var($birthday, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // insert data into database
    $query = "INSERT INTO users (username, first_name, last_name, email, phone, password, birthday) VALUES ('$username', '$first_name', '$last_name', '$email', '$phone', '$password', '$birthday')";
    $result = $result = $db->query($query);

    // check if data is inserted
    if ($result) {
        echo "Account Successfully Created.";
    }
}

?>
