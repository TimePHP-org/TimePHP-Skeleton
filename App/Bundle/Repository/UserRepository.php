<?php

namespace App\Bundle\Repository;

use App\Bundle\Entity\User;
use Illuminate\Database\Capsule\Manager;

class UserRepository {

   public function getAllUsers(){
      $users = User::all();
      return $users;
   }
   
}