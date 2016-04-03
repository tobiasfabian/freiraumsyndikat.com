<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center fotos">

  <?php snippet('subnav', array('page' => $page->parent())) ?>

  <h1 hidden><?= $page->title()->html() ?></h1>

  <?php snippet('galerie') ?>

</main>

<?php snippet('foot') ?>
