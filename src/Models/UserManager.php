<?php
namespace Projet\Models;

use Projet\Models\User;

/**
 * Classe UserManager.
 * regroupe les requetes d'un utilisateur.
 *
 * @author Florent
 */

 class UserManager {

# ATTRIBUTS--------------------------------------

  private $bdd;

# METHODES---------------------------------------

  //construct
  public function __construct() {
    $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
    $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  }

  #accesseurs

    //BDD
    public function getBdd() {
      return $this->bdd;
    }

  //select un utilisateur à partir d'un username
  public function find($username) {
    $stmt = $this->bdd->prepare("SELECT * FROM User WHERE username = ?");
    $stmt->execute(array(
      $username
    ));
    //creer une istance de USER
    $stmt->setFetchMode(\PDO::FETCH_CLASS,"Projet\Models\User");
    //return l'instance de USER
    return $stmt->fetch();
    }

  //select tous les utilisateurs
  public function all() {
    $stmt = $this->bdd->query('SELECT * FROM User');
    //creer une istance de USER
    return $stmt->fetchAll(\PDO::FETCH_CLASS,"Projet\Models\User");
  }

  //enregistre un utilisateur en BDD
  public function store($password) {
    $stmt = $this->bdd->prepare("INSERT INTO User(username, password) VALUES (?, ?)");
    $stmt->execute(array(
      escape$_POST["username"],
      $password
    ));
  }

}
