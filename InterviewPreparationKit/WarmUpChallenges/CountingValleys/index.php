<?php

/*
 * @Author: sidquisaad 
 * @Date: 2020-03-09 18:02:25 
 * @Last Modified by: sidquisaad
 * @Last Modified time: 2020-03-10 17:29:09
 */


// Complete the countingValleys function below.
function countingValleys($n, $s) {
    $level = 0;
    $valeys = 0;

    for ($i=0; $i < $n; $i++) {
        switch ($s[$i]) {
            case 'U':
                if ($level == -1)
                    $valeys++;
                $level++;
                break;
            
            default:
                $level--;
                break;
        }
    }

    return $valeys;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$n = intval(trim(fgets($fptr)));

$s = trim(fgets($fptr));

$result = countingValleys($n, $s);
echo 'Result : ' . $result;
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, $result . "\n");
fclose($fptr);