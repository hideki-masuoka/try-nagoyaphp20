<?php

$priceList = [0,210,240,270,300];
$sample = ['A,1,B,2,C|A|B', 210];

$a = explode('|', $sample[0]);

//var_export($a);

$b = explode(',', $a[0]);

//var_export($b);

$check = null;

$number = 0;

foreach($b as $v) {
    //    echo $v . PHP_EOL;

    if('start' === $check) {
        $number += (int)$v;
    }
    if($v === $a[1]) {
        $check = 'start';
    } elseif ($v === $a[2]) {
        $check = 'end';
    }
}

//echo PHP_EOL . $number . PHP_EOL;

//echo PHP_EOL . ($priceList[$number] ?? 0) . PHP_EOL;

function usoEkiNet(string $rosen, int $answer): ?int
{
    $priceList = [0,210,240,270,300];
    $a = explode('|', $rosen);
    $b = explode(',', $a[0]);
    $c = [$a[1], $a[2]];
    sort($c);
    $check = null;

    $number = 0;

    foreach ($b as $v) {

        if ('start' === $check) {
            $number += (int)$v;
        }
        if ($v === $c[0]) {
            $check = 'start';
        } elseif ($v === $c[1]) {
            $check = 'end';
        }
    }
    $result = $priceList[$number] ?? 0;
    return $result === $answer ? $result : null;
}


$data = include_once 'sampleData.php';

foreach ($data as $rosen) {
    echo PHP_EOL . usoEkiNet($rosen[0], $rosen[1]) . PHP_EOL;
}


exit;
