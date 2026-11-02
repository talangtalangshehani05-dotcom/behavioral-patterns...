<?php
require_once __DIR__ . '/classes.php';

$student = ['name' => 'Juan', 'program' => 'BSIT', 'year' => 4];
$parser = new StudentQueryParser();
$query = 'PROGRAM = "BSIT" AND YEAR = 4';
$expression = $parser->parse($query);

echo "Expression:" . PHP_EOL . $query . PHP_EOL . PHP_EOL;
echo 'Result: ' . ($expression->interpret($student) ? 'TRUE' : 'FALSE') . PHP_EOL . PHP_EOL;

$orQuery = 'PROGRAM = "BSIT" OR PROGRAM = "BSCS"';
echo "Challenge expression:" . PHP_EOL . $orQuery . PHP_EOL;
echo 'Result: ' . ($parser->parse($orQuery)->interpret($student) ? 'TRUE' : 'FALSE') . PHP_EOL;
