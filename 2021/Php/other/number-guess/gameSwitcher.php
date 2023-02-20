<?php
// Func

function changeScreen() {
  if ($_COOKIE['gameScreen'] = 'menu') {
    include("menu.php");
  }
  else if ($_COOKIE['gameScreen'] = 'playing_easy') {
    setcookie("start_number", '1', time() + 3600);
    setcookie("end_number", '10', time() + 3600);
    include("playing.php");
  }
  else if ($_COOKIE['gameScreen'] = 'playing_medium') {
    setcookie("start_number", '1', time() + 3600);
    setcookie("end_number", '100', time() + 3600);
    include("playing.php");
  }
  else if ($_COOKIE['gameScreen'] = 'playing_hard') {
    setcookie("start_number", '1', time() + 3600);
    setcookie("end_number", '1000', time() + 3600);
    include("playing.php");
  }
  else if ($_COOKIE['gameScreen'] = 'playing_expert') {
    setcookie("start_number", '-100', time() + 3600);
    setcookie("end_number", '100', time() + 3600);
    include("playing.php");
  }
}


if (!(isset($_COOKIE['gameScreen']))) {
    setcookie("gameScreen", 'menu', time() + 3600);
    echo $_COOKIE['gameScreen'];
    
}
else {
   changeScreen();
}

/*


  */

?>