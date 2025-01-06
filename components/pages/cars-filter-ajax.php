<?php

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
  $metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;


$carsArray = [];
get_template_part('components/getters/car-getter', 'front-page');




?>
<style>
  .car-4-grid-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    column-gap: 15px;
    row-gap: 20px;
  }

  .fdry-filter__loader {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle fill="%230044B0" stroke="%230044B0" stroke-width="21" r="15" cx="40" cy="100"><animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate></circle><circle fill="%230044B0" stroke="%230044B0" stroke-width="21" r="15" cx="100" cy="100"><animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate></circle><circle fill="%230044B0" stroke="%230044B0" stroke-width="21" r="15" cx="160" cy="100"><animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate></circle></svg>');
    background-color: white;
    z-index: 10;
    opacity: 0;
    background-size: 180px;
    background-position: top center;
    background-repeat: no-repeat;
    pointer-events: none;
    visibility: hidden;
  }

  .fdry-filter__loader.active {
    pointer-events: all;
    opacity: 0.8;
    visibility: visible;
  }

  .fdry-carlistrow {
    position: relative;
  }

  .fdry-filter__top-nav {
    margin-top: 35px;
    margin-bottom: 15px;
  }

  .fdry-filter__top-nav button {
    border: 1px solid #1834A0;
    background-color: transparent;
    padding: 5px 18px;
    border-radius: 40px;
    font-weight: 600;
    transition: box-shadow 0.5s;
  }

  .fdry-filter__top-nav button:hover {
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }

  .fdry-filter__top-nav button:disabled {
    background-color: transparent;
    color: black;
    opacity: 0.5;
    pointer-events: none;
  }

  .fdry-filter__top-nav button.selected {
    background-color: #1834A0;
    color: white;
  }

  .fdry-filter__top-nav h3 {
    margin-bottom: 25px;
  }
</style>


<section class="fdry-carlisting__loop">
  <div class="content-max content-block__carloop fdry-filter__top-nav">

    <h3>Car Filter</h3>

    <button class='filterBtn selected' data-filter="all">ALL</button>
    <button class='filterBtn' data-filter="small">SMALL</button>
    <button class='filterBtn' data-filter="family">FAMILY</button>
    <button class='filterBtn' data-filter="premium">PREMIUM</button>
    <button class='filterBtn' data-filter="suv">SUV</button>

  </div>

  <div class="fdry-carlistrow carlistrow">
    <div class="fdry-filter__loader"></div>
    <?php

    $amount = count($carsArray);

    if ($amount) { ?>
      <div class="content-max">
        <div class="fdry-carrow__grid car-4-grid-row content-block__carloop" id="filterContainer">

          <?php
          foreach ($carsArray as $carItem) {


            get_template_part('components/pages/car-card', 'front-page');
          }
          ?>

        </div>
      </div>
    <?php
    } else {
      if (!$carmake->post_title) {
        $carname = 'cars';
      } else {
        $carname = $carmake->post_title . ' ' . $carmodel->post_title;
      }
    ?>
      <p>We currently have no <?php
                              echo $carname; ?> in our Daily Specials, however we have a large
        selection to choose from at our car supermarkets.</p>
    <?php
    }
    ?>
  </div>


</section>