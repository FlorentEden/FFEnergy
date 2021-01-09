<?php

/**
 * Classe abstraite Modèle.
 * Centralise les requêtes SQL du contenu.
 *
 * @author Florent
 */

require_once 'Modele/Modele.php';

class Content extends Modele {

# ATTRIBUTS--------------------------------------

# METHODES---------------------------------------

  // récupere tous le contenu du site
  public function getContenus() {
    $sql = 'SELECT ID_CONTENU as id,
            ID_USER as auteur,
            CLASS_CONTENU as class,
            CONTENU_CONTENU as contenu,
            TITRE_CONTENU as titre,
            PERMISSION_REQ as permission
            from contenu order by ID_CONTENU desc';
    $contenus = $this->executerRequete($sql);
    return $contenus;
  }
}
