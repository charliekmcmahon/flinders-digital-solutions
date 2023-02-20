<link rel="stylesheet" href="CSS/site.css">    
<form name = "winner" method = "POST" action = "<?php echo htmlentities($_SERVER['PHP_SELF']);?>">

<?php
session_start();

if ($_SESSION["active_game"] == '1'){
    header("Location:index.php");
}
if ($_SERVER['REQUEST_METHOD']=="POST") {
    session_unset();
    session_destroy();
    header("location:index.php");
}

echo '<div id="container">';

echo '<header>';
include('header.php'); 
echo '</header>';


echo '<main>';
echo '<img src ="images/winner_winner.png"></br></br></br>';
echo '<button type="submit" class ="play-again" name="play_again" value=""><img src ="images/playagain.png"></button>'; 
echo '</main>';
    

echo '<footer>';
include('footer.php'); 
echo '</footer>';
echo '<div>';
?>
</form>
