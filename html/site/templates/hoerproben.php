<?php snippet('head', array('soundcloud_api' => true)) ?>

<?php snippet('header') ?>

<main class="center hoerproben">

  <?php snippet('subnav', array('page' => $page->parent())) ?>

  <h1 hidden><?= $page->title()->html() ?></h1>

  <ul class="hoerproben--list">
    <?php $i = 0; ?>
    <?php foreach($page->soundcloud_links()->toStructure() as $link): ?>
    <?php $i++; ?>
    <li>
      <iframe class="js-hoerprobe" scrolling="no" frameborder="no" src="//w.soundcloud.com/player/?url=<?= $link ?>&amp;auto_play=false&amp;buying=false&amp;liking=true&amp;download=true&amp;sharing=true&amp;show_artwork=true&amp;show_comments=true&amp;show_playcount=false&amp;show_user=false&amp;hide_related=true&amp;visual=false&amp;start_track=0&amp;callback=false"></iframe>
    </li>
    <?php endforeach ?>
  </ul>

  <?php snippet('klaenge') ?>

</main>

<?php snippet('foot') ?>
