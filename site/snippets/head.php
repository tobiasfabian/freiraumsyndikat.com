<!DOCTYPE html>
<html lang="<?= $site->language() ?>">
<head>

  <?php if ($page->isHomepage()): ?>
  <title><?= $site->title()  ?></title>
  <?php elseif ($page->template() === 'jahr'): ?>
  <title><?= $page->parent()->title() . ' ' . $page->title() . ' – ' . $site->title()  ?></title>
  <?php else: ?>
  <title><?= $page->title() . ' – ' . $site->title()  ?></title>
  <?php endif ?>

  <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">
  <script src="<?= url('assets/js/main-min.js') ?>" defer></script>
  <?php if ($soundcloud_api): ?>
  <script src="//w.soundcloud.com/player/api.js"></script>
  <?php endif ?>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="desciption" property="og:description" content="<?= !$page->meta_description()->isEmpty() ? $page->meta_description() : $site->meta_description() ?>">
  <?php if ($page->isHomepage()): ?>
  <meta property="og:title" content="<?= $site->title() ?>">
  <?php elseif ($page->template() === 'jahr'): ?>
  <meta property="og:title" content="<?= $page->parent()->title() . ' ' . $page->title() . ' – ' . $site->title() ?>">
  <?php else: ?>
  <meta property="og:title" content="<?= $page->title() . ' – ' . $site->title() ?>">
  <?php endif ?>
  <meta property="og:site_name" content="<?= $site->title() ?>">
  <meta property="og:image" content="<?= url('assets/images/fb-share-image.jpg') ?>">
  <meta property="og:url" content="<?= $page->url() ?>">
  <?php if($site->language() == 'de') : ?>
  <meta property="og:locale" content="de_DE">
  <meta property="og:locale:alternate" content="en_US">
  <link rel="alternate" hreflang="en" href="<?= $page->url('en') ?>">
  <?php else: ?>
  <meta property="og:locale" content="en_US">
  <meta property="og:locale:alternate" content="de_DE">
  <link rel="alternate" hreflang="de" href="<?=$page->url('de') ?>">
  <?php endif ?>
  <link rel="alternate" type="application/rss+xml" href="<?= page('news/rss')->url() ?>" title="News – <?= $site->title() ?>">
  <link rel="apple-touch-icon" href="<?= url('assets/images/apple-touch-icon.png') ?>">

</head>
<body <?= $body_class ? 'class="' . $body_class . '"' : null ?>>
