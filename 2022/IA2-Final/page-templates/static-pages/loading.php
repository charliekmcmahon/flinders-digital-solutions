<?php session_start(); ?>
<div wire:loading class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden flex flex-col items-center justify-center bg-no-repeat bg-cover bg-center relative" style="background-image: url(https://images.unsplash.com/photo-1621643659543-ca4639b7e65d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80);">
	<div class="absolute bg-gradient-to-b from-slate-600 to-slate-500 opacity-75 inset-0 z-0"></div>
    <div class="loader ease-linear rounded-full border-4 border-t-4 border-t-indigo-500 border-gray-200 h-12 w-12 mb-4"></div>
	<h2 class="text-center text-white text-xl font-semibold z-10">'Dog Parks & Beaches' is loading...</h2>
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