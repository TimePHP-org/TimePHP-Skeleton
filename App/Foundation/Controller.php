<?php

namespace TimePHP\Foundation;

use PDO;
use Twig\Environment;
use Twig\TwigFunction;
use Twig\Loader\FilesystemLoader;

abstract class Controller{

    public $twig;

    public $client;

    public function __construct(){
        $ini = parse_ini_file("../../app.ini");
        $this->twig = new Environment(new FilesystemLoader(__DIR__ . "/../../". $ini["view_path"]));
        $this->twig->addFunction(new TwigFunction('asset', function ($asset) {
            return sprintf('../assets/%s', ltrim($asset, '/'));
        }));

        $this->client = new PDO("mysql:host=".$ini["my_host"].";dbname=".$ini["my_name"], $ini["my_user"], $ini["my_pass"]);
        $this->client->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}