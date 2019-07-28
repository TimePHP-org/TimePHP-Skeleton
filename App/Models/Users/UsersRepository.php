<?php

namespace App\Users;

use PDO;
use App\Users\Users;
use App\Repository\Repository;


class UsersRepository{

    private $db;

    public function __construct(Repository $db){
        $this->db = $db;
    }

    public function getLastThreeUsers(){
        $response = $this->db->query("SELECT * FROM Users LIMIT 3");
        $listeReturn = array();
        while($row = $response->fetch(PDO::FETCH_ASSOC)){
            array_push($listeReturn, $row);
        }
        return $listeReturn;
    }

    public function createTable(){
        $response = $this->db->query("CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30),
            age int(3)
        )");
    }

    public function addValues(){
        $response = $this->db->query("INSERT INTO users(name, age) VALUES('Michel', 12)");
        $response = $this->db->query("INSERT INTO users(name, age) VALUES('Paul', 53)");
        $response = $this->db->query("INSERT INTO users(name, age) VALUES('Pierre', 43)");
    }
}
