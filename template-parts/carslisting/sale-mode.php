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
        'orderby' => 'date',
        'order' => 'ASC',
    ];

    $meta_query = [];

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
        <div class="col d-flex justify-content-center">
            <a href="/social-distancing"><img src="/images/SafestPlace_DesktopV2.png" class="d-none d-md-block w-100 safetyimg" />
                <img src="/images/SafestPlace_Mobile.png" class="d-md-none w-100 safetyimgmob" /></a>
        </div>
    </div>
    <h1 class="text-center"><?php echo $title; ?></h1>
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
        Daily Specials from our Dealers
    </h5>
    <div class="row justify-content-center | carlistrow">
        <?php
        if ($query->have_posts()) {
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

                $classesA = 'col-10 col-md-6 col-lg-4 col-xl-3 px-2 | carlist';
                $classesB = 'col-10 offset-1 offset-sm-0 col-sm-5 col-md-12 | carlist__carimage';
                $classesC = 'col-12 col-sm-7 col-md-12';

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
                    <a <?php
                echo $link; ?> class="car-link">
                        <div class="img-holder">
                            <img class="car-img" src="<?php
                echo $image; ?>" alt="<?php
                echo $make->post_title . ' ' . $model->post_title; ?>"/>
                        </div>
                        <!--<div class="text-center car-name"><?php
                echo $make->post_title . ' ' . $model->post_title; ?></div>-->
                    </a>
                </div>
                <div class="<?php
                echo $classesC; ?>">
                    <div class="row">
                        <a <?php
                echo $link; ?> class="col col-12 col-md-12 | carlist__prices">
                            <div class="row no-gutters text-center">
                                <div class="col-12 | carlist__prices__saleheader">
                                    <!--<span>EVERY</span>--> <?php echo strtoupper($make->post_title.' '.$model->post_title); ?>
                                </div>
                                <div class="col-12 | carlist__prices__salerow">
                                    <img src="<?php echo $saleMessage; ?>" />
                                </div>
                            </div>
                        </a>
                        <div class="col col-12 col-md-12 offset-md-0 | carlist__finance">
                            <a href="#freefinance" class="text-center | carlist__button">Free Finance
                                Check</a>
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
