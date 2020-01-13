<?php

/**
 * Entry point of the app
 * 
 * PHP version 7.4.1
 * 
 * @category Router
 * @link http://domaine.com
 */

// Charge l'ensemble des classes et le fichier function.php via composer.json
require __DIR__ . "/../../vendor/autoload.php";

use TimePHP\Foundation\Router;

$router = new Router();

// Routes disponibles
$router
    ->get("/", "HomeController#getUsers", "home")
    ->get("/user/[i:idUser]", "HomeController#getArticleByUser", "articleByUser")
    ->get("/article/[i:idArticle]/[*:slug]", "HomeController#getFullArticle", "article")
    ->run();

