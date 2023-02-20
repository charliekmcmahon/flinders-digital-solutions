<?php
if (isset($_GET["error"])) {
    // If there is an error, display it

    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error-</strong>
        <span class="block sm:inline">';

    if ($_GET["error"] == "userexists") {
        echo '<span class="block sm:inline">The user already exists.</span>';
    } else if ($_GET["error"] == "invalidemail") {
        echo '<span class="block sm:inline">The email address entered was invalid.</span>';
    } else if ($_GET["error"] == "invalidusername") {
        echo '<span class="block sm:inline">The username entered was invalid.</span>';
    } else if ($_GET["error"] == "passwordcheck") {
        echo'<span class="block sm:inline">The passwords you entered do not match.</span>';
    } else if ($_GET["error"] == "emptyfields") {
        echo '<span class="block sm:inline">Please fill in all of the fields.</span>';
    } else {
        echo '<span class="block sm:inline">There was an error. Please try using different details.</span>';
    }
        
    echo '</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up | Sunshine Coast Film Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php require('sign-up.php'); ?>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>
</html>