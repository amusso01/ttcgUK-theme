<?php
/**
 * The price promise page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */


get_header();
?>

<!-- BANNERS -->
<?php get_template_part( 'components/banners/price-promise' ) ?>
<?php get_template_part( 'components/header/header-marquee' ) ?>

<main class="fdry-main fdry-main__price-promise">
    <div class="container">
        <h1 class="fdry-main__price-promise-title">OUR PRICE PROMISE. YOU CAN'T BEAT IT!</h1>

        <div class="fdry-price-promise__top-info">
            <?php the_field('information'); ?>
        </div>

        <div class="fdry-price-promise__bottom-info">
            <?php the_field('page_terms'); ?>
        </div>

        <!-- <div class="content">
            <?php // the_content() ?>
        </div> -->
    </div>

        
    <!-- PRICE PROMISE VIDEO -->
    <?php get_template_part( 'components/banners/better-car-video' ) ?>   

    <!-- BRANCHES -->
    <div class="content-block content-max" style="margin-top: 50px; margin-bottom: 40px; padding-bottom:60px">
        <?php get_template_part( 'components/pages/branches-carousel' ) ?>
    </div>

    <!-- TRUSTPILOT -->
    <?php get_template_part( 'components/pages/trustpilot' ) ?>


    <!-- ACTION BOX GRID -->
    <?php get_template_part( 'components/pages/action-box-grid' ) ?>
    

    <!-- VIDEO GUIDE -->
    <?php get_template_part( 'components/pages/video-guide' ) ?>

</main>


<?php

get_footer();
