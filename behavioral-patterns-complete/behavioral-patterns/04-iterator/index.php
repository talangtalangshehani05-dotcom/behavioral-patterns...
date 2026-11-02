<?php
require_once __DIR__ . '/classes.php';

$students = new StudentCollection();
$students->add(new Student('2026-001', 'Juan'));
$students->add(new Student('2026-002', 'Maria'));
$students->add(new Student('2026-003', 'Pedro'));

echo "Student List" . PHP_EOL;
foreach ($students as $student) {
    echo $student->getId() . ' - ' . $student->getName() . PHP_EOL;
}
