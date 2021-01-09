<?php

/**
 * Classe Routeur.
 * Centralise action possibles.
 *
 * @author Florent
 */

require_once 'Controleur/ControleurAccueil.php';
require_once 'Vue/Vue.php';
class Routeur {

# ATTRIBUTS--------------------------------------

  private $ctrlAccueil;
  private $ctrlBillet;

# METHODES---------------------------------------

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
  }

  // Route une requête entrante : exécution l'action associée
  public function routerRequete() {
    try {
      if (isset($_GET['action'])) {
        throw new Exception("Action non valide");
      }
      else {
        // aucune action définie : affichage de l'accueil
        $this->ctrlAccueil->accueil();
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }

  // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];
    }
    else
      throw new Exception("Paramètre '$nom' absent");
    }

}
