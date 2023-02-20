<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2022 Yearbook</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-10">
<?php
    require('connectDB.php');
    // If the user does not exist, create a new user
    $sql = "SELECT * FROM `yb_s6`";
    $result = $mysqli->query($sql);

    while($row = $result->fetch_assoc()) {
        echo '<br><h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:tracking-tight sm:truncate">'. $row["Name"] .'</h2>';
        echo "Jersey: " . $row["Nickname / Jersey"];
        echo "<br>Quote: " . $row["Quote"];
        echo "<br>Email: " . $row["Email Address"];
        
        
        echo '<br><h2 class="text-xl font-bold leading-7 text-gray-900 mt-2">Questions</h2>';
        
        $questions = array_slice(array_keys($row), 4);

        foreach ($questions as $question) {
            if ($question == "Photos") {
                $photos = explode(",", $row["Photos"]);
            }
            else {
                if ($row[$question]) {
                    $i = 0;
                    $limit = 10;
                    $count = count($questions);

                    echo '<span class="text-blue-600 font-semibold">'. $question . "</span>: " . $row[$question] . "<br>";
                }
            }  
        }

        foreach ($photos as $photo) {
            $photoID = (explode("?id=", $photo)[1]);
            echo " </button>";
            echo '<a type="button" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="https://drive.google.com/file/d/' . $photoID . '/preview" target="_blank">View photo</a>';
            
        }


        echo "<br> <hr> </br>";

    }
    

?>