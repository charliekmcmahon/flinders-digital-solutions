<?php
session_start();
// Make sure the player is not playing
$_SESSION["isPlaying"] = '0';

?>
<!-- Dark mode ccs + script --->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-darkmode@0.7.0/dist/darktheme.css"/>
<script src="https://unpkg.com/bootstrap-darkmode@0.7.0/dist/theme.js"></script>
<script>

const themeConfig = new ThemeConfig();
themeConfig.initTheme();
</script>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
	<button type="button" onClick="darkToggle();" class="btn btn-dark pull-right">Toggle Dark Mode</button>
</div>
<script>
function darkToggle() {

	document.getElementById("darkSwitch").click();

}
</script>

<!---- Start menu html --->
<div class="px-4 py-5 my-5 text-center">
	<img class="d-block mx-auto mb-4" src="../assets/icon-xo.png" alt="" width="72" height="72">
	<h1 class="display-5 fw-bold"><small class="text-muted">Premium</small> Naughts and Crosses</h1>
	<div class="col-lg-6 mx-auto">
		<p class="lead mb-4">Play naughts & crosses online for free! Supports mobile web and desktop.</p>
		<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
			<form class="row row-cols-lg-auto g-3 align-items-center" action="elements/playGame.php" method="POST">
				<div class="col-12">
					<p class="h5">Game mode:</p>
				</div>
				<div class="col-12">
					<label class="visually-hidden" for="inlineFormSelectPref">Difficulty</label>
					<select name="difficulty" class="form-select" id="inlineFormSelectPref">
						<option selected value="1">PvP (Local Co-Op)</option>
						<option value="2" disabled>vs AI (under development)</option>
					</select>
				</div>
				<div class="col-12">
					<p class="h5">Theme:</p>
				</div>
					<div class="col-12">
						<label class="visually-hidden" for="inlineFormSelectPref">Theme</label>
						<select name="theme" class="form-select" id="inlineFormSelectPref">
							<option selected value="1">Classic</option>
							<option value="2">Christmas</option>
							<option value="3">Valentine's</option>
						</select>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary">Play</button>
					</div>
			</form>
		</div>
	</div>
</div>
<div id="darkBtnDiv">
<script> 
// Dark mode button
const darkSwitch = writeDarkSwitch(themeConfig); 

document.getElementById("darkSwitch").style.visibility = "hidden"; 
var x = document.getElementById("darkBtnDiv");
x.getElementsByTagName("*")[1].style.visibility = "hidden";

</script>
</div>