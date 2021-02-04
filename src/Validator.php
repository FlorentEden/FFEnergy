<?php

namespace Projet;

/**
 * Classe Validator.
 *
 */

 class Validator {

# ATTRIBUTS--------------------------------------

  private $data;
  private $errors = [];
  private $messages = [
    "required" => "Le champ est requis !",
    "min" => "Le champ doit contenir un minimum de %^% lettres !",
    "max" => "Le champ doit contenir un maximum de %^% lettres !",
    "regex" => "Le format n'est pas respecté",
    "length" => "Le champ doit contenir %^% caractère(s) !",
    "url" => "Le champ doit correspondre à une url !",
    "email" => "Le champ doit correspondre à une email: exemple@gmail.com !",
    "date" => "Le champ doit être une date !",
    "alpha" => "Le champ peut contenir que des lettres minuscules et majuscules !",
    "alphaNum" => "Le champ peut contenir que des lettres minuscules, majuscules et des chiffres !",
    "alphaNumDash" => "Le champ peut contenir que des lettres minuscules, majuscules, des chiffres, des slash et des tirets !",
    "numeric" => "Le champ peut contenir que des chiffres !",
    "confirm" => "Le champs n'est pas conforme au confirm !"];
  private $rules = [
    "required" => "#^.+$#",
    "min" => "#^.{ù,}$#",
    "max" => "#^.{0,ù}$#",
    "length" => "#^.{ù}$#",
    "regex" => "ù",
    "url" => FILTER_VALIDATE_URL,
    "email" => FILTER_VALIDATE_EMAIL,
    "date" => "#^(\d{4})(\/|-)(0[0-9]|1[0-2])(\/|-)([0-2][0-9]|3[0-1])$#",
    "alpha" => "#^[A-z]+$#",
    "alphaNum" => "#^[A-z0-9]+$#",
    "alphaNumDash" => "#^[A-z0-9-\|]+$#",
    "numeric" => "#^[0-9]+$#",
    "confirm" => ""];

# METHODES---------------------------------------

  //construct
  public function __construct($data = []) {
    $this->data = $data ?: $_POST;
  }

  //appelle la verification des regles pour chaque elements d'un tableau
  public function validate($array) {
    foreach ($array as $field => $rules) {
      $this->validateField($field, $rules);
    }
  }

  //appelle la verification des regles pour un champ
  public function validateField($field, $rules) {
    foreach ($rules as $rule) {
      $this->validateRule($field, $rule);
    }
  }

  //verifie les regles
  public function validateRule($field, $rule) {
    $res = strrpos($rule, ":");
    if ($res == true) {
      $repRule = explode(":", $rule);
      $changeRule = str_replace("ù", $repRule[1], $this->rules[$repRule[0]]);
      $changeMessage = str_replace("%^%", $repRule[1], $this->messages[$repRule[0]]);
      if (!preg_match($changeRule, $this->data[$field])) {
        $this->errors = [$this->messages[$repRule[0]]];
        $this->storeSession($field, $changeMessage);
      }
    }
    elseif ($res == false) {
      if ($rule == "confirm") {
        if (!isset($this->data[$field . 'Confirm'])) {
          $this->errors = ["Nous buttons sur un problème"];
          $this->storeSession('confirm', "Nous buttons sur un problème");
        }
        elseif (isset($this->data[$field . 'Confirm']) && $this->data[$field] != $this->data[$field . 'Confirm']) {
          $this->errors = [$this->messages[$rule]];
          $this->storeSession('confirm', $this->messages[$rule]);
        }
        return;
      }
      if ($rule == "email" || $rule == "url") {
        if (!filter_var($this->data[$field], $this->rules[$rule])) {
          $this->errors = [$this->messages[$rule]];
          $this->storeSession($field, $this->messages[$rule]);
        }
      }
      elseif (!preg_match($this->rules[$rule], $this->data[$field])) {
        $this->errors = [$this->messages[$rule]];
        $this->storeSession($field, $this->messages[$rule]);
      }
    }
  }

  //retourne une erreur
  public function errors() {
    return $this->errors;
  }

  //met en session une erreur
  public function storeSession($field, $error) {
    if (!isset($_SESSION["error"][$field])) {
      $_SESSION["error"][$field] = $error;
    }
    else {
      return;
    }
  }

}
