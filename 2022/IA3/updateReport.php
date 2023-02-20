<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dog Parks & Beaches | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php
session_start();

if (isset($_POST["report"])) {
    require('connectDB.php');
    // Query to get report data. Also, include the data for the user who submitted the report, as well as the number of reports they've submitted.
    $sql = "SELECT reports.*, users.*, (SELECT COUNT(reports.Authorusername) FROM reports WHERE reports.Authorusername = users.username) AS userTotalReports FROM reports INNER JOIN users ON reports.Authorusername=users.username WHERE reports.ReportID = " . $_POST["report"] . " LIMIT 1";
    $result = $mysqli->query($sql);

    // Get the results from the chunky query above
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Report fields
        $reportID = $row["ReportID"];
        $authorusername = $row["Authorusername"];
        $locationID = $row["LocationID"];
        $createdDate = $row["CreatedDate"];
        $damageDescription = $row["DamageDescription"];
        $reportImage = $row["DamagePicture"];

        // User fields
        $authorEmail = $row["email"];
    }
    else {
        $reportID = "error";
        $authorusername = "error";
        $locationID = "error";
        $createdDate = "error";
        $damageDescription = "error";
        $reportImage = "error";
    }

}
else {
    header("Location: ./adminDashboard");
}
?>

<h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-5">Update report</h2>
<div class="p-6 w-1/2 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <form action="submitUpdateReport.php" enctype="multipart/form-data" method="POST">
    <div class="mb-6">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">User's username</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $authorusername; ?>" required>
    </div>
    <div class="mb-6">
        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dog Park / Beach Access</label> <!-- add a dropdown here?? -->
        <select type="dropdown" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <?php
            // Echo out the options
            require('connectDB.php');

            $sql = "SELECT * FROM tbldogparks WHERE 1 ORDER BY dogParkID ASC";
            $result = $mysqli->query($sql);

            $i = 0;
            $n = 1;
            // For each machine, display a card
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (("D" . $row["dogParkID"]) == $locationID) {
                        echo '
                        <option value="D'. $row["dogParkID"] .'" selected>'. $row["site_name"] . ' Dog Park</option>
                        ';
                        $i++;
                        $n++;
                    }
                    else {
                        echo '
                        <option value="D'. $row["dogParkID"] .'">'. $row["site_name"] . ' Dog Park</option>
                        ';
                        $i++;
                        $n++;
                    }
    
                }
            } else {
                echo "<option>No Locations found.</option>";
            }

            $mysqli->close();

            require('connectDB.php');
            
            $sql = "SELECT * FROM tblbeachaccess WHERE 1 ORDER BY CAST(BeachAccessNo AS UNSIGNED), BeachAccessNo;";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (("B" . $row["BeachID"]) == $locationID) {
                        echo '
                        <option value="B'. $row["BeachID"] .'" selected>'. $row["Street"] . ' (' . $row["Beach"] . ') – Beach Access '. $row["BeachAccessNo"] . '</option>
                        ';
                        $i++;
                        $n++;
                    }
                    else {
                        echo '
                        <option value="B'. $row["BeachID"] .'">'. $row["Street"] . ' (' . $row["Beach"] . ') – Beach Access '. $row["BeachAccessNo"] . '</option>
                        ';
                        $i++;
                        $n++;
                    }
    
                }
            } else {
                echo "<option>No Locations found.</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-6">
        <label for="damage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Damage Description / Report</label>
        <textarea name="damage" id="damage" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $damageDescription; ?>"></textarea>
    </div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Photo</label>
    <input name="photo" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Max file size: 5MB</div>
    <input type="hidden" name="reportID" value="<?php echo $reportID; ?>"></input>
    <!-- Upload an image to the server from input form section--> 
    
    <div class="flex items-start mb-6">
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
