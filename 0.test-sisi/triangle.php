<?php

$input = 5; // Masukkan input disini
$m = 1;
for ($i = 1; $i <= $input; $i++) {
    for ($j = $i; $j <= $input - 1; $j++) {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $m; $k++) {
        echo "*";
    }
    for ($c = $m; $c > 1; $c--) {
        echo "*";
    }
    echo "<br>";
    $m++;
}
