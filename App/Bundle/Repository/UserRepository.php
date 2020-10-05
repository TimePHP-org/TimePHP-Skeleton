<?php

namespace App\Bundle\Repository;

use App\Bundle\Entity\User;
use Illuminate\Database\Capsule\Manager;

class UserRepository {

   public function getAllUsers(){
      $users = User::all();
      return $users;
   }

   public function getUser(string $username){
      $query = Manager::select("SELECT * FROM User WHERE username = ?", [$username]);
      return $query;
   }
   
}