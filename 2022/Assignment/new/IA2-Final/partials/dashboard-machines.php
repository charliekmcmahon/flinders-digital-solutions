<?php 
    session_start(); 

    if(!isset($_SESSION['nickname'])){
        header("Location: ../login/");
    }

?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>


<!-- Output the list of machines as cards -->
    <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
        <?php

        
        // require the database connection
        require('../connectDB.php');

        // get all the machines from the database
        $sql = "SELECT * FROM machines WHERE active = 1 ORDER BY id ASC";
        $result = $mysqli->query($sql);


        // For each machine, display a card
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

            // For each machine, get the number of people in the queue
            $sql = "SELECT * FROM queues WHERE machineId = '" . $row["id"] . "'";
            $result2 = $mysqli->query($sql);
            // Count the number of rows in the result
            $numPlayers = $result2->num_rows;
            

            echo '
            <div class="flex flex-col">
            <div class="bg-white shadow-md  rounded-3xl p-4">
                <div class="flex-none lg:flex">
                    <div class=" h-full w-full lg:h-48 lg:w-48 lg:mr-3 lg:mb-0 mb-3">
                        <img src="../assets/machine-images/'.$row['image'].'"
                            alt="Machine image" class=" w-full object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                    </div>
                    <div class="flex-auto ml-3 justify-evenly py-2">
                        <div class="flex flex-wrap ">
                            <div class="w-full flex-none text-xs text-indigo-600 font-medium ">
                                '.$row["ownerNickname"].'
                            </div>
                            <h2 class="flex-auto text-lg font-medium">'. $row["name"] .'</h2>
                        </div>
                        <p class="mt-3"></p>
                        <div class="flex py-4  text-sm text-gray-500">
                            <div class="flex-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="">Location: '. $row["location"] .'</p>
                            </div>
                            <div class="flex-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="">Plays: '. $row["numPlays"] .'</p>
                            </div>
                        </div>
                        <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                        <div class="flex space-x-3 text-sm font-medium">
                            <div class="flex-auto flex space-x-3">
                                <button
                                    class="mb-2 md:mb-0 bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2">
                                    <span class="text-indigo-500 hover:text-indigo-500 rounded-lg">
                                        <i class="fi fi-br-user align-text-bottom before:align-middle"></i>
                                    </span>
                                    <span class="align-middle">Queue length: '.$numPlayers.'</span>
                                </button>
                            </div>
                            <form action="../queue/index.php" method="POST">
                            <input type="hidden" name="machineId" value="'.$row["id"].'">
                            <button type="submit" class="mb-2 md:mb-0 bg-indigo-600 hover:bg-indigo-500 px-5 py-2 shadow-sm tracking-wider text-white rounded-full" type="button" aria-label="like">
                                Play
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            ';
            }
        } else {
            echo "No machines were found.";
        }

        ?>
    </div>