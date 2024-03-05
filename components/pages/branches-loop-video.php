<?php
global $branchCustom, $branch, $custom;
$branch = $post;
$branchCustom = $custom;

$args = [
    'posts_per_page' => -1,
    'post_type' => 'branch',
    'orderby' => 'menu_order',
    'post__not_in' => array($branch->ID),
    'order' => 'ASC'
];

$branches = new WP_Query($args);

?>


<div class="fdry-locations-other-branches__grid">
    <?php if ($branches->have_posts()) : ?>
        <?php while ($branches->have_posts()) : $branches->the_post(); ?>

            <?php $ID = $post->ID; ?>
            <?php $address['line1'] = get_field('address_line_1', $post->ID); ?>
            <?php $address['line2'] = get_field('address_line_2', $post->ID); ?>
            <?php $address['town'] = get_field('town_city', $post->ID); ?>
            <?php $address['postcode'] = get_field('postcode', $post->ID); ?>
            <?php $video = get_field('branch_video', $post->ID); ?>
            <?php $otWeek = get_field('opening_times_weekdays', $post->ID); ?>
            <?php $otSat = get_field('opening_times_saturday', $post->ID); ?>
            <?php $otSun = get_field('opening_times_sunday', $post->ID); ?>
            <?php $otWeekEnds = get_field('opening_times_weekends', $post->ID); ?>
            <?php $carNumber = get_field('code', $post->ID); ?>
            <?php $phoneNumber = get_field('telephone_number', $post->ID); ?>

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
                    <address style="font-size:16px;line-height:24px; letter-spacing:0px;">

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

                        <!-- <a href="<?= site_url('/contact') ?>" style="display:block; margin-top:15px"><b>View Christmas Opening Times</b></a> -->

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