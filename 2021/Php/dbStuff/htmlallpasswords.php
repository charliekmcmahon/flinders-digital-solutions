<?php

include'functions.php';
$db = connection();

// start SQL quey

$sql = 'SELECT * FROM tblusers';
$results=$db->query($sql);
// end query

?>

<!-- HTML -->
<html>
    <head>
        <title>Outputting using HTML</title>
        <link href="global.css" rel="stylesheet">
        
    </head>

    <body>
        <table>
            <tr>
                <th>Username</th><th>Password</th>
            </tr>
            <!-- dispaly the results from the data base -->
            <?php
            foreach ($results as $row){
                echo '<tr>';
                echo '<td>' . $row['username'] . '</td><td>' . $row['password'] . '</td>';
                echo '</tr>';
                }
            ?>
        </table>
    </body>

</html>