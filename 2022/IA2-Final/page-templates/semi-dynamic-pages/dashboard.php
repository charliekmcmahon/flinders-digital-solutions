<?php
session_start(); 

if(!isset($_SESSION['nickname'])){
    header("Location: ../login/");
}

?>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<main class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
    <div class="flex items-start justify-between">
        <div class="h-screen hidden lg:block shadow-lg relative w-80">
            <div class="bg-white h-full dark:bg-gray-700">
                <div class="flex items-center justify-start pt-16 ml-5 mb-16">
                    <div class="pr-5">
                        <div class="relative">
                        <p class="inline-block text-xl sm:text-xl font-bold text-indigo-900 tracking-tight dark:text-white ml-5 align-baseline"> Dog Parks & Beaches </p>
                        <h2 class="text-sm text-indigo-400 font-semibold tracking-wide uppercase absolute dark:text-gray-300 top6.5 left-5">By Charlie McMahon</h2>
                        </div>
                    </div>
                </div>
                <nav class="mt-6">
                    <div>
                        <a class="<?php if (!$_GET["report"]) { echo 'w-full text-gray-800 dark:text-white flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-purple-500'; } else if ($_GET["report"] == "true") { echo 'w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent'; } else { echo 'w-full text-gray-800 dark:text-white flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-purple-500'; }  ?>" href="../dashboard/">
                            <span class="text-left">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                List
                            </span>
                        </a>
                        <a class="<?php if (!$_GET["report"]) { echo 'w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent'; } else if ($_GET["report"] == "true") { echo 'w-full text-gray-800 dark:text-white flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-purple-500'; } else { echo 'w-full text-gray-400 flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start hover:text-gray-800 border-l-4 border-transparent'; }  ?>" href="../dashboard/?report=true">
                            <span class="text-left">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Report
                            </span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="flex flex-col w-full md:space-y-4">
            <header class="w-full h-16 z-40 flex items-center justify-between">
                <div class="block lg:hidden ml-6">
                    <button class="flex p-2 items-center rounded-full bg-white shadow text-gray-500 text-md">
                        <svg width="20" height="20" class="text-gray-400" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="relative z-20 flex flex-col justify-end h-full px-3 md:w-full">
                    <div class="relative p-1 flex items-center w-full space-x-4 justify-end">
                        <span class="w-1 h-8 rounded-lg bg-gray-200">
                        </span>
                        <form action="../logout.php">
                        <button class="flex items-center text-gray-500 dark:text-white text-md">
                            Logout <?php echo $_SESSION["nickname"]; ?>
                        </button>
                        </form>
                    </div>
                </div>
            </header>
            <div class="overflow-auto h-screen pb-24 px-4 md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                    Welcome to Dog Parks & Beaches, <span class="text-4xl font-semibold text-indigo-600 dark:text-gray-400"><?php echo $_SESSION["nickname"]?></span>
                </h1>
                <h2 class="text-md text-gray-400">
                    Browse all dog parks & beaches on the Sunshine Coast below. Use the sidebar to report a damaged dog park or beach.
                </h2>
                <div class="flex my-6 items-center w-full space-y-4 md:space-x-4 md:space-y-0 flex-col md:flex-row">
                    <div class="flex items-center w-full md:w-1/2 space-x-4">
                        <div class="w-1/2">
                            <div class="shadow-lg px-4 py-6 w-full bg-white dark:bg-gray-700 relative">
                                <p class="text-2xl text-black dark:text-white font-bold">
                                    <?php 
                                        require('../connectDB.php');
                                        $sql = "SELECT COUNT(BeachID) AS BeachNum FROM tblbeachaccess;";
                                        $result = $mysqli->query($sql);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row["BeachNum"];
                                        $mysqli->close();
                                     ?>
                                </p>
                                <p class="text-gray-400 text-sm">
                                    Number of Beach Accesses
                                </p>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="shadow-lg px-4 py-6 w-full bg-white dark:bg-gray-700 relative">
                                <p class="text-2xl text-black dark:text-white font-bold">
                                <?php 
                                    require('../connectDB.php');
                                    $sql = "SELECT COUNT(DogParkID) AS DogNum FROM tbldogparks;";
                                    $result = $mysqli->query($sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row["DogNum"];
                                    $mysqli->close();
                                ?>
                                </p>
                                <p class="text-gray-400 text-sm">
                                    Number of Dog Parks
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!$_GET["report"]) { require('../partials/dashboard-dogparks.php'); require('../partials/dashboard-beachaccesses.php'); } else if ($_GET["report"] == "true") { require('../partials/dashboard-report.php'); } else { require('../partials/dashboard-dogparks.php'); require('../partials/dashboard-beachaccesses.php'); }  ?>
            </div>
        </div>
    </div>
</main>
<script src="https://unpkg.com/flowbite@1.4.2/dist/flowbite.js"></script>