<?php
//
// Configure defaults for the whole application.
//
// Error reporting
error_reporting(0);
ini_set('display_errors', '0');

// Timezone
date_default_timezone_set('Europe/Berlin');

$config = [];

// Path
$root = dirname(__DIR__);
$config['root_path'] = $root;
$config['tmp_path'] = $root . '/tmp';
$config['log_path'] = $root . '/tmp/log';
$config['cache_path'] = $root . '/tmp/cache';
$config['public_path'] = $root . '/public';
$config['public_cache_path'] = $root . '/public/cache';
$config['assset_cache_path'] = $root . '/tmp/cache';
$config['assset_cache_ttl'] = 0;
$config['assets_path'] = $root . '/public';
$config['view_path'] = $root . '/src/View';
$config['locale_path'] = $root . '/resources/locale';
$config['migration_path'] = $root . '/resources/migrations';

// Application token
$config['app_secret'] = '{{app_secret}}';

// Logger
$config['log_level'] = \Monolog\Logger::ERROR;

// View
$config['assets_minify'] = 1;

// Session
$config['session_name'] = 'webapp';

// Database
$config['db'] = array(
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
    'flags' => [
        // Enable exceptions
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // Set default fetch mode
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

// SMTP
$config['smtp'] = array(
    'type' => 'smtp',
    'host' => '127.0.0.1',
    'port' => '25',
    'secure' => '',
    'from' => 'from@example.com',
    'from_name' => 'My name',
    'to' => 'to@example.com',
);

return $config;
