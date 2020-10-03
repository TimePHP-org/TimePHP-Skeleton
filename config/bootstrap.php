<?php

use TimePHP\Foundation\Twig;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Symfony\Component\Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$routes = require __DIR__ . "/../web/routes.php";
$options = require __DIR__ . "/options.php";

$twig = new Twig($options);

$builder = new \DI\ContainerBuilder();
$builder->useAutowiring(true);
$builder->addDefinitions(__DIR__ . "/container/services.php");
$builder->addDefinitions(__DIR__ . "/container/repositories.php");
$container = $builder->build();

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