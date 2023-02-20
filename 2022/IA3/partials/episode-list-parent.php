<div class="row-span-6 max-h-2/3 overflow-hidden">
    <div class="">
        <form action="grid.php" class="m-0" method="POST">
        <div href="#" class="block p-6 mr-0 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Episodes</h5>
                <!-- Episodes -->
                <?php if ($json["totalSeasons"] >= '0') { require('./partials/episode-list.php'); } ?>
        </div>
        </form>
    </div>
  </div>