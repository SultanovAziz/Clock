<?php

define('ROOT',dirname(__DIR__));
define('DEBUG',1);
define('APP',ROOT.'/app');
define('CONF',ROOT.'/config');
define('CACHE',ROOT.'/tmp/cache');
define('WWW',ROOT.'/public');
define('LAYOUT','default');
define('CORE',ROOT.'/vendor/clock/core');
define('LIBS',CORE.'/libs');


$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = str_replace('/public/index.php','',$app_path);

define('PATH',$app_path);
define('ADMIN',PATH.'/admin');

require_once ROOT.'/vendor/autoload.php';