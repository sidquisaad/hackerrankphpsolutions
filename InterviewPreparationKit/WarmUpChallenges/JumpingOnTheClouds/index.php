<?php

// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c) {
    $n = count($c);
    $last =  $n - 1;
    $secondToLast = $n - 2;
    $jumps = 0;
    for ($i = 0; $i < $n; $i++) {
        $second = ($i < $secondToLast) && (!$c[$i + 2]);
        if ($second) {
            $i++;
            $jumps++;
            continue;
        }

        $first = ($i < $last) && (!$c[$i + 1]);
        if ($first) {
            $jumps++;
        }
    }

    return $jumps;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$n = intval(trim(fgets($fptr)));

$c = $c = array_map('intval', preg_split('/ /', trim(fgets($fptr)), -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c);
echo 'Result : ' . $result;
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, $result . "\n");
fclose($fptr);