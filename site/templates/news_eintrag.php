<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center news news--eintrag">

  <nav class="subnav back">
    <a class="subnav--back" href="<?= $page->parent()->url() ?>"><?= l::get('zurück zu') , ' ' . $page->parent()->title()->html() ?></a>
  </nav>

  <article class="article">
    <header>
      <h1><?= $page->title()->html() ?></h1>
      <time class="info" datetime="<?= $page->date('c') ?>">
        <?= strftime('%e. %B %Y', $page->date()) ?>
      </time>
    </header>
    <?= $page->text()->kt() ?>
  </article>

  <?php if($page->hasPrevVisible() || $page->hasNextVisible()): ?>
  <nav class="pagination">
    <h1 hidden>Pagination</h1>
    <?php if($page->hasNextVisible()): ?>
    <a class="pagination--next" href="<?= $page->nextVisible()->url() ?>">
      <span><?= $page->nextVisible()->title()->html() ?></span>
    </a>
    <?php endif ?>
    <?php if($page->hasPrevVisible()): ?>
    <a class="pagination--previous" href="<?= $page->prevVisible()->url() ?>">
      <span><?= $page->prevVisible()->title()->html() ?></span>
    </a>
    <?php endif ?>
  </nav>
  <?php endif ?>


</main>

<?php snippet('foot') ?>
