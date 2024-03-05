<?php

/**
 * The finance page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */


get_header();



$args = [
    'posts_per_page' => -1,
    'post_type' => 'branch',
    'orderby' => 'menu_order',
    'order' => 'ASC'
];

$branches = new WP_Query($args);

?>


<?php get_template_part('components/header/header-marquee') ?>


<section class="fdry-locations-landing__hero">
    <div class="fdry-container">
        <div class="fdry-locations-landing__hero-wrapper">
            <h1 class="fdry-locations-landing__hero-title">LOCATIONS</h1>
            <p class="fdry-locations-landing__hero-subtitle">
                WE’D LOVE FOR YOU TO COME <br>
                VISIT US IN ONE OF OUR BRANCHES
                <span>
                    <i>
                        <svg id="fdry-blue-underline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="172.512" height="19.322" viewBox="0 0 172.512 19.322">
                            <defs>
                                <linearGradient id="linear-gradient" x1="0.862" y1="0.097" x2="0.058" y2="1.279" gradientUnits="objectBoundingBox">
                                    <stop offset="0" stop-color="#0575e6" />
                                    <stop offset="1" stop-color="#1d2671" />
                                </linearGradient>
                            </defs>
                            <path id="Path_23" data-name="Path 23" d="M123.9,477.142a2.676,2.676,0,0,1-2.4-2.648,2.927,2.927,0,0,1,2.122-3.331c.828-.121,83.79-12.04,167.748-5.255a2.851,2.851,0,0,1,2.26,3.189c-.087,1.653-1.24,2.907-2.575,2.8-83.52-6.749-166.04,5.106-166.864,5.227A1.987,1.987,0,0,1,123.9,477.142Z" transform="matrix(0.999, 0.035, -0.035, 0.999, -104.755, -467.778)" fill="url(#linear-gradient)" />
                        </svg>
                    </i>
                </span>
            </p>
            <a href="#ourBranches" class="fdry-btn-locations fdry-btn-locations__bold">
                VIEW LOCATIONS
            </a>
        </div>
    </div>
</section>


<div id="ourBranches" style="position:relative; top:-240px;"></div>

<section class="fdry-locations-landing">
    <div class="fdry-locations-landing__wrapper">

        <h3 class="fdry-locations-landing-title">OUR BRANCH LOCATIONS</h3>

        <div class="fdry-locations-landing__grid">
            <?php if ($branches->have_posts()) : ?>
                <?php while ($branches->have_posts()) : $branches->the_post(); ?>

                    <?php $ID = $post->ID; ?>
                    <?php $address['line1'] = get_field('address_line_1', $ID); ?>
                    <?php $address['line2'] = get_field('address_line_2', $ID); ?>
                    <?php $address['town'] = get_field('town_city', $ID); ?>
                    <?php $address['postcode'] = get_field('postcode', $ID); ?>
                    <?php $video = get_field('branch_video', $ID); ?>
                    <?php $otWeek = get_field('opening_times_weekdays', $ID); ?>
                    <?php $otSat = get_field('opening_times_saturday', $ID); ?>
                    <?php $otSun = get_field('opening_times_sunday', $ID); ?>
                    <?php $otWeekEnds = get_field('opening_times_weekends', $ID); ?>
                    <?php $carNumber = get_field('code', $ID); ?>
                    <?php $phoneNumber = get_field('telephone_number', $ID); ?>

                    <div class="fdry-locations-landing-singleLocation">
                        <div class="top-image-video">
                            <?php if ($video) : ?>
                                <video width="250" autoplay disablepictureinpicture loop="true" muted="false" poster="<?= get_the_post_thumbnail_url($ID); ?>">
                                    <source src="<?= $video ?>" type="video/mp4">
                                </video>
                                <img class="branch-locations__image-mobile" src="<?= get_the_post_thumbnail_url($ID); ?>" alt="<?= $post->post_title; ?> Trade Centre">
                            <?php else : ?>
                                <img class="branch-locations__image" src="<?= get_the_post_thumbnail_url($ID); ?>" alt="<?= $post->post_title; ?> Trade Centre">
                            <?php endif; ?>
                        </div>
                        <div class="fdry-locations-landing__top-info">
                            <h5 class="fdry-locations-landing__top-info-title"><?= 'Trade Centre ' . $post->post_title; ?></h5>
                            <address>

                                <?= $address['line1']; ?>
                                <br>

                                <?= $address['line2']; ?>
                                <br>

                                <span><?= $address['town']; ?></span>

                                <br>
                                <?= $address['postcode']; ?>

                            </address>
                        </div>
                        <div class="fdry-grey-line"></div>
                        <div class="fdry-locations-landing__middle-info">

                            <div class="fdry-locations-landing__middle-info-container">


                                <div class="fdry-locations-landing-singleLocation-time">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <path id="Icon_material-timelapse" data-name="Icon material-timelapse" d="M15.816,8.184A5.377,5.377,0,0,0,12,6.6V12L8.184,15.816a5.4,5.4,0,1,0,7.632-7.632ZM12,3a9,9,0,1,0,9,9A9,9,0,0,0,12,3Zm0,16.2A7.2,7.2,0,1,1,19.2,12,7.2,7.2,0,0,1,12,19.2Z" transform="translate(-3 -3)" fill="#0575e6" />
                                    </svg>
                                    <div class="times">
                                        <p class="fdry-car-numbers">Mon-Fri <?= $otWeek ?> </p>
                                        <?php if ($otWeekEnds) : ?>
                                            <p class="fdry-car-numbers">Sat-Sun <?= $otWeekEnds ?> </p>
                                        <?php else : ?>
                                            <p class="fdry-car-numbers">Sat <?= $otSat ?> </p>
                                            <p class="fdry-car-numbers">Sun <?= $otSun ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="fdry-grey-line"></div>
                        <div class="fdry-locations-landing__bottom-info">
                            <div class="fdry-loactions-landing__phone">
                                <p>Call Dealership:</p>
                                <a href="tel:<?= $phoneNumber ?>"><?= $phoneNumber ?></a>
                            </div>

                            <div class="fdry-btn-locations__wrapper">
                                <a href="/branches/<?= $post->post_name; ?>" class="fdry-btn-locations">MORE INFORMATION</a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>

<?php

get_footer();
