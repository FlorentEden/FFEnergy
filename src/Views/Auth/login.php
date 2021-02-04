<?php

/**
 * page du formulaire de connexion.
 *
 * @author Florent
 */

ob_start();
?>

<section class="formLogin">
  <h1>S'identifier</h1>
  <div class="separateur"></div>
  <span class="error"><?= error("username");?></span>
  <span class="error"><?= error("password");?></span>

  <!--formulaire-->
  <form action="/login/" method="post">

    <!--Input pour l'username-->
    <div class="blockInput">
      <div class="labelInput">
        <input type="text" name="username" value="<?= old("username"); ?>" placeholder="username">
        <label for="username"><i class="fas fa-user-tie"></i></label>
      </div>
    </div>

    <!--Input pour le password-->
    <div class="blockInput">
      <div class="labelInput">
        <input id="inputPassword" class="inputPassword" type="password" name="password" value="<?= old("password");?>" placeholder="password">
        <button id="btnPassword" class="viewPassword" type="button" name="button"><i class="far fa-eye"></i></button>
      </div>
    </div>

    <button type="submit" name="button">S'identifier</button>

  </form>

  <!--Lien ramenant a la page d'inscription-->
  <div class="more">
    <p>Vous n'avez pas de compte ? <a href="/register">Inscrivez-vous !</a></p>
  </div>

</section>

<script>
var btnPass = document.getElementById("btnPassword");
var inputPass = document.getElementById("inputPassword");
//affiche le mot de passe ou non
btnPass.onclick = function() {
    if (inputPass.type === "password") {
        inputPass.type = "text";
    } else {
        inputPass.type = "password";
    }
};
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
