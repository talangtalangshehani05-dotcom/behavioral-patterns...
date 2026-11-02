<?php
require_once __DIR__ . '/classes.php';

$chat = new ChatMediator();
$juan = new StudentParticipant('Juan', $chat);
$maria = new StudentParticipant('Maria', $chat);
$pedro = new StudentParticipant('Pedro', $chat);
foreach ([$juan, $maria, $pedro] as $student) { $chat->register($student); }
$juan->send('Hello everyone!');
