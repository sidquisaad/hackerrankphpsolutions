<?php

/*
 * @Author: sidquisaad 
 * @Date: 2020-03-10 17:14:32 
 * @Last Modified by: sidquisaad
 * @Last Modified time: 2020-03-10 18:16:34
 */

// Complete the minimumBribes function below.
function minimumBribes($q) {
    $maximumBriberies = 2;
    $maxPositionsAhead = $maximumBriberies - 1;
    $bribes = 0;

    foreach ($q as $index => $initial) {
        $current = $index + 1;

        if (($initial - $current) > $maximumBriberies) {
            $bribes = 'Too chaotic';
            break;
        }

        for ($i = max($initial - $maxPositionsAhead - 1, 0); $i < $current ; $i++)
            if ($q[$i] > $initial)
                $bribes++;
    }

    echo $bribes . "\n";
    return $bribes;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$result = [];

$t = intval(trim(fgets($fptr)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets($fptr)));

    $q = array_map('intval', preg_split('/ /', trim(fgets($fptr)), -1, PREG_SPLIT_NO_EMPTY));

    $result[] = minimumBribes($q);
}

echo '<br>Result : ' . implode(" ", $result);
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);