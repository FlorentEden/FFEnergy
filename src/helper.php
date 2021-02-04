<?php

/**
 * page Helper.
 * regroupe les fonctions récurrentes
 *
 */

//revoie une erreur si elle existe
function error($field) {
  return isset($_SESSION["error"][$field]) ? $_SESSION["error"][$field]: "";
}

//affiche les données du dernier $_POST si elles existent
function old($field) {
  return isset($_SESSION["old"][$field]) ? $_SESSION["old"][$field] : "";
}

//transforme une donnée pour pouvoir la store en BDD
function escape($data) {
  return stripslashes(trim(htmlspecialchars($data)));
}

//transforme une string en URL
function slugify($str) {
    // replace non letter or digits by -
    $str = preg_replace('~[^\pL\d]+~u', '-', $str);
    // transliterate
    $str = iconv('utf-8', 'us-ascii//TRANSLIT', $str);
    // remove unwanted characters
    $str = preg_replace('~[^-\w]+~', '', $str);
    // trim
    $str = trim($str, '-');
    // remove duplicate -
    $str = preg_replace('~-+~', '-', $str);
    // lowercase
    $str = strtolower($str);
    if (empty($str)) {
        return 'n-a';
    }
    return $str;
}
