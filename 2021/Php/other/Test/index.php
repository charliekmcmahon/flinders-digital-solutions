<?php
echo("hello! <br>");
echo("1+1 = ".(1+1));
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            include('opendb.php');
            if ($result = $mysqli -> query("SELECT 'name' FROM tbltest")) {
                $result_array = $result -> fetch_all();
                foreach ($result_array as $value) {
                    echo "<br>";
                    echo $value;
                }
                // Free result set
                $result -> free_result();
              }
            include('closedb.php');
        ?>

        
    </body>
</html>
