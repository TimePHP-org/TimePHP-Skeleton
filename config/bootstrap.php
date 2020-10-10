<?php

use Whoops\Run;
use TimePHP\Foundation\Twig;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Symfony\Component\Dotenv\Dotenv;
use Whoops\Handler\PrettyPageHandler;
use Illuminate\Database\Capsule\Manager;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

if($_ENV["APP_ENV"] == 1){
   $whoops = new Run;
   $whoops->pushHandler(new PrettyPageHandler);
   $whoops->register();
} else if($_ENV["APP_ENV"] == 0) {
   error_reporting(0);
}

session_start();

$routes = require __DIR__ . "/../web/routes.php";
$options = require __DIR__ . "/options.php";

$twig = new Twig($options);

$capsule = new Manager;
$capsule->addConnection([
   'driver'    => 'mysql',
   'host'      => $_ENV['DB_HOST'],
   'database'  => $_ENV['DB_NAME'],
   'username'  => $_ENV['DB_USER'],
   'password'  => $_ENV['DB_PASS'],
   'port'      => $_ENV['DB_PORT'],
   'charset'   => 'utf8',
   'collation' => 'utf8_unicode_ci',
   'prefix'    => '',
   ]);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();