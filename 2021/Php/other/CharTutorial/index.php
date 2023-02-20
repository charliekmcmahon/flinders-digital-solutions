<?php

$btnPressed = $_POST['btn'];
if ($btnPressed != "") {
    echo "<br>". "You pressed ".$btnPressed;
}
else {
    echo "Please press a button.";
}

?>

<html>
<body>

<form action="index.php" method="POST"> <input type="submit" name="btn" value="A"></input> </form>
<form action="index.php" method="POST"> <input type="submit" name="btn" value="B"></input> </form>
<form action="index.php" method="POST"> <input type="submit" name="btn" value="C"></input> </form>
<form action="index.php" method="POST"> <input type="submit" name="btn" value="D"></input> </form>




</body>
</html>