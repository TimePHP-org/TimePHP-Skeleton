<?php

namespace App\Bundle\Services;

use PDO;

class TestService {

   public function getUsers() {
      return [
         "message" => "Hello World !"
      ];
   }

}