<?php snippet('head', array('body_class' => 'startseite')) ?>

<?php snippet('header') ?>

<h1 hidden><?= $site->title()->html() ?></h1>

<main class="startseite--images">
  <?php foreach($page->cites()->toStructure() as $item): ?>
    <?php if ($item->link()->toPage()): ?>
      <a class="startseite--cite" href="<?= $item->link()->toPage()->url() ?>">
    <?php else: ?>
      <div class="startseite--cite">
    <?php endif; ?>
      <blockquote>
        <?= $item->text()->kt() ?>
        <cite><?= $item->source() ?></cite>
      </blockquote>
    <?php if ($item->link()->toPage()): ?>
      </a>
    <?php else: ?>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
  <?php foreach($page->animated_images()->toStructure() as $item): ?>
    <?php if ($image = $item->image()->toFile()): ?>
      <?php
      $img_url_2x = $image->url();
      $img_url    = thumb($image, array('width' => $image->width() / 2))->url();
      $img_url_54_2x = thumb($image, array('width' => $image->width() / 1.25))->url();
      $img_url_54    = thumb($image, array('width' => $image->width() / 2.5))->url();
      $img_url_34_2x = $img_url_54;
      $img_url_34    = thumb($image, array('width' => $image->width() / 5))->url();
      ?>
      <picture>
        <source src="<?= $img_url_34 ?>" srcset="<?= $img_url_34_2x ?> 2x" media="(max-width: 34em)">
        <source src="<?= $img_url_54 ?>" srcset="<?= $img_url_54_2x ?> 2x" media="(max-width: 54em)">
        <img src="<?= $img_url ?>" srcset="<?= $img_url_2x ?> 2x">
      </picture>
    <?php endif; ?>
  <?php endforeach; ?>
  <?php snippet('klaenge') ?>
</main>

<div class="startseite--button">
  <button type="button"><?= $page->button_text()->html() ?></button>
</div>

<?php snippet('foot') ?>
