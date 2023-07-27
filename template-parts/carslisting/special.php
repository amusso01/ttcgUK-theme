<?php

global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
       $metaDescription;

$args = [
    'fields' => 'ids',
    'post_type' => ['specials'],
    'posts_per_page' => '-1',
];
$meta_query = [];

if ($branch) {
    $meta_query[] = [
        'relation' => 'AND',
        [
            'key' => 'branch',
            'value' => $branch->ID,
            'compare' => '=',
        ]
    ];
}
if (!empty($meta_query)) {
    $args['meta_query'] = $meta_query;
}
$query = new WP_Query($args);
//var_dump($query->post_count);die;
if ($query->post_count > 0) :
    ?>
    <div class="<?php
    if (!isset($branch)) {
        echo 'special-wrapper';
    } ?>">
        <section class="container-fluid | carslisting specialcarslisting">
            <?php
            if (!isset($branch)) : echo '<h2 class="text-center">' . get_option(
                    'tcw_special_offers_header'
                ) . '</h2>'; else : echo '<h1 class="text-center">' . $title . '</h1>'; endif; ?>
            <?php
            if (isset($branch)) : ?><h5></h5><?php
            endif; ?>
            <div class="row justify-content-center | carlistrow">
                <?php
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $amount = $query->post_count;
                        $itemId = $query->next_post();
                        $item = get_post($itemId);
                        $specialCustom = get_post_custom($itemId);

                        $model = get_post($specialCustom['model'][0]);
                        $make = get_post($model->post_parent);
                        $carCustom = get_post_custom($carmodel->ID);

                        $specialLocation = get_post($specialCustom['branch'][0]);
                        $locationCustom = get_post_custom($specialLocation->ID);

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

                        if (!isset($branch)) {
                            $link = 'href="' . area_link('/branches/' . $specialLocation->post_name, true) . '"';
                        } else {
                            $link = '';
                        }
                        ?>
                        <div class="<?php
                        echo $classesA; ?>"
                             data-rrp="<?php
                             echo $specialCustom['from_price'][0]; ?>"
                             data-make="<?php
                             echo $make->post_title ?>"
                             data-range="<?php
                             echo $model->post_title ?>"
                             data-location="<?php
                             echo $specialLocation->post_title ?>"
                             data-branch="<?php
                             echo $locationCustom['api_name'][0] ? $locationCustom['api_name'][0] : '' ?>"
                             data-current-area="<?php
                             if (isset($branch)) {
                                 if ($branch->ID == $specialCustom['branch'][0]) {
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
                                    <div class="text-center car-name d-md-none"><?php
                                        echo $make->post_title . ' ' . $model->post_title; ?></div>
                                    <a <?php
                                    echo $link; ?> class="car-link">
                                        <div class="img-holder">
                                            <img class="car-img" src="<?php
                                            echo $image; ?>" alt="<?php
                                            echo $item->post_title; ?>"/>
                                            <div class="carlist__carreg--opaque larger">BUDGET SPECIAL</div>
                                        </div>
                                        <div class="text-center car-name d-none d-md-block"><?php
                                            echo $item->post_title; ?></div>
                                    </a>
                                </div>
                                <div class="<?php
                                echo $classesC; ?>">
                                    <div class="row">
                                        <a <?php
                                        echo $link; ?> class="col col-12 col-md-12 | carlist__prices">
                                            <div class="text-center drive-away">Drive Away <strong>today</strong></div>
                                            <div class="row no-gutters text-center">
                                                <div class="col | carlist__prices__price">
                                                    &pound;<span><?php
                                                        echo $specialCustom['from_price'][0]; ?></span>
                                                    <small class="location"><?php
                                                        echo $specialLocation->post_title ?></small>
                                                </div>
                                                <div class="col | carlist__prices__deposit">
                                                    &pound;<span class="text-left"><?php
                                                        echo TcFinance::getWeeklyPrice(
                                                            $specialCustom['from_price'][0]
                                                        ); ?></span>
                                                    <div>&pound;<i><?php
                                                            echo TcFinance::getDeposit(
                                                                $specialCustom['from_price'][0]
                                                            ); ?></i> Deposit
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
                                            echo $item->post_title; ?>" data-rrp="<?php
                                            echo $specialCustom['from_price'][0]; ?>" class="finance-example">Finance
                                                Example
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
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
        </section>
    </div>
<?php
endif;