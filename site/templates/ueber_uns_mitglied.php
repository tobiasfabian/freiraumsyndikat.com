<?php snippet('head') ?>

<?php snippet('header') ?>

<main class="center">

  <h1 hidden><?= $page->title()->html() ?></h1>

  <article class="mitglied mitglied-<?= $page->uid() ?>">
    <a href="<?= $page->parent()->url() ?>" class="mitglied--close" aria-label="<?= l::get('zurück zu Über uns') ?>">
      <span></span>
      <span></span>
    </a>
    <header class="mitglied--header">
      <h1><?= $page->title() ?></h1>
      <em><?= $page->instrument() ?></em>
    </header>
    <img src="<?= $page->foto()->toFile()->crop(231)->url() ?>" srcset="<?= $page->foto()->toFile()->crop(231 * 2)->url() ?> 2x" class="mitglied--image" alt="<?= $page->title() ?>">
    <div class="mitglied--intro">
      <?= $page->intro()->kt() ?>
    </div>
    <?= $page->ueber_mich()->kt() ?>
    <div class="klang klang-<?= $page->uid() ?>"></div>
  </article>

  <nav class="mitglied--others">
    <ul>
      <?php foreach($page->siblings(false)->visible() as $mitglied): ?>
      <li>
        <a href="<?= $mitglied->url() ?>" class="mitglied--others--link mitglied--others--link-<?= $mitglied->uid() ?>">
          <div class="mitglied--others--link--text">
            <strong><?= $mitglied->title() ?></strong>
            <em><?= $mitglied->instrument() ?></em>
          </div>
          <?php
          $foto_url_320_2x = $mitglied->foto()->toFile()->crop(320 * 2, null, 60)->url();
          $foto_url_320 = $mitglied->foto()->toFile()->crop(320)->url();
          $foto_url_160 = $mitglied->foto()->toFile()->crop(160)->url();
          ?>
          <picture>
            <source media="(max-width: 380px)" srcset="<?= $foto_url_160 ?> 1x, <?= $foto_url_320 ?> 2x">
            <img src="<?= $foto_url_320 ?>" srcset="<?= $foto_url_320_2x ?> 2x" alt="<?= $mitglied->name()->html() ?>">
          </picture>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
  </nav>

</main>


<?php snippet('foot') ?>
