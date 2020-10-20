<?php

use App\Bundle\Controllers\HomeController;

return [
   [
      "method" => "get",
      "url" => "/",
      "name" => "home",
      "controller" => HomeController::class,
      "function" => "home"
   ]
];
