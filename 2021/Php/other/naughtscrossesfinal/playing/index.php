<?php session_start(); ?>
<html>
  <head>
    <title>Naughts & Crosses</title>
		<link rel="stylesheet" href="/css/index.css"></link>
		<link rel="stylesheet" href=<?php echo '"' . "css/" . $_SESSION["themeCSS"] . '"';?>></link>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>
  <body>
	<?php include($_SERVER["DOCUMENT_ROOT"] . '/elements/header.php'); ?>
	<div class="container-sm">
	<div class="card text-center">
		<div class="card-body">
			<h5 class="card-title">Player <?php session_start(); echo $_SESSION["currentPlayer"];?>'s move</h5>
		</div>
		<?php
				include('functions.php');
				startOfGame();
			?>
		<div class="card-footer text-muted">
				Current theme: <?php if ($_SESSION["theme"] == "1") {echo "Classic";} else if ($_SESSION["theme"] == "2") {echo "Christmas";} else if ($_SESSION["theme"] == "3") {echo "Valentine's Day";} ?>
			</div>
		</div>
	</div>

	<script src="/js/index.js"></script>
	
<footer class="footer mt-auto py-3 bg-light" style="bottom: 0; position: absolute;">
  <div class="container">
    <span class="text-muted">Developed by Charlie McMahon. © 2021. <a href="https://www.macca.xyz" target="_blank" style="color: gray;">Website</a></span>
  </div>
</footer>
	
	</body>
</html>