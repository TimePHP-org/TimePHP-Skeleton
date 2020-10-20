<?php

/**
 * PHP version 7.4.2
 * 
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */
      
namespace App\Bundle\Controllers;
      
use TimePHP\Foundation\AbstractController;
      
/**
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controllers
 */
class HomeController extends AbstractController
{

   public function home() {
      return $this->render("home.twig");
   }
      
}