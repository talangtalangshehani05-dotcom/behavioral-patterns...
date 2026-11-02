<?php
require_once __DIR__ . '/classes.php';

$records = [
    new StudentRecord('Juan Dela Cruz', 'BSIT'),
    new FacultyRecord('Prof. Santos', 'IT Department'),
    new AlumniRecord('Maria Reyes', 2024),
];

echo "CSV Export Visitor" . PHP_EOL;
$csv = new CSVExportVisitor();
foreach ($records as $record) { $record->accept($csv); }

echo PHP_EOL . "Report Visitor" . PHP_EOL;
$report = new ReportVisitor();
foreach ($records as $record) { $record->accept($report); }

$statistics = new StatisticsVisitor();
foreach ($records as $record) { $record->accept($statistics); }
echo PHP_EOL . 'Total records counted: ' . $statistics->count . PHP_EOL;

echo PHP_EOL . "PDF Report Visitor (formatted text demonstration, not a generated PDF file)" . PHP_EOL;
$pdf = new PDFReportVisitor();
foreach ($records as $record) { $record->accept($pdf); }
