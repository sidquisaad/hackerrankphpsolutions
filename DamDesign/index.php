<?php

/*
 * @Author: sidquisaad 
 * @Date: 2020-03-09 19:21:56 
 * @Last Modified by: sidquisaad
 * @Last Modified time: 2020-03-10 17:27:40
 */


/*
 * Complete the 'maxHeight' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY wallPositions
 *  2. INTEGER_ARRAY wallHeights
 */

function maxHeight($wallPositions, $wallHeights) {
    $maxHeight = 0;
    if (count($wallPositions) > 0) {
        $dam = [];
        $positionsLowerBound = $wallPositions[0];
        $positionsUpperBound = $wallPositions[count($wallPositions) - 1];
        foreach ($wallPositions as $i => $p) {
            $dam[$p] = $wallHeights[$i];

            for ($j = ($p + 1); $j < $positionsUpperBound; $j++) {
                if (in_array($j, $wallPositions))
                    break;

                $dam[$j] = null;
            }
        }

        $dam_foreward = $dam;
        $dam_backward = $dam;

        for ($i = ($positionsLowerBound + 1); $i < $positionsUpperBound; $i++){
            if ($dam_foreward[$i] === null)
                $dam_foreward[$i] = $dam_foreward[$i - 1] + 1;
        }

        for ($i = ($positionsUpperBound - 1); $i > $positionsLowerBound; $i--){
            if ($dam_backward[$i] === null)
                $dam_backward[$i] = $dam_backward[$i + 1] + 1;
        }

        for ($i = $positionsLowerBound; $i <= $positionsUpperBound; $i++) {
            $dam[$i] = min($dam_foreward[$i], $dam_backward[$i]);
            $maxHeight = ($dam[$i] > $maxHeight) ? $dam[$i] : $maxHeight;
        }
    }
    return $maxHeight;
}

$fptr = fopen(__DIR__ . '/test.txt', "r+");

$wallPositions_count = intval(trim(fgets($fptr)));

$wallPositions = array();

for ($i = 0; $i < $wallPositions_count; $i++) {
    $wallPositions_item = intval(trim(fgets($fptr)));
    $wallPositions[] = $wallPositions_item;
}

$wallHeights_count = intval(trim(fgets($fptr)));

$wallHeights = array();

for ($i = 0; $i < $wallHeights_count; $i++) {
    $wallHeights_item = intval(trim(fgets($fptr)));
    $wallHeights[] = $wallHeights_item;
}

$result = maxHeight($wallPositions, $wallHeights);
echo 'Result : ' . $result;
fclose($fptr);

$fptr = fopen(__DIR__ . '/result.txt', "w");
fwrite($fptr, $result . "\n");
fclose($fptr);