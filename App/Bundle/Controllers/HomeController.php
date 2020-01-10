<?php

namespace TimePHP\Bundle\Controllers;

use TimePHP\Foundation\Controller; 
use PDO;

class HomeController extends Controller{

    public function getUsers(){
        $result = $this->client->query("SELECT * FROM User");
        echo $this->twig->render("home.twig", ["users" => $result]);
    }

    public function getArticleByUser($idUser){
        $result = $this->client->prepare("SELECT * FROM Article WHERE id_User =  ?");
        $result->bindValue(1, strVal($idUser), PDO::PARAM_INT);
        $result->execute();
        echo $this->twig->render("articles.twig", ["articles" => $result]);
    }

    public function getFullArticle($idArticle, $slug){
        $result = $this->client->prepare("SELECT * FROM Article WHERE id =  ?");
        $result->bindValue(1, strVal($idArticle), PDO::PARAM_INT);
        $result->execute();
        echo $this->twig->render("articleFull.twig", ["article" => $result->fetch()]);
    }
}