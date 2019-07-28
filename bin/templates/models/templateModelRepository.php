<?php

namespace App\TemplateModel;

use PDO;
use App\TemplateModel\TemplateModel;
use App\Repository\Repository;


class TemplateModelRepository{

    private $db;

    public function __construct(Repository $db){
        $this->db = $db;
    }

    // Functions to get some data from the database

}
