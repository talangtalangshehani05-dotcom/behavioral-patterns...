<?php
declare(strict_types=1);

interface GradeStrategy
{
    public function calculate(array $grades): float;
}
class SimpleAverageStrategy implements GradeStrategy
{
    public function calculate(array $grades): float
    {
        if ($grades === []) { throw new InvalidArgumentException('At least one grade is required.'); }
        return array_sum($grades) / count($grades);
    }
}
class WeightedAverageStrategy implements GradeStrategy
{
    /** @param array<int, array{grade: float|int, weight: float|int}> $items */
    public function calculate(array $items): float
    {
        $weightedSum = 0.0;
        $totalWeight = 0.0;
        foreach ($items as $item) {
            $weightedSum += $item['grade'] * $item['weight'];
            $totalWeight += $item['weight'];
        }
        if ($totalWeight <= 0) { throw new InvalidArgumentException('Total weight must be greater than zero.'); }
        return $weightedSum / $totalWeight;
    }
}
class TransmutedGradeStrategy implements GradeStrategy
{
    public function calculate(array $grades): float
    {
        if ($grades === []) { throw new InvalidArgumentException('At least one grade is required.'); }
        $average = array_sum($grades) / count($grades);
        return max(60.0, min(100.0, 60.0 + ($average * 0.4)));
    }
}
class GradeCalculator
{
    public function __construct(private GradeStrategy $strategy) {}
    public function setStrategy(GradeStrategy $strategy): void { $this->strategy = $strategy; }
    public function calculate(array $grades): float { return $this->strategy->calculate($grades); }
}
