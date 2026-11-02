<?php
declare(strict_types=1);

interface Observer
{
    public function update(float $grade): void;
}
class GradeSystem
{
    /** @var Observer[] */
    private array $observers = [];
    public function attach(Observer $observer): void { $this->observers[] = $observer; }
    public function detach(Observer $observer): void
    {
        $this->observers = array_values(array_filter($this->observers, fn($item) => $item !== $observer));
    }
    public function updateGrade(float $grade): void
    {
        echo 'Grade updated: ' . number_format($grade, 2) . PHP_EOL . PHP_EOL;
        foreach ($this->observers as $observer) { $observer->update($grade); }
    }
}
class StudentPortal implements Observer
{
    public function update(float $grade): void { echo "Student Portal:" . PHP_EOL . "New grade posted: " . number_format($grade, 2) . PHP_EOL . PHP_EOL; }
}
class EmailNotification implements Observer
{
    public function update(float $grade): void { echo "Email Notification:" . PHP_EOL . "Your grade has been updated to " . number_format($grade, 2) . "." . PHP_EOL . PHP_EOL; }
}
class ParentNotification implements Observer
{
    public function update(float $grade): void { echo "Parent Notification:" . PHP_EOL . "Student grade has been posted: " . number_format($grade, 2) . PHP_EOL . PHP_EOL; }
}
