<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center artikel--eintrag">

  <nav class="subnav subnav--back">
    <a class="subnav__back" href="<?= $page->parent()->url() ?>"><?= l::get('zurück zu') , ' ' . $page->parent()->title()->html() ?></a>
  </nav>

  <article class="article">
    <header>
      <h1><?= $page->title()->html() ?></h1>
      <div class="info">
        <?php $info = ''; ?>
        <?php
          $time = '<time datetime="' . $page->date('c', 'datum') . '" itemprop="datePublished">' . strftime('%e. %B %Y', $page->date(null, 'datum')) . '</time>';
        ?>
        <?php
        if (!$page->autor()->isEmpty() && !$page->zeitung()->isEmpty()) {
          $info = $page->autor() . ' (' . $page->zeitung() . '), ' . $time;
        } else if (!$page->autor()->isEmpty() && $page->zeitung()->isEmpty()) {
          $info = $page->autor() . ', ' . $time;
        } else if ($page->autor()->isEmpty() && !$page->zeitung()->isEmpty()) {
          $info = $page->zeitung() . ', ' . $time;
        } else {
          $info = $time;
        }
        ?>
        <?= $info ?>
      </div>
    </header>
    <?= $page->text()->kt() ?>
  </article>

</main>

<?php snippet('foot') ?>
