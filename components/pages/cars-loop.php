<?php

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
  $metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;

if ($listingType != 'similarcarlisting') {

  $carsArray = [];
  get_template_part('components/getters/car-getter', 'front-page');
}



?>
<?php //get_template_part( 'components/modal/car-info' ) 
?>
<?php

$showListing = true;
$fpOptions = get_field('front_page', 'options');
if ($wp->request === '' && !empty($fpOptions['top_desktop'])) :
  $banner_top_desktop_front_page = $fpOptions['top_desktop'];
  $banner_top_mobile_front_page = $fpOptions['top_mobile'];
  $banner_sticky_mobile = $fpOptions['sticky_mobile'];
endif;
?>

<?php
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
<!-- This script output all the banners in JSON those will be used by carlisting.js to break the loop every 4 cars and insert the banner -->
<script type="text/javascript">
  const breakBanners = <?php echo json_encode($banner_break_front_page); ?>;
</script>
<!-- THIS IS THE HTML USED BY carlisting JS to build the banner OLD THEME METHOD-->
<!-- <div class="fdry-carlist-break-banner" >
    <img class="d-none carlist-desktop-break d-md-block w-100"
          src="<?php echo $banner_break_front_page[0]['desktop']; ?>?v=<?php echo date("HdmY"); ?>"/>
    <img class="d-md-none carlist-mobile-break w-100"
          src="<?php echo $banner_break_front_page[0]['mobile']; ?>?v=<?php echo date("HdmY"); ?>"/>
</div> -->
<!-- END OF BANNER BREAK -->


<section class="fdry-carlisting__loop">
  <div class="d-none col-12 py-5 mb-3" style="background-color: #0D64E5">
    <h1 style="color: #fff; text-align: center;">BREAK</h1>
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
            //   var_dump($i);
            //   var_dump($i % 4);
            // switch ($carItem['type']) {
            //     case LISTING_NORMAL_MODE :
            //         get_template_part('template-parts/carslisting/normal-mode-cars-item', 'front-page');
            //         break;
            //     case LISTING_SALE_MODE :
            //         get_template_part('template-parts/carslisting/sale-mode-cars-item', 'front-page');
            //         break;
            //     case LISTING_FROM_MODE :
            //         get_template_part('template-parts/carslisting/from-mode-cars-item', 'front-page');
            //         break;
            //     case LISTING_SPECIALS :
            //         get_template_part('template-parts/carslisting/special-cars-item', 'front-page');
            //         break;
            // }
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


<!-- <section class="container-fluid | carslisting <?php
                                                    echo $listingType; ?>"> -->



<?php

?>
<?php
// if (isset($show404)) {
//     get_template_part('template-parts/404-block', 'front-page');
// }
?>







<?php

// if ($carId && !$similarCars) {
//     get_template_part('template-parts/carslisting/car-detail', 'front-page');
// }
?>
<!-- </section> -->

<?php
// if ($carId && !$similarCars) {
//     get_template_part('template-parts/carslisting/tc-promise', 'front-page');
// }


?>