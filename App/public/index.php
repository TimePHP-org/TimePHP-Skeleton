<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

require __DIR__ . "/../../vendor/autoload.php";

use TimePHP\Foundation\Router;

$router = new Router();

$router
    ->get("/", "MainController#mainFunction", "home")
    ->run();