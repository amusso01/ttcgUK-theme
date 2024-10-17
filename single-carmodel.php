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

// $imageCar = get_field('image_url-fdry', $carItem['car_id']);
$imageModel = has_post_thumbnail($carmodel->ID);
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




// if ($imageCar) {
//     $carItem['image'] = $imageCar;
// }




if ($imageModel) {
    $carItem['image'] = get_the_post_thumbnail_url($carmodel->ID);
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


                            <div class="mix-discount-save blue">

                                <p class="drop">
                                    <?php get_template_part('svg-template/svg-single-car') ?>

                                    <span class="fdryCaveat">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                        </svg>
                                    </span>
                                </p>

                            </div>

                        </figure>

                    <?php else:  ?>

                        <figure class="fdryThreeDModel basicRotate" data-vrm="<?= $carItem['reg_number']; ?>">

                            <?php for ($i = 1; $i <= 32; $i++) : ?>

                                <img class="car-img" src=" <?= $carItem['image'] . '&angle=' . (199 + $i) ?>" />
                            <?php endfor; ?>

                            <div class="viewer-svg">
                                <?php get_template_part('svg-template/svg-360') ?>
                            </div>


                            <div class="mix-discount-save blue">

                                <p class="drop">
                                    <?php get_template_part('svg-template/svg-single-car') ?>

                                    <span class="fdryCaveat">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                        </svg>
                                    </span>
                                </p>

                            </div>



                        </figure>

                        <!-- <div id="fdryThreeDImages"></div> -->

                    <?php endif; ?>


                </div>
                <?php global $branch; ?>

                <!-- NEW MOBILE LAYOUT -->

                <div class="fdry-single-car__mobile">

                    <!--New Layout mobile 2024-->
                    <div class="boxinfocar">
                        <p class="stockCount">
                            <span class="red"><?= $carItem['total_make_in_stock'] ?></span>
                            <span class="bold"><?= $carItem['make_title'] ?></span>'s
                            in stock!
                        </p>
                        <h1 class="car-name-mobile"><?= strtoupper($carItem['title']) ?></h1>
                        <p class="model-mobile"><?= $carItem['derivative'] ?></p>

                        <div class="fdry-svg-infobox">
                            <?php get_template_part('svg-template/svg-single-car') ?>

                            <span class="fdryCaveat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                </svg>
                            </span>
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
                                    <div class="cost-text drop">&pound;<?= TcFinance::getMonthlyPrice($carItem['discounted_price']); ?><span>/ month</span></div>
                                </div>
                            </div>

                        <?php else : ?>
                            <div class="fdry-single-car__mobile-price">
                                <div class="red-box">
                                    <p class="cost-text drop">&pound;<?= $carDiscountedPrice ?></p>
                                </div>
                                <p class="price-divider">
                                    <span>Or</span><br> JUST
                                </p>
                                <div class="blue-box">
                                    <div class="cost-text drop">&pound;<?php echo TcFinance::getMonthlyPrice($carDiscountedPrice); ?><span>/ month</span></div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <center>
                            <a href="#view" class="ancle">View finance example
                                <svg xmlns="http://www.w3.org/2000/svg" width="10.521" height="5.7" viewBox="0 0 10.521 5.7">
                                    <g id="Group_3723" data-name="Group 3723" transform="translate(-6.638 -10.414)">
                                        <path id="Path_2409" data-name="Path 2409" d="M2.85,5.26,0,1.754,1.425,0,5.7,5.26l-4.275,5.26L0,8.766Z" transform="translate(17.159 10.414) rotate(90)" fill="#585858" />
                                    </g>
                                </svg>
                            </a>
                        </center>

                        <div class="greybtns">
                            <div class="column">
                                <a href="#" data-hystmodal="#modalFeatures" class="fdry-btn-mobile drop">
                                    Specifications<svg xmlns="http://www.w3.org/2000/svg" width="9.792" height="10.183" viewBox="0 0 9.792 10.183">
                                        <path id="Path_2410" data-name="Path 2410" d="M4.981-5.117H1.343v3.825H-1.19V-5.117H-4.811V-7.65H-1.19v-3.825H1.343V-7.65H4.981Z" transform="translate(4.811 11.475)" fill="#fff" />
                                    </svg>
                                </a>
                            </div>
                            <div class="column">
                                <a href="#" data-hystmodal="#modalSpec" class="fdry-btn-mobile drop">
                                    Features<svg xmlns="http://www.w3.org/2000/svg" width="9.792" height="10.183" viewBox="0 0 9.792 10.183">
                                        <path id="Path_2410" data-name="Path 2410" d="M4.981-5.117H1.343v3.825H-1.19V-5.117H-4.811V-7.65H-1.19v-3.825H1.343V-7.65H4.981Z" transform="translate(4.811 11.475)" fill="#fff" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="fdry-single-car__mobile-finance-check">
                            <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?= $carItem['stock_number'];  ?>" class="fdry-finance-check-mobile__btn-img">
                                <img style="margin: auto;" src="<?= get_template_directory_uri() ?>/dist/images/FFC-btn.svg" alt="Free finance check button">
                            </a>
                            <!-- <div class="apr" style="width:100%; margin-top:10px">
                            <?php if ($carItem['rrp'] === '5099') : ?>
                                <img src="https://www.tradecentreuk.com/wp-content/uploads/2024/08/APR_BANNER_169.svg" class="fdry-car-single__apr" style="width:300px; height:45px; margin:auto">
                            <?php else : ?>
                                <img src="https://cdn.tradecentregroup.io/image/upload/v1710868315/APR_BANNER.svg" class="fdry-car-single__apr" style="width:300px; height:45px; margin:auto">
                            <?php endif; ?>
                        </div> -->
                        </div>

                        <div class="maincarinfo">
                            <h3>CAR OVERVIEW</h3>
                            <div class="internalinfocar">
                                <div class="column colm1">
                                    <div class="box">
                                        <svg id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" xmlns="http://www.w3.org/2000/svg" width="32.559" height="17.759" viewBox="0 0 32.559 17.759">
                                            <path id="Path_2379" data-name="Path 2379" d="M27.808,30.616a1.919,1.919,0,0,1-.226,1.429,1.905,1.905,0,0,1-2.594.6,2.085,2.085,0,0,1-.3-.226,2.286,2.286,0,0,1-.564-.9l-.038-.113L15.1,24.3l10.3,4.925.113-.038a1.815,1.815,0,0,1,1.391.263,1.744,1.744,0,0,1,.9,1.165" transform="translate(-9.423 -15.164)" fill="#1464e3" />
                                            <path id="Path_2380" data-name="Path 2380" d="M32.559,16.091A16.067,16.067,0,0,0,27.784,4.775a16.247,16.247,0,0,0-23.009,0A16,16,0,0,0,0,16.091v.038H5.715V15.076H3.045a13.032,13.032,0,0,1,.9-3.8h0l2.369.978.451-1.128-2.331-.94h0A13.428,13.428,0,0,1,6.692,7.031h0L8.384,8.685l.865-.865L7.595,6.166A12.946,12.946,0,0,1,10.79,4.1l.865,2.068,1.128-.451-.865-2.068h0a12.115,12.115,0,0,1,3.722-.714V5.151h1.2V2.933a13.576,13.576,0,0,1,3.722.677L19.7,5.677l1.128.451.865-2.105h0a13.765,13.765,0,0,1,3.233,2.03L23.272,7.745l.79.9,1.692-1.692h0a14.2,14.2,0,0,1,2.293,3.121h0l-2.369.978.451,1.128,2.406-1.015a13.279,13.279,0,0,1,.94,3.872H26.694v1.09h5.79c.075,0,.075-.038.075-.038" transform="translate(0 0)" fill="#1464e3" />
                                            <p class="spec"><?php echo $carItem['mileage']; ?></p>
                                        </svg>
                                    </div>
                                    <div class="box">
                                        <svg id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" xmlns="http://www.w3.org/2000/svg" width="16.754" height="22.88" viewBox="0 0 16.754 22.88">
                                            <path id="Path_2376" data-name="Path 2376" d="M8.348,43.649H2.48A2.278,2.278,0,0,1,.01,41.488a5.305,5.305,0,0,1,.216-2.1c.556-2.47,1.112-4.941,1.668-7.442a2.515,2.515,0,0,1,.865-1.482A1.731,1.731,0,0,1,3.962,30H8.5c.185,0,.247.062.247.247,0,.34-.031.679,0,1.05,0,.216-.062.309-.278.309H4.333c-.587,0-.772.124-.9.71l-.926,4.076-.926,4.169a1.851,1.851,0,0,0,.062,1.081c.154.371.278.463.679.463H14.369c.432,0,.556-.093.71-.494a1.836,1.836,0,0,0,.031-1.081c-.618-2.718-1.2-5.435-1.822-8.153-.031-.124-.093-.278-.124-.4a.555.555,0,0,0-.556-.34H11.467c-.154,0-.216-.062-.216-.216V30.247c0-.154.062-.216.216-.216h1.359a1.955,1.955,0,0,1,1.791,1.421,15.175,15.175,0,0,1,.525,2.038c.525,2.285,1.019,4.57,1.513,6.856a3.076,3.076,0,0,1-.587,2.563,1.843,1.843,0,0,1-1.482.741H8.348" transform="translate(0.031 -20.769)" fill="#1464e3" />
                                            <path id="Path_2377" data-name="Path 2377" d="M23.977,9.432V7.147a.24.24,0,0,0-.185-.278A3.46,3.46,0,1,1,28.3,3.163a3.527,3.527,0,0,1-2.347,3.706c-.154.062-.154.154-.154.278v4.478a1.2,1.2,0,0,1-.062.463.916.916,0,0,1-.865.741.943.943,0,0,1-.865-.741,2.085,2.085,0,0,1-.062-.432c.031-.741.031-1.482.031-2.223" transform="translate(-14.826 -0.109)" fill="#1464e3" />
                                            <path id="Path_2378" data-name="Path 2378" d="M16.587,41.363v-.309c-.031-1.2-.062-2.409-.062-3.613a2.337,2.337,0,0,1,.031-.463c.031-.093.093-.185.124-.278.031,0,.062,0,.062.031,0,.062.031.124.031.185v.8a.719.719,0,0,0,.679.741c.4.031.8,0,1.173,0a.747.747,0,0,0,.618-.772v-.926c.216.031.247.154.278.309.124,1.019.216,2.038.34,3.057l.371,3.428c.062.4-.031.494-.432.494-1.328,0-2.687.031-4.015.031h-.247v1.668c0,.278-.093.4-.371.4H11.924c-.309,0-.371-.124-.34-.432.247-1.76.494-3.52.71-5.312.062-.463.062-.494.556-.494h2.316c.4,0,.432.062.432.432v.834c0,.154.031.216.216.216a3.1,3.1,0,0,1,.772-.031" transform="translate(-7.992 -25.4)" fill="#1464e3" />
                                        </svg>
                                        <p class="spec"><?= $carItem['transmission'] ?></p>
                                    </div>
                                    <div class="box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.764" height="23.809" viewBox="0 0 16.764 23.809">
                                            <path id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" d="M15.977,11.787C14.841,9.281,11.434,4.621,8.38,0,5.365,4.621,1.958,9.281.822,11.787A8.147,8.147,0,0,0,0,15.429a8.38,8.38,0,1,0,16.76,0A7.63,7.63,0,0,0,15.977,11.787Zm-7.6,9.594A5.725,5.725,0,0,1,4.7,11.278a5.717,5.717,0,0,0,4.973,8.537,5.616,5.616,0,0,0,3.642-1.331A5.587,5.587,0,0,1,8.38,21.381Z" fill="#1464e3" />
                                        </svg>
                                        <p class="spec"><?php echo $carItem['fueltype']; ?></p>
                                    </div>
                                </div>
                                <div class="column colm2">
                                    <div class="box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30.627" height="20.911" viewBox="0 0 30.627 20.911">
                                            <path id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" d="M3.734,9.011l2.108.748a.962.962,0,0,1,.646.918.95.95,0,0,1-.952.952H3.258a1.36,1.36,0,0,1,0-2.72c.17.034.306.068.476.1M22.4,18.293V11.221h5.338a21.576,21.576,0,0,0,.578-4.42A23.55,23.55,0,0,1,22.4,5.134v6.086H17.028a11.254,11.254,0,0,0,2.346,4.726A11.867,11.867,0,0,0,22.4,18.293m0-15.675A22.8,22.8,0,0,1,14.138,4.76C14,13.6,16.654,18.191,22.4,20.911c5.78-2.72,8.4-7.344,8.262-16.151A23.842,23.842,0,0,1,22.4,2.618m0,1.53a25.021,25.021,0,0,0,6.868,1.836c-.068,3.706-.68,7.718-3.2,10.575A12.228,12.228,0,0,1,22.4,19.347a12.363,12.363,0,0,1-3.672-2.788C16.212,13.7,15.6,9.725,15.532,5.984A25.347,25.347,0,0,0,22.4,4.148M9.378,13.261H14.24A24.538,24.538,0,0,1,13.22,6.6H3.938a.441.441,0,0,1-.374-.714L5.808,2.244A2.558,2.558,0,0,1,7.814,1.156h9.079A2.566,2.566,0,0,1,18.9,2.244l.374.612c.374-.1.748-.238,1.122-.374l-.51-.816A3.555,3.555,0,0,0,16.892,0H7.814A3.7,3.7,0,0,0,4.822,1.632l-1.7,2.754H.979c-.986,0-1.326,1.564-.374,1.87l1.156.374-.51.85c-.68,1.054-.816,2.89-.816,4.59v5.61a.609.609,0,0,0,.612.612H3.666a.609.609,0,0,0,.612-.612v-1.5H15.6a11.84,11.84,0,0,1-.748-1.462H9.412a.377.377,0,0,1-.374-.374v-.68a.343.343,0,0,1,.34-.408" transform="translate(-0.041)" fill="#1464e3" />
                                        </svg>
                                        <p class="spec"><?php echo $insurence; ?> Ins. Group</p>
                                    </div>
                                    <div class="box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15.135" height="20.324" viewBox="0 0 15.135 20.324">
                                            <path id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" d="M7.568,12.341A4.541,4.541,0,1,1,12.108,7.8a4.546,4.546,0,0,1-4.541,4.541M7.568,0A7.553,7.553,0,0,0,0,7.568c0,5.181,5.239,10.973,7.16,12.6a.62.62,0,0,0,.815,0c1.921-1.63,7.16-7.422,7.16-12.6A7.553,7.553,0,0,0,7.568,0" fill="#1464e3" />
                                        </svg>
                                        <p class="spec"><?= $branch->post_title ?></p>
                                    </div>
                                    <div class="box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24.659" height="14.626" viewBox="0 0 24.659 14.626">
                                            <path id="svg_xml_base64_PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" data-name="svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk" d="M22.827,0h-21A1.832,1.832,0,0,0,0,1.832V12.794a1.832,1.832,0,0,0,1.832,1.832h21a1.832,1.832,0,0,0,1.832-1.832V1.832A1.832,1.832,0,0,0,22.827,0ZM1.64,1.094a.547.547,0,1,1-.547.547A.548.548,0,0,1,1.64,1.094ZM1.668,13.5a.547.547,0,1,1,.547-.547A.548.548,0,0,1,1.668,13.5ZM8.256,9.7,7,7.928,5.768,9.7H4.4L6.315,7.081l-1.8-2.542H5.878L7.053,6.206,8.229,4.538H9.514l-1.8,2.488L9.623,9.7Zm5.55,0L12.548,7.928,11.318,9.7H9.951l1.914-2.624-1.8-2.542h1.367L12.6,6.206l1.176-1.668h1.285l-1.8,2.488L15.173,9.7Zm5.55,0-1.23-1.777L16.895,9.7H15.528l1.914-2.624-1.8-2.542H17L18.18,6.206l1.176-1.668H20.64l-1.8,2.488L20.749,9.7Zm3.609-8.611a.547.547,0,1,1-.547.547A.548.548,0,0,1,22.964,1.094ZM22.991,13.5a.547.547,0,1,1,.547-.547A.548.548,0,0,1,22.991,13.5Z" fill="#1464e3" />
                                        </svg>
                                        <p class="spec"><?= $carItem['reg_number']; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="visitusbtn">
                                <div class="box">
                                    <a href="<?= get_permalink($branch->ID) ?>">
                                        <svg id="Google_Maps_icon__2020_" data-name="Google_Maps_icon_(2020)" xmlns="http://www.w3.org/2000/svg" width="12.908" height="18.496" viewBox="0 0 12.908 18.496">
                                            <path id="Path_2412" data-name="Path 2412" d="M17.7.307A6.531,6.531,0,0,0,15.731,0,6.437,6.437,0,0,0,10.8,2.305l3.045,2.557Z" transform="translate(-9.291)" fill="#1a73e8" />
                                            <path id="Path_2413" data-name="Path 2413" d="M1.509,16.5A6.447,6.447,0,0,0,0,20.635a7.128,7.128,0,0,0,.643,3.073l3.912-4.652L1.509,16.5Z" transform="translate(0 -14.195)" fill="#ea4335" />
                                            <path id="Path_2414" data-name="Path 2414" d="M34.5,5.874a2.468,2.468,0,0,1,1.886,4.065s1.942-2.319,3.842-4.568A6.436,6.436,0,0,0,36.456,2.2L32.6,6.754a2.506,2.506,0,0,1,1.9-.88" transform="translate(-28.046 -1.893)" fill="#4285f4" />
                                            <path id="Path_2415" data-name="Path 2415" d="M10.412,38.851a2.468,2.468,0,0,1-2.473-2.473A2.4,2.4,0,0,1,8.512,34.8L4.6,39.452a22.847,22.847,0,0,0,2.934,4.177L12.3,37.971a2.453,2.453,0,0,1-1.886.88" transform="translate(-3.957 -29.938)" fill="#fbbc04" />
                                            <path id="Path_2416" data-name="Path 2416" d="M30.28,36.677c2.151-3.367,4.652-4.89,4.652-8.8a6.461,6.461,0,0,0-.726-2.976L25.6,35.112c.363.475.74,1.02,1.1,1.579,1.313,2.026.95,3.227,1.788,3.227s.475-1.215,1.788-3.241" transform="translate(-22.024 -21.421)" fill="#34a853" />
                                        </svg>
                                        <p class="spec">Visit Us</p>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="bannerdriveaway">
                        <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?= $carItem['stock_number'];  ?>">
                            <!-- MOBILE -->
                            <img class="fdry-banner-image-top__mobile fdry-banner-image" src="<?php echo $imagemobile; ?>">
                        </a>
                    </div>
                    <!--End Layout mobile 2024-->




                    <section class="originalsection">
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
                                    <span>Or</span><br> JUST
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
                                <img style="margin: auto;" src="<?= get_template_directory_uri() ?>/dist/images/FFC-btn.svg" alt="Free finance check button">
                            </a>
                            <!-- <div class="apr" style="width:100%; margin-top:10px">
                                <?php if ($carItem['rrp'] === '5099') : ?>
                                    <img src="https://wordpress-531412-4045767.cloudwaysapps.com/wp-content/uploads/2024/08/APR_BANNER_169.svg" class="fdry-car-single__apr" style="width:300px; height:45px; margin:auto">
                                <?php else : ?>
                                    <img src="https://cdn.tradecentregroup.io/image/upload/v1710868315/APR_BANNER.svg" class="fdry-car-single__apr" style="width:300px; height:45px; margin:auto">
                                <?php endif; ?>
                            </div> -->
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
                    </section>

                </div>


            </div>
        </section>


        <div class="content-max">
            <!-- CAR OVERVIEW SECTION -->
            <?php get_template_part('components/partials/car-overview') ?>
        </div>

        <div id="view" class="content-max">
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
