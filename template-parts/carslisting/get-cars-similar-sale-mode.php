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
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => [
            [
                'taxonomy' => 'cartype',
                'field' => 'slug',
                'terms' => $termsArray,
                'operator' => 'IN',
            ],
        ]
    ];

    $models = [];
    $carModels = new WP_Query($args);

 

    if ($carModels->have_posts()) {
        while ($carModels->have_posts()) {
            $models[] = $carModels->next_post();
        }

        $args = [
            'fields' => 'ids',
            'post_type' => ['car'],
            'posts_per_page' => '-1',
            'meta_key' => 'rrp',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'model',
                    'value' => $models,
                    'compare' => 'IN',
                ]
            ]
        ];

        $similarCars = new WP_Query($args);
        if ($similarCars->have_posts()) {
            $listingType = 'similarcarlisting';
            $title = $similarCarTitle;
        }
    }

    $query = new WP_Query($args);


    if ($query->have_posts()) {

        while ($query->have_posts()) {

            $amount = $query->post_count;
            $itemId = $query->next_post();
            $custom = get_post_custom($itemId);

            $make = get_post($custom['make'][0]);
            $model = get_post($custom['model'][0]);

            $location = get_post($custom['location'][0]);
            $locationCustom = get_post_custom($location->ID);
            $carItem = [];
            $carItem['type'] = LISTING_NORMAL_MODE;
            $carItem['make_title'] = $make->post_title;
            $carItem['make_name'] = $make->post_name;
            $carItem['model_title'] = $model->post_title;
            $carItem['model_name'] = $model->post_name;
            $carItem['model_year'] = $model->year;
            $carItem['title'] = $model->year . ' ' . $make->post_title . ' ' . $model->post_title;
            $carItem['rrp'] = $custom['rrp'][0];
            $carItem['from_price'] = $custom['from_price'][0];
            $carItem['sale_mode_override'] = $custom['sale_mode_override'][0] ? $custom['sale_mode_override'][0] : false;
            $carItem['location'] = $custom['location'][0] ? $custom['location'][0] : false;
            $carItem['reg_date'] = $custom['reg_date'][0] ? $custom['reg_date'][0] : false;
            $carItem['reg_number'] = $custom['reg_number'][0] ? $custom['reg_number'][0] : false;
            $carItem['custom_title'] = $custom['title'][0] ? $custom['title'][0] : false;
            $carItem['location_title'] = $location->post_title ? $location->post_title : false;
            $carItem['api_name'] = $locationCustom['api_name'][0] ? $locationCustom['api_name'][0] : false;

            $carItem['image'] = get_the_post_thumbnail_url($itemId);

            $carsArray[] = $carItem;
        }

        $listingType = 'similarcarlisting';
        $title = $similarCarTitle;
    }
}
