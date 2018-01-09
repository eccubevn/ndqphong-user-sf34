<?php

define('DS', DIRECTORY_SEPARATOR);
define('PUBLIC_DIR', __DIR__);
define('PROJECT_DIR', str_replace(DS . 'public', '', PUBLIC_DIR) . DS);
define('VENDOR_PATH', PROJECT_DIR . 'vendor' . DS);
define('CONFIG_PATH', PROJECT_DIR . 'config'. DS);
define('VAR_PATH', PROJECT_DIR . 'var' . DS);
define('SRC_PATH', PROJECT_DIR . 'src' . DS);

require_once VENDOR_PATH . 'autoload.php';

$env = 'dev';
$debug = true;

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$kernel = new \Eccube\Core\Kernel($env, $debug);

$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);