<?php
require_once __DIR__ . '/classes.php';

$grades = new GradeSystem();
$grades->attach(new StudentPortal());
$grades->attach(new EmailNotification());
$grades->attach(new ParentNotification());
$grades->updateGrade(1.75);
