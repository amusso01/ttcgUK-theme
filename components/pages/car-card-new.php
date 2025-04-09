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

?>

<div class="fdry-car-single-card__new">
  <div class="stock-count">
    <p><span class="bold"><?= get_field('total_make_in_stock', $carItem['car_id']) ?> <?= $carItem['make_title']  ?></span> In Stock </p>
  </div>
  <div class="fdry-car-single-card__save-banner">

    <h1><?= $carItem['reg_year'] ?> <span class="title-yellow"><?= $carItem['make_title'] ?> <?= $carItem['model_title'] ?></span></h1>
    <p><?= $carItem['derivative'] ?> </p>



  </div>

  <div class="fdry-car-single__info">
    <a <?= $link ?>">
      <div class="fdry-car-single__info-grid-stack">

        <div class="fdry-car-single__info-stack-item">

          <div class="fdy-car-single-card__rrp ">
            <div class="rrp-wrapper">
              <p>RRP <span>cap hpi</span></p>
              <div class="fdryRrpInfo">
                <img src="<?= get_template_directory_uri() ?>/dist/images/info.svg" alt="info">
              </div>
            </div>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.764" height="23.809" viewBox="0 0 16.764 23.809">
                      <path id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" d="M15.977,11.787C14.841,9.281,11.434,4.621,8.38,0,5.365,4.621,1.958,9.281.822,11.787A8.147,8.147,0,0,0,0,15.429a8.38,8.38,0,1,0,16.76,0A7.63,7.63,0,0,0,15.977,11.787Zm-7.6,9.594A5.725,5.725,0,0,1,4.7,11.278a5.717,5.717,0,0,0,4.973,8.537,5.616,5.616,0,0,0,3.642-1.331A5.587,5.587,0,0,1,8.38,21.381Z" fill="#1464e3" />
                    </svg>
                    <p class="spec"><?php echo $carItem['fueltype']; ?></p>
                  </div>
                <?php } ?>
                <?php if ($carItem['mileage'] > 0) { ?>
                  <div class="featurebox">
                    <svg id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" xmlns="http://www.w3.org/2000/svg" width="32.559" height="17.759" viewBox="0 0 32.559 17.759">
                      <path id="Path_2379" data-name="Path 2379" d="M27.808,30.616a1.919,1.919,0,0,1-.226,1.429,1.905,1.905,0,0,1-2.594.6,2.085,2.085,0,0,1-.3-.226,2.286,2.286,0,0,1-.564-.9l-.038-.113L15.1,24.3l10.3,4.925.113-.038a1.815,1.815,0,0,1,1.391.263,1.744,1.744,0,0,1,.9,1.165" transform="translate(-9.423 -15.164)" fill="#1464e3" />
                      <path id="Path_2380" data-name="Path 2380" d="M32.559,16.091A16.067,16.067,0,0,0,27.784,4.775a16.247,16.247,0,0,0-23.009,0A16,16,0,0,0,0,16.091v.038H5.715V15.076H3.045a13.032,13.032,0,0,1,.9-3.8h0l2.369.978.451-1.128-2.331-.94h0A13.428,13.428,0,0,1,6.692,7.031h0L8.384,8.685l.865-.865L7.595,6.166A12.946,12.946,0,0,1,10.79,4.1l.865,2.068,1.128-.451-.865-2.068h0a12.115,12.115,0,0,1,3.722-.714V5.151h1.2V2.933a13.576,13.576,0,0,1,3.722.677L19.7,5.677l1.128.451.865-2.105h0a13.765,13.765,0,0,1,3.233,2.03L23.272,7.745l.79.9,1.692-1.692h0a14.2,14.2,0,0,1,2.293,3.121h0l-2.369.978.451,1.128,2.406-1.015a13.279,13.279,0,0,1,.94,3.872H26.694v1.09h5.79c.075,0,.075-.038.075-.038" transform="translate(0 0)" fill="#1464e3" />
                    </svg>
                    <p class="spec"><?php echo $carItem['mileage']; ?> Miles</p>
                  </div>
                <?php } ?>
                <?php if ($insurence != "") { ?>
                  <div class="featurebox">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.627" height="20.911" viewBox="0 0 30.627 20.911">
                      <path id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" d="M3.734,9.011l2.108.748a.962.962,0,0,1,.646.918.95.95,0,0,1-.952.952H3.258a1.36,1.36,0,0,1,0-2.72c.17.034.306.068.476.1M22.4,18.293V11.221h5.338a21.576,21.576,0,0,0,.578-4.42A23.55,23.55,0,0,1,22.4,5.134v6.086H17.028a11.254,11.254,0,0,0,2.346,4.726A11.867,11.867,0,0,0,22.4,18.293m0-15.675A22.8,22.8,0,0,1,14.138,4.76C14,13.6,16.654,18.191,22.4,20.911c5.78-2.72,8.4-7.344,8.262-16.151A23.842,23.842,0,0,1,22.4,2.618m0,1.53a25.021,25.021,0,0,0,6.868,1.836c-.068,3.706-.68,7.718-3.2,10.575A12.228,12.228,0,0,1,22.4,19.347a12.363,12.363,0,0,1-3.672-2.788C16.212,13.7,15.6,9.725,15.532,5.984A25.347,25.347,0,0,0,22.4,4.148M9.378,13.261H14.24A24.538,24.538,0,0,1,13.22,6.6H3.938a.441.441,0,0,1-.374-.714L5.808,2.244A2.558,2.558,0,0,1,7.814,1.156h9.079A2.566,2.566,0,0,1,18.9,2.244l.374.612c.374-.1.748-.238,1.122-.374l-.51-.816A3.555,3.555,0,0,0,16.892,0H7.814A3.7,3.7,0,0,0,4.822,1.632l-1.7,2.754H.979c-.986,0-1.326,1.564-.374,1.87l1.156.374-.51.85c-.68,1.054-.816,2.89-.816,4.59v5.61a.609.609,0,0,0,.612.612H3.666a.609.609,0,0,0,.612-.612v-1.5H15.6a11.84,11.84,0,0,1-.748-1.462H9.412a.377.377,0,0,1-.374-.374v-.68a.343.343,0,0,1,.34-.408" transform="translate(-0.041)" fill="#1464e3" />
                    </svg>
                    <p class="spec"><?php echo $insurence; ?> Ins. Group</p>
                  </div>
                <?php } ?>
              </div>

              <div class="low-milage-row">
                <?php if ($carItem['mileage'] < 60000) : ?>
                  <img src="<?= get_template_directory_uri() ?>/dist/images/lm.svg" alt="Low Mileage">
                <?php endif; ?>
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