
<link rel="stylesheet" href="css/site.css">    
<form name = "game_guess" method = "POST" action = "<?php echo htmlentities($_SERVER['PHP_SELF']);?>">

<?php
session_start();

echo '<div id="container">';
// Header
echo '<header>';
include('header.php'); 
echo '</header>';

// Main
echo '<main>';
echo '<h1>Can you guess the correct number?</h1>';
echo '<h3>Enter your guess!!!:</h3>';
echo '</br>';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $_SESSION["user_guess"] = $_POST["user_guess"];
    if (is_numeric($_SESSION["user_guess"])) {
        if($_SESSION["user_guess"] == $_SESSION["number_to_guess"]) {
            $_SESSION["active_game"] = 0;
            header("Location:winner.php");
        } else { 
            if($_SESSION["user_guess"] > $_SESSION["number_to_guess"]) {
               echo '<img src ="images/too_high.png"></br>';
            } else {
                echo '<img src ="images/too_low.gif"></br>';
            }
        }
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Please input numeric values only.")';
        echo '</script>';
    }
    
}
    
    echo '<input type="text" class="user-guess" name="user_guess" value="" required></br>';
    echo '</br>';
    echo '<button type="submit" class ="guess_submit" name="guess_submit" value=""><img src ="images/submit.png"></button>'; 
    echo '</main>';
    
    // Footer
    echo '<footer>';
    include('footer.php'); 
    echo '</footer>';
    echo '<div>';
    ?>
    </form>