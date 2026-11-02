<?php
declare(strict_types=1);

class StudentProfileMemento
{
    public function __construct(private array $state) {}
    public function getState(): array { return $this->state; }
}
class StudentProfile
{
    private array $state;
    public function __construct(string $name, string $program, int $year, string $email)
    {
        $this->state = compact('name', 'program', 'year', 'email');
    }
    public function change(string $field, mixed $value): void
    {
        if (!array_key_exists($field, $this->state)) { throw new InvalidArgumentException('Unknown profile field.'); }
        $this->state[$field] = $value;
    }
    public function save(): StudentProfileMemento { return new StudentProfileMemento($this->state); }
    public function restore(StudentProfileMemento $memento): void { $this->state = $memento->getState(); }
    public function display(): void
    {
        foreach ($this->state as $key => $value) {
            echo ucfirst($key) . ': ' . $value . PHP_EOL;
        }
    }
}
class ProfileHistory
{
    private array $history = [];
    public function push(StudentProfileMemento $memento): void { $this->history[] = $memento; }
    public function pop(): ?StudentProfileMemento { return array_pop($this->history) ?: null; }
}
