<?php

use App\Bundle\Controllers\MainController;

return [
   [
      "method" => "get",
      "url" => "/",
      "name" => "home",
      "controller" => MainController::class,
      "function" => "mainFunction"
   ],
   [
      "method" => "get",
      "url" => "/slug/[s:slug]",
      "name" => "slug",
      "controller" => MainController::class,
      "function" => "mainFunction2"
   ],
   [
      "method" => "get",
      "url" => "/function",
      "name" => "function",
      "function" => function() {
         echo "hello you !";
      }
   ],
   [
      "method" => "get",
      "url" => "/connexion",
      "name" => "connexion",
      "controller" => MainController::class,
      "function" => "connexion"
   ],
   [
      "method" => "get",
      "url" => "/deconnexion",
      "name" => "deconnexion",
      "controller" => MainController::class,
      "function" => "deconnexion"
   ]
   
];