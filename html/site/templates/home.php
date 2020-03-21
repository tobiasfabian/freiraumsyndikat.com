<?php snippet('head', array('body_class' => 'startseite')) ?>

<?php snippet('header') ?>

<h1 hidden><?= $site->title()->html() ?></h1>

<main class="startseite--images">
  <div>
    <?php $i = 0; ?>
    <?php foreach($page->cites()->toStructure() as $item): ?>
      <?php if ($item->link()->toPage()): ?>
        <a class="startseite--cite <?= $i !== 0 ? 'is-hidden' : '' ?>" href="<?= $item->link()->toPage()->url() ?>">
      <?php else: ?>
        <div class="startseite--cite <?= $i !== 0 ? 'is-hidden' : '' ?>">
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
      <?php $i++; ?>
    <?php endforeach; ?>
  </div>
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
        <source srcset="<?= $img_url_34 ?> 1x, <?= $img_url_34_2x ?> 2x" media="(max-width: 34em)">
        <source srcset="<?= $img_url_54 ?> 1x, <?= $img_url_54_2x ?> 2x" media="(max-width: 54em)">
        <img src="<?= $img_url ?>" srcset="<?= $img_url_2x ?> 2x" alt="<?= $image->alt() ?>">
      </picture>
    <?php endif; ?>
  <?php endforeach; ?>
  <?php snippet('klaenge') ?>
</main>

<?php snippet('foot') ?>
