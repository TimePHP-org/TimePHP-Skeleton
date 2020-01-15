<?php

/**
 * La classe RiumController permet de gérer la récupération de données des capteurs pour
 * ensuite les envoyer à la vue correspondante.
 * Cette classe étend Controller ce qui lui permet d'utiliser les variable $twig et $_whoops
 * 
 * PHP version 7.4.1
 * 
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controllers
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 * @license MPL-2.0 https://github.com/MrAnyx/Skeleton-TimePHP/blob/master/LICENSE
 * @link http://domaine.com/liste
 */

namespace TimePHP\Bundle\Controllers;

use PDO;
use TimePHP\Foundation\Router;
use TimePHP\Foundation\Controller; 

/**
 * Controller de test de perf Rium App
 * 
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controllers
 * @link http://domaine.com/liste
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