<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

require __DIR__ . "/../../vendor/autoload.php";
require __DIR__ . "/../../config/bootstrap.php";

use TimePHP\Foundation\Router;

$router = new Router($options, $twig->getRenderer());

$router->initialize($routes)->run();