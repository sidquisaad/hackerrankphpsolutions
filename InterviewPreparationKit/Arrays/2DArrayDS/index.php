<?php

/*
 * @Author: sidquisaad 
 * @Date: 2020-03-09 20:41:03 
 * @Last Modified by: sidquisaad
 * @Last Modified time: 2020-03-10 17:28:03
 */

// Complete the hourglassSum function below.
function hourglassSum($arr) {
    $max = null;
    $mask = [
        0 => [0, 1, 2],
        1 => [1],
        2 => [0, 1, 2]
    ];
    
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            $sum = 0;
            foreach ($mask as $y => $row) {
                foreach ($row as $x)
                    $sum += $arr[$i + $y][$j + $x];
            }
            $max = ($max === null) || ($max < $sum) ? $sum : $max;                
        }
    }

    return $max;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$arr = [];
for ($i = 0; $i < 6; $i++) {
    $arr[] = array_map('intval', preg_split('/ /', trim(fgets($fptr)), -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);
echo 'Result : ' . $result;
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, $result . "\n");
fclose($fptr);