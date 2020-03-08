<?php

// Complete the sockMerchant function below.
function sockMerchant($n, $ar) {
    $pairs = 0;

    $colorCount = [];

    foreach ($ar as $i => $color)
        $colorCount[$color] = isset($colorCount[$color]) ? $colorCount[$color] + 1 : 1;

    foreach ($colorCount as $color => $count) {
        if ($count > 1)
            $pairs += ($count % 2 == 1 ? floor($count / 2) : $count / 2);
    }

    return $pairs;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$n = intval(trim(fgets($fptr)));

$ar = array_map('intval', preg_split('/ /', trim(fgets($fptr)), -1, PREG_SPLIT_NO_EMPTY));

$result = sockMerchant($n, $ar);
echo 'Result : ' . $result;
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, $result . "\n");
fclose($fptr);