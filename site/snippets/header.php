<header class="main_header">
  <div class="center">
    <a class="main_header--logo" href="<?= $site->url() ?>">
      <img src="<?= url('assets/images/logo.svg') ?>" alt="<?= $site->title()->html() ?>">
    </a>
    <button class="main_header--hamburger" type="button" aria-label="<?= l::get('Menü öffnen') ?>" data-label-close="<?= l::get('Menü schließen') ?>" data-label-open="<?= l::get('Menü öffnen') ?>">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav>
      <ul class="main_header--menu">
        <?php foreach($site->pages()->visible() as $item): ?>
        <li>
          <a <?= $item->isOpen() ? 'class="active"' : null ?> href="<?= $item->url() ?>">
            <?= $item->title() ?>
          </a>
        </li>
        <?php endforeach ?>
        <li class="main_header--menu--social_media">
          <a class="social_media_icon" href="<?= $site->facebook_link() ?>" target="_blank">
            <img src="<?= url('assets/images/icon--facebook.svg') ?>" alt="Facbook Icon">
          </a>
          <a class="social_media_icon" href="<?= $site->soundcloud_link() ?>" target="_blank">
            <img src="<?= url('assets/images/icon--soundcloud.svg') ?>" alt="Soundcloud Icon">
          </a>
          <a class="social_media_icon" href="<?= $site->youtube_link() ?>" target="_blank">
            <img src="<?= url('assets/images/icon--youtube.svg') ?>" alt="YouTube Icon">
          </a>
        </li>
      </ul>
    </nav>
    <!-- <ul class="main_header--langswitch">
      <?php foreach($site->languages() as $language): ?>
      <li>
        <a <?= $site->language() === $language ? ' class="active"' : null ?> href="<?= $page->url($language->code()) ?>"><?= $language->code() ?></a>
      </li>
      <?php endforeach ?>
    </ul> -->
  </div>
  <img class="main_header--aside" src="<?= url('assets/images/aside.svg') ?>" alt="<?= $site->subtitle()->html() ?>">
</header>
