<?php session_start(); ?>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>

<h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-5">List of Dog Parks</h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
<tr>
<th scope="col" class="pl-6 pr-1 py-3">
ID
</th>
<th scope="col" class="px-6 pl-3 py-3">
Site Name
</th>
<th scope="col" class="px-6 pl-3 py-3">
Address
</th>
<th scope="col" class="px-6 pl-3 py-3">
Notes
</th>
</tr>
</thead>
<tbody>
<?php

        // require the database connection
        require('../connectDB.php');


        // get all the machines from the database
        $sql = "SELECT * FROM tbldogparks WHERE 1 ORDER BY dogParkID ASC";
        $result = $mysqli->query($sql);

        $i = 0;
        $n = 1;
        // For each machine, display a card
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $nameColour = "font-medium text-gray-900";
                echo '
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                    <th scope="row" class="pl-6 pr-1 py-4">
                        '.$row["dogParkID"].'
                    </th>
                    <th class="px-6 pl-3 py-4 ' . $nameColour . ' dark:text-white whitespace-nowrap">
                        '.$row["site_name"] . '
                    </th>
                    <td class="px-6 pl-3 py-4">
                        '.$row["Address"].'
                    </td>
                    <td class="px-6 pl-3 py-4">
                        '.$row["Notes"].'
                    </td>
                </tr>';
                $i++;
                $n++;

            }
        } else {
            echo "No players were found.";
        }





?>
</tbody>
</table>
</div>
