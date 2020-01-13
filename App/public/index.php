<?php

/**
 * Entry point of the app
 * 
 * PHP version 7.4.1
 * 
 * @category Router
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 * @license MPL-2.0 License
 * @link http://domaine.com
 */

// it loads my classes and the file functions.php thanks to the composer.json file
require __DIR__ . "/../../vendor/autoload.php";

use TimePHP\Foundation\Router;

$router = new Router();

// Routes disponibles
$router
->get("/", "HomeController#getUsers", "home")
->get("/user/[i:idUser]", "HomeController#getArticleByUser", "articleByUser")
->get("/article/[i:idArticle]/[*:slug]", "HomeController#getFullArticle", "article")
->run();

