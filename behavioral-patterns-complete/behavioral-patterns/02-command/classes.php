<?php
declare(strict_types=1);

interface Command
{
    public function execute(): void;
    public function undo(): void;
    public function isReversible(): bool;
}

class StudentSystem
{
    private bool $enrolled = false;
    private array $subjects = ['IT101'];

    public function enroll(): void { $this->enrolled = true; echo "Student successfully enrolled." . PHP_EOL; }
    public function undoEnroll(): void { $this->enrolled = false; echo "Enrollment action undone." . PHP_EOL; }
    public function dropSubject(): void
    {
        if ($this->subjects !== []) {
            $dropped = array_pop($this->subjects);
            echo "Subject {$dropped} successfully dropped." . PHP_EOL;
        } else {
            echo "There are no subjects to drop." . PHP_EOL;
        }
    }
    public function restoreSubject(string $subject): void { $this->subjects[] = $subject; echo "Subject {$subject} restored." . PHP_EOL; }
    public function printRegistration(): void { echo "Registration printed." . PHP_EOL; }
    public function logout(): void { echo "Student logged out." . PHP_EOL; }
    public function lastSubject(): ?string { return $this->subjects === [] ? null : end($this->subjects); }
}

class EnrollCommand implements Command
{
    public function __construct(private StudentSystem $system) {}
    public function execute(): void { $this->system->enroll(); }
    public function undo(): void { $this->system->undoEnroll(); }
    public function isReversible(): bool { return true; }
}
class DropSubjectCommand implements Command
{
    private ?string $dropped = null;
    public function __construct(private StudentSystem $system) {}
    public function execute(): void
    {
        $this->dropped = $this->system->lastSubject();
        $this->system->dropSubject();
    }
    public function undo(): void
    {
        if ($this->dropped !== null) { $this->system->restoreSubject($this->dropped); }
    }
    public function isReversible(): bool { return true; }
}
class PrintRegistrationCommand implements Command
{
    public function __construct(private StudentSystem $system) {}
    public function execute(): void { $this->system->printRegistration(); }
    public function undo(): void {}
    public function isReversible(): bool { return false; }
}
class LogoutCommand implements Command
{
    public function __construct(private StudentSystem $system) {}
    public function execute(): void { $this->system->logout(); }
    public function undo(): void {}
    public function isReversible(): bool { return false; }
}
class CommandInvoker
{
    private array $history = [];
    public function run(Command $command, string $label): void
    {
        echo "Executing: {$label}" . PHP_EOL;
        $command->execute();
        if ($command->isReversible()) { $this->history[] = $command; }
        echo PHP_EOL;
    }
    public function undo(): void
    {
        echo "Undo" . PHP_EOL;
        $command = array_pop($this->history);
        if ($command) { $command->undo(); } else { echo "No reversible action to undo." . PHP_EOL; }
    }
}
