<?php session_start(); ?>
<div class="bg-no-repeat bg-cover bg-center relative"
    style="background-image: url(https://images.unsplash.com/photo-1558732362-f60bf1158d2c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2132&q=80);">
    <div class="absolute bg-gradient-to-b from-slate-600 to-slate-500 opacity-75 inset-0 z-0"></div>
    <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
        <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
            <div class="self-start hidden lg:flex flex-col  text-white">
                <img src="" class="mb-3">
                <h1 class="mb-3 font-bold text-5xl"><?php if (isset($_POST['signUpSubmit'])) { echo "Almost there! Please sign in to finish."; } else { echo "Welcome back!"; }?> </h1>
                <p class="pr-3">We hope you enjoy the experience you have with our website!</p>
            </div>
        </div>
        <div class="flex justify-center self-center  z-10">
            <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
                <div class="mb-4">
                    <h3 class="font-semibold text-2xl text-gray-800">Sign In </h3>
                    <p class="text-gray-500">Don't have an account yet? 
                        <a class="font-medium text-indigo-500 hover:text-indigo-400" href="../sign-up/"> Sign up &rarr;</a></p>
                </div>
                <form action="../loading/index.php" method="POST">
                <div class="space-y-5">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                        <input
                            class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-indigo-400"
                            name="email" type="email" placeholder="you@netclaw.com.au" <?php if (isset($_POST['email'])) { echo "value='". $_POST["email"] . "'"; } else { }?>>
                    </div>
                    <div class="space-y-2">
                        <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                            Password
                        </label>
                        <input
                            class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-indigo-400"
                            type="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember_me" type="checkbox"
                                class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-800">
                                Remember me
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="text-indigo-400 hover:text-indigo-500">
                                Forgot your password?
                            </a>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Sign In" name="signInSubmit"
                            class="w-full flex justify-center bg-indigo-500  hover:bg-indigo-400 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                        </input>
                    </div>
                </div>
                </form>
                <div class="pt-5 text-center text-gray-400 text-xs">
                    <span>
                        Copyright © 2022 Charlie McMahon.
                </div>
            </div>
        </div>
    </div>
</div>