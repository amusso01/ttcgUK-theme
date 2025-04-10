<?php

global $branch, $carmodel, $carmake, $carsArray,  $saleMode, $regYear, $carId, $originalCarsArray, $removedCarsArray;

//if($carmodel) $posts_per_page = '1'; else $posts_per_page = '-1';
$posts_per_page = '-1';
$isDiscount = get_field('discount_active', 'option');

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


    if ($post->post_type === 'financeexample') {
        $rrp_finance = get_field('cash_price', $finances->ID);

        if ($isDiscount) {
            $key = 'discounted_price';
            $meta_query[] = [
                'relation' => 'AND',
                [
                    'key' => $key,
                    'value' => $rrp_finance,
                    'compare' => '=',
                ]
            ];
        } else {
            $args = [
                'fields' => 'ids',
                'post_type' => ['car'],
                'posts_per_page' => $posts_per_page,

                'meta_key' => 'rrp',
                'meta_value' => $rrp_finance,
                'meta_compare' => '=',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ];

            $meta_query = [];
        };
    }

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
    $modelRange = get_field('model_range', $model->ID);
    $modelVariant = get_field('model_variant', $model->ID);
    $powerTrain = get_field('power_train', $model->ID);
    $bodySize = get_field('body_size', $model->ID);
    $trim   = get_field('trim', $model->ID);
    $paintId = get_field('paint_id', $model->ID);
    $paintDescription = get_field('paint_description', $model->ID);
    $rimId = get_field('rim_id', $model->ID);
    $rimDescription = get_field('rim_description', $model->ID);
    $interiorId = get_field('interior_id', $model->ID);
    $interiorDescription = get_field('interior_description', $model->ID);
    $bodyType =  $custom['bodytype'][0];
    $carItem = [];
    $carItem['type'] = LISTING_NORMAL_MODE;
    $carItem['car_id'] = $itemId;
    $carItem['make_title'] = $make->post_title;
    $carItem['make_name'] = $make->post_name;
    $carItem['model_title'] = $model->post_title;
    $carItem['model_name'] = $model->post_name;
    $carItem['model_id'] = $model->ID;
    $carItem['model_range'] = $modelRange;
    $carItem['model_variant'] = $modelVariant;
    $carItem['power_train'] = $powerTrain;
    $carItem['body_size'] = $bodySize;
    $carItem['body_type'] = $bodyType;
    $carItem['trim'] = $trim;
    $carItem['paint_id'] = $paintId;
    $carItem['paint_description'] = $paintDescription;
    $carItem['rim_id'] = $rimId;
    $carItem['rim_description'] = $rimDescription;
    $carItem['interior_id'] = $interiorId;
    $carItem['interior_description'] = $interiorDescription;
    $carItem['model_year'] = $model->year;
    $carItem['title'] = $regYear . $make->post_title . ' ' . $model->post_title;
    $carItem['rrp'] = $custom['rrp'][0];
    $carItem['discounted_price'] = $custom['discounted_price'][0] ? $custom['discounted_price'][0] : false;
    $carItem['discount'] = $custom['discount'][0] ? $custom['discount'][0] : false;
    $carItem['from_price'] = $custom['from_price'][0];
    $carItem['sale_mode_override'] = $custom['sale_mode_override'][0] ? $custom['sale_mode_override'][0] : false;
    $carItem['location'] = $custom['location'][0] ? $custom['location'][0] : false;
    $carItem['branch'] = $location ? $location : false;
    $carItem['destination'] = get_the_title($custom['destination'][0]);
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
    $carItem['stock_number'] = $custom['stock_number'][0] ? $custom['stock_number'][0] : false;
    $carItem['image'] = get_the_post_thumbnail_url($model->ID);
    $carItem['total_make_in_stock'] = $custom['total_make_in_stock'][0] ? $custom['total_make_in_stock'][0] : false;
    $carItem['size'] = $custom['size'][0] ? $custom['size'][0] : false;
    $carItem['suv'] = $custom['suv'][0] ? $custom['suv'][0] : false;
    $carItem['premium'] = $custom['premium'][0] ? $custom['premium'][0] : false;
    $carItem['cap_price'] = $custom['cap_price'][0] ? $custom['cap_price'][0] : false;
    /*$carItem['image'] = $custom['image_url'][0];*/
    /*
    if($carItem['featured']==1) {
        $carsArrayFeat[] = $carItem; 
    }
    else $carsArrayNorm[] = $carItem;
    */
    $carItem['reg_year'] = $regYear;
    $carsArray[] = $carItem;
}

array_multisort(
    // array_column($carsArray, 'rrp'),
    array_column($carsArray, 'discounted_price'),
    SORT_ASC,
    array_column($carsArray, 'reg_year'),
    SORT_DESC,
    $carsArray
);

$originalCarsArray = $carsArray;

// REMOVE CAR SAME MODEL AND YEAR
// Create a new array to store the unique car items
$uniqueCarsArray = array();

// Create a new array to store the removed car items
$removedCarsArray = array();

// Iterate through the $carsArray
foreach ($carsArray as $carItem) {
    // Create a key based on the reg_year and model_title values
    $key = $carItem['reg_year'] . '_' . $carItem['model_title'];

    // Check if the key already exists in the $uniqueCarsArray
    if (!isset($uniqueCarsArray[$key])) {
        // If not, add the car item to the $uniqueCarsArray
        $uniqueCarsArray[$key] = $carItem;
    } else {
        // If the key already exists, add the car item to the $removedCarsArray
        $removedCarsArray[] = $carItem;
    }
}

// Replace the original $carsArray with the $uniqueCarsArray
// $carsArray = $uniqueCarsArray;
$carsArray = $originalCarsArray;

//shuffle($carsArrayFeat);
//print_r($carsArrayFeat);
//shuffle($carsArrayNorm);
//$carsArray = array_merge($carsArrayFeat,$carsArrayNorm); 
?>

<!--  -->