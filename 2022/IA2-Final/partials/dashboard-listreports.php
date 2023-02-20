<?php session_start(); ?>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>

<h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-5">List of Reports</h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
<tr>
<th scope="col" class="pl-6 pr-1 py-3">
ID
</th>
<th scope="col" class="px-6 pl-3 py-3">
Author Nick
</th>
<th scope="col" class="px-6 pl-3 py-3">
Location ID
</th>
<th scope="col" class="px-6 pl-3 py-3">
Location Name
</th>
<th scope="col" class="px-6 pl-3 py-3">
Created Date
</th>
<th scope="col" class="px-6 pl-3 py-3">
Actions
</th>
</tr>
</thead>
<tbody>
<?php

        // require the database connection
        require('../connectDB.php');


        // get all the machines from the database
        $sql = "SELECT * FROM reports WHERE 1 ORDER BY CreatedDate DESC";
        $result = $mysqli->query($sql);

        $i = 0;
        $n = 1;
        // For each machine, display a card
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Get the site name for the specified site by ID
                $tempID = $row["LocationID"];
                $tempLocationType = substr($tempID, 0, 1);
                $tempTrimmedID = ltrim($tempID, $tempLocationType);

                if ($tempLocationType == "D") {
                    // Dog park
                    $sql = "SELECT site_name FROM tbldogparks WHERE dogParkID = ". $tempTrimmedID;
                    $subresult = $mysqli->query($sql);
                    $subrow = $subresult->fetch_assoc();
                    $tempLocationName = $subrow["site_name"];
                }
                else if ($tempLocationType == "B") {
                    // Beach access
                    $sql = "SELECT street FROM tblbeachaccess WHERE BeachID = ". $tempTrimmedID;
                    $subresult = $mysqli->query($sql);
                    $subrow = $subresult->fetch_assoc();
                    $tempLocationName = $subrow["street"];

                }
                else {
                    $tempLocationName = "Not Found.";
                }

                $nameColour = "font-medium text-gray-900";
                echo '
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                    <th scope="row" class="pl-6 pr-1 py-4">
                        '.$row["ReportID"].'
                    </th>
                    <th class="px-6 pl-3 py-4 ' . $nameColour . ' dark:text-white whitespace-nowrap">
                        '.$row["AuthorNickname"] . '
                    </th>
                    <td class="px-6 pl-3 py-4">
                        '.$row["LocationID"].'
                    </td>
                    <td class="px-6 pl-3 py-4">
                    '.$tempLocationName.'
                    </td>
                    <td class="px-6 pl-3 py-4">
                        '.$row["CreatedDate"].'
                    </td>
                    <td class="px-6 pl-3 py-4">
                    <div class="inline-flex">
                    <form action="../viewReport/" method="POST"><button type="sumbit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View</button><input type="hidden" name="viewReport" value="'. $row["ReportID"] .'"></input></form>
                    <form action="../deleteReport.php" method="POST"><button type="submit" class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button><input type="hidden" name="report" value="'. $row["ReportID"] .'"></input></form>
                    </div>
                    </td>
                </tr>';
                $i++;
                $n++;

            }
        } else {
            echo "No reports found.";
        }





?>
</tbody>
</table>
</div>
