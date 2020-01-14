<?php

/**
 * Short description here.
 *
 * PHP version 5
 *
 * @category Foo
 * @package Foo_Helpers
 * @author Marty McFly <mmcfly@example.com>
 * @copyright 2013-2014 Foo Inc.
 * @license MIT License
 * @link http://example.com
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

