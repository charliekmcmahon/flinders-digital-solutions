<?php
session_start();
// Get report data
require('../connectDB.php');

// Query to get report data. Also, include the data for the user who submitted the report, as well as the number of reports they've submitted.
$sql = "SELECT reports.*, users.*, (SELECT COUNT(reports.AuthorNickname) FROM reports WHERE reports.AuthorNickname = users.nickname) AS userTotalReports FROM reports INNER JOIN users ON reports.AuthorNickname=users.nickname WHERE reports.ReportID = " . $_SESSION["currentReport"] . " LIMIT 1";
$result = $mysqli->query($sql);

// Get the results from the chunky query above
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Report fields
    $reportID = $row["ReportID"];
    $authorNickname = $row["AuthorNickname"];
    $locationID = $row["LocationID"];
    $createdDate = $row["CreatedDate"];
    $damageDescription = $row["DamageDescription"];
    $reportImage = $row["DamagePicture"];

    // User fields
    $authorEmail = $row["email"];
    $authorCreated = $row["SignUpDate"];
    $authorReports = $row["userTotalReports"];
}
else {
    $reportID = "error";
    $authorNickname = "error";
    $locationID = "error";
    $createdDate = "error";
    $damageDescription = "error";
    $reportImage = "error";
}

// Get the site name for the specified site by ID
$tempID = $locationID;
$tempLocationType = substr($tempID, 0, 1);
$tempTrimmedID = ltrim($tempID, $tempLocationType);

if ($tempLocationType == "D") {
    // Dog park
    $sql = "SELECT * FROM tbldogparks WHERE dogParkID = ". $tempTrimmedID;
    $subresult = $mysqli->query($sql);
    $subrow = $subresult->fetch_assoc();
    $locationName = $subrow["site_name"];
    $fullLocationName = $locationName . " Dog Park";
}
else if ($tempLocationType == "B") {
    // Beach access
    $sql = "SELECT * FROM tblbeachaccess WHERE BeachID = ". $tempTrimmedID;
    $subresult = $mysqli->query($sql);
    $subrow = $subresult->fetch_assoc();
    $locationName = $subrow["Street"];
    $accessID = $subrow["BeachAccessNo"];
    $fullLocationName = $locationName . " Beach Access " . $accessID;

}
else {
    $locationName = "Not Found.";
}

?>
<div class="m-10 w-1/2">
<div class="grid grid-rows-3 grid-flow-col gap-4">
  <div class="row-span-3 ..."> 
    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="<?php echo $reportImage;?>" alt="Report image" />
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Report Details</h5>
            <p class="font-bold text-gray-700 dark:text-gray-400">Damage reported by: <span class="font-normal"><?php echo $authorNickname; ?></span></p>
            <p class="font-bold text-gray-700 dark:text-gray-400 pt-2">Damage description:</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $damageDescription; ?></p>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300 pt-5">
                Report created at: <span class="font-bold"><?php echo $createdDate; ?></span>
            </div>
        </div>
    </div>
  </div>
  <div class="col-span-2 ...">
    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">User information</h5>
            <p class="font-bold text-gray-700 dark:text-gray-400">Nickname: <span class="font-normal"><?php echo $authorNickname; ?></span></p>
            <p class="font-bold text-gray-700 dark:text-gray-400">Email Address: <span class="font-normal"><?php echo $authorEmail; ?></span></p>
            <p class="font-bold text-gray-700 dark:text-gray-400"># of Reports: <span class="font-normal"><?php echo $authorReports; ?></span></p>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300 pt-5">
                User created: <span class="font-bold"><?php echo $authorCreated; ?></span>
            </div>
        </div>
    </div>
  </div>
  <div class="row-span-2 col-span-2 ...">
    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Actions</h5>
            <div class="inline-flex">
                <form action="../deleteReport.php" method="POST"><button type="submit" class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button><input type="hidden" name="report" value="<?php echo $reportID; ?>"></input></form>
                <form action="../updateReport.php" method="POST"><button type="submit" class="focus:outline-none text-white bg-violet-500 hover:bg-violet-800 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-900">Update</button><input type="hidden" name="report" value="<?php echo $reportID; ?>"></input></form>
            </div>
        </div>
    </div>
  </div>
</div>


</div>




