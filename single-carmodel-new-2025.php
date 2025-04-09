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
    $metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId, $originalCarsArray;
?>

<?php
get_header();

?>
<?php get_template_part('components/getters/car-getter') ?>

<?php
// ARRAY HOLDING CAR INFO

$carItem = $originalCarsArray[0];

$amount = count($originalCarsArray);

// CAR NAME IF AMOUNT IS 0 hence no car are present in the array
$carname = $carmake->post_title . ' ' . $carmodel->post_title;

// CAR IMAGE
if (empty($carItem['image'])) {
    $carItem['image'] = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '.png';
}

// $imageCar = get_field('image_url-fdry', $carItem['car_id']);
$imageModel = has_post_thumbnail($carmodel->ID);
$paintId = get_field('fdry_paint_id', $carItem['car_id']);

if ($paintId) {
    $carItem['paint_description'] = $paintId;
}

$carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $carItem['make_name'] . '&modelFamily=' . $carItem['model_name'] . '&modelYear=' . $carItem['reg_year'] . '&modelRange=' . $carItem['model_name'] . '&modelVariant=' .  $carItem['body_type'] . '&powerTrain=' . $carItem['power_train'] . '&bodySize=' . $carItem['body_size'] . '&trim=' . $carItem['trim'] . '&paintDescription=' . $carItem['paint_description'] . '&rimId=' . $carItem['rim_id'] . '&rimDescription=' . $carItem['rim_description'] . '&interiorId=' . $carItem['interior_id'] . '&interiorDescription=' . $carItem['interior_description'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=720&angle=1&safeMode=false&groundPlaneAdjustment=-0.15&countryCode=GB';



if ($imageModel) {
    $carItem['image'] = get_the_post_thumbnail_url($carmodel->ID);
}

?>

<?php //get_template_part('components/header/header-video') 
?>
<?php //get_template_part('components/header/header-image-banner') 
?>
<?php get_template_part('components/header/header-marquee') ?>


<?php get_template_part('components/modal/car-info') ?>


<?php if (!$imageModel) : ?>
    <img id="imgTarget" src="<?= $carItem['image']; ?>&angle=214" alt="<?= $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" style="display: none;"></img>
<?php else : ?>
    <img id="imgTarget" src="<?= $carItem['image']; ?>" alt="<?= $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" style="display: none;"></img>
<?php endif ?>


<?php if (!$imageModel) : ?>

    <?php

    $carItem['image'] = 'https://cdn.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $carItem['make_name'] . '&modelFamily=' . $carItem['model_name'] . '&modelYear=' . $carItem['reg_year'] . '&modelRange=' . $carItem['model_name'] . '&modelVariant=' .  $carItem['body_type'] . '&powerTrain=' . $carItem['power_train'] . '&bodySize=' . $carItem['body_size'] . '&trim=' . $carItem['trim'] . '&paintDescription=' . $carItem['paint_description'] . '&rimId=' . $carItem['rim_id'] . '&countryCode=GB';

    ?>
<?php endif ?>



<script src="https://unpkg.com/color.js@1.2.0/dist/color.js"></script>
<script>
    // Analize the image received in section of 150px and adjust return the most present color in RGB
    function adjustBrightness(col, amt) {

        var usePound = false;

        if (col[0] == "#") {
            col = col.slice(1);
            usePound = true;
        }

        var R = parseInt(col.substring(0, 2), 16);
        var G = parseInt(col.substring(2, 4), 16);
        var B = parseInt(col.substring(4, 6), 16);

        // to make the colour less bright than the input
        // change the following three "+" symbols to "-"
        R = R + amt;
        G = G + amt;
        B = B + amt;

        if (R > 255) R = 255;
        else if (R < 0) R = 0;

        if (G > 255) G = 255;
        else if (G < 0) G = 0;

        if (B > 255) B = 255;
        else if (B < 0) B = 0;

        var RR = ((R.toString(16).length == 1) ? "0" + R.toString(16) : R.toString(16));
        var GG = ((G.toString(16).length == 1) ? "0" + G.toString(16) : G.toString(16));
        var BB = ((B.toString(16).length == 1) ? "0" + B.toString(16) : B.toString(16));

        return (usePound ? "#" : "") + RR + GG + BB;

    }
    var fdryImgUrl3D = document.getElementById('imgTarget')
    colorjs.average(fdryImgUrl3D, {
        format: 'hex',
        sample: 150
    }).then(color => {
        var targetDiv = document.querySelector('.paintBg')
        if (targetDiv.dataset.color == "Red") {
            targetDiv.style.backgroundColor = '#A90A02'
        } else if (targetDiv.dataset.color == "White") {
            targetDiv.style.backgroundColor = '#E5E5E4'
        } else {
            targetDiv.style.backgroundColor = adjustBrightness(color, 30)
        }
    })
</script>

<main class="fdry-main__single-car">



    <?php if ($amount) : ?>

        <?php
        // GLOBAL DISCOUNT
        $isDiscount = get_field('discount_active', 'option');
        $tagImg = get_field('tag_image_for_discount', 'option');

        // $mixDiscount = $carItem['discount'] > 0 ? true : false;
        $mixDiscount = false;
        ?>


        <?php if (have_rows('front_page', 'option')): ?>
            <?php while (have_rows('front_page', 'option')): the_row();
                $videomobile = get_sub_field('video_mobile');
                $imagemobile = get_sub_field('top_mobile');
            ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <section class="fdry-banner-video-top">
            <div class="video_wrapper">
                <!-- MOBILE VIDEO -->
                <video muted="" playsinline="" class="fdry-video fdry-video-mobile" src="<?php echo $videomobile; ?>" width="100%" autoplay="" loop="" style="background-image:url('/images/banner_bg_tcuk.jpg')">
                </video>
            </div>
        </section>


        <!-- KLAVIYO DPV EVENT TRACK -->
        <?php
        $requestFilter = '';
        if ($carItem['size'] === 'Small' || $carItem['size'] === 'Micro') {
            $requestFilter = 'Small';
        } elseif ($carItem['size'] === 'Medium/Large' && $carItem['premium'] === 'non premium' && $$carItem['suv'] === 'non suv') {
            $requestFilter = 'Family';
        } elseif ($$carItem['suv'] === 'suv') {
            $requestFilter = 'SUV';
        } elseif ($carItem['premium'] === 'premium') {
            $requestFilter = 'Premium';
        }
        ?>
        <script>
            window.carInfo = {
                car_url: '<?= get_the_permalink() ?>',
                car_image: '<?= $carItem['image'] ?>',
                car_make: '<?= $carItem['make_title'] ?>',
                car_model: '<?= $carItem['model_title'] ?>',
                car_price: '<?= $carDiscountedPrice ?>',
                car_monthly_price: '<?= TcFinance::getMonthlyPrice($carDiscountedPrice); ?>',
                car_size: '<?= $carItem['size'] ?>',
                car_suv: '<?= $carItem['suv'] === 'suv' ? true : false ?>',
                car_premium: '<?= $carItem['premium'] === 'premium' ? true : false ?>'
            };
        </script>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                if (window.carInfo && window.klaviyo) {
                    var klaviyoItem = {
                        carLink: window.carInfo.car_url,
                        carImage: window.carInfo.car_image,
                        carMake: window.carInfo.car_make,
                        carModel: window.carInfo.car_model,
                        carPrice: window.carInfo.car_price,
                        carMonthlyPrice: window.carInfo.car_monthly_price,
                        carCategory: window.carInfo.car_size,
                        carSuv: window.carInfo.car_suv,
                        carPremium: window.carInfo.car_premium,
                        url: window.location.href,
                        timestamp: new Date().toISOString(),
                    }
                    klaviyo.track("Car page view", klaviyoItem);

                    var _learnq = _learnq || [];
                    _learnq.push(['track', 'Car page view', klaviyoItem]);
                    console.log(klaviyoItem)
                    console.log(_learnq);
                }
            })
        </script>

        <section class="fdry-single-car__specs content-block content-max">
            <div class="single-car__grid">
                <div class="car-figure <?= $isDiscount ? 'discount-tag' : '' ?>">

                    <div class="paintBg" data-color="<?= $carItem['paint_description'] ?>"></div>


                    <?php if ($imageModel) : ?>
                        <!-- This will kick if  model has featured image. This is the old way of display the image pre 3d -->
                        <figure class="fdry-single-car-figure" data-vrm="<?= $carItem['reg_number']; ?>">

                            <img class="car-img" src="<?= $carItem['image']; ?>" alt="<?= $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" />

                            <p class="fdry-car-reg"><?= $carItem['reg_number']; ?></p>
                            <?php if ($isDiscount) : ?>
                                <img src="<?= $tagImg ?>" alt="" class="fdry-car-single__discount-tag">
                            <?php endif; ?>

                            <?php if ($carDiscountedPrice === '5099') : ?>
                                <img src="<?= get_template_directory_uri() ?>/dist/images/99-circle.svg" alt="" class="fdry-car-single__99-circle">
                            <?php endif; ?>

                        </figure>

                    <?php else:  ?>

                        <figure class="fdryThreeDModel basicRotate" data-vrm="<?= $carItem['reg_number']; ?>">

                            <?php for ($i = 1; $i <= 32; $i++) : ?>

                                <img class="car-img" src=" <?= $carItem['image'] . '&angle=' . (199 + $i) ?>" />
                            <?php endfor; ?>

                            <div class="viewer-svg">
                                <?php get_template_part('svg-template/svg-360') ?>
                            </div>


                        </figure>

                        <!-- <div id="fdryThreeDImages"></div> -->

                    <?php endif; ?>


                </div>


                <?php // get_template_part('components/pages/single-car-info') 
                ?>
                <?php get_template_part('components/pages/single-car-info-2025') ?>

            </div>
        </section>


        <!-- <div class="content-max"> -->
        <!-- CAR OVERVIEW SECTION -->
        <!-- <?php // get_template_part('components/partials/car-overview') 
                ?> -->
        <!-- </div>  -->

        <div id="view" class="content-max">
            <!-- CAR BANNERS -->
            <?php get_template_part('components/partials/car-legal-banner') ?>
        </div>


        <div id="view" class="content-max">
            <!-- CAR BANNERS -->
            <?php get_template_part('components/partials/single-similar-car') ?>
        </div>

        <!-- <div class="content-max"> -->
        <!-- TC PROMISE CARD -->
        <?php // get_template_part('components/partials/car-tc-promise-card') 
        ?>
        <?php // get_template_part('components/partials/car-alt-autotrader')
        ?>
        <!-- </div> -->

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



<?php if (!$imageModel) : ?>

    <?php

    $imagesArryToPreload = array();

    $carItem['image'] = 'https://cdn.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $carItem['make_name'] . '&modelFamily=' . $carItem['model_name'] . '&modelYear=' . $carItem['reg_year'] . '&modelRange=' . $carItem['model_name'] . '&modelVariant=' .  $carItem['body_type'] . '&powerTrain=' . $carItem['power_train'] . '&bodySize=' . $carItem['body_size'] . '&trim=' . $carItem['trim'] . '&paintDescription=' . $carItem['paint_description'] . '&rimId=' . $carItem['rim_id'] . '&countryCode=GB';

    $current = '';
    ?>
    <?php for ($i = 1; $i <= 32; $i++) : ?>
        <?php $current =  '<link rel="preload" as="image" href="' . $carItem['image'] . '&angle=' . (199 + $i) . '" >' ?>
        <?php $imagesArryToPreload['src' . $i] = $carItem['image'] . '&angle=' . (199 + $i)  ?>

    <?php endfor; ?>
    <?php


    foreach ($imagesArryToPreload as $src) {
        echo '<link rel="preload" as="image" href="' . $src . '" >' . PHP_EOL;
    }

    ?>
<?php endif ?>


<?php

get_footer();
