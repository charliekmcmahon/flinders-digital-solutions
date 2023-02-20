<script src="https://cdn.tailwindcss.com"></script>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<div class="container flex flex-col mx-auto w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
    <ul class="flex flex-col divide divide-y">
        <?php 
            session_start(); 

            if(!isset($_SESSION['nickname'])){
                header("Location: ../login/");
            }
            if(!isset($_SESSION['machineId'])){
                header("Location: ../dashboard/");
            }
            
            $currentURL = $_SERVER['REQUEST_URI'];
            header("Refresh: 5; URL=$currentURL");
            
            require('../partials/inactivityCheck.php');
            require('../partials/removeInactivePlayers.php');


            require('../connectDB.php');

            // get all the machines from the database
            $sql = "SELECT * FROM queues WHERE machineId = '" . $_SESSION["machineId"] . "' ORDER BY addedTime ASC";
            $result = $mysqli->query($sql);

            // For each machine, display a card
            if ($result->num_rows > 0) {
                $n = 1;
                while($row = $result->fetch_assoc()) {

                    echo '
                    <!-- Row for each of the users in the queue -->
                    <li class="flex flex-row">
                        <div class="select-none flex flex-1 items-center p-4">
                            <div class="flex-1 pl-1 mr-16">
                                <div class="font-medium dark:text-white">
                                    ' . $row["userNickname"] . '
                                </div>
                                <div class="text-gray-600 dark:text-gray-200 text-sm">
                                    Joined the queue ' .  (time() - $row["addedTime"])  . ' seconds ago
                                </div>
                            </div>
                            <div class="text-gray-600 dark:text-gray-200 text-xs">
                                    ' . $n . '
                            </div>
                        </div>
                    </li>
                    ';

                    $n++;

                }
            } else {
                echo "There are no players in the queue.";
            }

            // Check if user is number one in the queue
            $sql = "SELECT * FROM queues WHERE machineId = '" . $_SESSION["machineId"] . "' ORDER BY addedTime ASC LIMIT 1";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if($row["userNickname"] == $_SESSION["nickname"]){
                    // Current user is number one in the queue
                    // Check if anyone is in the currentlyPlaying table for this machine
                    $sql = "SELECT * FROM currentlyPlaying WHERE machineId = '" . $_SESSION["machineId"] . "'";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        // Someone is in the currentlyPlaying table
                        // Remove them if inactive
                        require('../partials/removeInactivePlayers.php');
                    } else {
                        // Noone is in the currentlyPlaying table
                        // Add the current user to the currentlyPlaying table
                        require('../partials/addToCurrentlyPlaying.php');
                        // Redirect to the playing page
                        echo '<script>window.top.location.href = "../playing/"; </script>';
                    }
                        
                        
                }
            }

        ?>

    </ul>
</div>
