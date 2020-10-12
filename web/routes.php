<?php

use App\Bundle\Controllers\MainController;
use App\Bundle\Controllers\Rest\MainRestController;

return [
   [
      "method" => "get",
      "type" => "web",
      "url" => "/",
      "name" => "home",
      "controller" => MainController::class,
      "function" => "mainFunction"
   ],
   [
      "method" => "get",
      "type" => "web",
      "prefix" => "/web",  // optional (default none for type web)
      "url" => "/slug/[s:slug]",
      "name" => "slug",
      "controller" => MainController::class,
      "function" => "mainFunction2"
   ],
   [
      "method" => "get",
      "type" => "web",
      "prefix" => "/web",
      "url" => "/function/[i:test]",
      "name" => "function",
      "function" => function(int $test) {
         dd($test);
      }
   ],
   [
      "method" => "get",
      "type" => "web",
      "prefix" => "/web",
      "url" => "/connexion",
      "name" => "connexion",
      "controller" => MainController::class,
      "function" => "connexion"
   ],
   [
      "method" => "get",
      "type" => "web",
      "prefix" => "/web",
      "url" => "/deconnexion",
      "name" => "deconnexion",
      "controller" => MainController::class,
      "function" => "deconnexion"
   ],
   [
      "method" => "get",
      "type" => "api",
      "prefix" => "/api", // optional (default /api for type api)
      "url" => "/test",
      "name" => "api_test",
      "controller" => MainRestController::class,
      "function" => "mainRestFunction"
   ]
];