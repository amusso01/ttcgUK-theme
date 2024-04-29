<?php

$gallery = get_field('gallery');

?>

<section class="fdry-career-2-gallery">
  <div class="content-block content-max-small">
    <div class="fdry-career-2-gallery__grid">
      <?php foreach ($gallery as $image) : ?>

        <figure>
          <img src="<?= $image['url'] ?>">
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>