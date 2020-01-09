<?php

namespace TimePHP\Foundation;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller{

    public $twig;

    public function __construct(){
        $ini = parse_ini_file("../../app.ini");
        $this->twig = new Environment(new FilesystemLoader(__DIR__ . "/../../". $ini["view_path"]));
    }
}