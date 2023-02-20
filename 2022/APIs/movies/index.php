<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />

<div class="p-5">

<h1 class="text-3xl font-bold m-5">OMDb API Search</h1>

<?php

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
    $movieYear = $json["Year"];
    $releaseDate = $json["Released"];
    $actors = $json["Actors"];
    $plot = $json["Plot"];
    $posterURL = $json["Poster"];
    $rating = $json["imdbRating"];
    $restriction = $json["Rated"];

    $rating5 = round($rating / 2);
}
else {
    // Could not connect to API
    $error = "Could not connect to API.";
}

?>

<div class="flex">
  <div class="flex-initial w-64 ml-5 mb-5 mr-5">
    <form action="index.php" method="POST">
    <div href="#" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
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
  <div class="flex items-center">
    <?php 

    if (!isset($error)){
    
        require('partials/movie-card.php'); 
    }
    else {
        require('partials/error-card.php');
    }
    
    ?>
  </div>
    </p>

</div>

<!-- Episodes -->
<?php if ($json["totalSeasons"] >= '0') { require('partials/episode-list.php'); } ?>





<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>