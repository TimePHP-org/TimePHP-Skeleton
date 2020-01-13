<?php

namespace TimePHP\Foundation;

use PDO;
use Twig\Environment;
use Twig\TwigFunction;
use Twig\Loader\FilesystemLoader;
use TimePHP\Foundation\Router;

/**
 * @package TimePHP
 * @subpackage Foundation
 * @category Controller
 */

abstract class Controller
{

    /**
     * @var Environment
     */
    public $twig;


    /**
     * @var PDO
     */
    public $client;

    public function __construct()
    {
        //chargement du fichier app.ini à la racine du projet
        $lst_ini = parse_ini_file("../../app.ini");
        $this->twig = new Environment(new FilesystemLoader(__DIR__ . "/../../". $lst_ini["view_path"]));

        // ajout de la fonction asset pour twig afin de récuperer l'url du dossier asset dans le repertoire public
        $this->twig->addFunction(new TwigFunction('asset', function ($asset)
        {
            return sprintf('/../assets/%s', ltrim($asset, '/'));
        }));
        $this->twig->addFunction(new TwigFunction('generate', function (string $name, array $params)
        {
            return sprintf(Router::$router->generate($name, $params));
        }));

        $str_connexion = "mysql:host=".$lst_ini["my_host"].";dbname=".$lst_ini["my_name"];
        $this->client = new PDO($str_connexion, $lst_ini["my_user"], $lst_ini["my_pass"]);
        // permet d'afficher un rapport des erreurs
        $this->client->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // indique que le mode par défaut pour le fetch est FETCH_ASSOC
        $this->client->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
}