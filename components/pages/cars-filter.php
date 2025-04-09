<?php

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
  $metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;


$carsArray = [];
get_template_part('components/getters/car-getter', 'front-page');

// banners
$fpOptions = get_field('front_page', 'options');
$banner_break_small = [];
$banner_break_family = [];
$banner_break_suv = [];
$banner_break_premium = [];
if (count($fpOptions['break_collection'])) :
  foreach ($fpOptions['break_collection'] as $breakRow) {

    foreach ($breakRow['car_category'] as $category) {
      if ($category === 'small') {
        $banner_break_small[] = [
          'desktop' => $breakRow['break_desktop'],
          'desktop_link' => $breakRow['break_desktop_link'],
          'mobile' => $breakRow['break_mobile'],
          'mobile_link' => $breakRow['break_mobile_link'],
        ];
      }
      if ($category === 'family') {
        $banner_break_family[] = [
          'desktop' => $breakRow['break_desktop'],
          'desktop_link' => $breakRow['break_desktop_link'],
          'mobile' => $breakRow['break_mobile'],
          'mobile_link' => $breakRow['break_mobile_link'],
        ];
      }
      if ($category === 'suv') {
        $banner_break_suv[] = [
          'desktop' => $breakRow['break_desktop'],
          'desktop_link' => $breakRow['break_desktop_link'],
          'mobile' => $breakRow['break_mobile'],
          'mobile_link' => $breakRow['break_mobile_link'],
        ];
      }
      if ($category === 'premium') {
        $banner_break_premium[] = [
          'desktop' => $breakRow['break_desktop'],
          'desktop_link' => $breakRow['break_desktop_link'],
          'mobile' => $breakRow['break_mobile'],
          'mobile_link' => $breakRow['break_mobile_link'],
        ];
      }
    }
  }
endif;

// Create the filtered cars array based on page
$filteredArray = [];
$bannerArray = [];
$whichPage = "all";
if (is_page('car-filters-small')) {
  $whichPage = 'small';
  foreach ($carsArray as $key => $carFiltered) {
    if (strtolower($carFiltered['size']) === $whichPage or $carFiltered['size'] === 'Micro') {
      $filteredArray[] = $carFiltered;
    }
  }
  $carsArray = $filteredArray;
} elseif (is_page('car-filters-family')) {
  $whichPage = 'medium/large';
  foreach ($carsArray as $key => $carFiltered) {
    if (strtolower($carFiltered['size']) === $whichPage) {
      $filteredArray[] = $carFiltered;
    }
  }
  $carsArray = $filteredArray;
} elseif (is_page('car-filters-premium')) {
  $whichPage = 'premium';
  foreach ($carsArray as $key => $carFiltered) {
    if (strtolower($carFiltered['premium']) === $whichPage) {
      $filteredArray[] = $carFiltered;
    }
  }
  $carsArray = $filteredArray;
} elseif (is_page('car-filters-suv')) {
  $whichPage = 'suv';
  foreach ($carsArray as $key => $carFiltered) {
    if (strtolower($carFiltered['suv']) === $whichPage) {
      $filteredArray[] = $carFiltered;
    }
  }
  $carsArray = $filteredArray;
}

if (is_page('car-filters-small')) {
  $bannerArray = $banner_break_small;
} elseif (is_page('car-filters-family')) {
  $bannerArray = $banner_break_family;
} elseif (is_page('car-filters-premium')) {
  $bannerArray = $banner_break_premium;
} elseif (is_page('car-filters-suv')) {
  $bannerArray = $banner_break_suv;
} else {
  foreach ($fpOptions['break_collection'] as $breakRow) {
    $bannerArray[] = [
      'desktop' => $breakRow['break_desktop'],
      'desktop_link' => $breakRow['break_desktop_link'],
      'mobile' => $breakRow['break_mobile'],
      'mobile_link' => $breakRow['break_mobile_link']
    ];
  }
}


?>



<section class="fdry-carlisting__loop">

  <?php get_template_part('components/partials/filter-nav') ?>

  <div class="fdry-carlistrow carlistrow">
    <?php

    $amount = count($carsArray);

    if ($amount) { ?>
      <div class="content-max">
        <div class="fdry-carrow__grid">

          <?php
          $x = 0;
          $i = 0;
          foreach ($carsArray as $carItem) {
            $i++;
            if ($i % 3 === 1) { ?>
              <div class="car-3-grid-row content-block content-block__carloop">
              <?php
            }


            get_template_part('components/pages/car-card-new', 'front-page');

            if ($i % 3 === 0) { ?>
              </div>
              <?php
              $countLoop = count($bannerArray);
              ?>

              <div class="fdry-carlist-break-banner">

                <?php
                $extDesktop = end(explode('.', $bannerArray[$x]['desktop']));

                if ($extDesktop === 'mp4') :
                ?>
                  <div class="video_wrapper">
                    <?php if ($bannerArray[$x]['desktop_link']) : ?>
                      <a href="<?= $bannerArray[$x]['desktop_link'] ?>">
                      <?php endif; ?>
                      <!-- DESKTOP VIDEO -->
                      <video class="fdry-video fdry-video-desktop" src="<?php echo $bannerArray[$x]['desktop'] ?>?v=<?php
                                                                                                                    echo date("HdmY"); ?>" width="100%" autoplay loop muted style="background-image:url('/images/banner_bg_tcuk.jpg')"></video>
                      <?php if ($bannerArray[$x]['desktop_link']) : ?>
                      </a>
                    <?php endif; ?>

                    <?php if ($bannerArray[$x]['mobile_link']) : ?>
                      <a href="<?= $bannerArray[$x]['mobile_link'] ?>">
                      <?php endif; ?>
                      <!-- MOBILE VIDEO -->
                      <video muted="" playsinline="" class="fdry-video fdry-video-mobile" src="<?php echo $bannerArray[$x]['mobile']  ?>?v=<?php
                                                                                                                                            echo date("HdmY"); ?>" width="100%" autoplay loop style="background-image:url('/images/banner_bg_mob_tcuk.jpg')">
                      </video>
                      <?php if ($bannerArray[$x]['mobile_link']) : ?>

                      </a>
                    <?php endif; ?>
                  </div>

                <?php else : ?>
                  <?php if ($bannerArray[$x]['desktop_link']) : ?>
                    <a href="<?= $bannerArray[$x]['desktop_link'] ?>">
                    <?php endif; ?>
                    <img class="d-none carlist-desktop-break d-md-block w-100" src="<?php echo $bannerArray[$x]['desktop']; ?>?v=<?php echo date("HdmY"); ?>" />
                    <?php if ($bannerArray[$x]['desktop_link']) : ?>
                    </a>
                  <?php endif; ?>

                  <?php if ($bannerArray[$x]['mobile_link']) : ?>
                    <a href="<?= $bannerArray[$x]['mobile_link'] ?>">
                    <?php endif; ?>
                    <img class="d-md-none carlist-mobile-break w-100" src="<?php echo $bannerArray[$x]['mobile']; ?>?v=<?php echo date("HdmY"); ?>" />
                    <?php if ($bannerArray[$x]['mobile_link']) : ?>
                    </a>
                  <?php endif; ?>

                <?php endif; ?>
              </div>
          <?php
              if ($x + 1  === $countLoop) {
                $x = 0;
              } else {
                $x++;
              }
              // get_template_part( 'components/banners/carloop-banner');
            }
          } ?>

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