<?php

/**
 * @author Robin Bidanchon
 */

namespace TimePHP\Bundle\Controllers;

use TimePHP\Foundation\Controller; 
use PDO;


/**
 * @package TimePHP
 * @subpackage Bundle\Controller
 * @category Controller
 */
class HomeController extends Controller{

    /**
     * @see http://domaine.com/
     */
    public function getUsers(){
        $result = $this->client->query("SELECT * FROM User");
        echo $this->twig->render("home.twig", ["users" => $result]);
    }

    /**
     * @see http://domaine.com/user/[idUser]
     * @param int $idUser ID de l'utilisateur selectionné
     */
    public function getArticleByUser($idUser){
        $result = $this->client->prepare("SELECT * FROM Article WHERE id_User =  ?");
        $result->bindValue(1, strVal($idUser), PDO::PARAM_INT);
        $result->execute();
        echo $this->twig->render("articles.twig", ["articles" => $result]);
    }


    /**
     * @see http://domaine.com/article/[idUser]/[slug]
     * @param int $idArticle Correspond à l'id de l'article sur lequel on a cliqué
     * @param string $slug Designe le slug de l'article
     */
    public function getFullArticle($idArticle, $slug){
        $result = $this->client->prepare("SELECT * FROM Article WHERE id =  ?");
        $result->bindValue(1, strVal($idArticle), PDO::PARAM_INT);
        $result->execute();
        echo $this->twig->render("articleFull.twig", ["article" => $result->fetch()]);
    }
}