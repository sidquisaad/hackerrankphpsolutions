<?php

/*
 * @Author: sidquisaad 
 * @Date: 2020-03-12 06:29:04 
 * @Last Modified by: sidquisaad
 * @Last Modified time: 2020-03-12 07:10:27
 */

// Complete the minimumSwaps function below.
function minimumSwaps($arr) {
    $outOfOrder = [];

    foreach ($arr as $index => $value) {
        if ($value != ($index + 1))
        $outOfOrder[$value] = $index;
    }
    
    $swapCount = 0;
    while (count($outOfOrder)) {
        foreach ($outOfOrder as $subject => &$subjectIndex) {
            $targetIndex = $subject - 1;
            $target = $arr[$targetIndex];

            if ($target == ($subjectIndex + 1)) {
                swapArrayItems($arr, $subjectIndex, $targetIndex);
                $swapCount++;
                unset($outOfOrder[$subject], $outOfOrder[$targetIndex]);
            }
        }

        foreach ($outOfOrder as $subject => &$subjectIndex) {
            if ($arr[$subject - 1] == $subject) {
                unset($outOfOrder[$subject]);
            } else {
                $targetIndex = $subject - 1;
                $target = $arr[$targetIndex];
                swapArrayItems($arr, $subjectIndex, $targetIndex);
                $swapCount++;
                $outOfOrder[$target] = $subjectIndex;
                unset($outOfOrder[$subject]);   
            }
        }
    }

    return $swapCount;
}

function swapArrayItems(&$arr, $i, $j) {
    $swap = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $swap;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$n = intval(trim(fgets($fptr)));

$arr = array_map('intval', preg_split('/ /', trim(fgets($fptr)), -1, PREG_SPLIT_NO_EMPTY));

$result = minimumSwaps($arr);

echo 'Result : ' . $result;
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, $result . "\n");
fclose($fptr);