<nav class="subnav">
  <ul>
    <?php foreach($page->children()->visible() as $item): ?>
    <li>
      <a <?= $item->isOpen() ? 'class="active"' : null ?> href="<?= $item->url() ?>"><?= $item->title() ?></a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
