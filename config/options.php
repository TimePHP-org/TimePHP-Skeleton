<?php

use App\Bundle\Twig\TwigFunction;

return [
   "types" => [
      [
         "id" => "s",
         "regex" => "[a-z0-9]+(?:-[a-z0-9]+)*",
      ],
   ],
   "twig" => [
      [
         "name" => "test",
         "type" => "function",
         "class" => TwigFunction::class,
         "function" => "test",
      ],
      [
         "name" => "test2",
         "type" => "function",
         "function" => function () {
            return "test2";
         },
      ],
      [
         "name" => "shuffle",
         "type" => "filter",
         "function" => function ($string) {
            return str_shuffle($string);
         },
      ]
   ],
];