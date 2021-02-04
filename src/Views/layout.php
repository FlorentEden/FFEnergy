<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— Projet —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.min.css">
</head>
<body>
    <header>
        <nav>
            <a href="/" class="logo">LOGO</a>

            <!--si l'utilisateur est connecte-->
            <?php if (isset($_SESSION["user"]["username"]): ?>

              <!--Lien ramenant a la page d'acceuil-->
              <div class="hoverLink">
                <a href="/" class="icon"><i class="fas fa-home"></i></a>
                <p class="hidden">Accueil</p>
              </div>

              <!--si l'utilisateur n'est pas connecte-->
            <?php else: ?>

              <!--Lien ramenant a la page d'acceuil-->
              <div class="hoverLink">
                <a href="/" class="icon"><i class="fas fa-home"></i></a>
                <p class="hidden">Accueil</p>
              </div>

              <!--Lien ramenant a la page de connexion-->
              <div class="hoverLink">
                <a href="/login" class="icon"><i class="fas fa-user-tie"></i></a>
                <p class="hidden">Login</p>
              </div>

            <?php endif; ?>

        </nav>
    </header>

    <main>
        <!--affiche le contenu-->
        <?= $content; ?>
    </main>
</body>
</html>
<?php
//supprime les erreurs et les données d'un formulaire de la session
unset($_SESSION['error']);
unset($_SESSION['old']);
