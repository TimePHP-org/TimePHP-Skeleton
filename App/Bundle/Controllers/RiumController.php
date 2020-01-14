<?php

/**
 * Controller de test de perf Rium App
 * 
 * @category Controller
 * @link http://domaine.com/liste Lien pour vérifier le controller
 */

namespace TimePHP\Bundle\Controllers;

use PDO;
use TimePHP\Foundation\Router;
use TimePHP\Foundation\Controller; 

/**
 * Controller de test de perf Rium App
 * 
 * @category Controller
 * @license MPL-2.0
 */
class RiumController extends Controller
{

    /**
     * Récupère l'ensemble des utilisateurs
     * 
     * @see http://domaine.com/liste
     * @return void
     */
    public function getCompany()
    {
        $start = microtime(true);
        $lst_result = $this->client->query("SELECT * FROM app_bundle_company");
        $end = microtime(true);

        $args = [
            "companies" => $lst_result,
            "time" => str_replace(".", ",", strval(($end - $start)*1000))
        ];
        
        echo $this->twig->render("companies.twig", $args);
    }

}