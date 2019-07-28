<?php
namespace App\TemplateModel;

class TemplateModel{

    // Put the different attributes here as private attributes
    // private $id;

    public function __construct(array $arrayOfValues = null){
        if($arrayOfValues != null){
            $this->hydrate($arrayOfValues);
        }
    }

    public function hydrate(array $donnees){
        foreach($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    //Getters and Setters
    // public function getId(){
    //     return $this->id;
    // }
    // public function setId(int $id){
    //     $this->id = $id;
    //     return $this;
    // }
}
