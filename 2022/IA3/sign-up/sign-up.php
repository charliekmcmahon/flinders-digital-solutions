<?php session_start(); ?>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
<div class="bg-no-repeat bg-cover bg-center relative"
  style="background-image: url(https://images.unsplash.com/photo-1515634928627-2a4e0dae3ddf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80);">
  <div class="absolute bg-gradient-to-b from-slate-600 to-slate-500 opacity-75 inset-0 z-0"></div>
  <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
    <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
      <div class="self-start hidden lg:flex flex-col  text-white">
        <img src="" class="mb-3">
        <h1 class="mb-3 font-bold text-5xl">Welcome to the Sunshine Coast Film Club. </h1>
        <p class="pr-3">Signing up for an account allows you to – and –. It
          also helps us prevent spam and make your experience the best it can be! <br><br>Questions? Check out
          our privacy policy. <br>(Hint – We don't sell your data!)</p>
      </div>
    </div>
    <div class="flex justify-center self-center  z-10">
      <form action="../login/index.php" method="post" enctype="multipart/form-data"> <!-- Sign up Form --->
      <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
        <div class="mb-4">
          <h3 class="font-semibold text-2xl text-gray-800">Sign Up </h3>
          <p class="text-gray-500">Already have an account? <a class="font-medium text-indigo-500 hover:text-indigo-400"
              href="../login/"> Sign in &rarr;</a></p>
        </div>
        <div class="space-y-3">
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700 tracking-wide">Username</label>
            <input name="username" class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-indigo-400" pattern="[A-Za-z0-9]+" type="" placeholder="Username" required>
          </div>
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
            <input name="email" class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-indigo-400" type="email" placeholder="you@mfac.edu.au" required>
          </div>
          <div class="space-y-2">
            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
              Password
            </label>
            <input name="password" class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-indigo-400" type="password" placeholder="Enter your password" required>
          </div>
          <div class="space-y-2">
            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
              Confirm Password
            </label>
            <input name="confirmPassword" class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-indigo-400" type="password" placeholder="Please re-enter your password" required>
          </div>
          <div class="pb-0.5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload profile picture</label>
              <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="photo" aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
          </div>
          <div>
            <input name="signUpSubmit" value="Sign up" type="submit"
                class="w-full flex justify-center bg-indigo-500  hover:bg-indigo-400 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500" required>
            </input>
          </div>
        </div>
        <div class="pt-5 text-center text-gray-400 text-xs">
          <span>
            Copyright © 2022 Charlie McMahon.
        </div>
      </div>
      </form>
    </div>
  </div>
</div>