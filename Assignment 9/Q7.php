<?php

class EmptyArrayException extends Exception {}

function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new EmptyArrayException("No numbers provided");
    }
    $sum = array_sum($numbers);
    $count = count($numbers);
    return $sum / $count;
}


$testArrays = [
    [10, 20, 30, 40, 50], // valid
    [],                   // empty
    [100, 200]            // valid
];

foreach ($testArrays as $arr) {
    try {
        $avg = calculateAverage($arr);
        echo "Numbers: [" . implode(", ", $arr) . "] → Average = <b>$avg</b><br>";
    } catch (EmptyArrayException $e) {
        echo "Numbers: [] → Error: " . $e->getMessage() . "<br>";
    }
}
?>

