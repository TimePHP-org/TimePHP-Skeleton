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
 */
class MainController extends Controller
{

    /**
     * Main controller function
     *
     * @return void
     */
    public function mainFunction(){
        return $this->render('home.twig', ["hello" => "Hello World !"]);
    }

    public function mainFunction2(string $slug){
        return $this->render('home.twig', ["hello" => $slug]);
    }
 
}