<?php $faqs = get_field('faqs') ?>

<div class="fdry-accordion-block content-block content-max">
  <h2 class="fdry-accordion-block__title">FAQ</h2>
  <div class="fdry-accordion-container ">
    <?php foreach ($faqs as $faq) : ?>
      <div class="ac">
        <h2 class="ac-header">
          <button type="button" class="ac-trigger"><?= $faq['title'] ?></button>
        </h2>
        <div class="ac-panel">
          <?= $faq['content']; ?>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <?php $applyUrl = get_field('url_apply') ?>
  <a href="<?= $applyUrl ?>" class="fdry-btn-locations">APPLY NOW</a>
</div>