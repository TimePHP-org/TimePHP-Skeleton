<?php

namespace App\Index;

use App\Users\UsersRepository;

class IndexController{
    public function initIndex($base){
        $usersRepository = new UsersRepository($base);
        $usersRepository->createTable(); //creation of the users table
        $usersRepository->addValues(); // adding some values
        return $usersRepository->getLastThreeUsers(); // fetch the last three values
    }
}
