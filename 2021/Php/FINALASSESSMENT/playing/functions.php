<?php
		// Function that places the grid
	function renderGrid($gridArray){
		
		// Start of grid
		echo '<div class="grid-container">';

		// Output
		$x = 1;

		while($x <= 9) {
			echo '<div class="grid-item" onClick="squareClicked('. "'" . $x . "'" . ')">'. $gridArray[($x-1)] .'</div>';
			$x++;
		}

		// End of grid
		echo '</div>';
	}

	function startOfGame(){

		$arrayToRender = array('<a></a>','<a></a>','<a></a>','<a></a>','<a></a>','<a></a>','<a></a>','<a></a>','<a></a>');
		// Render the grid with the starting array
		renderGrid($arrayToRender);

		echo "<form action='playing/onBtnPress.php' method='POST' name='buttonPressForm'><input id='buttonPressInput' type='hidden' value='' name='buttonPress'></input></form>";
	}

	function swapPlayer(){
		if ($_SESSION["currentPlayer"] == 1) {
			$_SESSION["currentPlayer"] = 2;
		}
		else {
			$_SESSION["currentPlayer"] = 1;
		}
	}

?>