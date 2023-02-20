<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dog Parks & Beaches | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
    if (isset($_GET["uploadSuccess"]) && $_GET["uploadSuccess"] == "true") {
        echo "<script>alert('Your report has been submitted successfully!')</script>";
    }
    ?>
    <?php require('../page-templates/semi-dynamic-pages/admin-dashboard.php'); ?>
</body>
</html>