<?php
require_once __DIR__ . '/classes.php';

$profile = new StudentProfile('Juan Dela Cruz', 'BSIT', 3, 'juan@example.com');
$history = new ProfileHistory();
$history->push($profile->save());

echo "Original Profile:" . PHP_EOL;
$profile->display();

$profile->change('program', 'BSCS');
$profile->change('year', 4);
echo PHP_EOL . "Current Profile:" . PHP_EOL;
$profile->display();

echo PHP_EOL . "Undo..." . PHP_EOL;
$previous = $history->pop();
if ($previous) { $profile->restore($previous); }
echo "Restored Profile:" . PHP_EOL;
$profile->display();
