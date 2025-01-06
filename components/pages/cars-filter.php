<?php

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
  $metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;


$carsArray = [];
get_template_part('components/getters/car-getter', 'front-page');

// banners
$fpOptions = get_field('front_page', 'options');
$banner_break_front_page = [];
if (count($fpOptions['break_collection'])) :
  foreach ($fpOptions['break_collection'] as $breakRow) {
    $banner_break_front_page[] = [
      'desktop' => $breakRow['break_desktop'],
      'desktop_link' => $breakRow['break_desktop_link'],
      'mobile' => $breakRow['break_mobile'],
      'mobile_link' => $breakRow['break_mobile_link']
    ];
  }
endif;

$filteredArray = [];
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


?>



<section class="fdry-carlisting__loop">
  <div class="content-max content-block__carloop fdry-filter__top-nav">

    <!-- <h3>Car Filter</h3> -->
    <div class="fdry-filter__nav">

      <button class='filterBtn-noAjax <?= $whichPage === 'all' ? 'selected' : '' ?>' data-filter="all"><a href="<?= site_url('/car-filters') ?>">ALL</a></button>
      <button class='filterBtn-noAjax <?= $whichPage === 'small' ? 'selected' : '' ?>' data-filter="small"><a href="<?= site_url('/car-filters-small') ?>">SMALL</a></button>
      <button class='filterBtn-noAjax <?= $whichPage === 'medium/large' ? 'selected' : '' ?>' data-filter="family"><a href="<?= site_url('/car-filters-family') ?>">FAMILY</a></button>
      <button class='filterBtn-noAjax <?= $whichPage === 'premium' ? 'selected' : '' ?>' data-filter="premium"><a href="<?= site_url('/car-filters-premium') ?>">PREMIUM</a></button>
      <button class='filterBtn-noAjax <?= $whichPage === 'suv' ? 'selected' : '' ?>' data-filter="suv"><a href="<?= site_url('/car-filters-suv') ?>">SUV</a></button>

    </div>


  </div>

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
            if ($i % 4 === 1) { ?>
              <div class="car-4-grid-row content-block content-block__carloop">
              <?php
            }


            get_template_part('components/pages/car-card', 'front-page');

            if ($i % 4 === 0) { ?>
              </div>
              <?php
              $countLoop = count($fpOptions['break_collection']);
              // dd(count($fpOptions['break_collection']));
              $banner_break_front_page = [];
              if (count($fpOptions['break_collection'])) :
                foreach ($fpOptions['break_collection'] as $breakRow) {
                  $banner_break_front_page[] = [
                    'desktop' => $breakRow['break_desktop'],
                    'desktop_link' => $breakRow['break_desktop_link'],
                    'mobile' => $breakRow['break_mobile'],
                    'mobile_link' => $breakRow['break_mobile_link']
                  ];
                }
              endif;
              ?>

              <div class="fdry-carlist-break-banner">

                <?php
                $extDesktop = end(explode('.', $banner_break_front_page[$x]['desktop']));

                if ($extDesktop === 'mp4') :
                ?>
                  <div class="video_wrapper">
                    <?php if ($banner_break_front_page[$x]['desktop_link']) : ?>
                      <a href="<?= $banner_break_front_page[$x]['desktop_link'] ?>">
                      <?php endif; ?>
                      <!-- DESKTOP VIDEO -->
                      <video class="fdry-video fdry-video-desktop" src="<?php echo $banner_break_front_page[$x]['desktop'] ?>?v=<?php
                                                                                                                                echo date("HdmY"); ?>" width="100%" autoplay loop muted style="background-image:url('/images/banner_bg_tcuk.jpg')"></video>
                      <?php if ($banner_break_front_page[$x]['desktop_link']) : ?>
                      </a>
                    <?php endif; ?>

                    <?php if ($banner_break_front_page[$x]['mobile_link']) : ?>
                      <a href="<?= $banner_break_front_page[$x]['mobile_link'] ?>">
                      <?php endif; ?>
                      <!-- MOBILE VIDEO -->
                      <video muted="" playsinline="" class="fdry-video fdry-video-mobile" src="<?php echo $banner_break_front_page[$x]['mobile']  ?>?v=<?php
                                                                                                                                                        echo date("HdmY"); ?>" width="100%" autoplay loop style="background-image:url('/images/banner_bg_mob_tcuk.jpg')">
                      </video>
                      <?php if ($banner_break_front_page[$x]['mobile_link']) : ?>

                      </a>
                    <?php endif; ?>
                  </div>

                <?php else : ?>
                  <?php if ($banner_break_front_page[$x]['desktop_link']) : ?>
                    <a href="<?= $banner_break_front_page[$x]['desktop_link'] ?>">
                    <?php endif; ?>
                    <img class="d-none carlist-desktop-break d-md-block w-100" src="<?php echo $banner_break_front_page[$x]['desktop']; ?>?v=<?php echo date("HdmY"); ?>" />
                    <?php if ($banner_break_front_page[$x]['desktop_link']) : ?>
                    </a>
                  <?php endif; ?>

                  <?php if ($banner_break_front_page[$x]['mobile_link']) : ?>
                    <a href="<?= $banner_break_front_page[$x]['mobile_link'] ?>">
                    <?php endif; ?>
                    <img class="d-md-none carlist-mobile-break w-100" src="<?php echo $banner_break_front_page[$x]['mobile']; ?>?v=<?php echo date("HdmY"); ?>" />
                    <?php if ($banner_break_front_page[$x]['mobile_link']) : ?>
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