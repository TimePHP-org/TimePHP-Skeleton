<?php


namespace App\Bundle\Controllers\Rest;

use TimePHP\Rest\AbstractRestController;
use App\Bundle\Repository\UserRepository;

class MainRestController extends AbstractRestController {


   public function mainRestFunction() {

      $users = UserRepository::getAllUsers();
        // $final = User::hydrate($user);
        
      return $this->renderJson($users);
      // return $this->renderJson([
      //    "message" => "Hello World !"
      // ]);
   }

}