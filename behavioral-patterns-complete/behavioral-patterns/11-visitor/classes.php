<?php
declare(strict_types=1);

interface Visitor
{
    public function visitStudent(StudentRecord $record): void;
    public function visitFaculty(FacultyRecord $record): void;
    public function visitAlumni(AlumniRecord $record): void;
}
interface Element
{
    public function accept(Visitor $visitor): void;
    public function getName(): string;
}
class StudentRecord implements Element
{
    public function __construct(private string $name, private string $program) {}
    public function getName(): string { return $this->name; }
    public function getProgram(): string { return $this->program; }
    public function accept(Visitor $visitor): void { $visitor->visitStudent($this); }
}
class FacultyRecord implements Element
{
    public function __construct(private string $name, private string $department) {}
    public function getName(): string { return $this->name; }
    public function getDepartment(): string { return $this->department; }
    public function accept(Visitor $visitor): void { $visitor->visitFaculty($this); }
}
class AlumniRecord implements Element
{
    public function __construct(private string $name, private int $graduationYear) {}
    public function getName(): string { return $this->name; }
    public function getGraduationYear(): int { return $this->graduationYear; }
    public function accept(Visitor $visitor): void { $visitor->visitAlumni($this); }
}
class CSVExportVisitor implements Visitor
{
    public function visitStudent(StudentRecord $record): void { echo 'Student exported: ' . $record->getName() . ', ' . $record->getProgram() . PHP_EOL; }
    public function visitFaculty(FacultyRecord $record): void { echo 'Faculty exported: ' . $record->getName() . ', ' . $record->getDepartment() . PHP_EOL; }
    public function visitAlumni(AlumniRecord $record): void { echo 'Alumni exported: ' . $record->getName() . ', ' . $record->getGraduationYear() . PHP_EOL; }
}
class ReportVisitor implements Visitor
{
    public function visitStudent(StudentRecord $record): void { echo 'Student report: ' . $record->getName() . ' (' . $record->getProgram() . ')' . PHP_EOL; }
    public function visitFaculty(FacultyRecord $record): void { echo 'Faculty report: ' . $record->getName() . ' (' . $record->getDepartment() . ')' . PHP_EOL; }
    public function visitAlumni(AlumniRecord $record): void { echo 'Alumni report: ' . $record->getName() . ' (Class of ' . $record->getGraduationYear() . ')' . PHP_EOL; }
}
class StatisticsVisitor implements Visitor
{
    public int $count = 0;
    public function visitStudent(StudentRecord $record): void { $this->count++; }
    public function visitFaculty(FacultyRecord $record): void { $this->count++; }
    public function visitAlumni(AlumniRecord $record): void { $this->count++; }
}
class PDFReportVisitor implements Visitor
{
    public function visitStudent(StudentRecord $record): void { echo '[PDF-style] Student: ' . $record->getName() . ' — ' . $record->getProgram() . PHP_EOL; }
    public function visitFaculty(FacultyRecord $record): void { echo '[PDF-style] Faculty: ' . $record->getName() . ' — ' . $record->getDepartment() . PHP_EOL; }
    public function visitAlumni(AlumniRecord $record): void { echo '[PDF-style] Alumni: ' . $record->getName() . ' — ' . $record->getGraduationYear() . PHP_EOL; }
}
