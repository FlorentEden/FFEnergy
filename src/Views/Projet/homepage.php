<?php

/**
 * page d'Accueil du site.
 *
 * @author Florent
 */

ob_start();
?>

<section class="homepage">
    <h1>FFEnergy</h1>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
