<?php

require __DIR__ . "/../../vendor/autoload.php";

use Whoops\Run;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Whoops\Handler\PrettyPageHandler;

// Whoops error handler
$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

// Twig
$loader = new FilesystemLoader(__DIR__ . '/../views');
$twig = new Environment($loader);

// Altorouter
$router = new AltoRouter();

// Router
$router->map("GET", "/", function() use($twig){
    echo $twig->render("home.twig", ["name" => "Michel"]);
}, "home");
$match = $router->match();

// start the router and handle errors
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    //header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    header("Location: ".$router->generate("home")); //redirection vers la page d'accueil
}