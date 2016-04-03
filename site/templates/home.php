<?php snippet('head', array('body_class' => 'startseite')) ?>

<?php snippet('header') ?>

<h1 hidden><?= $site->title()->html() ?></h1>

<main class="startseite--video">
  <button type="button" class="startseite--video--close" aria-label="<?= l::get('Video schließen') ?>">
    <span></span>
    <span></span>
  </button>
  <iframe src="//www.youtube-nocookie.com/embed/<?= $page->youtube_id() ?>?rel=0&amp;showinfo=0&amp;autoplay=1&amp;fs=0<?= $site->language() != 'de' ? '&amp;cc_load_policy=1&amp;cc_lang_pref=en' : null ?>" frameborder="0" allowfullscreen></iframe>
</main>

<div class="startseite--button">
  <button type="button"><?= $page->button_text()->html() ?></button>
</div>

<?php snippet('foot') ?>
