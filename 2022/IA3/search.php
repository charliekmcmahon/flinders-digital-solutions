<?php session_start(); ?>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
<link rel="stylesheet" href="https://unpkg.com/twinklecss@1.1.0/twinkle.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

<?php require('./partials/navbar.php'); ?>

<div class="p-5 max-w-7xl mx-auto px-2">

<h1 class="text-3xl font-bold m-5">Welcome to the <span
    class="
        underline
        decoration-indigo-400 decoration-[0.25rem]
        motion-safe:transition-all motion-safe:duration-200 hover:decoration-indigo-600
    ">Sunshine Coast Film Club!</span></h1>

<?php

if (!isset($_SESSION["currentFilmName"])) {
    $_SESSION["currentFilmName"] = "The%20Batman";
    $titleQuery = $_SESSION["currentFilmName"];
} else {
    $titleQuery = $_SESSION["currentFilmName"];
}

if (isset($_POST["searchSubmit"])) {
    $titleQuery = filter_var($_POST["queryTitle"], FILTER_SANITIZE_STRING);
    $titleQuery = str_replace(' ', '%20', $titleQuery);
} else {
    $titleQuery = "The%20Batman";
}

?>
<?php
$data = file_get_contents('http://www.omdbapi.com/?t='. $titleQuery .'&apikey=a926ca2a');
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
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Search for a film / tv show</h5>
            <label for="search-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
            <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" required name="queryTitle" id="search-icon" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="The Batman">
            </div>
            <input type="submit" name="searchSubmit" value="Search" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"></input>
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
            <form class="mb-0" action="submitRating.php" method="POST">
            <div href="#" class="block p-6 max-w-sm bg-white h-full rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Write a review</h5>
                <label for="search-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Review</label>
                <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <input <?php if (isset($_POST["searchSubmit"])) {echo "";} else {echo "disabled";} ?> type="text" required name="inputReview" id="search-icon" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Not enough bats!">
                </div>
                <label for="ratingValue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rating</label>
                <div class="relative pb-5">
                <div x-data="{ temp: 3, orig: 3 }" class="flex cursor-pointer text-4xl" @click="orig = temp">
                <input name="ratingValue" type="number" :value="temp" class="hidden"/>
                <template x-for="item in [1,2,3,4,5]">
                    <button <?php if (isset($_POST["searchSubmit"])) {echo "";} else {echo "disabled";} ?> name="ratingSubmit" type="button" @mouseenter="temp = item" @mouseleave="temp = orig" class="text-gray-300" :class="{'text-amber-400': (temp >= item)}">★</button>
                </template>
                </div>
                </div>
                <input <?php if (isset($_POST["searchSubmit"])) {echo "";} else {echo "disabled";} ?> type="submit" name="submitRating" value="Submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 disabled:bg-grey-700 disabled:opacity-40 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"></input>
            </div>
            <input name="movieID" type="hidden" value="<?php echo $_SESSION["currentFilmID"]; ?>"></input>
            </form>
    </div>
  </div>
  <?php include('partials/userRatings.php'); ?>  


</div>


    </p>



