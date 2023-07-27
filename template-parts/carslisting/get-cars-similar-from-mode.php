<?php

global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
       $metaDescription, $carsArray;

$termsArray = [];
if ($carmodel) {
    $terms = get_the_terms($carmodel->ID, 'cartype');

    if ($terms) {
        foreach ($terms as $term) {
            $termsArray[] = $term->slug;
        }
    }
}

if ($termsArray) {
    $args = [
        'fields' => 'ids',
        'post_type' => ['carmodel'],
        'posts_per_page' => '-1',
        'orderby' => 'rand',
        'tax_query' => [
            [
                'taxonomy' => 'cartype',
                'field' => 'slug',
                'terms' => $termsArray,
                'operator' => 'IN',
            ],
        ],
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

    $similarCars = new WP_Query($args);

    if ($similarCars->have_posts()) {

        while ($similarCars->have_posts()) {
            $amount = $similarCars->post_count;
            $itemId = $similarCars->next_post();
            $model = get_post($itemId);
            $make = get_post($model->post_parent);
            $custom = get_post_custom($itemId);
            $carItem = [];
            $carItem['type'] = LISTING_FROM_MODE;
            $carItem['make_title'] = $make->post_title;
            $carItem['make_name'] = $make->post_name;
            $carItem['model_title'] = $model->post_title;
            $carItem['model_name'] = $model->post_name;
            $carItem['model_year'] = $model->year;
            $carItem['title'] = $model->year . ' ' . $make->post_title . ' ' . $model->post_title;
            $carItem['from_price'] = $custom['from_price'][0];
            $carItem['sale_mode_override'] = $custom['sale_mode_override'][0] ? $custom['sale_mode_override'][0] : false;
            $carItem['image'] = get_the_post_thumbnail_url($itemId);

            $carsArray[] = $carItem;
        }

        $listingType = 'similarcarlisting';
        $title = $similarCarTitle;
    }
}
