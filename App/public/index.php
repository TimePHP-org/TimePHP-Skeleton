<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

require __DIR__ . "/../../vendor/autoload.php";
require __DIR__ . "/../../config/bootstrap.php";

use TimePHP\Foundation\Router;
use App\Bundle\Services\TestService;


$router = new Router($options, $twig->getRenderer(), $container);



$router->initialize($routes)->run();