<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center kontakt">
  <h1 hidden><?= $page->title()->html() ?></h1>
  <?= $page->text()->kt() ?>
  <div class="kontakt--impressum">
    <?= $page->impressum()->kt() ?>
  </div>
  <?php snippet('klaenge') ?>
</main>

<?php snippet('foot') ?>
