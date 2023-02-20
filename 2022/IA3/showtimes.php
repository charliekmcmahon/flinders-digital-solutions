<?php session_start(); ?>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
<link rel="stylesheet" href="https://unpkg.com/twinklecss@1.1.0/twinkle.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

<?php require('./partials/navbar.php'); ?>

<div class="p-5 max-w-7xl mx-auto px-2">

<h1 class="text-3xl font-bold m-5">View upcoming <span class="underline decoration-indigo-400 decoration-[0.25rem] motion-safe:transition-all motion-safe:duration-200 hover:decoration-indigo-600">screenings </span></h1>

<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
    <ul role="list" class="divide-y divide-gray-200">
        <?php 
        
        require('./connectDB.php');

        $sql = "SELECT * FROM `screenings` WHERE 1";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();

        foreach($result as $row){
            
            $screening = [];
            $screening["title"] = "Screening " . $row["id"] . " – " . $row["location"] . " Cinemas";
            $idQuery = $row["movieID"];
            
            $data = file_get_contents('http://www.omdbapi.com/?i='. $idQuery .'&apikey=a926ca2a');
            $json = json_decode($data, true);

            if ($json["Response"] == "False") {
                $error = "The movie you searched doesn't exist.";
            }
            else if ($json["Response"] == "True") {
                $movieName = $json["Title"];
                $movieID = $json["imdbID"];
                $movieYear = $json["Year"];
                $releaseDate = $json["Released"];
                $actors = $json["Actors"];
                $plot = $json["Plot"];
                $posterURL = $json["Poster"];
                $rating = $json["imdbRating"];
                $restriction = $json["Rated"];
            }
            else {
                $error = "Could not connect to API.";
            }
            
            $screening["filmName"] = $movieName;
            $screening["movieID"] = $row["movieID"];
            $screening["location"] = $row["location"] . " cinemas";
            $screening["date"] = $row["date"];
            $screening["dateReadable"] = date("F jS, Y", strtotime($row["date"]));
            $screening["screeningID"] = $row["id"];

            require('./partials/screeningElement.php');
        }  
        $mysqli->close();

        ?>
    </ul>
    </div>
</div>



</div>