<article>
    <div class="flex items-center mb-4 space-x-4">
        <img class="w-10 h-10 rounded-full" src="./userProfiles/<?php echo $authorProfile; ?>" alt="">
        <div class="space-y-1 font-medium dark:text-white">
            <p><?php echo $authorNick; ?> <time datetime="" class="block text-sm text-gray-500 dark:text-gray-400">Joined <?php echo $authorJoinedMonth . " " . $authorJoinedYear;?> | <?php echo $authorNumReviews; ?> Review(s)</time></p>
        </div>
    </div>
    <div class="flex items-center mb-1">
        <?php 

        for ($x = 1; $x <= $rating5; $x++) {
            echo '<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
        }
        while ($x <= 5){
            echo '<svg class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
            $x++;
        }

        echo '<span class="pl-1 text-gray-600 text-sm">'. $rating5 . '/5 stars</span>';

        ?>
    </div>
    <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>Review published <time datetime=""><?php echo $reviewDateText; ?></time></p></footer>
    <p class="mb-2 font-light text-gray-500 dark:text-gray-400"><?php echo $reviewText; ?></p>
    <hr>
</article>