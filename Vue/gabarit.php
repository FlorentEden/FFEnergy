<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?php echo $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">FFEnergy</h1></a>
            </header>

            <div id="contenu">
                <?php echo $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Projet fil rouge par Florent et Florian.
            </footer>
        </div> <!-- #global -->
    </body>
</html>
