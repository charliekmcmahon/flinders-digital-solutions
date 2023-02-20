<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
<link rel="stylesheet" href="https://unpkg.com/twinklecss@1.1.0/twinkle.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

<form method="POST" action="submitRating.php">
<div x-data="{ temp: 3, orig: 3 }" class="flex cursor-pointer text-4xl" @click="orig = temp">
  <input name="ratingValue" type="number" :value="temp" class="hidden"/>
  <template x-for="item in [1,2,3,4,5]">
    <button name="ratingSubmit" type="submit" @mouseenter="temp = item" @mouseleave="temp = orig" class="text-gray-300" :class="{'text-amber-400': (temp >= item)}">★</button>
  </template>
</div>
</form>