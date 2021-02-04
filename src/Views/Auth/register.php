<?php

/**
 * page du formulaire d'inscription.
 *
 * @author Florent
 */

ob_start();
?>

<section class="formRegister">
  <h1>S'inscrire</h1>
  <div class="separateur"></div>
  <span class="error"><?= error("username");?></span>
  <span class="error"><?= error("password");?></span>
  <span class="error"><?= error("passwordConfirm");?></span>
  <span class="error"><?= error("confirm");?></span>

  <!--formulaire-->
  <form action="/register/" method="post">

    <!--Input pour l'username-->
    <div class="blockInput">
      <div class="labelInput">
        <input type="text" name="username" value="<?= old("username");?>" placeholder="username">
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

    <!--Input pour le password confirm-->
    <div class="blockInput">
      <div class="labelInput">
        <input id="inputPasswordConfirm" class="inputPassword" type="password" name="passwordConfirm" value="<?= old("passwordConfirm");?>" placeholder="Confirm password">
        <button id="btnPasswordConfirm" class="viewPassword" type="button" name="button"><i class="far fa-eye"></i></button>
      </div>
    </div>

    <button type="submit" name="button">S'inscrire</button>

  </form>

  <!--Lien ramenant a la page de connexion-->
  <div class="more">
    <p>Vous avez déjà un compte ? <a href="/login">Identifiez-vous !</a></p>
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

var btnPassConf = document.getElementById("btnPasswordConfirm");
var inputPassConf = document.getElementById("inputPasswordConfirm");
//affiche le mot de passe ou non
btnPassConf.onclick = function() {
    if (inputPassConf.type === "password") {
        inputPassConf.type = "text";
    } else {
        inputPassConf.type = "password";
    }
};
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
