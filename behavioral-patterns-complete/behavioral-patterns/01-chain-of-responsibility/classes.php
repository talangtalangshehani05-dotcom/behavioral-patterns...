<?php
declare(strict_types=1);

class StudentRequest
{
    public function __construct(
        public readonly string $type
    ) {}
}

abstract class RequestHandler
{
    protected ?RequestHandler $next = null;

    public function setNext(RequestHandler $handler): RequestHandler
    {
        $this->next = $handler;
        return $handler;
    }

    public function handle(StudentRequest $request): void
    {
        if ($this->canHandle($request)) {
            echo static::class . ": Processing {$request->type}..." . PHP_EOL;
            return;
        }

        echo $this->label() . ": Cannot process request." . PHP_EOL;
        if ($this->next !== null) {
            $this->next->handle($request);
        } else {
            echo "No office could process this request." . PHP_EOL;
        }
    }

    abstract protected function canHandle(StudentRequest $request): bool;
    abstract protected function label(): string;
}

class StudentAffairsHandler extends RequestHandler
{
    protected function canHandle(StudentRequest $request): bool
    {
        return in_array($request->type, ['Good Moral Certificate', 'Student ID Concern'], true);
    }
    protected function label(): string { return 'Student Affairs'; }
}
class RegistrarHandler extends RequestHandler
{
    protected function canHandle(StudentRequest $request): bool
    {
        return in_array($request->type, ['Certificate of Enrollment', 'Transcript of Records'], true);
    }
    protected function label(): string { return 'Registrar'; }
}
class FinanceHandler extends RequestHandler
{
    protected function canHandle(StudentRequest $request): bool
    {
        return $request->type === 'Payment Concern';
    }
    protected function label(): string { return 'Finance'; }
}
class ICTHandler extends RequestHandler
{
    protected function canHandle(StudentRequest $request): bool
    {
        return $request->type === 'System Account Concern';
    }
    protected function label(): string { return 'ICT'; }
}
