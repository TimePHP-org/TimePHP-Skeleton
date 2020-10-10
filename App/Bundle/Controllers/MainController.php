<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

namespace App\Bundle\Controllers;

use App\Bundle\Entity\User;
use TimePHP\Foundation\Router;
use TimePHP\Exception\SessionException;
use App\Bundle\Repository\UserRepository;
use TimePHP\Foundation\AbstractController;

/**
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controller
 */
class MainController extends AbstractController
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

        // $user = $this->container->get(UserRepository::class)->getUser("User 1");
        // $final = User::hydrate($user);
        
        // dd($final);

        return $this->render('home.twig', [
            "message" => "Hello World !",
            "session" => $_SESSION["username"] ?? "null"
        ]);
    }

    public function mainFunction2(string $slug){
        return $this->render('home.twig', ["message" => $slug]);
    }

    public function connexion(){
        $this->createSession([
            "username" => "admin"
        ]);
        
        $this->redirectRouteName("home");
    }

    public function deconnexion(){
        $this->closeSession();
        $this->redirectUrl("/");
    }
 
}