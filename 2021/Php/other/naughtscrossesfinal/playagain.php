<?php session_start(); ?>
<html lang="en">
  <head>
    <title>Premium Naughts and Crosses</title>
		<link rel="stylesheet" href="css/index.css"></link>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="confetti.min.js"></script>
  </head>
  <body>  
<div class="col-lg-8 mx-auto p-3 py-md-5">
	<?php include('./elements/header.php'); ?>
	<?php require('playing/functions.php'); ?>

  <main>
    <h1 id="demo"><?php echo $_SESSION["winningMessage"];?></h1>
    <p class="fs-5 col-md-8">Would you like to play again?</p>
		<script>
		// Pass in the id of an element
			let confetti = new Confetti('demo');

			// Edit given parameters
			confetti.setCount(100);
			confetti.setSize(5);
			confetti.setPower(50);
			confetti.setFade(false);
			confetti.destroyTarget(false);

			setTimeout(function (){

				document.getElementById("demo").click();

			}, 1000);

			
		</script>

    <div class="mb-5">
      <a href="../" class="btn btn-primary btn-lg px-4">Play again</a>
    </div>
		<br>
		<?php renderGrid($_SESSION["finalRenderedBoardArray"]); ?>
		<br>

    <hr class="col-3 col-md-2 mb-5">

    <div class="row g-5">
      <div class="col-md-6">
        <h2>Other Games</h2>
        <p>Some other great games made by us!</p>
        <ul class="icon-list">
          <li><a href="google.com" rel="noopener" target="_blank">Hangman</a></li>
          <li class="text-muted">Solitare (coming soon!)</li>
        </ul>
      </div>
    </div>
  </main>
  <footer class="pt-5 my-5 text-muted border-top">
    Developed by Charlie McMahon &middot; &copy; 2021
  </footer>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
