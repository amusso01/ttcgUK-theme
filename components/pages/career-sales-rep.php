<?php

$cards = get_field('rep_sales_cads');


?>

<section class="fdry-career-2-top-banner ">
  <div class="content-block">
    <h3 class="fdry-career-2-top-banner__title"><?= get_field('title_sales') ?></h3>

    <div class="fdry-career-2-top-banner__grid">
      <?php foreach ($cards as $card) : ?>

        <div class="fdry-career-2-top-banner__card content-max">
          <figure>
            <img src="<?= $card['image']['url'] ?>">
          </figure>
          <div class="fdry-career-2-top-banner__card-content">
            <h4><?= $card['title'] ?></h4>
            <p><?= $card['body'] ?></p>
          </div>
        </div>

      <?php endforeach; ?>
    </div>

  </div>
</section>