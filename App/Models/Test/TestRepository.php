<?php

namespace App\Test;

use PDO;
use App\Test\Test;
use App\Repository\Repository;


class TestRepository{

    private $db;

    public function __construct(Repository $db){
        $this->db = $db;
    }

    // Functions to get some data from the database

}
