<?php
require_once __DIR__ . '/classes.php';

$studentAffairs = new StudentAffairsHandler();
$registrar = new RegistrarHandler();
$finance = new FinanceHandler();
$ict = new ICTHandler();

$studentAffairs->setNext($registrar)->setNext($finance)->setNext($ict);

$request = new StudentRequest('Transcript of Records');
echo "Request: {$request->type}" . PHP_EOL . PHP_EOL;
$studentAffairs->handle($request);
