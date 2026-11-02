<?php
require_once __DIR__ . '/classes.php';

$calculator = new GradeCalculator(new SimpleAverageStrategy());
$grades = [85, 90, 90];
echo "Strategy: Simple Average" . PHP_EOL;
echo 'Result: ' . number_format($calculator->calculate($grades), 2) . PHP_EOL . PHP_EOL;

$calculator->setStrategy(new WeightedAverageStrategy());
$weightedItems = [
    ['grade' => 88, 'weight' => 0.30],
    ['grade' => 92, 'weight' => 0.30],
    ['grade' => 94, 'weight' => 0.40],
];
echo "Strategy: Weighted Average" . PHP_EOL;
echo 'Result: ' . number_format($calculator->calculate($weightedItems), 2) . PHP_EOL . PHP_EOL;

$calculator->setStrategy(new TransmutedGradeStrategy());
echo "Strategy: Transmuted Grade (additional challenge)" . PHP_EOL;
echo 'Result: ' . number_format($calculator->calculate($grades), 2) . PHP_EOL;
