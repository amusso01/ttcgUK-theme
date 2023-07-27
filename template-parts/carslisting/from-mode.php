<?php

global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
$metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount;

if ($listingType != 'similarcarlisting') {
    $carsArray = [];

    if (get_option('tcw_special_offers') == SPECIAL_OFFERS_ON && !isset($carmake) && !isset($carmodel)) {
        get_template_part('template-parts/carslisting/get-cars-special', 'front-page');
    }

    if (!isset($branch) || empty($carsArray)) {
        get_template_part('template-parts/carslisting/get-cars-from-mode', 'front-page');
    }
}

shuffle($carsArray);

$showListing = true;
?>
<section class="container-fluid | carslisting <?php
                echo $listingType; ?>">
    <?php
    if (isset($show404)) {
        get_template_part('template-parts/404-block', 'front-page');
    }
    if ($listingType != 'similarcarlisting') :
    ?>
        <div class="row pb-5">
            <div class="col">
                <a href="/social-distancing">
                    <img src="/images/SafestPlace_DesktopV2.png?v=1" class="d-none d-md-block w-100 safetyimg" />
                    <img src="/images/SafestPlace_Mobile.png?v=1" class="d-md-none w-100 safetyimgmob" /></a>
            </div>
        </div>
    <!--<div class="row pb-5">
        <div class="col">
            <img class="d-none d-md-block w-100"
                 src="https://cdn.tradecentregroup.io/image/upload/v<?php echo date("HdmY"); ?>/web/Group/GRO102020/GRAND_OPENING_WEBSITE_BANNER_1510x240.png"/>
            <img class="d-md-none w-100"
                 src="https://cdn.tradecentregroup.io/image/upload/v<?php echo date("HdmY"); ?>3/web/Group/GRO102020/GRAND_OPENING_MOBILE_BANNER_MOBILE_600x280.png"/>
        </div>
    </div>-->
    <?php
    endif;
    /*if($carmodel) {
        $post = get_post($query->posts[0]);
        $modelyear = $post->year;
    }*/
    ?>
    <?php
    if ($wp->request === '') :
    ?>
    <div class="col-12 py-5 mb-3" style="background-color: #0D64E5"><h1 style="color: #fff; text-align: center;">BANNER</h1></div>
    <?php
    else :
    ?>
    <h1 class="text-center">
        <?php if ($wp->request === '') : echo '<img class="d-none d-md-inline" height="92px" src="' . SITE_LOGO . '" />'; endif; ?>
        <?php if($modelyear!="" && !isset($similarCars)) echo str_replace('Used',$modelyear,$title); else echo $title; ?>
        <?php if ($wp->request === '') : echo '<img class="d-none d-md-inline" height="92px" src="' . SITE_LOGO . '" />'; endif; ?>
    </h1>
    <p class="text-center d-block">
        <?php
        if ($wp->request == '') {
        ?>
        See our <a class="price-promise-link" href="/price-promise">Price Promise</a>
        <?php } ?>
    </p>
    <?php
    endif;
    if ($showListing) : ?>
    <!--<h5 class="text-center">
        <?php
        if ($wp->request == '') {
        ?>
        Over 3,000 Cars In Stock
        <?php } ?>
    </h5>-->
    <div class="row justify-content-center | carlistrow">
        <?php
        $amount = count($carsArray);

        if ($amount) {
            $i = 0;
            foreach ($carsArray as $carItem) {
                $i++;
                //var_dump($i);
                //var_dump($i % 4);
                switch ($carItem['type']) {
                    case LISTING_FROM_MODE :
                        get_template_part('template-parts/carslisting/from-mode-cars-item', 'front-page');
                        break;
                    case LISTING_SPECIALS :
                        get_template_part('template-parts/carslisting/special-cars-item', 'front-page');
                        break;
                }
            }
        } else {
        ?>
        <p>We currently have no <?php
            echo $carmake->post_title; ?> <?php
            echo $carmodel->post_title; ?> in our Daily Specials, however we have a large
            selection to choose from at our car supermarkets.</p>
        <?php
        }
        ?>
    </div>
    <div class="col-12 text-center">
        <?php
        if ($amount > 6) : ?>
        <!--<a class="c-button--grey d-lg-none load-more" data-type="<?php
                                                                 echo $listingType; ?>">Load More</a>-->
        <?php
        endif;
        if ($amount > 8) : ?>
        <!--<a class="c-button--grey d-none d-lg-inline-block d-xxl-none load-more" data-type="<?php
                                                                                           echo $listingType; ?>">Load More</a>-->
        <?php
        endif;
        if ($amount > 10) : ?>
        <!--<a class="c-button--grey d-none d-xxl-inline-block load-more" data-type="<?php
                                                                                 echo $listingType; ?>">Load More</a>-->
        <?php
        endif; ?>
        <a class="c-button--blue opening-times">
            Find Us
        </a>
    </div>
    <?php
    endif;
    ?>
</section>
