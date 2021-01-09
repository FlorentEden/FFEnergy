<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($contenus as $content):
    ?>
    <article>
        <header>
          <h1 class="titreBillet"><?= $content['titre'] ?></h1>
        </header>
        <p><?= $content['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
