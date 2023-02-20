<?php
session_start();

if (isset($_POST["submit"])) {
    require('connectDB.php');
    // hash the user's password
    $username = $_POST['username'];
    $oldusername = $_SESSION["username"];
    // If the user does not exist, create a new user
    $sql = "UPDATE users SET username = $username WHERE users.username = $oldusername";
    $result = $mysqli->query($sql);

    // Redirect to the login page (this page)
    require('sign-in.php');
}
else {
    // do nothing
}

?>

<form method="POST" action="update-user.php">
    <p>new username</p>
<input type="text" name="username"></input>
<input type="submit" name="submit"></input>
</form>