<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dog Parks & Beaches | View Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
    session_start();
    if (isset($_POST["viewReport"])) {
        $_SESSION["currentReport"] = $_POST["viewReport"];
    }
    else {
        header('Location: ../adminDashboard');
    }
    ?>
    <?php require('../page-templates/fully-dynamic-pages/viewReport.php'); ?>
</body>
</html>