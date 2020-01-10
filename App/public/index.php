<?php

/**
 * TODO Corriger le problème avec les variables dans les url car un est obligé de les convertir en int quand se sont des int.
 * TODO Ajouter le router->generate dans les pages twig
 */

// it loads my classes and the file functions.php thanks to the composer.json file
require __DIR__ . "/../../vendor/autoload.php";

use TimePHP\Foundation\Router;

$router = new Router();

// Routes disponibles
$router
    ->get("/", "HomeController#getUsers", "home")
    ->get("/user/[i:idUser]", "HomeController#getArticleByUser", "articleByUser")
    ->get("/article/[i:idArticle]/[*:slug]", "HomeController#getFullArticle", "fullArticle")
    ->run();

