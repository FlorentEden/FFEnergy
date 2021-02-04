<?php

namespace FFEnergy\Controllers;

use FFEnergy\Models\UserManager;
use FFEnergy\Validator;

/**
 * Classe UserController.
 * regroupe les fonctions d'un utilisateur.
 *
 * @author Florent
 */

 class UserController {

# ATTRIBUTS--------------------------------------

  private $manager;
  private $validator;

# METHODES---------------------------------------

  //construct
  public function __construct() {
    $this->manager = new UserManager();
    $this->validator = new Validator();
  }

  //affiche la page de login
  public function showLogin() {
    require VIEWS . 'Auth/login.php';
  }

  //affiche la page de register
  public function showRegister() {
    require VIEWS . 'Auth/register.php';
  }

  //deconnecte l'utilisateur
  public function logout() {
    session_start();
    session_destroy();
    header('Location: /login/');
  }

  //store un utilisateur en BDD
  public function register() {
    //verifie les donnees envoyé par le formulaire d'inscription
    $this->validator->validate([
      "username"=>["required", "min:3", "alphaNum"],
      "password"=>["required", "min:6", "alphaNum", "confirm"],
      "passwordConfirm"=>["required", "min:6", "alphaNum"]
    ]);

    $_SESSION['old'] = $_POST;

    //si il n'y a pas d'erreur avec les donnees
    if (!$this->validator->errors()) {
      //verifie si un user a deja ce nom
      $res = $this->manager->find($_POST["username"]);
      //si ce nom n'existe pas
      if (empty($res)) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        //enregistre l'user en BDD
        $this->manager->store($password);
        //enregistre l'user en session
        $_SESSION["user"] = [
          "id" => $this->manager->getBdd()->lastInsertId(),
          "username" => $_POST["username"]
        ];
        header("Location: /");
      }
      else {
        $_SESSION["error"]['username'] = "Le username choisi est déjà utilisé !";
        header("Location: /register");
      }
    }
    else {
      header("Location: /register");
    }
  }

  //connecte un utilisateur
  public function login() {
    //verifie les donnees envoyé par le formulaire de connexion
    $this->validator->validate([
      "username"=>["required", "min:3", "max:9", "alphaNum"],
      "password"=>["required", "min:6", "alphaNum"]
    ]);

    $_SESSION['old'] = $_POST;

    //si il n'y a pas d'erreur avec les donnees
    if (!$this->validator->errors()) {
      //cherche l'utilisateur avec ce nom
      $res = $this->manager->find($_POST["username"]);
      //verifie si le mot de passe est correct
      if ($res && password_verify($_POST['password'], $res->getPassword())) {
        //enregistre l'user en session
        $_SESSION["user"] = [
          "id" => $res->getId(),
          "username" => $res->getUsername()
        ];
        header("Location: /");
      }
      else {
        $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
        header("Location: /login");
      }
    }
    else {
      header("Location: /login");
    }
  }
}
