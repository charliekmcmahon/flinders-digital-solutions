<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dog Parks & Beaches</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>
<body>
<?php
// require the db connection
require('../connectDB.php');
// Check if the user's credentials are correct

if (isset($_POST['signInSubmit'])) {
    // Get the POST data from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Check if POST data is valid
    if (empty($email) || empty($password)) {
        // If the POST data is invalid, redirect to the login page
        header("Location: ./login/index.php?error=emptyfields");
        exit();
    } else {
        // If the POST data is valid, check if the user exists
        $sql = "SELECT * FROM users WHERE email= " . "'" . $email . "'";
        $result = $mysqli->query($sql);
        if ($result !== null) {
            // If the user exists, check if the password is correct
            $row = mysqli_fetch_assoc($result);
            // hash the user's password
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == true) {
                // If the password is correct, redirect to the home page & start the session, set vars, etc
                session_start();
                $_SESSION['username'] = $row['username'];
                $_SESSION["email"] = $row["email"];
                $_SESSION["profilePic"] = $row["profileImage"];
                require('loading.php');
                echo "<script> window.setTimeout(function(){ window.location.href = '../search.php'; }, (Math.floor( Math.random() * ( 5000 - 1000 + 1 )) + 1000)); </script>";
                exit();
            } else {
                // If the password is incorrect, redirect to the login page
                header("Location: ../login/index.php?error=wrongpassword");
                exit();
            }
        } else {
            // If the user does not exist, redirect to the login page
            header("Location: ../login/index.php?error=nouser");
            exit();
        }
    }
} else {
    if ($_SESSION["redirect"] == true) {
        // Send the user to the dashboard
        $_SESSION["redirect"] = false;
        require('loading.php');
        echo "<script> window.setTimeout(function(){ window.location.href = '../search.php'; }, (Math.floor( Math.random() * ( 5000 - 1000 + 1 )) + 1000)); </script>";
        exit();
    }
    else{
        // Render the page as normal
         require('loading.php');
    }
}
?>

</div>
</body>
</html>
