
<?php
add_action('wp_ajax_getSmallCars', 'my_function');
add_action('wp_ajax_nopriv_getSmallCars', 'my_function');
function my_function()
{
  $data = $_POST['data'];
  $size = $data['size'];

  $meta_query = [];
  if ($size == 'small') {
    $meta_query[] = [
      'relation' => 'OR',
      array(
        'meta_key' => 'size',
        'value' => 'Small',
        'compare' => '='
      ),
      array(
        'meta_key' => 'size',
        'value' => 'Micro',
        'compare' => '='
      ),
    ];
  } elseif ($size == 'family') {
    $meta_query[] = [
      'relation' => 'AND',
      array(
        'meta_key' => 'size',
        'value' => 'Medium/Large',
        'compare' => '='
      ),
    ];
  } elseif ($size == 'premium') {
    $meta_query[] = [
      'relation' => 'AND',
      array(
        'meta_key' => 'premium',
        'value' => "premium",
        'compare' => '='
      ),
    ];
  } elseif ($size == 'suv') {
    $meta_query[] = [
      'relation' => 'AND',
      array(
        'meta_key' => 'suv',
        'value' => "suv",
        'compare' => '='
      ),
    ];
  }


  $carsArray = [];

  $args = [
    'fields' => 'ids',
    'post_type' => ['car'],
    'posts_per_page' => -1,

    'meta_key' => 'rrp',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
  ];
  if (!empty($meta_query)) {
    $args['meta_query'] = $meta_query;
  }


  $query = new WP_Query($args);
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
    $paintDescription = $custom['fdry_paint_id'][0];
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
    $carItem['reg_year'] = $regYear;
    $carItem['suv'] = $custom['suv'][0] ? $custom['suv'][0] : false;
    $carItem['premium'] = $custom['premium'][0] ? $custom['premium'][0] : false;
    $carItem['size'] = $custom['size'][0] ? $custom['size'][0] : false;
    $carItem['finance'] = TcFinance::getMonthlyPrice($custom['discounted_price'][0]);

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

  wp_send_json_success($carsArray);
}
