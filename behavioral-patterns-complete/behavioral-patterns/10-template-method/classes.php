<?php
declare(strict_types=1);

abstract class Report
{
    final public function generateReport(): void
    {
        $this->header();
        $data = $this->retrieveData();
        $this->formatData($data);
        $this->footer();
    }
    protected function header(): void
    {
        echo "========================" . PHP_EOL;
        echo strtoupper($this->title()) . PHP_EOL;
        echo "========================" . PHP_EOL;
    }
    protected function footer(): void
    {
        echo "========================" . PHP_EOL;
        echo "END OF REPORT" . PHP_EOL;
        echo "========================" . PHP_EOL;
    }
    abstract protected function title(): string;
    abstract protected function retrieveData(): array;
    abstract protected function formatData(array $data): void;
}
class StudentReport extends Report
{
    protected function title(): string { return 'Student Report'; }
    protected function retrieveData(): array { return ['id' => '2026-001', 'name' => 'Juan Dela Cruz', 'program' => 'BSIT']; }
    protected function formatData(array $data): void
    {
        echo 'Student ID: ' . $data['id'] . PHP_EOL . PHP_EOL;
        echo 'Name: ' . $data['name'] . PHP_EOL . PHP_EOL;
        echo 'Program: ' . $data['program'] . PHP_EOL;
    }
}
class GradeReport extends Report
{
    protected function title(): string { return 'Grade Report'; }
    protected function retrieveData(): array { return ['name' => 'Juan Dela Cruz', 'subject' => 'Programming 2', 'grade' => 1.75]; }
    protected function formatData(array $data): void
    {
        echo 'Student: ' . $data['name'] . PHP_EOL;
        echo 'Subject: ' . $data['subject'] . PHP_EOL;
        echo 'Grade: ' . number_format($data['grade'], 2) . PHP_EOL;
    }
}
class EnrollmentReport extends Report
{
    protected function title(): string { return 'Enrollment Report'; }
    protected function retrieveData(): array { return ['id' => '2026-001', 'program' => 'BSIT', 'status' => 'Enrolled']; }
    protected function formatData(array $data): void
    {
        echo 'Student ID: ' . $data['id'] . PHP_EOL;
        echo 'Program: ' . $data['program'] . PHP_EOL;
        echo 'Status: ' . $data['status'] . PHP_EOL;
    }
}
