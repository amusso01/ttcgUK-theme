<?php

global $carItem, $carmodel, $saleModeDiscount, $amount, $listingType, $hide1hrMsg, $regYear, $carId;

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

<div class="fdry-car-single-card">
    <div class="mix-discount-save white">

        <p class="drop stockCount">
            <span class="red"><?= $carItem['total_make_in_stock'] ?></span>
            <span class="bold"><?= $carItem['make_title'] ?></span>'s
            in group stock!
        </p>

    </div>
    <div class="fdy-car-single-card__image <?= $isDiscount ? 'discount-padding' : '' ?>">
        <a <?= $link ?>">
            <figure class="<?= $mixDiscount ? 'discount-bg' : '' ?>" data-vrm="<?php echo $carItem['reg_number']; ?>">
                <img class="car-img" src="<?php
                                            echo $carItem['image']; ?>" alt="<?php
                                                                                echo $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" />

                <!-- <div class="fdry-car-reg"><?php echo $carItem['reg_number']; ?></div> -->
                <?php if ($carDiscountedPrice === '5099') : ?>
                    <img src="<?= get_template_directory_uri() ?>/dist/images/99-circle.svg" alt="" class="fdry-car-single__99-circle">
                <?php endif; ?>
            </figure>
        </a>
    </div>

    <!-- NEW LAYOUT 2024 -->
    <div class="fdry-single-car__mobile">
        <div class="fdry-single-car__mobile-title">
            <h1 class="car-name-mobile"><?= $carItem['title']; ?></h1>
            <p class="model-mobile"><?= $carItem['derivative'] ?></p>
        </div>

        <div class="featurecar">
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


        <div class="fdry-single-car__mobile-price">
            <div class="red-box">
                <p class="blue-box-text drop">Cash or Finance</p>
                <p class="cost-text drop">&pound;<?= $carDiscountedPrice ?></p>
                <p hidden class="blue-box-text drop" style="font-size: 12px;">With Part-Exchange</p>
            </div>
            <p class="price-divider">
                <span>OR</span> <br> JUST
            </p>
            <div class="blue-box">
                <p class="blue-box-text drop">Fixed</p>
                <div class="cost-text drop">&pound;<?= TcFinance::getMonthlyPrice($carDiscountedPrice); ?></div>
                <p class="blue-box-text drop">Per Month</p>
            </div>
        </div>

    </div>

    <div class="fdry-single-car__mobile-finance-check">
        <a href="/finance-check?make=<?= $carItem['make_title']; ?>&model=<?= $carItem['model_title']; ?>&vid=<?= $carItem['stock_number']; ?>" class="fdry-finance-check-mobile__btn-img">
            <img src="<?= get_template_directory_uri() ?>/dist/images/Finance.svg" alt="Free finance check button">
        </a>
    </div>

</div>