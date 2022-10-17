<?php

use App\Classes\Metier\Employe;

require '..\vendor\autoload.php';

$e = new Employe();

$p = new \App\Classes\Metier\Projet(1, "Pierre", new DateTime(), 5);