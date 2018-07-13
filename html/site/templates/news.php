<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center news">

  <h1 hidden><?= $page->title()->html() ?></h1>

  <?php $new_eintraege = $page->children()->visible()->flip()->paginate(3); ?>
  <?php foreach($new_eintraege as $news_eintrag): ?>

  <article class="article" itemscope itemtype="http://schema.org/Article">
    <header>
      <h2 itemprop="headline"><?= $news_eintrag->title()->html() ?></h2>
      <a class="info" href="<?= $news_eintrag->url() ?>">
        <time datetime="<?= $news_eintrag->date('c') ?>" itemprop="datePublished">
          <?= strftime('%e. %B %Y', $news_eintrag->date()) ?>
        </time>
      </a>
    </header>
    <?= $news_eintrag->text()->kt() ?>
  </article>

  <?php endforeach ?>

  <?php if($new_eintraege->pagination()->hasPages()): ?>
  <nav class="pagination">
    <h1 hidden>Pagination</h1>
    <?php if($new_eintraege->pagination()->hasPrevPage()): ?>
    <a class="pagination--next" rel="next" href="<?= $new_eintraege->pagination()->prevPageURL() ?>">
      <?=l::get('vorherige Seite')?>
    </a>
    <?php endif ?>
    <?php if($new_eintraege->pagination()->hasNextPage()): ?>
    <a class="pagination--previous" rel="prev" href="<?= $new_eintraege->pagination()->nextPageURL() ?>">
      <?=l::get('nächste Seite')?>
    </a>
    <?php endif ?>
  </nav>
  <?php endif ?>

</main>

<?php snippet('foot') ?>
