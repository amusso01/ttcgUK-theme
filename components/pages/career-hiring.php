<?php

$cards = get_field('positions');
?>

<section class="fdry-career-2-hiring">
  <div class="content-block content-max-small">
    <h3 class="fdry-career-2-hiring__title"><?= get_field('title_hiring') ?></h3>

    <div class="subtitle"><?= get_field('subtitle_hiring') ?></div>

    <div class="fdry-career-2-hiring__grid">
      <?php foreach ($cards as $card) : ?>
        <div class="fdry-career-2-hiring__single-card">
          <a href="<?= $card['link']['url'] ?>">

            <figure>
              <img src="<?= $card['image']['url'] ?>">
            </figure>
            <div class="content">
              <p><?= $card['title'] ?></p>
            </div>

          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>