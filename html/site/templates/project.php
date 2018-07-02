<?php
$ensembles = $page->ensembles()->toStructure();
function makePage($item) {
  if (page()->find($item)) {
    return page()->find($item);
  } else {
    return null;
  }
}
?>

<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center project">

  <h1 hidden><?= $page->title()->html() ?></h1>

  <nav class="pagenav">
    <ul>
      <?php foreach($ensembles as $item): ?>
      <li>
        <a href="#<?= str::slug($item->title()) ?>">
          <?= $item->title() ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
    <a href="#<?= str::slug($ensembles->first()->title()) ?>" class="arrow">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </nav>

  <article class="article">
    <?= $page->text()->kt() ?>
  </article>

  <?php foreach($ensembles as $item): ?>
  <article id="<?= str::slug($item->title()) ?>" class="ensemble">
    <div class="seperator"></div>
    <?php if ($image = $item->image()->toFile()): ?>
      <figure>
        <img src="<?= $image->resize('672', null, 80)->url() ?>" srcset="<?= $image->resize('1344', null, 70)->url() ?> 2x" alt="<?= $item->title() ?>">
        <?php if ($item->names()->isNotEmpty()): ?>
         <figcaption><?= $item->names() ?></figcaption>
        <?php endif; ?>
      </figure>
    <?php endif; ?>
    <header>
      <h2><?= $item->title() ?></h2>
      <?php if ($item->subtitle()->isNotEmpty()): ?>
        <p><?= $item->subtitle() ?></p>
      <?php endif; ?>
    </header>
    <div class="ensemble__text">
      <?= $item->text()->kt() ?>
    </div>
    <?php if ($item->programs()->split()): ?>
      <div class="ensemble__projects">
        <?php
        $programs = $item->programs()->split();
        $programs = new Collection($programs);
        $programs->map('makePage');
        $programs = new Pages($programs);
        $programs = $programs->visible()->sortBy('num');
        ?>
        <h3><?= l::get('Programme') ?></h3>
        <ul>
        <?php foreach ($programs as $item): ?>
          <li>
            <a href="<?= $item->url() ?>">
              <strong><?= $item->title() ?></strong>
              <?php if ($item->subtitle()->isNotEmpty()): ?>
                <em><?= $item->subtitle() ?></em>
              <?php endif; ?>
            </a>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </article>
  <?php endforeach; ?>


</main>


<?php snippet('foot') ?>
