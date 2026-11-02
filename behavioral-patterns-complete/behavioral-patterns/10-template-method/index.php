<?php
require_once __DIR__ . '/classes.php';

$report = new StudentReport();
$report->generateReport();

echo PHP_EOL;
(new GradeReport())->generateReport();
echo PHP_EOL;
(new EnrollmentReport())->generateReport();
