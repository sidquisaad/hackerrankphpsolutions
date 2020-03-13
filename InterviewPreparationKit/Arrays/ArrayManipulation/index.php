<?php

/*
 * @Author: sidquisaad 
 * @Date: 2020-03-12 07:38:06 
 * @Last Modified by: sidquisaad
 * @Last Modified time: 2020-03-12 08:02:24
 */

// Complete the arrayManipulation function below.
function arrayManipulation($n, $queries) {
    $max = 0;

    $arr = [];//array_fill(0 , $n + 1, 0);

    foreach ($queries as $arguments) {
        $am = $arguments[0] - 1;        // $a - 1
        $b = $arguments[1];
        $k = $arguments[2];

        if (!isset($arr[$am]))
            $arr[$am] = 0;

        if (!isset($arr[$b]))
            $arr[$b] = 0;

        $arr[$am] += $k;
        $arr[$b] -= $k;
    }

    ksort($arr);

    $sum = 0;
    foreach ($arr as $key => $value) {
            $sum += $value;
            if ($sum > $max)
                $max = $sum;
    }
    
    return $max;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$nm = explode(' ', trim(fgets($fptr)));

$n = intval($nm[0]);

$m = intval($nm[1]);

$queries = [];

for ($i = 0; $i < $m; $i++) {
    $queries[] = array_map('intval', preg_split('/ /', trim(fgets($fptr)), -1, PREG_SPLIT_NO_EMPTY));
}

$result = arrayManipulation($n, $queries);
$result2 = arrayManipulation2($n, $queries);


echo 'Result : ' . $result;
echo "\nResult2 : " . $result2;
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, $result . "\n");
fclose($fptr);