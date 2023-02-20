<?php session_start(); ?>
<div wire:loading class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden flex flex-col items-center justify-center bg-no-repeat bg-cover bg-center relative" style="background-image: url(https://media.istockphoto.com/photos/friends-in-the-cinema-picture-id1180701083?b=1&k=20&m=1180701083&s=170667a&w=0&h=i4RjlXSocbLiBpruz5KQY4wUlHZ9WX8bAVIMGf1qclw=);">
	<div class="absolute bg-gradient-to-b from-slate-600 to-slate-500 opacity-75 inset-0 z-0"></div>
    <div class="loader ease-linear rounded-full border-4 border-t-4 border-t-indigo-500 border-gray-200 h-12 w-12 mb-4"></div>
	<h2 class="text-center text-white text-xl font-semibold z-10">Please Wait, the 'Sunshine Coast Film Club' website is loading...</h2>
	<p class="w-1/3 text-center text-white z-10">This may take a few seconds, please don't close this page.</p>
</div>
<style>
.loader {
	-webkit-animation: spinner 1.2s linear infinite;
	animation: spinner 1.2s linear infinite;
}

@-webkit-keyframes spinner {
	0% {
		-webkit-transform: rotate(0deg);
	}
	100% {
		-webkit-transform: rotate(360deg);
	}
}

@keyframes spinner {
	0% {
		transform: rotate(0deg);
	}
	100% {
		transform: rotate(360deg);
	}
}
</style>