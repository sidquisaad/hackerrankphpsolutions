<?php

// Complete the repeatedString function below.
function repeatedString($s, $n) {
    $len = strlen($s);
    $whole = floor($n /$len);
    $remainder = $n % $len;
    return (substr_count($s, 'a') * $whole) + substr_count($s, 'a', 0, $remainder);
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$s = trim(fgets($fptr));

$n = intval(trim(fgets($fptr)));

$result = repeatedString($s, $n);

echo 'Result : ' . $result;
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, $result . "\n");
fclose($fptr);