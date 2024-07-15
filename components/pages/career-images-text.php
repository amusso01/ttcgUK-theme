<?php

$cards = get_field('images_text');
?>

<section class="fdry-career-2-images-text">
  <div class="content-block content-max">

    <?php foreach ($cards as $key => $card) : ?>
      <div class="fdry-career-2-images-text__grid <?= ($key % 2) === 0 ? '' : 'inverse' ?>">
        <?php if (!$card['has_video']) : ?>
          <figure>
            <img src="<?= $card['image']['url'] ?>">
          </figure>
        <?php else : ?>
          <video controls width="100%">
            <source src="<?= $card['video'] ?>" type="video/mp4" />
          </video>
        <?php endif; ?>
        <div class="content">
          <div class="title"><?= $card['title'] ?></div>
          <div class="text">
            <?= $card['body'] ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>