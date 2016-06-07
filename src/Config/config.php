<?php

// Defaults
$defaults = read(__DIR__ . '/application.php');

// Load environment configuration
$environment = [];
if (file_exists(__DIR__ . '/../../environment.php')) {
    $environment = read(__DIR__ . '/../../environment.php');
}
if (file_exists(__DIR__ . '/environment.php')) {
    $environment = read(__DIR__ . '/environment.php');
}
$config = [];
if (isset($environment['env']['name'])) {
    $config = read(__DIR__ . '/' . $environment['env']['name'] . '.php');
}

return array_replace_recursive($defaults, $config, $environment);