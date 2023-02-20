<?php

require('./connectDB.php');

// query the tblbeachaccess table for the beach access data
$sql = "SELECT `Latitude`, `Longitude`, `Street` FROM `tblbeachaccess`";

// run the query
$result = $mysqli->query($sql);

// define the arrays
$latitude = array();
$longitude = array();
$street = array();

while($row = mysqli_fetch_assoc($result)){
  // add the latitude, longitude and street to the arrays with array_push
  array_push($latitude, $row['Latitude']);
  array_push($longitude, $row['Longitude']);
  array_push($street, $row['Street']);
}


// query the tbldogpark table for the dog park data
$sql = "SELECT `Latitude`, `Longitude`, `site_name` FROM `tbldogparks`";

// run the query
$result = $mysqli->query($sql);


// define the dog park arrays
$dogLatitude = array();
$dogLongitude = array();
$dogStreet = array();


while($row = mysqli_fetch_assoc($result)){
  // add the latitude, longitude and street to the arrays with array_push
  array_push($dogLatitude, $row['Latitude']);
  array_push($dogLongitude, $row['Longitude']);
  array_push($dogStreet, $row['site_name']);
}


?>

<script src="https://cdn.tailwindcss.com"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<!-- beach co-ordinates passed from php -->
<script>
  var lat = <?php echo json_encode($latitude); ?>;
  var long = <?php echo json_encode($longitude); ?>;
  var street = <?php echo json_encode($street); ?>;
</script>

<!-- dog park co-ordinates passed from php -->
<script>
  var dogLat = <?php echo json_encode($dogLatitude); ?>;
  var dogLong = <?php echo json_encode($dogLongitude); ?>;
  var dogStreet = <?php echo json_encode($dogStreet); ?>;
</script>

<script src="./scripts/home.js"></script>
<div class="relative bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
      <div class="flex justify-start lg:w-0 lg:flex-1">
        <div class="relative">
        <p class="inline-block text-2xl sm:text-3xl font-bold text-indigo-900 tracking-tight dark:text-indigo-800 ml-5 align-baseline"> Dog Parks & Beaches </p>
        <h2 class="text-sm text-indigo-400 font-semibold tracking-wide uppercase absolute top6.5 left-5">By Charlie McMahon</h2>
        </div>
      </div>
      <div class="-mr-2 -my-2 md:hidden">
        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
          <span class="sr-only">Open menu</span>
          <!-- Heroicon name: outline/menu -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <nav class="hidden md:flex space-x-10">
        <div class="relative">
            <button type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
            <span>Submit a Report</span>
          </button>
        </div>
          <div class="relative">
            <button type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
            <span>View Map</span>
          </button>
        </div>
        <div class="relative">
          <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
          <button type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
            <span>Admin Dashboard</span>
            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
      </nav>
    </div>
    <div>
      <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Found a damaged</span>
            <span class="block text-indigo-500 xl:inline">dog park</span>
            <span class="block xl:inline">or</span>
            <span class="block text-indigo-600 xl:inline">beach access?</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Use our website to report damage and search for beach accesses & dog parks.</p>
          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
              <a href="./dashboard/" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10"> Search & submit a report </a>
            </div>
            <div class="mt-3 sm:mt-0 sm:ml-3">
              <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10"> View map </a>
            </div>
          </div>
        </div>
      </main>
<br>
<br>
<br>
<div class="py-12 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Features</h2>
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">An easy, fast way to browse locations & report damage</p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">We make it easy to look for the nearest dog parks & beach accesses to you. Reporting site damage couldn't be easier, with our intuitive user interface and one-tap reporting system.</p>
    </div>

    <div class="mt-10">
      <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/globe-alt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Detailed Map View</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">The detailed map view allows you to see where your nearest locations are.</dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/scale -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Easy reporting with image upload</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Easily submit damage or condition reports for a site, with support for full image upload </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/lightning-bolt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Industry-leading data</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Use industry-leading MapBox™ data to view the nearest parks around you</dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/annotation -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Mobile notifications</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Get SMS or email updates when your preffered park is updated with a site report</dd>
        </div>
      </dl>
    </div>
  </div>
</div>
<br>
<div class="m-10">
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="lg:flex lg:items-center lg:justify-between">
  <div class="flex-1 min-w-0">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Location Map</h2>
    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
      <div class="mt-2 flex items-center text-sm text-gray-500">
        <!-- Heroicon name: solid/location-marker -->
        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
        </svg>
        Sunshine Coast, Queensland
      </div>
      <div class="mt-2 flex items-center text-sm text-gray-500">
        <!-- Heroicon name: solid/location-marker -->
        <img class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" src="./assets/icons/letter-b.png" alt="">
        Indicates a Beach Access
      </div>
      <div class="mt-2 flex items-center text-sm text-gray-500">
        <!-- Heroicon name: solid/location-marker -->
        <img class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" src="./assets/icons/letter-d.png" alt="">
        Indicates a Dog Park
      </div>
    </div>
  </div>
  <div class="mt-5 flex lg:mt-0 lg:ml-4">
    <span class="hidden sm:block ml-3">
      <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <!-- Heroicon name: solid/link -->
        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
        </svg>
        View full
      </button>
    </span>

    <span class="sm:ml-3">
      <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <!-- Heroicon name: solid/check -->
        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        Report
      </button>
    </span>
  </div>
</div>
</div>
<section class="text-gray-600 body-font relative h-screen">
<div class="relative bg-white h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 h-screen">
    <div class="relative w-auto h-50 bg-gray-300 h-screen">
        <div id="map" class="w-full h-full"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFlQUHn-8nEKiQAyG3ceqBc-tCClrQ7qY&callback=initMap&v=weekly" async></script>
    </div>
  </div>
</div>
</section>
<br>
</div>
