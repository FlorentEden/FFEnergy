<?php

/**
 * page d'Accueil du site.
 *
 * @author Florent
 */

ob_start();
?>

<section class="homepage">
    <h1>Projet</h1>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
