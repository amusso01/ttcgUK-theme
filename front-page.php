<?php

/**
 * The front page template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

$page = 1;
$more = 1;
$preview = '';
$pages[] = $post->post_content;


global $wp, $showAreaLinks, $listingType, $title, $metaDescription, $saleMode, $branch, $driveAwayBanner, $carId;

if ($wp->request == '') {
    $showAreaLinks = true;
}

$listingType = 'maincarlisting';

get_header();

?>
<?php get_template_part('components/header/header-video') ?>
<?php get_template_part('components/header/header-image-banner') ?>
<?php get_template_part('components/header/header-marquee') ?>

<main class="fdry-main__front fdry-main">

    <?php get_template_part('components/pages/cars-loop') ?>

    <!-- BANNERS -->
    <?php get_template_part('components/banners/better-car-video') ?>
    <?php get_template_part('components/banners/price-promise') ?>

    <!-- BRANCHES -->
    <div class="content-block content-max" style="margin-top: 50px; margin-bottom: 40px; padding-bottom:60px">
        <?php get_template_part('components/pages/branches-carousel') ?>
    </div>

    <!-- TRUSTPILOT -->
    <?php get_template_part('components/pages/trustpilot') ?>

    <!-- ACTION BOX GRID -->
    <?php get_template_part('components/pages/action-box-grid') ?>


    <!-- VIDEO GUIDE -->
    <?php get_template_part('components/pages/video-guide') ?>

</main>

<?php

// get_template_part('template-parts/carslisting/carslisting', 'front-page');




// if (empty($carId)) {
//     get_template_part('template-parts/imageslider', 'front-page');
// }




// if ($wp->request !== '' && !isset($branch)) {
//     if ($saleMode === LISTING_FROM_MODE) {
//         get_template_part('template-parts/carslisting/similar-from-mode', 'front-page');
//     } else {

//         if ($saleMode === LISTING_SALE_MODE) {
//             get_template_part('template-parts/carslisting/similar-sale-mode', 'front-page');
//         } else {
//             get_template_part('template-parts/carslisting/similar-normal', 'front-page');
//         }
//     }
// }





// get_template_part('template-parts/bettercar-video', 'front-page');
// #get_template_part('template-parts/finance-form', 'front-page');
// get_template_part('template-parts/price-promise', 'front-page');
// get_template_part('template-parts/price-promise-banner', 'front-page');
// get_template_part('template-parts/branch-locations', 'front-page');
// get_template_part('template-parts/enterreg-banner', 'front-page');

// get_template_part('template-parts/reviews', 'front-page');
// get_template_part('template-parts/actionboxes', 'front-page');
// get_template_part('template-parts/buyingguide-video', 'front-page');

get_footer();
