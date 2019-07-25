<?php


/*
This class represent an object called Users
In order to create an this object, write:

    $user = new User([
        "id" => $id,
        "name" => $name,
        "age" => $age
    ]);

With this object, you will be able to call the getters and setters methods
*/
namespace App\Users;

class Users{
    private $id;
    private $name;
    private $age;

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

    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
        return $this;
    }

    public function getName(){
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
        return $this;
    }

    public function getAge(){
        return $this->id;
    }
    public function setAge(int $age){
        $this->age = $age;
        return $this;
    }




}
