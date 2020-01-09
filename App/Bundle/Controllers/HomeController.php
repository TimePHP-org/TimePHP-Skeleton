<?php

namespace TimePHP\Bundle\Controllers;

use MongoDB\Client;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use TimePHP\Foundation\Controller;

class HomeController extends Controller{


    /**
     * @return Twig
     */
    public function getData(){

        $client = new Client("mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass%20Community&ssl=false");

        $db = $client->dbTest;
        $table = $db->test;
    
        $result = $table->find([], ["limit" => 10]);
        echo $this->twig->render("home.twig", ["result" => $result]);

    }
}