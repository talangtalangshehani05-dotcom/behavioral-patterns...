<?php
require_once __DIR__ . '/classes.php';

$student = new StudentEnrollment();
echo 'Current State: ' . $student->getStateName() . PHP_EOL;
echo "Action: Enroll" . PHP_EOL . "Result:" . PHP_EOL;
$student->enroll();

echo PHP_EOL . "Changing state to Pre-Assessed..." . PHP_EOL;
$student->setState(new PreAssessedState());
echo 'Current State: ' . $student->getStateName() . PHP_EOL;
echo "Action: Enroll" . PHP_EOL . "Result:" . PHP_EOL;
$student->enroll();
echo 'New State: ' . $student->getStateName() . PHP_EOL;
