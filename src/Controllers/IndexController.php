<?php

namespace FFEnergy\Controllers;

//use FFEnergy\Models\IndexManager;
use FFEnergy\Validator;

/**
 * Classe UserController.
 * regroupe les fonctions d'un utilisateur.
 *
 * @author Florent
 */

 class IndexController {

# ATTRIBUTS--------------------------------------

# METHODES---------------------------------------

  //affiche la page de login
  public function index() {
    require VIEWS . 'Projet/homepage.php';
  }
}
