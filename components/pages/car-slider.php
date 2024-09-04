<?php

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
  $metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;

$carsArray = [];
get_template_part('components/getters/car-getter', 'front-page');


$amount = count($carsArray);
?>

<section class="fdry-car-slider">
  <div class="content-block content-max">

    <div class="splide splideCars" role="group" aria-label="Cars rolling">
      <div class="splide__track">
        <ul class="splide__list">

          <?php foreach ($carsArray as $carItem) : ?>
            <li class="splide__slide">
              <?php get_template_part('components/pages/car-card', 'front-page'); ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

  </div>
</section>