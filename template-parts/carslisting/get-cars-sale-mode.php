<?php

global $branch, $carmodel, $carmake, $carsArray,  $saleMode, $regYear, $carId;

//if($carmodel) $posts_per_page = '1'; else $posts_per_page = '-1';
$posts_per_page = '-1';

if ($carId) {
    $args = [
        'fields' => 'ids',
        'post_type' => ['car'],
        'posts_per_page' => $posts_per_page,
        'post__in' => [$carId],

        'meta_key' => 'rrp',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    ];
} else {
    $args = [
        'fields' => 'ids',
        'post_type' => ['car'],
        'posts_per_page' => $posts_per_page,

        'meta_key' => 'rrp',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
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

    //if ($saleMode === LISTING_NORMAL_MODE) {
        if ($branch) {
            $meta_query[] = [
                'relation' => 'AND',
                [
                    'key' => 'destination',
                    'value' => $branch->ID,
                    'compare' => '=',
                ]
            ];
        }
    //}

    if (!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }
}

$carsArrayFeat = [];
$carsArrayNorm = [];

/*echo "<pre>";
var_dump($args);
die;*/
$query = new WP_Query($args);
if ($carId && !$query->have_posts()) {
    // The car ID is not valid.
    wp_redirect('/', 301);
    die;
}
while ($query->have_posts()) {
    $amount = $query->post_count;
    $itemId = $query->next_post();
    $custom = get_post_custom($itemId);

    $make = get_post($custom['make'][0]);
    $model = get_post($custom['model'][0]);

    if ($custom['reg_date'][0]) {
        $regDate = explode('-', $custom['reg_date'][0]);
        $regYear = substr($regDate[0], 0, 4) . ' ';
    }

    //$model = get_post($itemId);
    //$make = get_post($model->post_parent);
    $location = get_post($custom['location'][0]);
    $locationCustom = get_post_custom($location->ID);
    $carItem = [];
    $carItem['type'] =  LISTING_SALE_MODE;
    $carItem['car_id'] = $itemId;
    $carItem['make_title'] = $make->post_title;
    $carItem['make_name'] = $make->post_name;
    $carItem['model_title'] = $model->post_title;
    $carItem['model_name'] = $model->post_name;
    $carItem['model_year'] = $model->year;
    $carItem['title'] = $regYear . $make->post_title . ' ' . $model->post_title;
    $carItem['rrp'] = $custom['rrp'][0];
    $carItem['from_price'] = $custom['from_price'][0];
    $carItem['sale_mode_override'] = $custom['sale_mode_override'][0] ? $custom['sale_mode_override'][0] : false;
    $carItem['location'] = $custom['location'][0] ? $custom['location'][0] : false;
    $carItem['reg_date'] = $custom['reg_date'][0] ? $custom['reg_date'][0] : false;
    $carItem['reg_number'] = $custom['reg_number'][0] ? $custom['reg_number'][0] : false;
    $carItem['custom_title'] = $custom['title'][0] ? $custom['title'][0] : false;
    $carItem['location_title'] = $location->post_title ? $location->post_title : false;
    $carItem['api_name'] = $locationCustom['api_name'][0] ? $locationCustom['api_name'][0] : false;
    $carItem['derivative'] = $custom['derivative'][0] ?? '&nbsp;';
    $carItem['featured'] = $custom['featured'][0] ?? 0;
    $carItem['transmission'] = $custom['transmission'][0] ? $custom['transmission'][0] : false;
    $carItem['fueltype'] = $custom['fueltype'][0] ? $custom['fueltype'][0] : false;
    $carItem['mileage'] = $custom['mileage'][0] ? $custom['mileage'][0] : false;

    $carItem['image'] = get_the_post_thumbnail_url($model->ID);
    /*$carItem['image'] = $custom['image_url'][0];*/
    /*
    if($carItem['featured']==1) {
        $carsArrayFeat[] = $carItem; 
    }
    else $carsArrayNorm[] = $carItem;
    */


    $carItem['discount'] = get_field('discount',$itemId);


    $carItem['reg_year'] = $regYear;
    $carsArray[] = $carItem;

}

array_multisort(array_column($carsArray, 'rrp'), SORT_ASC,
                array_column($carsArray, 'reg_year'), SORT_DESC,
                $carsArray);

//shuffle($carsArrayFeat);
//print_r($carsArrayFeat);
//shuffle($carsArrayNorm);
//$carsArray = array_merge($carsArrayFeat,$carsArrayNorm);  
 
