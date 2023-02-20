<div class="flex flex-col h-full items-center bg-white rounded-l border shadow-md md:flex-row md:rounded-lg hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-1/2 h-full rounded-l md:rounded-l-lg" src="<?php echo "$posterURL"; ?>" alt="">
            <div class="flex flex-col justify-between p-4 ml-4  leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $movieName; ?> (<?php echo $movieYear;?>)</h5>
                <p>
                <div class="py-1"><b>Rated:</b> <?php echo $restriction; ?></div>
                <div class="py-1"><b>Release Date:</b> <?php echo $releaseDate; ?> </div>
                <div class="py-1"><b>Actors:</b> <?php echo $actors; ?> </div>
                <div class="py-1"><b>Plot:</b> <?php echo $plot; ?> </div><br>
                <div class="py-1"><b>IMDb Rating:</b> <br>
                <div class="flex items-center">

                <?php 

                for ($x = 1; $x <= $rating5; $x++) {
                    echo '<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
                }
                while ($x <= 5){
                    echo '<svg class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
                    $x++;
                }

                echo '<span class="pl-1 text-gray-600">'. $rating . '/10</span>';

                ?>

                </div>
                </div>
                </p>
            </div>
    </div>