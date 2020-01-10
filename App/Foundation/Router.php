<?php

namespace TimePHP\Foundation;

use AltoRouter;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

class Router{

    /**
     * @var AltoRouter Variable principale du router
     */
    private $router;

    /**
     * @var Whoops Générateur de belles erreurs
     */
    private $whoops;

    /**
     * Class constructor
     */
    public function __construct(){
        $this->router = new AltoRouter();
        $this->whoops = new Run;
        $this->whoops->pushHandler(new PrettyPageHandler);
        $this->whoops->register();
    }

    /**
     * @param string $url url to map with the function or controller
     * @param object $object A function or a string
     * @param string|null $name (optional) name of the path
     * @return self Permet de faire du fluant calling
     */
    public function get(string $url, $object, ?string $name): self{
        $this->router->map("GET", $url, $object, $name);
        return $this;
    }

    public function run(){
        $match = $this->router->match();
        
        // si l'url de correspond à aucune des routes
        if ($match === false) {
            header("Location: ".$this->router->generate("home")); //redirection vers la page d'accueil

        // si on renseigne un controller (HomeController#function)
        } else if(is_string($match["target"])) {
            list($controller, $action) = explode('#', $match['target']);
            $ctrl = "TimePHP\\Bundle\\Controllers\\".$controller;
            if (is_callable(array(new $ctrl, $action))) {
                call_user_func_array(array(new $ctrl,$action), $match['params']);
            } else {
                header('HTTP/1.1 500 Internal Server Error');
            }
        
        // si on renseigne une fonction au lieu d'un controller
        } else if(is_object($match["target"]) && is_callable($match["target"])){
            call_user_func_array($match["target"], $match["params"]);
        } else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

}