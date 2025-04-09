<?php

global $carItem, $carmodel, $saleModeDiscount, $amount, $listingType, $hide1hrMsg, $regYear, $carId, $similarUniqueCarsArray;

?>


<?php foreach ($similarUniqueCarsArray as $similarCarItem) : ?>
    <?php
    if (empty($similarCarItem['image'])) {
        $similarCarItem['image'] = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $similarCarItem['make_name'] . '/' . $similarCarItem['model_name'] . '.png';
    }


    $imageCar = get_field('image_url-fdry', $similarCarItem['car_id']);
    $paintId = get_field('fdry_paint_id', $similarCarItem['car_id']);

    if ($paintId) {
        $similarCarItem['paint_description'] = $paintId;
    }


    $similarCarItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $similarCarItem['make_name'] . '&modelFamily=' . $similarCarItem['model_name'] . '&modelYear=' . $similarCarItem['reg_year'] . '&modelRange=' . $similarCarItem['model_name'] . '&modelVariant=' .  $similarCarItem['body_type'] . '&powerTrain=' . $similarCarItem['power_train'] . '&bodySize=' . $similarCarItem['body_size'] . '&trim=' . $similarCarItem['trim'] . '&paintDescription=' . $similarCarItem['paint_description'] . '&rimId=' . $similarCarItem['rim_id'] . '&rimDescription=' . $similarCarItem['rim_description'] . '&interiorId=' . $similarCarItem['interior_id'] . '&interiorDescription=' . $similarCarItem['interior_description'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.80&countryCode=GB';




    if ($imageCar) {
        $similarCarItem['image'] = $imageCar;
    }
    if (has_post_thumbnail($similarCarItem['model_id'])) {
        $similarCarItem['image'] = get_the_post_thumbnail_url($similarCarItem['model_id']);
    }


    // $mixDiscount = $similarCarItem['discount'] > 0 ? true : false;
    $mixDiscount = false;

    // Text for message in top card banner. TO DO
    $carBannerTxt = get_field('discount_banner_text_v1', $similarCarItem['car_id']);


    $carPriceRRP = $similarCarItem['rrp'] ? $similarCarItem['rrp'] : 'TBC';
    $carDiscountedPrice = $similarCarItem['discounted_price'];

    // GET CAR SPEC
    // $techinfo = cns_car_technical_data($similarCarItem['car_id']);
    // $emission = $techinfo['Emissions - ICE']['CO2 (g/km)'];
    // $mpgCombined = $techinfo['Fuel Consumption - ICE']['EC Combined (mpg)'];


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

    if (strtolower($similarCarItem['make_title']) == 'mercedes-benz') {
        $similarCarItem['make_title'] = 'Mercedes';
    }

    $link = 'href="' . '/cars/' . $similarCarItem['make_name'] . '/' . $similarCarItem['model_name'] . '/' . $similarCarItem['car_id'] . '"';

    ?>

    <div class="fdry-car-single-card__dark">
        <div class="fdry-car-single-card__save-banner">
            <p>
                SAVE £<?= ($carItem['cap_price'] - $carDiscountedPrice) > 0 ? ($carItem['cap_price'] - $carDiscountedPrice) : '' ?>!
            </p>
        </div>
        <div class="fdry-car-single__info">
            <a <?= $link ?>">
                <div class="fdry-car-single__info-grid">
                    <div class="fdry-car-single__info-grid-item">
                        <div class="car-info__title">
                            <h1 class="car-name"><?= $carItem['reg_year'] ?> <span class="title-yellow"><?= $carItem['make_title'] ?> <?= $carItem['model_title'] ?></span></h1>
                            <p class="model"><?= $similarCarItem['derivative'] ?></p>
                        </div>
                        <div class="fdy-car-single-card__image ">
                            <figure class="<?= $mixDiscount ? 'discount-bg' : '' ?>" data-vrm="<?= $similarCarItem['reg_number']; ?>">
                                <img class="car-img" src="<?= $similarCarItem['image']; ?>" alt="<?= $similarCarItem['make_title'] . ' ' . $similarCarItem['model_title']; ?>" />
                            </figure>
                        </div>
                        <div class="fdry-single-car__features">
                            <?php if ($similarCarItem['fueltype'] != "") { ?>
                                <div class="featurebox">
                                    <p class="spec"><?php echo $similarCarItem['fueltype']; ?></p>
                                </div>
                            <?php } ?>
                            <?php if ($similarCarItem['mileage'] > 0) { ?>
                                <div class="featurebox">
                                    <p class="spec"><?php echo $similarCarItem['mileage']; ?> Miles</p>
                                </div>
                            <?php } ?>
                            <?php if ($insurence != "") { ?>
                                <div class="featurebox">
                                    <p class="spec"><?php echo $insurence; ?> Ins. Group</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="fdry-car-single__info-grid-item">
                        <div class="fdry-single-car__mobile-price">
                            <div class="red-box price-box">
                                <p class="banner-price">RRP &pound;<?= $similarCarItem['cap_price'] ?></p>
                                <p class="price-text">TRADE CENTRE PRICE</p>
                                <p class="cost-text drop">&pound;<?= $carDiscountedPrice ?></p>
                            </div>
                            <p class="price-divider">
                                <span>OR</span>
                            </p>
                            <div class="white-box price-box">
                                <div class="cost-text drop">&pound;<?= TcFinance::getMonthlyPrice($carDiscountedPrice); ?></div>
                                <p class="price-text">A MONTH</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="fdry-single-car__mobile-finance-check">
            <a href="/finance-check?make=<?= $similarCarItem['make_title']; ?>&model=<?= $similarCarItem['model_title']; ?>&vid=<?= $similarCarItem['stock_number']; ?>" class="fdry-finance-check-mobile__btn-img">
                <img src="<?= get_template_directory_uri() ?>/dist/images/Finance-new.svg" alt="Free finance check button">
            </a>
        </div>

    </div>

<?php endforeach; ?>