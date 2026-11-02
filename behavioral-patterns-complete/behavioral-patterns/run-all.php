<?php
$folders = [
    '01-chain-of-responsibility', '02-command', '03-interpreter', '04-iterator',
    '05-mediator', '06-memento', '07-observer', '08-state', '09-strategy',
    '10-template-method', '11-visitor'
];
foreach ($folders as $folder) {
    echo PHP_EOL . str_repeat('=', 60) . PHP_EOL;
    echo strtoupper($folder) . PHP_EOL;
    echo str_repeat('=', 60) . PHP_EOL;
    passthru(PHP_BINARY . ' ' . escapeshellarg(__DIR__ . '/' . $folder . '/index.php'));
}
