<?php
namespace Projet\Models;

/**
 * Classe User.
 * objet utilisateur.
 *
 * @author Florent
 */

 class User {

# ATTRIBUTS--------------------------------------

  private $username;
  private $password;
  private $id;

# METHODES---------------------------------------

  #Accesseurs

    //Username
    public function getUsername() {
      return $this->username;
    }
    public function setUsername(String $username) {
        $this->username = $username;
    }

      //password
    public function getPassword() {
        return $this->password;
    }
    public function setPassword(String $password) {
        $this->password = $password;
    }

      //id
    public function getId() {
      return $this->id;
    }
    public function setId(Int $id) {
      $this->id = $id;
    }

}
