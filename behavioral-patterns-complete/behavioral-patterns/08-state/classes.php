<?php
declare(strict_types=1);

interface EnrollmentState
{
    public function name(): string;
    public function enroll(StudentEnrollment $student): void;
}
class ApplicantState implements EnrollmentState
{
    public function name(): string { return 'Applicant'; }
    public function enroll(StudentEnrollment $student): void { echo "Student must complete pre-assessment first." . PHP_EOL; }
}
class PreAssessedState implements EnrollmentState
{
    public function name(): string { return 'Pre-Assessed'; }
    public function enroll(StudentEnrollment $student): void
    {
        echo "Student successfully enrolled." . PHP_EOL;
        $student->setState(new EnrolledState());
    }
}
class EnrolledState implements EnrollmentState
{
    public function name(): string { return 'Enrolled'; }
    public function enroll(StudentEnrollment $student): void { echo "Student is already enrolled." . PHP_EOL; }
}
class DroppedState implements EnrollmentState
{
    public function name(): string { return 'Dropped'; }
    public function enroll(StudentEnrollment $student): void { echo "Dropped students must contact the registrar to re-enroll." . PHP_EOL; }
}
class GraduatedState implements EnrollmentState
{
    public function name(): string { return 'Graduated'; }
    public function enroll(StudentEnrollment $student): void { echo "Graduated students cannot enroll in this program again." . PHP_EOL; }
}
class StudentEnrollment
{
    public function __construct(private EnrollmentState $state = new ApplicantState()) {}
    public function setState(EnrollmentState $state): void { $this->state = $state; }
    public function getStateName(): string { return $this->state->name(); }
    public function enroll(): void { $this->state->enroll($this); }
}
