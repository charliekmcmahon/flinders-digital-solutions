<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in | Dog Parks & Beaches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
// Validate user input & insert them into the database when creating account

require('../connectDB.php');

if (isset($_GET["error"])) {

    // CHange the error message depending on the error
    switch ($_GET["error"]) {
        case "emptyfields":
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error</strong>
                    <span class="block sm:inline">Please fill in all fields.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>';
            break;
        case "nouser":
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error</strong>
                    <span class="block sm:inline">An account with those details was not found. Please sign up instead.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>';
            break;
        case "wrongpassword":
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error</strong>
                    <span class="block sm:inline">The password you entered is incorrect. Please try again.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>';
            break;
        case "sqlerror":
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error</strong>
                    <span class="block sm:inline">Something went wrong.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>';
            break;

        default:
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error</strong>
                    <span class="block sm:inline">Something went wrong.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>';
            break;
    }
}

// Check if the sign up form has been submitted
if (isset($_POST['signUpSubmit'])) {
    // Get the POST data from the sign up form
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['confirmPassword'];

    // Check if POST data is valid
    if (empty($nickname) || empty($email) || empty($password) || empty($password_confirm)) {
        // If the POST data is invalid, redirect to the sign up page
        header("Location: ../sign-up/index.php?error=emptyfields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $nickname)) {
        // If the POST data is invalid, redirect to the sign up page
        header("Location: ../sign-up/index.php?error=invalidemail&nickname=" . $nickname);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If the POST data is invalid, redirect to the sign up page
        header("Location: ../sign-up/index.php?error=invalidemail&nickname=" . $nickname);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $nickname)) {
        // If the POST data is invalid, redirect to the sign up page
        header("Location: ../sign-up/index.php?error=invalidnickname&email=" . $email);
        exit();
    } else if ($password !== $password_confirm) {
        // If the POST data is invalid, redirect to the sign up page
        header("Location: ../sign-up/index.php?error=passwordcheck&nickname=" . $nickname . "&email=" . $email);
        exit();
    } else {
        // If the POST data is valid, create a new user
        $sql = "SELECT * FROM users WHERE email= " . "'" . $email . "' OR nickname= " . "'" . $nickname . "'";
        $result = $mysqli->query($sql);
            if ($row = mysqli_fetch_assoc($result)) {
                // If the user already exists, redirect to the sign up
                // page and display an error message
                header("Location: ../sign-up/index.php?error=userexists&nickname=" . $nickname . "&email=" . $email);
                exit();
            } else {
                // hash the user's password
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                echo $hashedPwd;
                // If the user does not exist, create a new user
                $sql = "INSERT INTO users (nickname, email, password) VALUES ('" . $nickname . "', '" . $email . "', '" . $hashedPwd . "')";
                $result = $mysqli->query($sql);

                // Redirect to the login page (this page)
                require('../page-templates/semi-dynamic-pages/sign-in.php');
            
            }
            
        }
} else {
    if (isset($_SESSION["nickname"])) {
        // redirect to the loading page
        $_SESSION["redirect"] = true;
        header("Location: ../loading");
        exit();
        
    }
    else {
        // Render the page as normal
        require('../page-templates/semi-dynamic-pages/sign-in.php');
    }
}

?>
</body>
</html>