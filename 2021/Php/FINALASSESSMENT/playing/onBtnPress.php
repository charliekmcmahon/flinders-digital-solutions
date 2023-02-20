<?php session_start(); ?>
<html>
  <head>
    <title>Naughts & Crosses</title>
		<link rel="stylesheet" href="css/index.css"></link>
		<link rel="stylesheet" href=<?php echo '"' . "../css/" . $_SESSION["themeCSS"] . '"';?>></link>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </head>
  <body>
	<?php include($_SERVER["DOCUMENT_ROOT"] . '/elements/header.php'); ?>
	<div class="container-sm">
	<div class="card text-center">
		<div class="card-body">
			<h5 class="card-title">Player <?php session_start(); if ($_SESSION['currentPlayer'] == '1') {echo "2";} else {echo "1";}?>'s move</h5>
		</div>
			<?php 
						require('functions.php');

						// Pull some data from POST and the SESSION
						$player_move = $_POST["buttonPress"] - 1; // The square the player clicks on
						$currentPlayer = $_SESSION["currentPlayer"]; // The current player
						$squareArray = $_SESSION["boardArray"]; // PULL The current board state

						// Set the markers for each player
						if ($currentPlayer == 1) {
								$currentPlayerLetter = $_SESSION["xImage"];
						}
						else if ($currentPlayer == 2) {
								$currentPlayerLetter = $_SESSION["oImage"];
						}

						// Add the player's move to the board
						if (!(isset($squareArray[$player_move]))) { // If there is nothing on the square then set it
							$squareArray[$player_move] = $currentPlayerLetter;
							swapPlayer(); // Swap the player
						}
						else if ($squareArray[$player_move] == " ") { // If there is nothing (2) on the square then set it
							$squareArray[$player_move] = $currentPlayerLetter;
							swapPlayer(); // Swap the player
						}
						else {
								$errMsg = "<b>Hey!</b> You can't place a marker there! Please try again.";
								echo '<div class="alert alert-danger" role="alert">' . $errMsg . '</div>'; // There is already a marker on the square or there was some other error.
						}

						// Make sure the spaces are filled in
						for ($x = 0; $x <= 8; $x++) {
							if (!isset($squareArray[$x])) {
								$squareArray[$x] = " ";
							}
							else if ($squareArray[$x] == ""){
								$squareArray[$x] = " ";
							}
							else {
								// there is already an x or o here.
							}
						}

						$arrayToRender = array('<a>'. $squareArray[0] . '</a>','<a>' . $squareArray[1] . '</a>','<a>' . $squareArray[2] .'</a>','<a>' . $squareArray[3] . '</a>','<a>' . $squareArray[4] . '</a>','<a>' . $squareArray[5] . '</a>','<a>' . $squareArray[6] . '</a>','<a>' . $squareArray[7] . '</a>','<a>' . $squareArray[8] . '</a>');
						
						// Store it in a session var for safekeeping
						$_SESSION["finalRenderedBoardArray"] = $arrayToRender;
						
						// Render the grid with the starting array
						renderGrid($arrayToRender);


						echo "<form action='onBtnPress.php' method='POST' name='buttonPressForm'><input id='buttonPressInput' type='hidden' value='' name='buttonPress'></input></form>";

						// Push the current array back to the session
						$_SESSION["boardArray"] = $squareArray;

						// Check if the player won from this move

						$player1Array = array();
						$player2Array = array();

						foreach($squareArray as $num => $val) {
							if ($val == $_SESSION["xImage"]) {
								array_push($player1Array,($num+1));
							}
							else if ($val == $_SESSION["oImage"]) {
								array_push($player2Array,($num+1));
							}
							else {
							}
						}

						$finalBoard = array();
						foreach($squareArray as $num => $val) {
							if ($val == $_SESSION["xImage"]) {
								array_push($finalBoard,1);
							}
							else if ($val == $_SESSION["oImage"]) {
								array_push($finalBoard,-1);
							}
							else if ($val == " ") {
								array_push($finalBoard,0);
							}
						}

						$_SESSION["finalBoard"] = $finalBoard;

						function calculateSums($value1, $value2, $value3) {
							$finalBoard = $_SESSION["finalBoard"];
							$result = ($finalBoard[($value1 - 1)]) + ($finalBoard[($value2 - 1)]) + ($finalBoard[($value3 - 1)]);

							return $result;

						}
						// Calculate the sums of the lines
						$line1 = calculateSums(1,2,3);
						$line2 = calculateSums(4,5,6);
						$line3 = calculateSums(7,8,9);
						$line4 = calculateSums(1,4,7);
						$line5 = calculateSums(2,5,8);
						$line6 = calculateSums(3,6,9);
						$line7 = calculateSums(1,5,9);
						$line8 = calculateSums(3,5,7);
						
						$i = 1;
						while($i <= 8){
							$lineToCheck = "line".$i;
							//echo "<h1> ahsdasd = " . $$lineToCheck;
							if ($$lineToCheck == 3) {
								// Player 1 has won the game
								$_SESSION["winningMessage"] = "Congratulations! Player 1 Wins!";
								header('Location: ../playagain.php');
								die();
							}
							else if ($$lineToCheck == -3) {
								// Player 2 has won the game
								$_SESSION["winningMessage"] = "Congratulations! Player 2 Wins!";
								header('Location: ../playagain.php');
								die();
							}
							$i++;
						}

						if (in_array("0", $_SESSION["finalBoard"])) {
								//do nothing
						}
						else {
							// it's a tie!
							$_SESSION["winningMessage"] = "Congrats?? You tied.";
							header('Location: ../playagain.php');
						}

						
												
						
						
				?>
		<div class="card-footer text-muted">
				Current theme: <?php if ($_SESSION["theme"] == "1") {echo "Classic";} else if ($_SESSION["theme"] == "2") {echo "Christmas";} else if ($_SESSION["theme"] == "3") {echo "Valentine's Day";} ?>
			</div>
		</div>
	</div>

	<script src="./js/index.js"></script>
	
<footer class="footer mt-auto py-3 bg-light" style="bottom: 0; position: absolute;">
  <div class="container">
    <span class="text-muted">Developed by Charlie McMahon. © 2021. <a href="https://www.macca.xyz" target="_blank" style="color: gray;">Website</a></span>
  </div>
</footer>
	
	</body>
</html>
