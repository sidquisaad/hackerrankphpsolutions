<?php

// Complete the hourglassSum function below.
// Complete the rotLeft function below.
function rotLeft($a, $d) {
    // Since d is alwasy <= count($a). If d equals n then the array is unchanged.
    if ($d < count($a)) {
        $splice = array_splice($a, 0, $d);
        $a = array_merge($a, $splice);
    }

    // Or this, but poor performance.
    /*
    for ($i=0; $i < $d; $i++) {
        $a[] = array_shift($a);
    }
    */

    return $a;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$nd = explode(' ', trim(fgets($fptr)));
$n = intval($nd[0]);
$d = intval($nd[1]);

$a = array_map('intval', preg_split('/ /', trim(fgets($fptr)), -1, PREG_SPLIT_NO_EMPTY));

$result = rotLeft($a, $d);

echo 'Result : ' . implode(" ", $result);
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);