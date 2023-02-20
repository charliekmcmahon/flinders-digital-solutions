<?php 
session_start();

// query for user review statistics

require('connectDB.php');

$sql = "SELECT AVG(reviews.rating) AS 'avgRating', COUNT(reviewID) AS 'countReviews' FROM reviews WHERE reviews.movieID = '$movieID'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$avgRating = $row["avgRating"];
$countReviews = $row["countReviews"];
$mysqli->close();


?>

<div class="row-span-1 col-span-2">
    <div class="">
        <div class="block p-6 mr-0 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex w-2/3 p-0 m-0 align-middle self-center">
                    <div class="flex-1 self-center">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">User Ratings</h5>
                    </div>
                    <div class="flex-1 self-center">
                        <div class="flex items-center">
                            <?php 
                                for ($x = 1; $x <= $avgRating; $x++) {
                                    echo '<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
                                }
                                while ($x <= 5){
                                    echo '<svg class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
                                    $x++;
                                }
                            ?>
                            <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white"><?php echo $avgRating; ?>/5</p>
                            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                            <a href="#" data-modal-toggle="ratings-modal" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white"><?php echo $countReviews;?> review(s)</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- Extra Large Modal -->
<div id="ratings-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    User reviews for '<?php echo $movieName;?>'
                </h3>
                <button type="button" data-modal-toggle="ratings-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="extralarge-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body --> 
            <div class="p-6 space-y-6">
                <?php

                require('./connectDB.php');

                $sql = "SELECT reviews.*, users.userID, users.profileImage, users.nickname, users.email, users.SignUpDate, (SELECT AVG(reviews.rating) FROM reviews WHERE reviews.movieID = '$movieID') AS avgRating FROM reviews INNER JOIN users ON reviews.userNickname=users.nickname WHERE reviews.movieID = '$movieID'";

                $result = $mysqli->query($sql);

                // Get the results from the chunky query above
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        $authorNick = $row["nickname"];
                        $authorProfile = $row["profileImage"];
                        $authorJoined = date_create($row["SignUpDate"]);
                        $authorJoinedMonth = date_format($authorJoined, 'F');
                        $authorJoinedYear = date_format($authorJoined, 'Y');
                        $rating5 = $row["rating"];
                        $reviewDate = date_create($row["timestamp"]);
                        $reviewDateText = date_format($reviewDate, 'd/m/Y H:i');
                        $reviewText = $row["review"];
        
                        include('partials/userReviewsElement.php'); 
        
                    }
                } else {
                    echo "No reviews were found.";
                }
                
                ?>
            </div>
            <!-- Modal footer 
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="extralarge-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-toggle="extralarge-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
            -->
        </div>
    </div>
</div>