<?php

global $carItem, $saleModeDiscount, $amount, $listingType, $hide1hrMsg, $regYear, $carId;

if (empty($carItem['image'])) {
    $carItem['image'] = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '.png';
    // $carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&make='.$carItem['make_name'].'&modelFamily='.$carItem['model_name'].'&modelYear='.$carItem['reg_year'].'&modelRange='.$carItem['model_range'].'&modelVariant='.$carItem['model_variant'].'&powerTrain='.$carItem['power_train'].'&bodySize='.$carItem['body_size'].'&trim='.$carItem['trim'].'&paintId='.$carItem['paint_id'].'&paintDescription='.$carItem['paint_description'].'&rimId='.$carItem['rim_id'].'&rimDescription='.$carItem['rim_description'].'&interiorId='.$carItem['interior_id'].'&interiorDescription='.$carItem['interior_description'].'&fileType=webp&zoomType=fullscreen&zoomLevel=10&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.15&countryCode=GB';

    // $carItem['image'] = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '.png';

    // $carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&make=' . $carItem['make_name'] . '&modelFamily=' . $carItem['model_name'] . '&modelYear=' . $carItem['reg_year'] . '&modelRange=' . $carItem['model_range'] . '&modelVariant=' . $carItem['model_variant'] . '&powerTrain=' . $carItem['power_train'] . '&bodySize=' . $carItem['body_size'] . '&trim=' . $carItem['trim'] . '&paintId=' . $carItem['paint_id'] . '&paintDescription=' . $carItem['paint_description'] . '&rimId=' . $carItem['rim_id'] . '&rimDescription=' . $carItem['rim_description'] . '&interiorId=' . $carItem['interior_id'] . '&interiorDescription=' . $carItem['interior_description'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=10&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.15&countryCode=GB';
}


$imageCar = get_field('image_url-fdry', $carItem['car_id']);
$paintId = get_field('fdry_paint_id', $carItem['car_id']);

if ($paintId) {
    $carItem['paint_description'] = $paintId;
}


// if ($carItem['make_name'] == 'vauxhall') {
//     $model =    $carItem['model_name'];
//     $carItem['model_name'] = str_replace('-x', '', $model);
// }

$carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $carItem['make_name'] . '&modelFamily=' . $carItem['model_name'] . '&modelYear=' . $carItem['reg_year'] . '&modelRange=' . $carItem['model_name'] . '&modelVariant=' .  $carItem['body_type'] . '&powerTrain=' . $carItem['power_train'] . '&bodySize=' . $carItem['body_size'] . '&trim=' . $carItem['trim'] . '&paintDescription=' . $carItem['paint_description'] . '&rimId=' . $carItem['rim_id'] . '&rimDescription=' . $carItem['rim_description'] . '&interiorId=' . $carItem['interior_id'] . '&interiorDescription=' . $carItem['interior_description'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=4&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.15&countryCode=GB';




if ($imageCar) {
    $carItem['image'] = $imageCar;
}




$carPriceRRP = $carItem['rrp'] ? $carItem['rrp'] : 'TBC';

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

<?php if ($isDiscount) : ?>
    <style>
        .fdy-car-single-card__image.discount-padding {
            padding-top: <?= $cardPadding ?>px;
        }

        .fdry-car-single-card .fdry-car-single__discount-tag {
            top: <?= $tagOffset ?>px;
        }
    </style>
<?php endif; ?>

<div class="fdry-car-single-card">
    <?php if ($isDiscount) : ?>
        <img src="<?= $tagImg ?>" alt="" class="fdry-car-single__discount-tag">
    <?php endif; ?>
    <div class="fdy-car-single-card__image <?= $isDiscount ? 'discount-padding' : '' ?>">
        <a <?= $link ?>">
            <figure data-vrm="<?php echo $carItem['reg_number']; ?>">
                <img class="car-img" src="<?php
                                            echo $carItem['image']; ?>" alt="<?php
                                                                                echo $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" />

                <!-- <div class="fdry-car-reg"><?php echo $carItem['reg_number']; ?></div> -->
            </figure>
        </a>
    </div>

    <!-- <div class="fdry-car-single-card__info">
        <a <?= $link ?>">
            <h2><?= $carItem['title']; ?></h2>
            <p class="fdry-car-model"><?php echo ' ' . $carItem['derivative']; ?></p>

            <div class="fdry-car-spec">
                <div class="single-spec">
                    <?php if ($carItem['fueltype'] != "") { ?>
                        <p class="spec"><?php echo $carItem['fueltype']; ?></p>
                    <?php } ?>
                </div>
                <div class="single-spec">
                    <?php if ($carItem['mileage'] > 0) { ?>
                        <p class="spec"><?php echo $carItem['mileage']; ?> Miles</p>
                    <?php } ?>
                </div>
                <?php if ($insurence != "") { ?>
                    <div class="single-spec">
                        <p class="spec"><?php echo $insurence; ?> Ins. Group</p>
                    </div>
                <?php } ?>
                <?php if ($carItem['transmission']  != "") { ?>
                    <div class="single-spec">
                        <p class="spec"><?= $carItem['transmission'] ?></p>
                    </div>
                <?php } else { ?>
                    <div class="single-spec">
                        <p class="spec">Manual</p>
                    </div>
                <?php } ?>
                <?php if ($paintId) { ?>
                    <div class="single-spec">
                        <p class="spec"><?= $paintId ?></p>
                    </div>
                <?php } ?>
                <?php if ($carItem['destination'] != "") { ?>
                    <div class="single-spec">
                        <p class="spec"> <i style="display: inline-block; width:10px; margin-right: 2px"><?php get_template_part('svg-template/svg', 'google-maps-icon') ?></i><?= $carItem['destination'] ?></p>
                    </div>
                <?php } ?>
            </div>

            <?php if ($showRibbon) : ?>
                <div class="fdry-red-single-car-banner">
                    <p><?= $ribbonText ?></p>
                </div>
            <?php endif; ?>

            <?php if (!$isDiscount) : ?>
                <div class="fdry-car-single__cost">
                    <div class="fdry-cash-cost fdry-car-single__cost-card">
                        <p class="fdry-text fdry-text-top">Now Just</p>
                        <p class="fdry-red-price">&pound;<?= $carItem['rrp'] ?></p>
                        <p class="fdry-text fdry-text-bottom">Cash <span>or</span> Finance</p>
                    </div>
                    <div class="fdry-grey-line"></div>
                    <div class="fdry-cash-cost-or">
                        <p>Or</p>
                    </div>
                    <div class="fdry-monthly-cost fdry-car-single__cost-card">
                        <p class="fdry-text fdry-text-top">Fixed</p>
                        <p class="fdry-blue-cost">&pound; <?php echo TcFinance::getMonthlyPrice($carPriceRRP); ?></p>
                        <p class="fdry-text fdry-text-bottom">Per Month</p>
                    </div>
                </div>
            <?php else :  ?>
                <div class="fdry-car-single__discount-grid">
                    <div class="fdry-car-single__discount-was">
                        <p class="text-top">WAS</p>
                        <p class="price"><span class="strike"></span>&pound;<?= $carItem['rrp']  ?></p>
                    </div>
                    <div class="fdry-car-single__discount-now">
                        <p class="text-top">NOW</p>
                        <p class="price">&pound;<?= $carItem['discounted_price'] ?></p>
                    </div>
                </div>

                <div class="fdry-car-single__discount-finance">
                    <p> <span class="light">Or just</span> <span class="yellow"> &pound;<?php echo TcFinance::getMonthlyPrice($carItem['discounted_price']); ?></span> per month</p>
                </div>

            <?php endif; ?>
        </a>

    </div> -->

    <!-- <div class="fdry-car-finance-check">
        <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?php echo $carItem['car_id']; ?>" class="fdry-finance-check__btn-img">
            <img src="<?= get_template_directory_uri() ?>/dist/images/free30btn.svg" alt="Free finance check button">
        </a>
    </div> -->

    <!-- NEW LAYOUT 2024 -->
    <div class="fdry-single-car__mobile">
        <div class="fdry-single-car__mobile-title">
            <h1 class="car-name-mobile"><?= $carItem['title']; ?></h1>
            <p class="model-mobile"><?= $carItem['derivative'] ?></p>
        </div>
        <div class="fdry-single-car__mobile-price">
            <div class="red-box">
                <p class="cost-text drop">&pound;<?= $carItem['rrp'] ?></p>
            </div>
            <p class="price-divider">
                OR <br> JUST
            </p>
            <div class="blue-box">
                <p class="blue-box-text drop">Fixed</p>
                <div class="cost-text drop">&pound;<?php echo TcFinance::getMonthlyPrice($carPriceRRP); ?></div>
                <p class="blue-box-text drop">Per Month</p>
            </div>
        </div>

        <div class="fdry-single-car__mobile-finance-check">
            <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?php echo $carItem['car_id']; ?>" class="fdry-finance-check-mobile__btn-img">
                <img src="<?= get_template_directory_uri() ?>/dist/images/30sec-mobile.svg" alt="Free finance check button">
            </a>
        </div>


        <div class="fdry-single-car__mobile-icons">
            <div class="single-car-mobile__icon">
                <i><?php get_template_part('svg-template/svg-miles-mobile') ?></i>
                <?php if ($carItem['mileage'] > 0) { ?>
                    <p class="spec"><?php echo $carItem['mileage']; ?> Miles</p>
                <?php } ?>
            </div>
            <div class="single-car-mobile__icon">
                <i><?php get_template_part('svg-template/svg-fuel-mobile') ?></i>
                <?php if ($carItem['fueltype'] != "") { ?>
                    <p class="spec"><?php echo $carItem['fueltype']; ?></p>
                <?php } ?>
            </div>
            <div class="single-car-mobile__icon">
                <i><?php get_template_part('svg-template/svg-gears-mobile') ?></i>
                <?php if ($carItem['transmission']  != "") { ?>
                    <p class="spec"><?= $carItem['transmission'] ?></p>
                <?php } ?>
            </div>
            <div class="single-car-mobile__icon">
                <i><?php get_template_part('svg-template/svg-insurance-mobile') ?></i>
                <?php if ($insurence != "") { ?>

                    <p class="spec"><?php echo $insurence; ?> Ins. Group</p>

                <?php } ?>
            </div>
            <div class="single-car-mobile__icon">
                <i><?php get_template_part('svg-template/svg-reg-mobile') ?></i>
                <p class="fdry-car-reg"><?= $carItem['reg_number']; ?></p>
            </div>
        </div>

    </div>

</div>