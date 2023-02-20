<?php
session_start();
// Check user is in the currentlyPlaying table for the current machine
require('../connectDB.php');

$sql = "SELECT * FROM currentlyPlaying WHERE machineId = '" . $_SESSION["machineId"] . "' AND userNickname = '" . $_SESSION["nickname"] . "'";
$result = $mysqli->query($sql);


if ($result->num_rows > 0) {
    // User is in the currentlyPlaying table
    //echo "success, welcome to netclaw!";
} else {
    // User is not in the currentlyPlaying table - IMPOSTOR
    echo "Error – authentication failed";
    // redirect to the dashboard
    header("Location: ../dashboard/");
    // exit the script
    exit;
}

$mysqli->close();

// Get machine details
require('../connectDB.php');


$sql = "SELECT * FROM machines WHERE id = '" . $_SESSION["machineId"] . "'";
$result = $mysqli->query($sql);


if ($result->num_rows > 0) {
    // Machine exists
    $row = $result->fetch_assoc();
    $_SESSION["machineName"] = $row["name"];
    $_SESSION["machineLocation"] = $row["location"];
    $_SESSION["ownerNickname"] = $row["ownerNickname"];
    $_SESSION["nodeURL"] = $row["nodeURL"];
    $_SESSION["nodePort"] = $row["nodePort"];
    $_SESSION["numPlays"] = $row["numPlays"];
} else {
    // Machine does not exist
    echo "Error – machine does not exist";
}

$mysqli->close();

// Add one play to the user's account
require('../connectDB.php');


$sql = "UPDATE users SET totalPlays = totalPlays + 1 WHERE nickname = '" . $_SESSION["nickname"] . "'";


?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<div class="container mx-auto m-10">
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="lg:flex lg:items-center lg:justify-between">
  <div class="flex-1 min-w-0">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate dark:text-white"><span class="text-indigo-600 dark:text-indigo-500"><?php echo $_SESSION["machineName"]; ?></span> | Netclaw - Play Now</h2>
    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
      <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-slate-400">
        <!-- Heroicon name: solid/briefcase -->
        <i class="flex-shrink-0 mr-0 h-6 w-6 text-gray-400 fi fi-sr-id-badge before:align-text-bottom"></i>
        Owner: <span class="text-blue-700 dark:text-blue-400 ml-1">@<?php echo $_SESSION["ownerNickname"]; ?></span>
      </div>
      <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-slate-400">
        <!-- Heroicon name: solid/location-marker -->
        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
        </svg>
        Location: <span class="text-blue-700 ml-1  dark:text-blue-400"><?php echo $_SESSION["machineLocation"]; ?></span>
      </div>
      <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-slate-400">
        <!-- Heroicon name: solid/currency-dollar -->
        <i class="flex-shrink-0 mr-0 h-6 w-6 text-gray-400 fi fi-sr-gamepad before:align-text-bottom"></i>
        Plays: <span class="text-blue-700 ml-1  dark:text-blue-400"><?php echo $_SESSION["numPlays"]; ?></span>
      </div>
    </div>
  </div>
</div>
<br>

<div class="flex flex-wrap gap-6 ...">
  <div class="flex-auto w-64  ...">
    <div class="max-w justify-center bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg justify-center w-full" src="https://proxy.netclaw.com.au/video/<?php echo $_SESSION["machineId"]; ?>" alt="Machine stream" />
        </a>
    </div>
  </div>
  <div class="flex-auto w-32 ...">
    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
        </a>
        <div class="p-5">
        <div class="inline-flex rounded-md pt-1 pb-1" role="group">
            <button type="button" disabled class="border border-indigo-500/0 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2">
                <div class="w-6 h-6"> </div>
            </button>
            <button type="button" id="upButton" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </button>
            <button type="button" disabled class="border border-indigo-500/0 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2">
                <div class="w-6 h-6"> </div>
            </button>
            </div>
            <br>
            <div class="inline-flex rounded-md pt-1 pb-1" role="group">
            <button type="button" id="leftButton" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <button type="button" disabled class="border border-indigo-500/0 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2">
                <div class="w-6 h-6"> </div>
            </button>
            <button type="button" id="rightButton" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <button type="button" id="dropButton" class="shadow-lg ml-10 text-indigo-700 border border-indigo-700 hover:bg-indigo-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-500 dark:text-indigo-500 dark:hover:text-white dark:focus:ring-indigo-800">
                DROP
            </button>
            </div>
            <br>
            <div class="inline-flex rounded-md pt-1 pb-1" role="group">
            <button type="button" disabled class="border border-indigo-500/0 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2">
                <div class="w-6 h-6"> </div>
            </button>
            <button type="button" id="downButton" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </button>
            <button type="button" disabled class="border border-indigo-500/0 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2">
                <div class="w-6 h-6"> </div>
            </button>
            </div>
        </div>
        <!-- timer -->
        <span class="text-center text-2xl font-bold text-violet-500 ml-2" id="counter"></span><span id="counterLabel" class="text-center text-2xl font-bold text-indigo-500"> seconds remaining</span>
        <script src="../scripts/timer.js"></script>
    </div>
  </div>
</div>
</div>