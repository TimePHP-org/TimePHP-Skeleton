<?php

namespace TimePHP\Bundle\Controllers;

use PDO;
use TimePHP\Foundation\Router;
use TimePHP\Foundation\Controller; 

/**
 * Controller de la page d'accueil
 * 
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controller
 * @link http://domaine.com/liste
 */
class RiumController extends Controller
{

    /**
     * Récupère l'ensemble des utilisateurs
     * 
     * @see http://domaine.com/liste
     */
    public function getCompany()
    {
        $start = microtime(true);
        $lst_result = $this->client->query("SELECT * FROM app_bundle_company");
        $end = microtime(true);
        
        echo $this->twig->render("companies.twig", [
            "companies" => $lst_result,
            "time" => str_replace(".", ",", strval(($end - $start)*1000))
        ]);
    }

}