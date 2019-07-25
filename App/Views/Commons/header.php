<?php

// requires
require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../includes/config.php';

// uses
use App\Repository\Repository;

// global variables
$db = Repository::connect($config);


?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Title</title>
</head>
<body>
