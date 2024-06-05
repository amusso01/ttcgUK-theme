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

$carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $carItem['make_name'] . '&modelFamily=' . $carItem['model_name'] . '&modelYear=' . $carItem['reg_year'] . '&modelRange=' . $carItem['model_name'] . '&modelVariant=' .  $carItem['body_type'] . '&powerTrain=' . $carItem['power_train'] . '&bodySize=' . $carItem['body_size'] . '&trim=' . $carItem['trim'] . '&paintDescription=' . $carItem['paint_description'] . '&rimId=' . $carItem['rim_id'] . '&rimDescription=' . $carItem['rim_description'] . '&interiorId=' . $carItem['interior_id'] . '&interiorDescription=' . $carItem['interior_description'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.80&countryCode=GB';




if ($imageCar) {
    $carItem['image'] = $imageCar;
}

$mixDiscount = $carItem['discount'] > 0 ? true : false;

// Text for message in top card banner. TO DO
$carBannerTxt = get_field('discount_banner_text_v1', $carItem['car_id']);


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
        <div class="mix-discount-stamp">

            <svg enable-background="new 0 0 185.1 185.1" viewBox="0 0 185.1 185.1" xmlns="http://www.w3.org/2000/svg">
                <path d="m92.5 182c49.4 0 89.4-40 89.4-89.4s-40-89.5-89.4-89.5-89.4 40.1-89.4 89.4 40 89.4 89.4 89.4" fill="#ea0304" />
                <circle cx="92.5" cy="92.5" fill="none" r="89.4" stroke="#fff" stroke-width="6.3" />
                <g fill="#fff">
                    <path d="m31.2 77.5 4.2-7.4c2.8 2.1 6.6 3.6 10.1 4 3 .3 4.2-.2 4.3-1.3.4-4-17.3-2.6-16.1-14.3.6-5.9 6-10.1 15.8-9.1 4.2.4 8.5 1.8 11.6 4l-4 7.4c-2.9-1.9-5.8-3-8.5-3.3-3.1-.3-4.2.5-4.3 1.6-.4 3.8 17.4 2.5 16.1 14.1-.6 5.8-6 10.1-15.8 9.1-5.3-.6-10.4-2.4-13.4-4.8z" />
                    <path d="m83.5 80-12-1.3-2.7 5.3-10.8-1.1 17.1-30.1 10.4 1.1 10.5 33-11-1.2s-1.5-5.7-1.5-5.7zm-2.1-8-2.2-8.2-3.9 7.6z" />
                    <path d="m131.9 58.8-16.6 30.1-10.4-1.1-10-32.9 11.4 1.2 5.6 19.2 9.6-17.6s10.4 1.1 10.4 1.1z" />
                    <path d="m155.5 85-.8 8-26.2-2.8 3.3-31.5 25.6 2.7-.8 8-15.2-1.6-.4 3.7 13.3 1.4-.8 7.7-13.3-1.4-.4 4.1 15.8 1.7z" />
                    <path d="m32.2 113.9 13.7 1.4-.8 8-28.4-3 .8-8 4.1.4.5-4.8-4.1-.4.6-5.9 4.1.4c1.2-8.7 7.5-12.9 17.5-11.8 3.7.4 7 1.5 9.2 2.9l-3.9 7.7c-1.7-1.1-3.6-1.7-5.3-1.9-3.8-.4-6.3.9-6.9 4.2l9.5 1-.6 5.9-9.5-1-.5 4.8z" />
                    <path d="m72.4 117.9-.9 8.2-25.3-2.7.7-6.5 12.5-9.3c2.4-1.8 2.8-3 2.9-4.1.2-1.5-.8-2.6-2.8-2.8-1.9-.2-3.8.6-4.9 2.4l-7.6-4.8c2.8-4.1 7.6-6.6 14.4-5.9 7.5.8 12.3 5.2 11.7 11.2-.3 3.1-1.4 5.8-6.5 9.5l-4.9 3.6 10.6 1.1z" />
                    <path d="m74.3 110.5c1.1-10.4 7.7-15.9 16-15s13.6 7.5 12.5 18c-1.1 10.4-7.7 15.9-16 15s-13.6-7.5-12.5-18zm17.9 1.9c.6-6.1-.7-8.1-2.8-8.3s-3.8 1.5-4.4 7.6.7 8.1 2.8 8.3 3.8-1.5 4.4-7.6z" />
                    <path d="m104.4 113.7c1.1-10.4 7.7-15.9 16-15s13.6 7.5 12.5 18c-1.1 10.4-7.7 15.9-16 15s-13.6-7.5-12.5-18zm17.8 1.9c.6-6.1-.7-8.1-2.8-8.3s-3.8 1.5-4.4 7.6.7 8.1 2.8 8.3 3.8-1.5 4.4-7.6z" />
                    <path d="m134.4 116.9c1.1-10.4 7.7-15.9 16-15s13.6 7.5 12.5 18c-1.1 10.4-7.7 15.9-16 15s-13.6-7.5-12.5-18zm17.9 1.8c.6-6.1-.7-8.1-2.8-8.3s-3.8 1.5-4.4 7.6.7 8.1 2.8 8.3 3.8-1.5 4.4-7.6z" />
                </g>
            </svg>

        </div>
    <?php endif; ?>
    <div class="mix-discount-save blue">

        <p class="drop">
            <?= $carBannerTxt ? '<span class="save">SAVE</span> £' . $carBannerTxt . ' vs. <span class="save">Auto</span>Trader' : '' ?>
            <span class="fdryCaveat">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                </svg>
            </span>
        </p>

    </div>
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
                <div class="red-box">
                    <p class="blue-box-text drop">WAS</p>
                    <p class="cost-text drop">&pound;<?= $carItem['rrp'] ?></p>
                    <div class="strike"></div>
                    <div class="strike-2"></div>
                </div>
                <div class="grey-box">
                    <p class="drop-light">NOW</p>
                    <!-- <div class="cost-text drop-light">&pound;<?= TcFinance::getMonthlyPrice($carItem['discounted_price']); ?></div> -->
                    <div class="cost-text drop-light">&pound;<?= $carItem['discounted_price']; ?></div>
                </div>
                <div class="red-box">
                    <p class="blue-box-text drop">Fixed</p>
                    <div class="cost-text drop">&pound;<?= TcFinance::getMonthlyPrice($carItem['discounted_price']); ?></div>
                    <p class="blue-box-text drop">Per Month</p>
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
            <div class="single-car-mobile__icon">
                <i><?php get_template_part('svg-template/svg-paint') ?></i>
                <p class="fdry-car-paint"><?= $paintId; ?></p>
            </div>
        </div>

    </div>

</div>