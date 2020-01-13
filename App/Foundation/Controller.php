<?php

namespace TimePHP\Foundation;

use PDO;
use Twig\Environment;
use Twig\TwigFunction;
use Twig\Loader\FilesystemLoader;
use TimePHP\Foundation\Router;

abstract class Controller{

    /**
     * @var Environment
     */
    public $twig;


    /**
     * @var PDO
     */
    public $client;

    public function __construct(){
        //chargement du fichier app.ini à la racine du projet
        $ini = parse_ini_file("../../app.ini");
        $this->twig = new Environment(new FilesystemLoader(__DIR__ . "/../../". $ini["view_path"]));

        // ajout de la fonction asset pour twig afin de récuperer l'url du dossier asset dans le repertoire public
        $this->twig->addFunction(new TwigFunction('asset', function ($asset) {
            return sprintf('/../assets/%s', ltrim($asset, '/'));
        }));
        $this->twig->addFunction(new TwigFunction('generate', function (string $name, array $params) {
            return sprintf(Router::$router->generate($name, $params));
        }));

        $this->client = new PDO("mysql:host=".$ini["my_host"].";dbname=".$ini["my_name"], $ini["my_user"], $ini["my_pass"]);
        // permet d'afficher un rapport des erreurs
        $this->client->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // indique que le mode par défaut pour le fetch est FETCH_ASSOC (sous forme de tableau associatif)
        $this->client->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
}