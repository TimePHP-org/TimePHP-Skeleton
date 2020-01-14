<?php

/**
 * Point d'entrée de l'application
 *
 * PHP version 7.4.1
 *
 * @category Controller
 */

// Charge l'ensemble des classes et le fichier function.php via composer.json
require __DIR__ . "/../../vendor/autoload.php";

use TimePHP\Foundation\Router;

$router = new Router();

// Routes disponibles
$router
    ->get("/", "HomeController#getUsers", "home")
    ->get("/user/[i:idUser]", "HomeController#getArticleByUser", "articleByUser")
    ->get("/article/[i:idArticle]/[*:slug]", "HomeController#fullArticle", "article")
    ->get("/liste", "RiumController#getCompany", "allCompany")
    ->run();

