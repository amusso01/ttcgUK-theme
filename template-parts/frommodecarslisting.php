<?php

global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
$metaDescription, $saleModeDiscount;

if (!empty($similarCars)) {
    $query = $similarCars;
} else {


    $args = [
        'fields' => 'ids',
        'post_type' => ['carmodel'],
        'posts_per_page' => '-1',
        'orderby' => 'rand',   
        'meta_query' => [       
            'relation' => 'AND',                 
            [
                'key' => 'core_range',                  
                'value' => 1,                                  
                'compare' => '='                   
            ],
            [
                'key' => 'from_price',
                'value' => 0,
                'compare' => '>'
            ]
        ]
    ];

    if ($carmodel) {
        $args['p'] = $carmodel->ID;
    } else if ($carmake) {
        $args['post_parent'] = $carmake->ID;
    }

    $query = new WP_Query($args);
}

$showListing = true;
?>
<section class="container-fluid | carslisting <?php
                echo $listingType; ?>">
    <?php
    if (isset($show404)) {
        get_template_part('template-parts/404-block', 'front-page');
    }
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
                     src="https://cdn.tradecentregroup.io/image/upload/v<?php echo date("HdmY"); ?>/web/Group/202011CV/web-banner-desktop.png"/>
                <img class="d-md-none w-100"
                     src="https://cdn.tradecentregroup.io/image/upload/v<?php echo date("HdmY"); ?>/web/Group/202011CV/web-banner-mobile.png"/>
        </div>
    </div>-->
    <?php
    if($carmodel) {
        $post = get_post($query->posts[0]);
        $modelyear = $post->year;
    }  
    ?>
    <h1 class="text-center"><?php if($modelyear!="" && !isset($similarCars)) echo str_replace('Used',$modelyear,$title); else echo $title; ?></h1>
    <p class="text-center d-block">
        <?php
        if ($wp->request == '') {
        ?>
        See our <a class="price-promise-link" href="/price-promise">Price Promise</a>
        <?php } ?>
    </p>
    <?php
    if ($showListing) : ?>
    <h5 class="text-center">
        <?php
        if ($wp->request == '' || $wp->request == 'price-promise') {
        ?>
        Over 3,000 Cars To Choose From
        <?php } ?>
    </h5>
    <div class="row justify-content-center | carlistrow">
        <?php
        if ($query->have_posts()) {
            $i = 0;
            while ($query->have_posts()) {
                $amount = $query->post_count;
                $itemId = $query->next_post();
                $model = get_post($itemId);
                $carCustom = get_post_custom($itemId);

                if ($model->post_parent == 0) {
                    mail(get_bloginfo('admin_email'), 'Missing Mapping for ' . $model->post_title, $model->post_title . ' does not have a make.');
                    continue;
                }

                $make = get_post($model->post_parent);
                $image = get_the_post_thumbnail_url($itemId);
                if (empty($image)) {
                    $image = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $make->post_name . '/' . $model->post_name . '.png';
                }

                $classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 col-xl-3 px-2 | carlist';
                $classesB = 'col col-5 col-md-12 | carlist__carimage';
                $classesC = 'col col-7 col-md-12';

                $fromPrice = $carCustom['from_price'][0] ? $carCustom['from_price'][0] : 'TBC';

                $saleMessage = $saleModeDiscount;
                if (isset($carCustom['sale_mode_override'][0]) && !empty($carCustom['sale_mode_override'][0])) {
                    $saleMessage = html_entity_decode($carCustom['sale_mode_override'][0]);
                }

                if ($amount == 1) {
                    $classesA = 'col-10 px-2 | carlist one-car';
                    $classesB = 'col-12 col-sm-5 col-md-6 | carlist__carimage';
                    $classesC = 'col col-md-6 pt-2 pt-sm-0 pt-md-4 pt-lg-5';
                } elseif ($amount == 2) {
                    $classesA = 'col-10 col-md-6 col-lg-4 px-2 | carlist two-car';
                    $classesB = 'col-12 col-sm-5 col-md-12 | carlist__carimage';
                    $classesC = 'col col-md-12 pt-2 pt-sm-0';
                } elseif ($amount == 3) {
                    $classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 px-2 | carlist less-than-4';
                }

                if (!isset($carmodel) || $listingType === 'similarcarlisting') {
                    $link = 'href="' . area_link('/cars/' . $make->post_name . '/' . $model->post_name, true) . '"';
                } else {
                    $link = '';
                }
        ?>
        <div class="<?php
                echo $classesA; ?>"
             data-rrp=""
             data-make="<?php
                echo $make->post_title ?>"
             data-range="<?php
                    echo $model->post_title ?>"
             data-location=""
             data-branch=""
             data-current-area="0">
            <div class="row">
                <div class="<?php
                    echo $classesB; ?>">
                    <?php if (!isset($carmodel) || $listingType === 'similarcarlisting') : ?>
                    <div class="text-center car-name d-md-none"><?php
                echo $model->year . ' ' . $make->post_title . ' ' . $model->post_title; ?></div>
                    <?php endif; ?>
                    <a <?php
                echo $link; ?> class="car-link">
                        <div class="img-holder">
                            <img class="car-img" src="<?php
                echo $image; ?>" alt="<?php
                echo $make->post_title . ' ' . $model->post_title; ?>" />
                            <div class="carlist__carreg--opaque">HUGE CHOICE</div>
                        </div>
                        <?php if (!isset($carmodel) || $listingType === 'similarcarlisting') : ?>
                        <div class="text-center car-name d-none d-md-block"><?php
                echo $model->year . ' ' . $make->post_title . ' ' . $model->post_title; ?></div>
                        <?php endif; ?>
                    </a>
                    <figure data-image="<?php
                echo $image; ?>" data-title="<?php
                echo $make->post_title . ' ' . $model->post_title ?>" data-rrp="<?php
                    echo $fromPrice; ?>" class="finance-example">Finance Example
                    </figure>
                </div>
                <div class="<?php
                echo $classesC; ?>">
                    <div class="row">
                        <div class="col-12 drive-away-container">
                            <a href="#" class="text-center drive-away">
                              Drive Away <strong>today</strong>  
                            </a>
                        </div>
                        <a <?php
                echo $link; ?> class="col col-12 col-md-12 | carlist__prices">
                            <div class="row no-gutters text-center">
                                <div class="col | carlist__prices__price from_price">
                                    <small>from</small>
                                    &pound;<span><?php
                echo $fromPrice; ?></span>
                                </div>
                                <div class="col | carlist__prices__deposit from_price">
                                    <div>&pound;<i><?php
                echo TcFinance::getDeposit($fromPrice); ?></i> Deposit
                                    </div>
                                    &pound;<span class="text-left"><?php
                echo TcFinance::getWeeklyPrice($fromPrice); ?></span>
                                </div>
                                <div class="carlist__prices__divider">or</div>
                            </div>
                        </a>
                        <div class="col col-12 col-md-12 offset-md-0 | carlist__finance">
                            <a href="#freefinance" class="text-center | carlist__button">Free Finance
                                Check</a>
                            <figure data-image="<?php
                echo $image; ?>" data-title="<?php
                echo $make->post_title . ' ' . $model->post_title ?>" data-rrp="<?php
                    echo $fromPrice; ?>" class="finance-example">Finance Example
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
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
        <a class="c-button--grey d-lg-none load-more" data-type="<?php
                                                                 echo $listingType; ?>">Load More</a>
        <?php
        endif;
        if ($amount > 8) : ?>
        <a class="c-button--grey d-none d-lg-inline-block d-xxl-none load-more" data-type="<?php
                                                                                           echo $listingType; ?>">Load More</a>
        <?php
        endif;
        if ($amount > 10) : ?>
        <a class="c-button--grey d-none d-xxl-inline-block load-more" data-type="<?php
                                                                                 echo $listingType; ?>">Load More</a>
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
