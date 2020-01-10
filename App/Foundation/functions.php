<?php

use Cocur\Slugify\Slugify;

function slugify(string $title, string $separator): string{
    $slug = new Slugify();
    return $slug->slugify($title, $separator);
}