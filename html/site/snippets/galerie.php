<ul class="galerie">

<?php foreach($page->fotos()->toStructure() as $foto): ?>

  <?php
    $foto_file = $foto->foto()->toFile();
    $download_file = $foto->download()->toFile();
  ?>

  <li class="galerie--foto galerie--foto-<?= $foto->position() ?>">
    <?php
      if ($foto->position() == 'mitte') {
        $foto_url_944_2x = $foto_file->resize(944 * 2, null, 60)->url();
        $foto_url_944 = $foto_file->resize(944, null, 70)->url();
        $foto_url_640_2x = $foto_file->resize(640 * 2, null, 60)->url();
        $foto_url_640 = $foto_file->resize(640, null, 70)->url();
        $foto_url_472 = $foto_file->resize(472, null, 70)->url();
        $foto_url_320 = $foto_file->resize(320, null, 70)->url();
      } else {
        $foto_url_472_2x = $foto_file->resize(472 * 2, null, 60)->url();
        $foto_url_472 = $foto_file->resize(472, null, 70)->url();
        $foto_url_640 = $foto_file->resize(640, null, 60)->url();
        $foto_url_320 = $foto_file->resize(320, null, 70)->url();
      }
    ?>

    <figure>
      <?php if ($foto->position() == 'mitte') : ?>
      <picture>
        <source media="(max-width: 340px)" srcset="<?= $foto_url_320 ?> 1x, <?= $foto_url_640 ?> 2x">
        <source media="(max-width: 504px)" srcset="<?= $foto_url_472 ?> 1x, <?= $foto_url_944 ?> 2x">
        <source media="(max-width: 672px)" srcset="<?= $foto_url_640 ?> 1x, <?= $foto_url_640_2x ?> 2x">
        <img src="<?= $foto_url_944 ?>" srcset="<?= $foto_url_944_2x ?> 2x" alt="<?= $foto->titel()->html() ?>">
      </picture>
      <?php else : ?>
        <picture>
          <source media="(max-width: 340px)" srcset="<?= $foto_url_320 ?> 1x, <?= $foto_url_640 ?> 2x">
          <img src="<?= $foto_url_472 ?>" srcset="<?= $foto_url_472_2x ?> 2x" alt="<?= $foto->titel()->html() ?>">
        </picture>
      <?php endif; ?>
      <figcaption>
        <?= $foto->titel()->kt() ?>
        <aside class="galerie--foto--info">
          <em>Copyright <?= $foto->copyright() ?></em><br>
          <?php if ($download_file) : ?>
          <a href="<?= $download_file->url() ?>" download>download</a>
          (<?= $download_file->niceSize(1) ?>)
          <?php endif ?>
        </aside>
      </figcaption>
    </figure>

  </li>

<?php endforeach ?>

</ul>
