<?php
declare(strict_types=1);

interface Expression
{
    public function interpret(array $student): bool;
}
class TerminalExpression implements Expression
{
    public function __construct(private string $field, private mixed $value) {}
    public function interpret(array $student): bool
    {
        return isset($student[$this->field]) && $student[$this->field] == $this->value;
    }
}
class AndExpression implements Expression
{
    public function __construct(private Expression $left, private Expression $right) {}
    public function interpret(array $student): bool
    {
        return $this->left->interpret($student) && $this->right->interpret($student);
    }
}
class OrExpression implements Expression
{
    public function __construct(private Expression $left, private Expression $right) {}
    public function interpret(array $student): bool
    {
        return $this->left->interpret($student) || $this->right->interpret($student);
    }
}
class StudentQueryParser
{
    public function parse(string $query): Expression
    {
        if (preg_match('/^\s*(PROGRAM|YEAR)\s*=\s*(?:"([^"]+)"|(\d+))\s*$/i', $query, $m)) {
            $field = strtoupper($m[1]) === 'PROGRAM' ? 'program' : 'year';
            $value = $m[2] !== '' ? $m[2] : (int)$m[3];
            return new TerminalExpression($field, $value);
        }
        $parts = preg_split('/\s+(AND|OR)\s+/i', trim($query), -1, PREG_SPLIT_DELIM_CAPTURE);
        if (count($parts) === 3) {
            $left = $this->parse($parts[0]);
            $right = $this->parse($parts[2]);
            return strtoupper($parts[1]) === 'AND'
                ? new AndExpression($left, $right)
                : new OrExpression($left, $right);
        }
        throw new InvalidArgumentException("Unsupported query syntax: {$query}");
    }
}
