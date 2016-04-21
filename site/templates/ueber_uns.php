<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center">

  <h1 hidden><?= $page->title()->html() ?></h1>

  <nav class="pagenav">
    <ul>
      <li>
        <a href="#biografie">
          <strong><?= l::get('Biografie des Ensembles') ?></strong>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </a>
      </li>
      <li>
        <a href="#presse">
          <strong><?= l::get('Presse-stimmen') ?></strong>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </a>
      </li>
    </ul>
    <a href="#biografie" class="arrow">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </nav>

  <ul class="ensemble">
    <?php foreach($page->children()->visible() as $mitglied): ?>
    <li class="ensemble--mitglied-<?= $mitglied->uid() ?>" tabindex="0">
      <a href="<?= $mitglied->url() ?>">
        <div class="ensemble--mitglied--text">
          <strong><?= $mitglied->title()->html() ?></strong>
          <em><?= $mitglied->instrument()->html() ?></em>
        </div>
        <?php
        $foto_url_320_2x = $mitglied->foto()->toFile()->crop(320 * 2, null, 60)->url();
        $foto_url_320 = $mitglied->foto()->toFile()->crop(320)->url();
        $foto_url_160 = $mitglied->foto()->toFile()->crop(160)->url();
        ?>
        <picture>
          <source media="(max-width: 380px)" srcset="<?= $foto_url_160 ?> 1x, <?= $foto_url_320 ?> 2x">
          <img src="<?= $foto_url_320 ?>" srcset="<?= $foto_url_320_2x ?> 2x" alt="<?= $mitglied->title()->html() ?>">
        </picture>
        <div class="klang klang-<?= $mitglied->uid() ?>"></div>
      </a>
    </li>
    <?php endforeach ?>
  </ul>

  <div class="seperator" id="biografie"></div>

  <article class="article">
    <?= $page->text()->kt() ?>
  </article>

  <div class="seperator" id="presse"></div>

  <div>
    <?php snippet('presse') ?>
  </div>

</main>


<?php snippet('foot') ?>
