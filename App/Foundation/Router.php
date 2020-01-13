<?php

// the funcions.php file is imported thanks to the autoloader file

namespace TimePHP\Foundation;

use AltoRouter;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

class Router
{

    /**
     * @var AltoRouter Variable principale du router
     */
    public static $router;

    /**
     * @var Whoops Générateur de belles erreurs
     */
    private $_whoops;

    /**
     * Class constructor
     */
    public function __construct()
    {
        self::$router = new AltoRouter();
        $this->_whoops = new Run;
        $this->_whoops->pushHandler(new PrettyPageHandler);
        $this->_whoops->register();
    }

    /**
     * Permet d'ajouter une nouvelle route
     * 
     * @param string $url url to map with the function or controller
     * @param object $object A function or a string
     * @param string|null $name (optional) name of the path
     * @return self Permet de faire du fluant calling
     */
    public function get(string $url, $object, ?string $name): self
    {
        self::$router->map("GET", $url, $object, $name);
        return $this;
    }

    /**
     * Permet de generer une url via le nom de la route
     * 
     * @param string $name Correspond au nom de la route que l'on souhaite
     * @param array|null $params (optionel) correspond au parametres à donner a l'url
     * @return string
     * @deprecated 
     */
    public function url(string $name, array $params): string
    {
        return self::$router->generate($name, $params);
    }


    /**
     * Permet d'associer le bon controller / fonction avec l'url saisie
     */
    public function run()
    {
        $match = self::$router->match();

        convert_array_element_to_int($match);
    
        // si l'url ne correspond à aucune des routes
        if ($match === false) {
            header("Location: ".self::$router->generate("home")); //redirection vers la page d'accueil

        // si on renseigne un controller (HomeController#function 
        } else if(is_string($match["target"])) {
            list($controller, $action) = explode('#', $match['target']);
            $ctrl = "TimePHP\\Bundle\\Controllers\\".$controller;
            if (is_callable(array(new $ctrl, $action))) {
                call_user_func_array(array(new $ctrl,$action), $match['params']);
            } else {
                header('HTTP/1.1 500 Internal Server Error');
            }
        
        // si on renseigne une fonction au lieu d'un controller
        } else if(is_object($match["target"]) && is_callable($match["target"])) {
            call_user_func_array($match["target"], $match["params"]);
        } else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

}