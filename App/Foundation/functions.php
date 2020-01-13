<?php

use Cocur\Slugify\Slugify;

/**
 * Convert the title into a slug
 * @param string $title     Titre que l'on veut convertir en slug
 * @param string $separator     Separateur que l'on va utiliser pour la conversion en slug
 */
function slugify(string $title, string $separator): string
{
    $slug = new Slugify();
    return $slug->slugify($title, $separator);
}

/**
 * Convert strings that represent integers into real integers
 * @param array $array correspond à la variable $match qui est placée en paramètre
 */
function Convert_Array_Element_To_Int(array $array): array
{
    // conversion des nombres de l'url en entier car de base, se sont des strings
    foreach($array["params"] as $key => $value) {
        if(is_numeric($value) && gettype($value) === "string") {
            $array["params"][$key] = intval($value);
        }
    }
    return $array;
}