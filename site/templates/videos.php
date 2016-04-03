<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center videos">

  <?php snippet('subnav', array('page' => $page->parent())) ?>

  <h1 hidden><?= $page->title()->html() ?></h1>

  <ul class="videos--list">
    <?php foreach($page->youtube_ids()->toStructure() as $id): ?>
    <li>
      <iframe src="https://www.youtube-nocookie.com/embed/<?= $id ?>?rel=0" frameborder="0" allowfullscreen></iframe>
    </li>
    <?php endforeach ?>
  </ul>

</main>

<?php snippet('foot') ?>
