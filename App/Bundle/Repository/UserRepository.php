<?php

namespace App\Bundle\Repository;

use App\Bundle\Entity\User;
use Illuminate\Database\Capsule\Manager;

class UserRepository {
   
   public static function getAllUsers(){
      $users = User::all();
      return $users;
   }

   public static function getUser(string $username){
      $query = Manager::select("SELECT * FROM User WHERE username = ?", [$username]);
      return $query;
   }

}