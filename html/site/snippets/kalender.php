<?php
  $monat;
?>
<div class="kalender">
  <?php foreach($dates as $termin): ?>
  <?php if ($monat != $termin->date('m')): ?>
  <?php $monat = $termin->date('m'); ?>
  <?php if ($page->template() === 'year'): ?>
    <h2><?= strftime('%B',$termin->date()) ?></h2>
    <?php else: ?>
    <h2><?= strftime('%B %Y',$termin->date()) ?></h2>
  <?php endif;?>
  <?php endif ?>
  <div class="kalender--eintrag" itemscope itemtype="http://schema.org/Event">
    <time class="kalender--eintrag--datum" itemprop="startDate" datetime="<?= $termin->date('c') ?>">
      <?= strftime('%a,<br>%e.',$termin->date()) ?>
    </time>
    <div class="kalender--eintrag--text">
      <span>
        <?= strftime('%R',$termin->date()) ?> <?= l::get('Uhr') ?>
      </span><br>
      <strong itemprop="name">
        <?= $termin->title() ?>
      </strong>
      <?= $termin->untertitel() ?><br>
      <span itemprop="location" itemscope itemtype="http://schema.org/Place">
        <span itemprop="name">
          <?= $termin->veranstaltungsort() ?>
        </span>
        <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
          <span itemprop="addressLocality">
            <?= $termin->stadt() ?>
          </span>
        </span>
      </span>
      <ul class="kalender--eintrag--text--links">
        <?php if (!$termin->ticket_link()->isEmpty()) : ?>
        <li>
          <a itemprop="offers" href="<?= $termin->ticket_link() ?>" target="_blank">Tickets</a>
        </li>
        <?php endif ?>
        <?php if (!$termin->facebook_link()->isEmpty()) : ?>
        <li>
          <a itemprop="sameAs" href="<?= $termin->facebook_link() ?>" target="_blank">Facebook</a>
        </li>
        <?php endif ?>
        <li>
          <a href="<?= $termin->url() ?>" download>iCal</a>
        </li>
      </ul>
    </div>
  </div>
  <?php endforeach ?>
</div>
