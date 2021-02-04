<?php

/**
 * page index.php
 * gere toute les requetes de l'utilisateur.
 *
 * @author Florent
 */

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

//requete d'url
$router = new Projet\Router($_SERVER["REQUEST_URI"]);

//GET

//POST

$router->run();
