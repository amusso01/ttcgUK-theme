<?php

global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
$metaDescription;

if (!empty($similarCars)) {
    $query = $similarCars;
} else {
    $args = [
        'fields' => 'ids',
        'post_type' => ['car'],
        'posts_per_page' => '-1',
    ];
    $meta_query = [];

    if ($carmake) {
        $meta_query[] = [
            'relation' => 'AND',
            [
                'key' => 'make',
                'value' => $carmake->ID,
                'compare' => '=',
            ]
        ];
    }

    if ($carmodel) {
        $meta_query[] = [
            'relation' => 'AND',
            [
                'key' => 'model',
                'value' => $carmodel->ID,
                'compare' => '=',
            ]
        ];
    }
    /*
    if ($branch) {
        $meta_query[] = [
            'relation' => 'AND',
            [
                'key' => 'location',
                'value' => $branch->ID,
                'compare' => '=',
            ]
        ];
    }
*/
    if (!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }

    $query = new WP_Query($args);
    if (isset($custom['nocore'][0]) && $custom['core_range'][0] === '1' && $query->post_count === 0) {
        $pageType = 'nocore';
    }
}

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
    <h1 class="text-center"><?php
        echo $title; ?></h1>
    <p class="text-center d-block">
        <?php
        if ($wp->request == '') {
        ?>
        See our <a class="price-promise-link" href="/price-promise">Price Promise</a>
        <?php } ?>
    </p>
    <?php
    if ($pageType !== 'nocore' || $listingType === 'similarcarlisting') : ?>
    <h5 class="text-center">
        Daily Specials from our Dealers
    </h5>
    <div class="row justify-content-center | carlistrow">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $amount = $query->post_count;
                $itemId = $query->next_post();
                $item = get_post($itemId);
                $carCustom = get_post_custom($itemId);

                if ($listingType === 'similarcarlisting') {
                    if ($carCustom['model'][0] == $carmodel->ID) {
                        continue;
                    }
                }

                $location = get_post($carCustom['location'][0]);
                $locationCustom = get_post_custom($location->ID);
                $make = get_post($carCustom['make'][0]);
                $model = get_post($carCustom['model'][0]);
                $image = $carCustom['image_url'][0];
                if (empty($image)) {
                    $image = get_the_post_thumbnail_url($model->ID);
                    if (empty($image)) {

                        $image = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $make->post_name . '/' . $model->post_name . '.png';
                    }
                }

                $classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 col-xl-3 px-2 | carlist';
                $classesB = 'col col-5 col-md-12 | carlist__carimage';
                $classesC = 'col col-7 col-md-12';

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
             data-rrp="<?php
                echo $carCustom['rrp'][0]; ?>"
             data-make="<?php
                echo $make->post_title ?>"
             data-range="<?php
                    echo $model->post_title ?>"
             data-location="<?php
                    echo $location->post_title ?>"
             data-branch="<?php
                    echo $locationCustom['api_name'][0] ? $locationCustom['api_name'][0] : '' ?>"
             data-current-area="<?php
                    if (isset($branch)) {
                        if ($branch->ID == $carCustom['location'][0]) {
                            echo '1';
                        } else {
                            echo '0';
                        }
                    } else {
                        echo '0';
                    }
                                ?>">
            <div class="row">
                <div class="<?php
                echo $classesB; ?>">
                <?php if (!isset($carmodel) || $listingType === 'similarcarlisting') : ?>
                    <div class="text-center car-name d-md-none"><?php
                        echo date(
                                'Y',
                                strtotime($carCustom['reg_date'][0])
                            ) . ' ' . $make->post_title . ' ' . $model->post_title ?></div>
                <?php endif; ?>
                    <a <?php
                echo $link; ?> class="car-link">
                        <div class="img-holder">
                            <img class="car-img" src="<?php
                echo $image; ?>" alt="<?php
                echo $carCustom['title'][0]; ?>"/>
                            <div class="carlist__carreg--opaque"><?php
                echo $carCustom['reg_number'][0]; ?></div>
                        </div>
                <?php if (!isset($carmodel) || $listingType === 'similarcarlisting') : ?>
                        <div class="text-center car-name d-none d-md-block"><?php
                echo date(
                    'Y',
                    strtotime($carCustom['reg_date'][0])
                ) . ' ' . $make->post_title . ' ' . $model->post_title ?></div>
                <?php endif; ?>
                    </a>
                </div>
                <div class="<?php
                    echo $classesC; ?>">
                    <div class="row">
                        <a <?php
                echo $link; ?> class="col col-12 col-md-12 | carlist__prices">
                            <div class="row no-gutters text-center">
                                <div class="col | carlist__prices__price">
                                    &pound;<span><?php
                echo $carCustom['rrp'][0]; ?></span>
                                    <small class="location"><?php
                echo $location->post_title ?></small>
                                </div>
                                <div class="col | carlist__prices__deposit">
                                    &pound;<span class="text-left"><?php
                    echo TcFinance::getWeeklyPrice($carCustom['rrp'][0]); ?></span>
                                    <div>&pound;<i><?php
                echo TcFinance::getDeposit($carCustom['rrp'][0]); ?></i> Deposit
                                    </div>
                                </div>
                                <div class="carlist__prices__divider">or</div>
                            </div>
                        </a>
                        <div class="col col-12 col-md-12 offset-md-0 | carlist__finance">
                            <a href="#freefinance" class="text-center | carlist__button">Free Finance
                                Check</a>
                            <figure data-image="<?php
                echo $image; ?>" data-title="<?php
                echo date(
                    'Y',
                    strtotime($carCustom['reg_date'][0])
                ) . ' ' . $make->post_title . ' ' . $model->post_title ?>" data-rrp="<?php
                    echo $carCustom['rrp'][0]; ?>" class="finance-example">Finance Example
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
