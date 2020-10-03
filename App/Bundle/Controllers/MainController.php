<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

namespace App\Bundle\Controllers;

use App\Bundle\Entity\User;
use TimePHP\Foundation\Router;
use TimePHP\Foundation\Controller;
use Illuminate\Database\Capsule\Manager;
use App\Bundle\Repository\UserRepository;

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
        
        // $user = User::find("950cbb3b-8433-4b55-afb7-0f8cbdca3f45");

        // $user->username = "bonjour";

        // $user->save();

        $users = $this->container->get(UserRepository::class)->getAllUsers();

        return $this->render('home.twig', ["users" => $users]);
    }

    public function mainFunction2(string $slug){
        return $this->render('home.twig', ["hello" => $slug]);
    }
 
}