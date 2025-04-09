<?php
global  $carmake, $carmodel, $car, $carsArray, $carItem, $carId, $originalCarsArray, $removedCarsArray, $similarUniqueCarsArray;

$args = [
  'fields' => 'ids',
  'post_type' => ['car'],
  'posts_per_page' => -1,
  'post__not_in' => array($carItem['car_id']),
  'meta_key' => 'rrp',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
];
$meta_query = [];

$meta_query[] = [
  'relation' => 'AND',
  [
    'key' => 'model',
    'value' => $carmodel->ID,
    'compare' => '=',
  ],
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
  $similarCarItem = [];
  $similarCarItem['type'] = LISTING_NORMAL_MODE;
  $similarCarItem['car_id'] = $itemId;
  $similarCarItem['make_title'] = $make->post_title;
  $similarCarItem['make_name'] = $make->post_name;
  $similarCarItem['model_title'] = $model->post_title;
  $similarCarItem['model_name'] = $model->post_name;
  $similarCarItem['model_id'] = $model->ID;
  $similarCarItem['model_range'] = $modelRange;
  $similarCarItem['model_variant'] = $modelVariant;
  $similarCarItem['power_train'] = $powerTrain;
  $similarCarItem['body_size'] = $bodySize;
  $similarCarItem['body_type'] = $bodyType;
  $similarCarItem['trim'] = $trim;
  $similarCarItem['paint_id'] = $paintId;
  $similarCarItem['paint_description'] = $paintDescription;
  $similarCarItem['rim_id'] = $rimId;
  $similarCarItem['rim_description'] = $rimDescription;
  $similarCarItem['interior_id'] = $interiorId;
  $similarCarItem['interior_description'] = $interiorDescription;
  $similarCarItem['model_year'] = $model->year;
  $similarCarItem['title'] = $regYear . $make->post_title . ' ' . $model->post_title;
  $similarCarItem['rrp'] = $custom['rrp'][0];
  $similarCarItem['discounted_price'] = $custom['discounted_price'][0] ? $custom['discounted_price'][0] : false;
  $similarCarItem['discount'] = $custom['discount'][0] ? $custom['discount'][0] : false;
  $similarCarItem['from_price'] = $custom['from_price'][0];
  $similarCarItem['sale_mode_override'] = $custom['sale_mode_override'][0] ? $custom['sale_mode_override'][0] : false;
  $similarCarItem['location'] = $custom['location'][0] ? $custom['location'][0] : false;
  $similarCarItem['branch'] = $location ? $location : false;
  $similarCarItem['destination'] = get_the_title($custom['destination'][0]);
  $similarCarItem['reg_date'] = $custom['reg_date'][0] ? $custom['reg_date'][0] : false;
  $similarCarItem['reg_number'] = $custom['reg_number'][0] ? $custom['reg_number'][0] : false;
  $similarCarItem['custom_title'] = $custom['title'][0] ? $custom['title'][0] : false;
  $similarCarItem['location_title'] = $location->post_title ? $location->post_title : false;
  $similarCarItem['api_name'] = $locationCustom['api_name'][0] ? $locationCustom['api_name'][0] : false;
  $similarCarItem['derivative'] = $custom['derivative'][0] ?? '&nbsp;';
  $similarCarItem['featured'] = $custom['featured'][0] ?? 0;
  $similarCarItem['transmission'] = $custom['transmission'][0] ? $custom['transmission'][0] : false;
  $similarCarItem['fueltype'] = $custom['fueltype'][0] ? $custom['fueltype'][0] : false;
  $similarCarItem['mileage'] = $custom['mileage'][0] ? $custom['mileage'][0] : false;
  $similarCarItem['stock_number'] = $custom['stock_number'][0] ? $custom['stock_number'][0] : false;
  $similarCarItem['image'] = get_the_post_thumbnail_url($model->ID);
  $similarCarItem['total_make_in_stock'] = $custom['total_make_in_stock'][0] ? $custom['total_make_in_stock'][0] : false;
  $similarCarItem['size'] = $custom['size'][0] ? $custom['size'][0] : false;
  $similarCarItem['suv'] = $custom['suv'][0] ? $custom['suv'][0] : false;
  $similarCarItem['premium'] = $custom['premium'][0] ? $custom['premium'][0] : false;
  $similarCarItem['cap_price'] = $custom['cap_price'][0] ? $custom['cap_price'][0] : false;
  /*$similarCarItem['image'] = $custom['image_url'][0];*/
  /*
  if($similarCarItem['featured']==1) {
      $carsArrayFeat[] = $similarCarItem; 
  }
  else $carsArrayNorm[] = $similarCarItem;
  */
  $similarCarItem['reg_year'] = $regYear;
  $similarCarsArray[] = $similarCarItem;
}


$similarUniqueCarsArray = array();
foreach ($similarCarsArray as $similarCarItem) {
  if ($similarCarItem['reg_year'] === $carItem['reg_year']) {
    $similarUniqueCarsArray[] = $similarCarItem;
  }
}

?>

<?php if (count($similarUniqueCarsArray) > 0) : ?>
<section class="fdry-single-car-similar">
  <div class="content-block">
    <h3>Similar Vehicle(s)</h3>
    <div class="fdry-carlistrow">
      <div class="fdry-carrow__grid">
        <div class="car-3-grid-row">

          <?php get_template_part('components/pages/single-car-card-dark'); ?>

        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>