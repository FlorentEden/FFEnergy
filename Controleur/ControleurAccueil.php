<?php

/**
 * Classe ControleurAccueil.
 * Centralise les function pour creer/modifier la page d'accueil.
 *
 * @author Florent
 */

require_once 'Modele/Content.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

# ATTRIBUTS--------------------------------------

  private $content;

# METHODES---------------------------------------

  // Construct
  public function __construct() {
    $this->content = new Content();
  }

  // Affiche la liste de tous les contenus du blog
  public function accueil() {
    $contenus = $this->content->getContenus();
    $vue = new Vue("Accueil");
    $vue->generer(array('contenus' => $contenus));
  }
}
