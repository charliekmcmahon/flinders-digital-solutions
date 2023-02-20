<h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-5">Submit a report</h2>
<div class="p-6 w-1/2 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <form>
    <div class="mb-6">
        <label for="nickname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your Name</label>
        <input disabled type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $_SESSION["nickname"];?>" required>
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dog Park / Beach Access</label> <!-- add a dropdown here?? -->
        <select type="dropdown" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <?php
            // Echo out the options
            require('../connectDB.php');

            $sql = "SELECT * FROM tbldogparks WHERE 1 ORDER BY dogParkID ASC";
            $result = $mysqli->query($sql);

            $i = 0;
            $n = 1;
            // For each machine, display a card
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '
                    <option value="D'. $row["dogParkID"] .'">'. $row["site_name"] . ' Dog Park</option>
                    ';
                    $i++;
                    $n++;
    
                }
            } else {
                echo "<option>No Locations found.</option>";
            }

            $mysqli->close();

            require('../connectDB.php');
            
            $sql = "SELECT * FROM tblbeachaccess WHERE 1 ORDER BY CAST(BeachAccessNo AS UNSIGNED), BeachAccessNo;";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '
                    <option value="B'. $row["BeachID"] .'">'. $row["Street"] . ' (' . $row["Beach"] . ') – Beach Access '. $row["BeachAccessNo"] . '</option>
                    ';
                    $i++;
                    $n++;
    
                }
            } else {
                echo "<option>No Locations found.</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-6">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Damage Description / Report</label>
        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
    </div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Photo</label>
    <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Max file size: 5MB</div>
    
    <div class="flex items-start mb-6">
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
