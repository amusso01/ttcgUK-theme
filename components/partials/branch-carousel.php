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


<div class="fdry-locations-other-branches__grid fdry-branch-carousel-three-single" >
        <?php if ( $branches ->have_posts() ) : ?>
            <?php while ( $branches ->have_posts() ) : $branches ->the_post(); ?>

            <?php  $ID = $post->ID; ?>
            <?php  $address['line1'] = get_field('address_line_1' , $post->ID); ?>
            <?php  $address['line2'] = get_field('address_line_2' , $post->ID); ?>
            <?php  $address['town'] = get_field('town_city' , $post->ID); ?>
            <?php  $address['postcode'] = get_field('postcode' , $post->ID); ?>
            <?php  $video= get_field('branch_video' , $post->ID); ?>
            <?php  $otWeek= get_field('opening_times_weekdays' , $post->ID); ?>
            <?php  $otSat= get_field('opening_times_saturday' , $post->ID); ?>
            <?php  $otSun= get_field('opening_times_sunday' , $post->ID); ?>
            <?php  $otWeekEnds= get_field('opening_times_weekends' , $post->ID); ?>
            <?php  $carNumber= get_field('code' , $post->ID); ?>
            <?php  $phoneNumber= get_field('telephone_number' , $post->ID); ?>

        <div class="fdry-locations-landing-singleLocation">
            <div class="top-image-video">
                <img class="branch-locations__image" src="<?= get_the_post_thumbnail_url($ID); ?>"
                    alt="<?= $post->post_title; ?> Trade Centre">
            </div>

            <div class="fdry-locations-landing__top-info" style="text-align:center">
                    <h5 class="fdry-locations-landing__top-info-title"><i><?php get_template_part( 'svg-template/svg-geo-tag-icon' ) ?></i> <?= 'Trade Centre ' . $post->post_title; ?></h5>
                    <address  style="font-size:16px;line-height:24px; letter-spacing:0px;">

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
            <div class="fdry-locations-landing__bottom-info">

              <a href="/branches/<?= $post->post_name; ?>" class="fdry-btn-locations">MORE INFORMATION</a>
            </div>
        </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>