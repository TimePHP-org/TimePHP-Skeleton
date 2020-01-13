<?php

use Cocur\Slugify\Slugify;

/**
 * @param string $title Titre que l'on veut convertir en slug
 * @param string $separator Separateur que l'on va utiliser pour la conversion en slug
 * @return string
 */
function slugify(string $title, string $separator): string{
    $slug = new Slugify();
    return $slug->slugify($title, $separator);
}

function convert_array_element_to_int($array): array{
    // conversion des nombres de l'url en entier car de base, se sont des strings
    foreach($array["params"] as $key => $value){
        if(is_numeric($value) && gettype($value) === "string"){
            $array["params"][$key] = intval($value);
        }
    }
    return $array;
}