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

$mixDiscount = $carItem['discount'] > 0 ? true : false;


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
    <?php if ($mixDiscount) : ?>
        <div class="mix-discount-save">
            <p class="drop">&pound;<?= $carItem['discount'] ?> OFF THIS CAR TODAY</p>
        </div>
    <?php endif; ?>
    <div class="fdy-car-single-card__image <?= $isDiscount ? 'discount-padding' : '' ?>">
        <a <?= $link ?>">
            <figure class="<?= $mixDiscount ? 'discount-bg' : '' ?>" data-vrm="<?php echo $carItem['reg_number']; ?>">
                <img class="car-img" src="<?php
                                            echo $carItem['image']; ?>" alt="<?php
                                                                                echo $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" />

                <!-- <div class="fdry-car-reg"><?php echo $carItem['reg_number']; ?></div> -->
            </figure>
        </a>
    </div>

    <!-- NEW LAYOUT 2024 -->
    <div class="fdry-single-car__mobile">
        <div class="fdry-single-car__mobile-title">
            <h1 class="car-name-mobile"><?= $carItem['title']; ?></h1>
            <p class="model-mobile"><?= $carItem['derivative'] ?></p>
        </div>
        <?php if ($mixDiscount) : ?>
            <div class="fdry-single-car__mobile-price fdry-single-car__mobile-price__discounted">
                <div class="black-box">
                    <p class="blue-box-text drop">WAS</p>
                    <p class="cost-text drop">&pound;<?= $carItem['rrp'] ?></p>
                    <div class="strike"></div>
                </div>
                <div class="turq-box">
                    <p class="blue-box-text drop">NOW</p>
                    <!-- <div class="cost-text drop">&pound;<?= TcFinance::getMonthlyPrice($carItem['discounted_price']); ?></div> -->
                    <div class="cost-text drop">&pound;<?= $carItem['discounted_price']; ?></div>
                </div>
                <div class="yellow-box">
                    <p class="blue-box-text drop-light">Fixed</p>
                    <div class="cost-text drop-light">&pound;<?= TcFinance::getMonthlyPrice($carItem['discounted_price']); ?></div>
                    <p class="blue-box-text drop-light">Per Month</p>
                </div>
            </div>

        <?php else : ?>
            <div class="fdry-single-car__mobile-price">
                <div class="red-box">
                    <p class="cost-text drop">&pound;<?= $carItem['rrp'] ?></p>
                </div>
                <p class="price-divider">
                    OR <br> JUST
                </p>
                <div class="blue-box">
                    <p class="blue-box-text drop">Fixed</p>
                    <div class="cost-text drop">&pound;<?= TcFinance::getMonthlyPrice($carPriceRRP); ?></div>
                    <p class="blue-box-text drop">Per Month</p>
                </div>
            </div>
        <?php endif; ?>

        <div class="fdry-single-car__mobile-finance-check">
            <a href="/finance-check?make=<?= $carItem['make_title']; ?>&model=<?= $carItem['model_title']; ?>&vid=<?= $carItem['stock_number']; ?>" class="fdry-finance-check-mobile__btn-img">
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