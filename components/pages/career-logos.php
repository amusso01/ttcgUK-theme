<?php
$logos = get_field('logos');
?>

<section class="fdry-career-2-logos">
  <div class="content-block content-max">
    <h3><?= get_field('title_logo') ?></h3>


    <div class="splide splideLogos" role="group" aria-label="Logos rolling">
      <div class="splide__track">
        <ul class="splide__list">

          <?php foreach ($logos as $logo) : ?>
            <li class="splide__slide">
              <figure>
                <img src="<?= $logo['image']['url'] ?>">
              </figure>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>


  </div>
</section>