<?php

use TimePHP\Foundation\Twig;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$routes = require __DIR__ . "/routes.php";
$options = require __DIR__ . "/options.php";

$twig = new Twig($options);
