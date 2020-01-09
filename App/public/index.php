<?php

require __DIR__ . "/../../vendor/autoload.php";

use TimePHP\Foundation\Router;

$router = new Router();

$router->get("/", "HomeController#getData", "home");

$router->run();

