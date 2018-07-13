<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center">

  <?php snippet('subnav', array('page' => $page->parent())) ?>

  <article class="referenzen">
    <?= $page->text()->kt() ?>
  </article>


</main>

<?php snippet('foot') ?>
