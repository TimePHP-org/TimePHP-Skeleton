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
      "url" => "/home3",
      "name" => "home3",
      "function" => function() {
         echo "hello you !";
      }
   ]
   
];