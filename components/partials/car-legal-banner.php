<?php

global $car, $carsArray, $carItem, $carId;

if ($carItem['discounted_price'] !== $carItem['rrp']) {
  $globalPrice = $carItem['discounted_price'];
} else {
  $globalPrice = $carItem['rrp'];
}

// args
$args = array(
  'posts_per_page'   => 1,
  'post_type'     => 'financeexample',
  'meta_key'      => 'cash_price',
  'meta_value'    => $globalPrice
);


$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
  while ($the_query->have_posts()) : $the_query->the_post();
    $cashPrice = get_field('cash_price');
    $deposit = get_field('deposit');
    $credit = get_field('credit_amount');
    $monthlyAmount = get_field('monthly_amount');
    $finalAmount = get_field('final_payment');
    $duration = get_field('term');
    $interest = get_field('interest_charged');
    $totalAmount = get_field('total_amount');
    $dealApr = get_field('apr');

    $re = get_field('representative_example');
  endwhile;
endif;
wp_reset_query();
$globalApr = get_option('cns_representative_apr');

$rpe = '<strong>Representative Example</strong> (Hire Purchase): Cash price £' . $cashPrice . ' (incl. Admin Fee £349).
Total Deposit £' . $deposit . '. Total Amount of Credit £' . $credit . '. Agreement Duration ' . $duration . ' Months. 83 payments of £' . $monthlyAmount . ' and 1 final payment of £' . $finalAmount . '.  Option to Purchase Fee £1. Interest Charged £' . $interest . '. Total Amount Payable £' . $totalAmount . '. Annual Rate of Interest 16.9% (fixed), <strong>Representative APR ' . $globalApr . '.%</strong>';

// $rpe = $re;

$legal = get_field('legal_banner', 'option');
$rpeTitle = $carItem['reg_year'] . ' ' . $carItem['model_title'] . ' ' . $carItem["derivative"];
?>

<!-- LEGAL -->
<!-- <section class="fdry-single-car-legal-banner">
  <div class="content-block">
    <div class="legal-banner__wrapper fdry-shadow-card">
      <?= $legal ?>
    </div>
  </div>
</section> -->

<!-- RPE -->
<section class="fdry-single-car-rpe-banner">
  <div class="content-block">
    <div class="rpe__wrapper fdry-shadow-card">
      <!-- <h2><?= $rpeTitle ?></h2> -->
      <p class="rpe-subtitle">Illustrative Example (Hire Purchase):</p>
      <div class="rpe-info">
        <p>
          <?= $rpe ?>
        </p>
      </div>
      <p class="rpe-ps">
        Please Note: The above is an ‘illustrative example’ with limited availability – subject to status.
        <span class="bold">The Trade Centre Group PLC is a Credit Broker not a Lender</span>
      </p>
    </div>
  </div>
</section>