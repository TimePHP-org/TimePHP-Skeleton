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