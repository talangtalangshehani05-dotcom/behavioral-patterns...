<?php
declare(strict_types=1);

class Student
{
    public function __construct(
        private string $id,
        private string $name
    ) {}
    public function getId(): string { return $this->id; }
    public function getName(): string { return $this->name; }
}
class StudentCollection implements IteratorAggregate, Countable
{
    /** @var Student[] */
    private array $students = [];
    public function add(Student $student): void { $this->students[] = $student; }
    public function getIterator(): Traversable { yield from $this->students; }
    public function count(): int { return count($this->students); }
}
