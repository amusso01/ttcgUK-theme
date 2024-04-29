<?php

$cards = get_field('icon_cards');
?>

<section class="fdry-career-2-why-work">
  <div class="content-block content-max-small">
    <h3 class="fdry-career-2-why-work__title"><?= get_field('title_why_work') ?></h3>

    <div class="subtitle"><?= get_field('sub_title_why_work') ?></div>

    <div class="fdry-career-2-why-work__grid">
      <?php foreach ($cards as $card) : ?>
        <div class="fdry-career-2-why-work__single-card">
          <?= acfFile_toSvg($card['icon']['url']) ?>
          <p><?= $card['text'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>