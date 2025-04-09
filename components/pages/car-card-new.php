<?php

global $carItem, $carmodel, $saleModeDiscount, $amount, $listingType, $hide1hrMsg, $regYear, $carId;

if (empty($carItem['image'])) {
  $carItem['image'] = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '.png';
}


$imageCar = get_field('image_url-fdry', $carItem['car_id']);
$paintId = get_field('fdry_paint_id', $carItem['car_id']);

if ($paintId) {
  $carItem['paint_description'] = $paintId;
}


$carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $carItem['make_name'] . '&modelFamily=' . $carItem['model_name'] . '&modelYear=' . $carItem['reg_year'] . '&modelRange=' . $carItem['model_name'] . '&modelVariant=' .  $carItem['body_type'] . '&powerTrain=' . $carItem['power_train'] . '&bodySize=' . $carItem['body_size'] . '&trim=' . $carItem['trim'] . '&paintDescription=' . $carItem['paint_description'] . '&rimId=' . $carItem['rim_id'] . '&rimDescription=' . $carItem['rim_description'] . '&interiorId=' . $carItem['interior_id'] . '&interiorDescription=' . $carItem['interior_description'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.80&countryCode=GB';




if ($imageCar) {
  $carItem['image'] = $imageCar;
}
if (has_post_thumbnail($carItem['model_id'])) {
  $carItem['image'] = get_the_post_thumbnail_url($carItem['model_id']);
}


// $mixDiscount = $carItem['discount'] > 0 ? true : false;
$mixDiscount = false;

// Text for message in top card banner. TO DO
$carBannerTxt = get_field('discount_banner_text_v1', $carItem['car_id']);


$carPriceRRP = $carItem['rrp'] ? $carItem['rrp'] : 'TBC';
$carDiscountedPrice = $carItem['discounted_price'];

// GET CAR SPEC
$techinfo = cns_car_technical_data($carItem['car_id']);
$emission = $techinfo['Emissions - ICE']['CO2 (g/km)'];
$mpgCombined = $techinfo['Fuel Consumption - ICE']['EC Combined (mpg)'];


$mpg = "";
$insurence = "";
foreach ($techinfo as $categoryName => $data) :
  foreach ($data as $featureTitle => $featureValue) :
    if ($featureValue != "Not Available") {
      if (strpos($featureTitle, "(mpg)") !== false) {
        $mpg = $featureValue;
      }

      if (strpos($featureTitle, "Insurance") !== false) {
        $insurence = $featureValue;
      }
    }

  endforeach;

endforeach;

?>

<?php

if (strtolower($carItem['make_title']) == 'mercedes-benz') {
  $carItem['make_title'] = 'Mercedes';
}

$saleMessage = $saleModeDiscount;
if (isset($carItem['sale_mode_override']) && !empty($carItem['sale_mode_override'])) {
  $saleMessage = html_entity_decode($carItem['sale_mode_override']);
}



if (empty($carId) || $listingType === 'similarcarlisting') {
  //$link = 'href="' . area_link('/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'], true) . '"';
  $link = 'href="' . '/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '/' . $carItem['car_id'] . '"';
} else {
  $link = '';
}

$showRibbon = get_field('show_red_ribbon', 'option');
$ribbonText = get_field('red_ribbon_text', 'option');

// GLOBAL DISCOUNT
$isDiscount = get_field('discount_active', 'option');
$tagImg = get_field('tag_image_for_discount', 'option');

$cardPadding = get_field('padding_card_top', 'option');
$tagOffset = get_field('tag_offset_top', 'option');


?>

<div class="fdry-car-single-card__new">
  <div class="fdry-car-single-card__save-banner">

    <h1><?= $carItem['reg_year'] ?> <span class="title-yellow"><?= $carItem['make_title'] ?> <?= $carItem['model_title'] ?></span></h1>
    <p><?= $carItem['derivative'] ?> </p>

  </div>

  <div class="fdry-car-single__info">
    <a <?= $link ?>">
      <div class="fdry-car-single__info-grid-stack">

        <div class="fdry-car-single__info-stack-item">

          <div class="fdy-car-single-card__rrp ">
            <p>RRP <span>cap hpi</span></p>
            <p class="price">&pound;<?= $carItem['cap_price'] ?></p>
          </div>


        </div>
        <div class="fdry-car-single__info-stack-item">

          <div class="fdy-car-single-card__tcprice ">
            <p>OUR PRICE</p>
            <p class="price">&pound;<?= $carDiscountedPrice ?></p>
          </div>


        </div>
        <div class="fdry-car-single__info-stack-item">

          <div class="fdy-car-single-card__save ">
            <p>
              SAVE
            </p>
            <p class="price">
              £<?= ($carItem['cap_price'] - $carDiscountedPrice) > 0 ? ($carItem['cap_price'] - $carDiscountedPrice) : '' ?>
            </p>
          </div>

        </div>

        <div class="fdry-car-single__info-stack-item">
          <div class="fdry-car-single__info-stack-item__grid">
            <div class="fdy-car-single-card__image ">
              <figure class="<?= $mixDiscount ? 'discount-bg' : '' ?>" data-vrm="<?= $carItem['reg_number']; ?>">
                <img class="car-img" src="<?= $carItem['image']; ?>" alt="<?= $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" />
              </figure>
              <div class="fdy-car-features">
                <?php if ($carItem['fueltype'] != "") { ?>
                  <div class="featurebox">
                    <p class="spec"><?php echo $carItem['fueltype']; ?></p>
                  </div>
                <?php } ?>
                <?php if ($carItem['mileage'] > 0) { ?>
                  <div class="featurebox">
                    <p class="spec"><?php echo $carItem['mileage']; ?> Miles</p>
                  </div>
                <?php } ?>
                <?php if ($insurence != "") { ?>
                  <div class="featurebox">
                    <p class="spec"><?php echo $insurence; ?> Ins. Group</p>
                  </div>
                <?php } ?>
              </div>
            </div>

            <div class="fdy-car-single-card__finance-price">

              <p class="price-divider">
                <span>OR</span>
              </p>
              <p>JUST</p>
              <p class="price">&pound;<?= TcFinance::getMonthlyPrice($carDiscountedPrice); ?></p>
              <p class="price-text">A MONTH</p>
            </div>

          </div>
        </div>
        <div class="fdry-car-single__info-stack-item">

          <div class="fdy-car-single-card__promo ">
            <p>
              DRIVE AWAY TODAY - NO DEPOSIT AVAILABLE <span>T&Cs APPLY</span>
            </p>
          </div>

        </div>

      </div>
    </a>
  </div>

  <div class="fdry-single-car__mobile-finance-check">
    <a href="/finance-check?make=<?= $carItem['make_title']; ?>&model=<?= $carItem['model_title']; ?>&vid=<?= $carItem['stock_number']; ?>" class="fdry-finance-check-mobile__btn-img">
      <img src="<?= get_template_directory_uri() ?>/dist/images/Finance-new.svg" alt="Free finance check button">
    </a>
  </div>

</div>