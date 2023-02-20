<?php session_start(); ?>

<?php

if (isset($_GET["movie"])) {
    $movieID = $_GET["movie"];
    $_SESSION["movie"] = $screeningID;
} else {
}


if (isset($_POST["submitRating"]) && isset($_SESSION["username"])){
    $rating = filter_var($_POST["ratingValue"], FILTER_SANITIZE_NUMBER_INT);
    $movieID = filter_var($_POST["movieID"], FILTER_SANITIZE_STRING);
    $review = filter_var($_POST["inputReview"], FILTER_SANITIZE_STRING);
    $screening = $_SESSION["screening"];
    $usernick = $_SESSION["username"];
    
    require('connectDB.php');

    // Upload review to DB
    $sql = "INSERT INTO `reviews` (`username`, `movieID`, `rating`, `review`) VALUES ('$usernick', '$movieID', '$rating', '$review')";
    $result = $mysqli->query($sql);
    $mysqli->close();

    header("Location: displayScreening.php?review=success&screening=$screening&movie=$movieID");

}
else {
}


?>

<?php

if (isset($_GET["screening"])) {
    $screeningID = $_GET["screening"];
    $_SESSION["screening"] = $screeningID;
} else {
}

require('./connectDB.php');

$sql = "SELECT * FROM `screenings` WHERE id = $screeningID";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

$screeningDate = date("F jS, Y", strtotime($row["date"]));
$screeningLocation = $row["location"];
$screeningTime = date("H:i", strtotime($row["date"]));



?>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
<link rel="stylesheet" href="https://unpkg.com/twinklecss@1.1.0/twinkle.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

<?php require('./partials/navbar.php'); ?>

<div class="p-5 max-w-7xl mx-auto px-2">

<h1 class="text-3xl font-bold m-5">View Movie <span
    class="
        underline
        decoration-indigo-400 decoration-[0.25rem]
        motion-safe:transition-all motion-safe:duration-200 hover:decoration-indigo-600
    ">Information</span> For Your Screening</h1>

<?php

$titleQuery = $_GET["movie"];

?>
<?php
$data = file_get_contents('http://www.omdbapi.com/?i='. $titleQuery .'&apikey=a926ca2a');
$json = json_decode($data, true);

if ($json["Response"] == "False") {
    // Movie not found
    $error = "The movie you searched doesn't exist.";
}
else if ($json["Response"] == "True") {
    // Movie found
    $movieName = $json["Title"];
    $movieID = $json["imdbID"];
    $movieYear = $json["Year"];
    $releaseDate = $json["Released"];
    $actors = $json["Actors"];
    $plot = $json["Plot"];
    $posterURL = $json["Poster"];
    $rating = $json["imdbRating"];
    $restriction = $json["Rated"];

    $rating5 = round($rating / 2);

    // Set session variables
    $_SESSION["currentFilmName"] = $movieName;
    $_SESSION["currentFilmID"] = $movieID;
}
else {
    // Could not connect to API
    $error = "Could not connect to API.";
}

?>

<?php

if (isset($_GET["review"])) {
    echo '

    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium">Success!</span> Your review was submitted successfully.
    </div>
    
    
    ';
}


?>
<div class="grid grid-cols-4 gap-4 max-w-screen max-h-screen overflow-hidden">
  <div class="row-span-2">
    <div class="h-full">
        <form action="search.php" class="m-0" method="POST">
        <div href="#" class="block p-6 mr-0 max-w-sm h-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><span class="underline decoration-red-400 decoration-[0.25rem] motion-safe:transition-all motion-safe:duration-200 hover:decoration-red-600">Screening Info</span></h5>
                <div class="pt-2 flex items-center text-sm text-gray-500">
                    <!-- Heroicon name: solid/briefcase -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <?php echo $screeningLocation; ?> Cinemas
                </div>
                <div class="pt-2 flex items-center text-sm text-gray-500">
                    <!-- Heroicon name: solid/briefcase -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <?php echo $screeningDate; ?>
                </div>
                <div class="pt-2 flex items-center text-sm text-gray-500">
                    <!-- Heroicon name: solid/briefcase -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <?php echo $screeningTime; ?>
                </div>
        </div>
        </form>
    </div>
  </div>
  <div class="<?php if ($json["totalSeasons"] >= '0') { echo 'col-span-2'; } else {echo 'col-span-3' ;}?> row-span-4 self-start">
    <div class="align-middle h-full">
        <?php 

        if (!isset($error)){
        
            require('partials/grid-movie-card.php'); 
        }
        else {
            require('partials/error-card.php');
        }
        
        ?>
    </div>
  </div>
    <?php
        if ($json["totalSeasons"] >= '0') {
            require('partials/episode-list-parent.php');
        }
    ?>
  <div class="row-span-3">
    <div class="">
            <form class="mb-0" action="displayScreening.php" method="POST">
            <div href="#" class="block p-6 max-w-sm bg-white h-full rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><span class="underline decoration-green-400 decoration-[0.25rem] motion-safe:transition-all motion-safe:duration-200 hover:decoration-green-600">Write a review</span></h5>
                <label for="search-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Review</label>
                <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <input <?php if (isset($_GET["movie"])) {echo "";} else {echo "disabled";} ?> type="text" required name="inputReview" id="search-icon" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Not enough bats!">
                </div>
                <label for="ratingValue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rating</label>
                <div class="relative pb-5">
                <div x-data="{ temp: 3, orig: 3 }" class="flex cursor-pointer text-4xl" @click="orig = temp">
                <input name="ratingValue" type="number" :value="temp" class="hidden"/>
                <template x-for="item in [1,2,3,4,5]">
                    <button <?php if (isset($_GET["movie"])) {echo "";} else {echo "disabled";} ?> name="ratingSubmit" type="button" @mouseenter="temp = item" @mouseleave="temp = orig" class="text-gray-300" :class="{'text-amber-400': (temp >= item)}">★</button>
                </template>
                </div>
                </div>
                <input <?php if (isset($_GET["movie"])) {echo "";} else {echo "disabled";} ?> type="submit" name="submitRating" value="Submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 disabled:bg-grey-700 disabled:opacity-40 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"></input>
            </div>
            <input name="movieID" type="hidden" value="<?php echo $_GET["movie"]; ?>"></input>
            </form>
    </div>
  </div>
  <?php include('partials/userRatings.php'); ?>  


</div>


    </p>



