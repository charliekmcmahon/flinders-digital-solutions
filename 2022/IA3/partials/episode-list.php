<?php

$data = file_get_contents('http://www.omdbapi.com/?t='. $titleQuery .'&season=1&apikey=a926ca2a');
$json = json_decode($data, true);

if ($json["Response"] == "False") {
    // Movie not found
    $error = "The movie you searched doesn't exist.";
}
else if ($json["Response"] == "True") {

}
else {
    // Could not connect to API
    $error = "Could not connect to API.";
}


?>

<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <?php
        
        for ($i = 1; $i <= $json["totalSeasons"]; $i++) {
            if ($i == 1) { $currentlySelected = "true"; } else { $currentlySelected = "false";}
            echo '
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="tab-'. $i .'" data-tabs-target="#season'. $i .'" type="button" role="tab" aria-controls="season'. $i .'" aria-selected="'. $currentlySelected .'">S'. $i .'</button>
            </li>
            ';
        }

        ?>
    </ul>
</div>
<div id="myTabContent">
    <?php

    for ($i = 1; $i <= $json["totalSeasons"]; $i++) {
        // Needs $i
        echo '
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="season'.$i.'" role="tabpanel">
            <p class="text-sm text-gray-500 dark:text-gray-400">';
            
            // For each loop to echo out the Episodes

            $data = file_get_contents('http://www.omdbapi.com/?t='. $titleQuery .'&season='. $i .'&apikey=a926ca2a');
            $json = json_decode($data, true);

            if ($json["Response"] == "False") {
                // Movie not found
                $error = "The movie you searched doesn't exist.";
            }
            else if ($json["Response"] == "True") {
            }
            else {
                // Could not connect to API
                $error = "Could not connect to API.";
            }
            $a = 0;
            echo '<div class="flex flex-col overscroll-contain overflow-y-scroll max-h-1/4">';
            foreach($json["Episodes"] as $episode){
                require('episode-card.php');
                $a++;
            }
            echo '</div>';

            
            
           echo ' </p>
       </div>
       ';

    }

    ?>
</div>