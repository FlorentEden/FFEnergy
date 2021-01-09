<?php

/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 *
 * @author Florent
 */
 
abstract class Modele {

# ATTRIBUTS--------------------------------------

  private $bdd;

# METHODES---------------------------------------

  // execute une requete
  protected function executerRequete($sql, $params = null) {
    if ($params == null) {
      $resultat = $this->getBdd()->query($sql); // exécution directe
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);  // requête préparée
      $resultat->execute($params);
    }
      return $resultat;
  }

  // parametres de la BDD
  private function getBdd() {
    if ($this->bdd == null) {
      // Création de la connexion
      $this->bdd = new PDO('mysql:host=localhost;dbname=FFEnergy;charset=utf8','root', '',
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
      return $this->bdd;
    }
}
