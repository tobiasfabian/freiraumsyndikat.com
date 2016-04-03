<?php foreach($page->find('presse')->children()->visible() as $item): ?>
<article class="presse_auszug">
  <?php $url = $item->link()->isEmpty() ? $item->url() : $item->link() ; ?>
  <a href="<?= $url ?>" <?= !$item->link()->isEmpty() ? 'target="_blank"' : null ?>>
    <p><?= $item->auszug()->html() ?></p>
    <footer class="info">
      <?php $info = ''; ?>
      <?php
        $time = '<time datetime="' . $item->date('c', 'datum') . '" itemprop="datePublished">' . strftime('%e. %B %Y', $item->date(null, 'datum')) . '</time>';
      ?>
      <?php
      if (!$item->autor()->isEmpty() && !$item->zeitung()->isEmpty()) {
        $info = $item->autor() . ' (' . $item->zeitung() . '), ' . $time;
      } else if (!$item->autor()->isEmpty() && $item->zeitung()->isEmpty()) {
        $info = $item->autor() . ', ' . $time;
      } else if ($item->autor()->isEmpty() && !$item->zeitung()->isEmpty()) {
        $info = $item->zeitung() . ', ' . $time;
      } else {
        $info = $time;
      }
      ?>
      <?= $info ?>
    </footer>
  </a>
</article>
<?php endforeach ?>
