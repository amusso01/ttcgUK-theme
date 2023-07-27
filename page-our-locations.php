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

<div class="sticky-top-banner" style="margin-bottom: 25px;">
    <!-- <img class="d-none d-md-block  w-100"
src="https://cdn.tradecentregroup.io/image/upload/v1683128679/TCG-Banner-Desktop.jpg?v=<?php echo date("HdmY"); ?>"/>
    <img class="d-md-none w-100" src="<?php echo $banner_sticky_mobile  ?>?v=<?php echo date("HdmY"); ?>"/> -->
    
    <div class="marquee_text">
        WE WANT YOUR PART-EX<span class="smaller" style=" font-weight:400; letter-spacing:0.1px; position:relative;"> AND </span>WE PAY MORE - <span style="color:#c21818">PUT US TO TEST! </span>
        &nbsp; WE WANT YOUR PART-EX<span class="smaller" style=" font-weight:400; letter-spacing:0.1px; position:relative;"> AND </span>WE PAY MORE - <span style="color:#c21818">PUT US TO TEST! </span>
    </div>
</div>

<section class="text-center py-5 our-locations">

    <div class="container">

        <h2 class="text-center" style="color:#021B79;"><?= get_the_title() ?></h2>

        <div class="row mt-5">
            <?php if ( $branches ->have_posts() ) : ?>
                <?php while ( $branches ->have_posts() ) : $branches ->the_post(); ?>
            
                <?php  $ID = $post->ID; ?>
                <?php  $address['line1'] = get_field('address_line_1' , $ID); ?>
                <?php  $address['line2'] = get_field('address_line_2' , $ID); ?>
                <?php  $address['town'] = get_field('town_city' , $ID); ?>
                <?php  $address['postcode'] = get_field('postcode' , $ID); ?>
                <?php  $video= get_field('branch_video' , $ID); ?>
                <div class="col col-12 col-sm-12 col-md-6 order-1 text-left | branch-locations__place" style="margin-bottom:20px;">
                    <div class="row">
                        <div class="col col-12 col-sm-12 col-md-12 col-lg-12 pr-2 pr-md-3">
                            <?php if($video) : ?>
                                <video 
                                 width="250"
                                 autoplay
                                 disablepictureinpicture
                                 loop="true"
                                 muted="false"
                                 poster="<?= get_the_post_thumbnail_url($ID); ?>"
                                 >
                                    <source src="<?= $video ?>" type="video/mp4">
                                </video>
                            <?php else : ?>
                            <img class="branch-locations__image" src="<?= get_the_post_thumbnail_url($ID); ?>"
                                alt="<?= $post->post_title; ?> Trade Centre">
                            <img class="logo-img" src="<?=$logo; ?>" alt="<?= $post->post_title; ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="col pl-md-3">
                            <h4 style="color:#021B79"class="mt-3 mb-4"><?= 'Trade Centre ' . $post->post_title; ?></h4>
                            <address  style="font-size:18px;line-height:22px; letter-spacing:0.27px; font-weight:500 ">
                        
                        
                                <?= $address['line1']; ?>
                                    <br>
                        
                                <?= $address['line2']; ?>
                                <br>

                                <span style="color:#CE1719"><?= $address['town']; ?></span>
                            
                                <br>
                                <?= $address['postcode']; ?>
            
                            </address>

                            <a class="c-button--blue location__buttons" href="/branches/<?= $post->post_name; ?>">MORE INFORMATION</a>
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
