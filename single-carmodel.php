<?php

/**
 * The carmodel post single template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
    $metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;
?>

<?php
get_header();

?>
<?php get_template_part('components/getters/car-getter') ?>

<?php
// ARRAY HOLDING CAR INFO
$carItem = $carsArray[0];

$amount = count($carsArray);

// CAR NAME IF AMOUNT IS 0 hence no car are present in the array
$carname = $carmake->post_title . ' ' . $carmodel->post_title;

// CAR IMAGE
if (empty($carItem['image'])) {
    $carItem['image'] = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '.png';
}

$imageCar = get_field('image_url-fdry', $carItem['car_id']);
$paintId = get_field('fdry_paint_id', $carItem['car_id']);

if ($paintId) {
    $carItem['paint_description'] = $paintId;
}

// RULES TO REMOVE THE -x from Vauxhall model that have the X at end of the model
// If -x is there imagin not working
// if ($carItem['make_name'] == 'vauxhall') {
//     $model =    $carItem['model_name'];
//     $carItem['model_name'] = str_replace('-x', '', $model);
// }

$carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $carItem['make_name'] . '&modelFamily=' . $carItem['model_name'] . '&modelYear=' . $carItem['reg_year'] . '&modelRange=' . $carItem['model_name'] . '&modelVariant=' .  $carItem['body_type'] . '&powerTrain=' . $carItem['power_train'] . '&bodySize=' . $carItem['body_size'] . '&trim=' . $carItem['trim'] . '&paintDescription=' . $carItem['paint_description'] . '&rimId=' . $carItem['rim_id'] . '&rimDescription=' . $carItem['rim_description'] . '&interiorId=' . $carItem['interior_id'] . '&interiorDescription=' . $carItem['interior_description'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=720&angle=1&safeMode=false&groundPlaneAdjustment=-0.15&countryCode=GB';



if ($imageCar) {
    $carItem['image'] = $imageCar;
}


$carPriceRRP = $carItem['rrp'] ? $carItem['rrp'] : 'TBC';
$carDiscountedPrice = $carItem['discounted_price'];

// REPLACE MERCEDES TITLE
if (strtolower($carItem['make_title']) == 'mercedes-benz') {
    $carItem['make_title'] = 'Mercedes';
}

// Text for message in top card banner. TO DO
$carBannerTxt = get_field('discount_banner_text_v1', $carItem['car_id']);

// GET CAR SPEC
$techinfo = cns_car_technical_data($carItem['car_id']);

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

<?php //get_template_part('components/header/header-video') 
?>
<?php //get_template_part('components/header/header-image-banner') 
?>
<?php get_template_part('components/header/header-marquee') ?>


<?php get_template_part('components/modal/car-info') ?>

<main class="fdry-main__single-car">
    <?php if ($amount) : ?>

        <?php
        // GLOBAL DISCOUNT
        $isDiscount = get_field('discount_active', 'option');
        $tagImg = get_field('tag_image_for_discount', 'option');

        // $mixDiscount = $carItem['discount'] > 0 ? true : false;
        $mixDiscount = false;
        ?>




        <section class="fdry-single-car__specs content-block content-max">
            <div class="single-car__grid">
                <div class="car-figure <?= $isDiscount ? 'discount-tag' : '' ?>">
                    <figure class="fdry-single-car-figure" data-vrm="<?= $carItem['reg_number']; ?>">

                        <img class="car-img" src="<?= $carItem['image']; ?>" alt="<?= $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" />

                        <p class="fdry-car-reg"><?= $carItem['reg_number']; ?></p>
                        <?php if ($isDiscount) : ?>
                            <img src="<?= $tagImg ?>" alt="" class="fdry-car-single__discount-tag">
                        <?php endif; ?>

                        <?php if ($carDiscountedPrice === '5099') : ?>
                            <img src="<?= get_template_directory_uri() ?>/dist/images/99-circle.svg" alt="" class="fdry-car-single__99-circle">
                        <?php endif; ?>


                        <div class="mix-discount-save blue">

                            <p class="drop">
                                <?= $carBannerTxt ? '<span class="save">SAVE</span> £' . $carBannerTxt . ' vs. <span class="save">Auto</span>Trader' : '' ?>
                                <span class="fdryCaveat">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                    </svg>
                                </span>
                            </p>

                        </div>

                    </figure>
                </div>
                <?php global $branch; ?>

                <!-- NEW MOBILE LAYOUT -->

                <div class="fdry-single-car__mobile">
                    <div class="fdry-single-car__mobile-title">
                        <h1 class="car-name-mobile"><?= strtoupper($carItem['make_title']) . ' ' . strtoupper($carItem['model_title']) ?></h1>
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
                                <p class="cost-text drop">&pound;<?= $carDiscountedPrice ?></p>
                            </div>
                            <p class="price-divider">
                                OR <br> JUST
                            </p>
                            <div class="blue-box">
                                <p class="blue-box-text drop">Fixed</p>
                                <div class="cost-text drop">&pound;<?php echo TcFinance::getMonthlyPrice($carDiscountedPrice); ?></div>
                                <p class="blue-box-text drop">Per Month</p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="fdry-single-car__mobile-specs-buttons">
                        <a href="#" data-hystmodal="#modalFeatures" class="fdry-btn-mobile drop">
                            <i><?php get_template_part('svg-template/svg-feat-mobile') ?></i> Car Specs
                        </a>
                        <a href="#" data-hystmodal="#modalSpec" class="fdry-btn-mobile drop">
                            <i><?php get_template_part('svg-template/svg-spec-mobile') ?></i> Car Features
                        </a>
                        <a href="<?= get_permalink($branch->ID) ?>" class="fdry-btn-mobile drop">
                            <i><?php get_template_part('svg-template/svg', 'visit-mobile') ?></i>
                            Visit Us
                        </a>

                    </div>

                    <div class="fdry-single-car__mobile-finance-check">
                        <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?= $carItem['stock_number'];  ?>" class="fdry-finance-check-mobile__btn-img">
                            <img src="<?= get_template_directory_uri() ?>/dist/images/30sec-mobile.svg" alt="Free finance check button">
                        </a>
                        <div class="apr" style="width:100%; margin-top:10px">
                            <?php if ($carItem['rrp'] === '5099') : ?>
                                <img src="https://www.tradecentreuk.com/wp-content/uploads/2024/08/APR_BANNER_169.svg" class="fdry-car-single__apr" style="width:300px; height:45px; margin:auto">
                            <?php else : ?>
                                <img src="https://cdn.tradecentregroup.io/image/upload/v1710868315/APR_BANNER.svg" class="fdry-car-single__apr" style="width:300px; height:45px; margin:auto">
                            <?php endif; ?>
                        </div>
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
                            <i><?php get_template_part('svg-template/svg-location-mobile') ?></i>
                            <p class="spec"><?= $branch->post_title ?></p>
                        </div>
                        <div class="single-car-mobile__icon">
                            <i><?php get_template_part('svg-template/svg-reg-mobile') ?></i>
                            <p class="fdry-car-reg"><?= $carItem['reg_number']; ?></p>
                        </div>
                    </div>

                </div>


            </div>
        </section>


        <div class="content-max">
            <!-- CAR OVERVIEW SECTION -->
            <?php get_template_part('components/partials/car-overview') ?>
        </div>

        <div class="content-max">
            <!-- CAR BANNERS -->
            <?php get_template_part('components/partials/car-legal-banner') ?>
        </div>

        <div class="content-max">
            <!-- TC PROMISE CARD -->
            <?php // get_template_part('components/partials/car-tc-promise-card') 
            ?>
            <?php get_template_part('components/partials/car-alt-autotrader')
            ?>
        </div>

        <div class="content-max">
            <!-- VIDEO -->
            <?php get_template_part('components/banners/better-car-video') ?>
        </div>

        <!-- BANNERS -->
        <?php get_template_part('components/banners/price-promise') ?>

        <!-- BRANCHES -->
        <div class="content-block content-max" style="margin-top: 50px; margin-bottom: 40px; padding-bottom:60px">
            <?php get_template_part('components/pages/branches-carousel') ?>
        </div>

        <div class="content-max">
            <!-- TRUSTPILOT -->
            <?php get_template_part('components/pages/trustpilot') ?>

            <!-- ACTION BOX GRID -->
            <?php get_template_part('components/pages/action-box-grid') ?>

            <!-- VIDEO GUIDE -->
            <?php get_template_part('components/pages/video-guide') ?>
        </div>

    <?php else : ?>
        <p>We currently have no <?= $carname; ?> in our centres, however we have a large
            selection to choose from at our car supermarkets.</p>
    <?php endif; ?>

    <?php
    $techData = cns_car_technical_data($carId);
    $standardEquipment = cns_car_standard_equiptment($carId);
    ?>

</main>

<?php

get_footer();
