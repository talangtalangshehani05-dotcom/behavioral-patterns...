<?php
require_once __DIR__ . '/classes.php';

$system = new StudentSystem();
$invoker = new CommandInvoker();

$invoker->run(new EnrollCommand($system), 'Enroll Student');
$invoker->run(new DropSubjectCommand($system), 'Drop Subject');
$invoker->undo();
$invoker->run(new PrintRegistrationCommand($system), 'Print Registration');
$invoker->run(new LogoutCommand($system), 'Logout');
