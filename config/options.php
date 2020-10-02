<?php

return [
   "types" => [
      [
         "id" => "s",
         "regex" => "[a-z0-9]+(?:-[a-z0-9]+)*"
      ]
      ],
   "twig" => [
      [
         "name" => "test",
         "function" => function() {
            return "test";
         }
      ]
   ]
];