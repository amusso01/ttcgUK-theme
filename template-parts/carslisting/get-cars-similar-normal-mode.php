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

    $carsArrayFeat = [];
    $carsArrayNorm = [];

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
            $carItem['car_id'] = $itemId;
            $carItem['make_title'] = $make->post_title;
            $carItem['make_name'] = $make->post_name;
            $carItem['model_title'] = $model->post_title;
            $carItem['model_name'] = $model->post_name;
            $carItem['model_year'] = $model->year;
            $carItem['reg_date'] = $custom['reg_date'][0] ? $custom['reg_date'][0] : false;
            $carItem['reg_year'] = substr($carItem['reg_date'], 0, 4);
            $carItem['title'] = $carItem['reg_year'] . ' ' . $make->post_title . ' ' . $model->post_title;
            $carItem['rrp'] = $custom['rrp'][0];
            $carItem['from_price'] = $custom['from_price'][0];
            $carItem['sale_mode_override'] = $custom['sale_mode_override'][0] ? $custom['sale_mode_override'][0] : false;
            $carItem['location'] = $custom['location'][0] ? $custom['location'][0] : false;
            $carItem['reg_number'] = $custom['reg_number'][0] ? $custom['reg_number'][0] : false;
            $carItem['custom_title'] = $custom['title'][0] ? $custom['title'][0] : false;
            $carItem['location_title'] = $location->post_title ? $location->post_title : false;
            $carItem['api_name'] = $locationCustom['api_name'][0] ? $locationCustom['api_name'][0] : false;
            $carItem['derivative'] = $custom['derivative'][0] ?? '&nbsp;';
            $carItem['featured'] = $custom['featured'][0] ?? 0;
            $carItem['transmission'] = $custom['transmission'][0] ? $custom['transmission'][0] : false;
            $carItem['fueltype'] = $custom['fueltype'][0] ? $custom['fueltype'][0] : false;
            $carItem['mileage'] = $custom['mileage'][0] ? $custom['mileage'][0] : false;

            $carItem['image'] = get_the_post_thumbnail_url($itemId);

            /*
            if($carItem['featured']==1) {
                $carsArrayFeat[] = $carItem; 
            }
            else $carsArrayNorm[] = $carItem;
            */
            
            $carsArray[] = $carItem;           
            
        }
        
array_multisort(array_column($carsArray, 'rrp'), SORT_ASC,
                array_column($carsArray, 'reg_year'), SORT_DESC,
                $carsArray);        

        //shuffle($carsArrayFeat);
        // print_r($carsArrayFeat);
        //  shuffle($carsArrayNorm);
        //  $carsArray = array_merge($carsArrayFeat,$carsArrayNorm); 

        $listingType = 'similarcarlisting';
        $title = $similarCarTitle;
    }
}
