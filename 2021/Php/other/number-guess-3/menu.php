<form name = "menu" method = "POST" action = "<?php echo htmlentities($_SERVER['PHP_SELF']);?>">


<?php 
echo '<h1> Select the Game Level </h1></br>'; 

//displaying of buttons

echo '<button type="submit" class ="menu_option-1" name="game_size" value="10"><img src ="images/easy.png"></button>';
echo '</br>';

echo '<button type="submit" class ="menu_option-2" name="game_size" value="100"><img src ="images/medium.png"></button>'; 
echo '</br>';

echo '<button type="submit" class ="menu_option-3" name="game_size" value="1000"><img src ="images/hard.png"></button>'; 
echo '</br>';


echo '<button type="submit" class ="menu_option-4" name="game_size" value="10000"><img src ="images/expert.png"></button>'; 
echo '</br>';


?>

</form>