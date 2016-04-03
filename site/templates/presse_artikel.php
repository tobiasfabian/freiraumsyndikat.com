<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center artikel--eintrag">

  <nav class="subnav back">
    <a class="subnav--back" href="<?= $page->parent()->parent()->url() ?>"><?= l::get('zurück zu') , ' ' . $page->parent()->parent()->title()->html() ?></a>
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

  <?php if($page->hasPrevVisible() || $page->hasNextVisible()): ?>
  <nav class="pagination">
    <h1 hidden>Pagination</h1>
    <?php if($page->hasNextVisible()): ?>
    <a class="pagination--previous" href="<?= $page->nextVisible()->url() ?>">
      <span><?= $page->nextVisible()->title()->html() ?></span>
    </a>
    <?php endif ?>
    <?php if($page->hasPrevVisible()): ?>
    <a class="pagination--next" href="<?= $page->prevVisible()->url() ?>">
      <span><?= $page->prevVisible()->title()->html() ?></span>
    </a>
    <?php endif ?>
  </nav>
  <?php endif ?>


</main>

<?php snippet('foot') ?>
