<script src="https://cdn.tailwindcss.com"></script>

<div class="p-5">

<h1 class="text-xl font-bold">JSON</h1>

<?php
$data = file_get_contents ('http://api.weatherapi.com/v1/current.json?q=Buderim&lang=gb&key=349e5dbae3a24c7099643118221005');
$json = json_decode($data, true);

$locationName = $json["location"]["name"];
$currentTemp = $json["current"]["temp_c"];
$weatherCondition = $json["current"]["condition"]["text"];
$weatherConditionIcon = "http:" . $json["current"]["condition"]["icon"];
$windSpeed = $json["current"]["wind_kph"];

?>

<?php echo $locationName . "<br> Temperature: " . $currentTemp . "ºC<br> Current Conditions: " . $weatherCondition . "<br> <img src='$weatherConditionIcon'></img>" . "<br /> Wind speed: " . $windSpeed . " km/h"; ?>

<h1 class="text-xl font-bold mt-5">XML</h1>

<?php
$xml = simplexml_load_file('http://api.weatherapi.com/v1/current.xml?q=Maroochydore&lang=gb&key=349e5dbae3a24c7099643118221005');

$locationName = $xml->location->name;
$currentTemp = $xml->current->temp_c;
$weatherCondition = $xml->current->condition->text;
$weatherConditionIcon = "http:" . $xml->current->condition->icon;
$windSpeed = $xml->current->wind_kph;
?>

<?php echo $locationName . "<br> Temperature: " . $currentTemp . "ºC<br> Current Conditions: " . $weatherCondition . "<br> <img src='$weatherConditionIcon'></img>" . "<br /> Wind speed: " . $windSpeed . " km/h"; ?>


<h1 class="text-xl font-bold mt-5">3-Day forecast</h1>

<?php
$data = file_get_contents ('http://api.weatherapi.com/v1/forecast.json?q=Nambour&days=3&aqi=no&alerts=no&key=349e5dbae3a24c7099643118221005');
$json = json_decode($data, true);

$locationName = $json["location"]["name"];
$currentTemp = $json["current"]["temp_c"];
$weatherCondition = $json["current"]["condition"]["text"];
$weatherConditionIcon = "http:" . $json["current"]["condition"]["icon"];
$windSpeed = $json["current"]["wind_kph"];

$dayOneTemp = $json["forecast"]["forecastday"][0]["day"]["avgtemp_c"];
$dayTwoTemp = $json["forecast"]["forecastday"][1]["day"]["avgtemp_c"];
$dayThreeTemp = $json["forecast"]["forecastday"][2]["day"]["avgtemp_c"];

?>

<?php echo $locationName . "<br> Temperature: " . $currentTemp . "ºC<br> Current Conditions: " . $weatherCondition . "<br> <img src='$weatherConditionIcon'></img>" . "<br /> Wind speed: " . $windSpeed . " km/h"; ?>

<h2 class="text-l font-bold mt-5"> Forecast (static)</h2>
<p>Today's Avg Temp: <span class="font-bold"><?php echo $dayOneTemp;?></span></p>
<p>Tomorrow's Avg Temp: <span class="font-bold"><?php echo $dayTwoTemp;?></span></p>
<p>Day 3's Avg Temp: <span class="font-bold"><?php echo $dayThreeTemp;?></span></p>

<h2 class="text-l font-bold mt-5"> Forecast (foreach)</h2>
<?php
$i = 0;
foreach ($json["forecast"]["forecastday"] as $forecastday) {
    echo "<br> Day " . ($i + 1) . "'s Avg temp: " . $json["forecast"]["forecastday"][$i]["day"]["avgtemp_c"] . "ºC";
    $i++;
}
?>

</div>