<?php
declare(strict_types=1);

interface Mediator
{
    public function send(string $message, StudentParticipant $sender): void;
    public function register(StudentParticipant $student): void;
}
class ChatMediator implements Mediator
{
    /** @var StudentParticipant[] */
    private array $students = [];
    public function register(StudentParticipant $student): void { $this->students[] = $student; }
    public function send(string $message, StudentParticipant $sender): void
    {
        foreach ($this->students as $student) {
            if ($student !== $sender) { $student->receive($message, $sender->getName()); }
        }
    }
}
class StudentParticipant
{
    public function __construct(private string $name, private Mediator $mediator) {}
    public function getName(): string { return $this->name; }
    public function send(string $message): void
    {
        echo "{$this->name}: {$message}" . PHP_EOL . PHP_EOL;
        $this->mediator->send($message, $this);
    }
    public function receive(string $message, string $senderName): void
    {
        echo "{$this->name} receives:" . PHP_EOL . "{$senderName}: {$message}" . PHP_EOL . PHP_EOL;
    }
}
