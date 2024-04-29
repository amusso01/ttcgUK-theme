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


            if ($i % 4 === 0 && $carItem['discounted_price'] !== $carItem['rrp']) { ?>
              <div class="car-4-grid-row content-block content-block__carloop" style="margin-top: 45px;">
              <?php
            }


            if ($carItem['discounted_price'] !== $carItem['rrp']) :
              $i++;
              ?>
                <?php get_template_part('components/pages/car-card', 'front-page'); ?>
              <?php endif ?>

              <?php if ($i % 4 === 0 && $carItem['discounted_price'] !== $carItem['rrp']) { ?>
              </div>
            <?php
              }

              if ($i % 4 === 0) { ?>


          <?php
                if ($x + 1  === $countLoop) {
                  $x = 0;
                } else {
                  $x++;
                }
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