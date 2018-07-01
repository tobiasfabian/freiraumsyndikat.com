<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center jahr">

  <?php snippet('subnav', array('page' => $page->parent())) ?>

  <h1 hidden><?= $page->title()->html() ?></h1>

  <?php snippet('kalender', array('dates' => $page->children()->visible()->sortBy('date'))) ?>

  <?php snippet('klaenge') ?>

</main>


<?php snippet('foot') ?>
