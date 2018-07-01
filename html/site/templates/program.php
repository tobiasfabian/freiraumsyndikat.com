<?php snippet('head') ?>

<?php snippet('header') ?>

<nav class="subnav subnav--back subnav--program">
  <a class="subnav__back" href="<?= $page->parent()->url() ?>"><?= $page->parent()->title() ?></a>
</nav>
<main class="program">
  <header>
    <h1><?= $page->title()->html() ?></h1>
    <?php if ($page->subtitle()->isNotEmpty()): ?>
      <p><?= $page->subtitle() ?></p>
    <?php endif; ?>
  </header>
  <?= $page->text()->kt() ?>
  <?php $cast  = $page->cast()->toStructure(); ?>
  <?php if ($cast->count() > 0): ?>
    <div class="program__cast">
      <h2><?= l::get('Besetzung') ?></h2>
      <?php foreach($cast as $item): ?>
        <?php if ($item->role()->isNotEmpty() && $item->name()->isNotEmpty()): ?>
          <div>
            <em><?= $item->role() ?></em>
            <strong><?= $item->name() ?></strong>
          </div>
        <?php else: ?>
          <div class="program__seperator"></div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <?php if ($page->showDates()->bool()): ?>
    <div class="program__dates">
      <?php
        $keywords = array($page->title()->value());
        $keywords = a::merge($keywords, $page->datesKeywords()->split());
        $dates = page('termine')->index()->filterBy('title', 'in', $keywords)->sortBy('date', 'desc');
      ?>
      <?php snippet('kalender', array('dates' => $dates)) ?>
    </div>
  <?php endif; ?>

</main>


<?php snippet('foot') ?>
