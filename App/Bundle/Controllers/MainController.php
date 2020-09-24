<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

namespace App\Bundle\Controllers;

use TimePHP\Foundation\Router;
use TimePHP\Foundation\Controller;

/**
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controller
 * @link http://domaine.com
 */
class MainController extends Controller
{

    /**
     * Récupère les infos pour la page d'accueil
     */
    public function mainFunction(){

        echo $this->twig->render('home.twig', [
            "hello" => "Hello World!"
        ]);

    }
 
}