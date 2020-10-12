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
        
        // $user = User::find("cb8c89d9-46f4-47ec-b713-290b30824347");
        // $user->role = "admin";
        // $user->save();

        // $user = new User();
        // $user->username = "MsVisper";
        // $user->password = password_hash("MsVisper", PASSWORD_BCRYPT);
        // $user->save();

        // $user = UserRepository::getAllUsers();
        // $final = User::hydrate($user);

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