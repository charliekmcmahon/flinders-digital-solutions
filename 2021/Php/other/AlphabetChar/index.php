<?php

$upper_start = 65;
$upper_end = 91;

$lower_start = 97;
$lower_end = 122;

$i = $upper_start;

while ($i < ($upper_end + 1)) {
    if ($i = 92) {
        echo "<br>";
        $upper_end = $lower_end;
        $i = $lower_start;
    }
    else {
        echo(chr($i));
        $i++;
    }
}


?>