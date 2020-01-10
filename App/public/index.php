<?php

// it requires my classes and the file functions.php
require __DIR__ . "/../../vendor/autoload.php";

use TimePHP\Foundation\Router;

$router = new Router();

$router->get("/", "HomeController#getUsers", "home");
$router->get("/user/[i:idUser]", "HomeController#getArticleByUser", "articleByUser");
$router->get("/user/[i:idUser]/article/[i:idArticle]/[*:slug]", "HomeController#getFullArticle", "fullArticle");

$router->run();

