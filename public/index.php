<?php

define('DS', DIRECTORY_SEPARATOR);
define('BP', __DIR__ . DS . '..' . DS);
define('VENDOR_PATH', BP . DS . 'vendor' . DS);
define('CONFIG_PATH', BP . DS . 'config'. DS);
define('VAR_PATH', BP . DS . 'var' . DS);

require_once VENDOR_PATH . 'autoload.php';

$env = 'dev';
$debug = true;

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$kernel = new \Eccube\Core\Kernel($env, $debug);

$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);