
## La structure de fichiers

```
Projet
    public/
        index.php
        style.css
    src/
        Controllers/
            UserController.php
        Models/
            User.php
            UserManager.php
        Views/
            Auth/
                login.php
                register.php
            Projet/
                homepage.php
            404.php
            layout.php
        helper.php
        route.php
        Router.php
        validator.php
```

## Composer et l'autoloading

- Initialiser le dossier comme étant un projet composer

```shell
$ composer init  # crée le fichier composer.json
$ composer install # install l'autoloader
```

- Remplir le fichier composer avec la règle d'autoloading

```json
"autoload": {
    "psr-4": {
        "RootName\\": "src/"
    }
}
```

- Réinitialiser l'autoloader

```shell
$ composer dump-autoload
```

//lancer php -S localhost:8000 dans le dossier public
