<?php

global $car, $carsArray, $carItem, $carId;

// ARRAY HOLDING CAR INFO
$carItem = $carsArray[0];


$carSpecs = array();
// $engineCapacity = cns_format_engine_capacity(get_field('enginecapacity', $carId));
// $carSpecs["trasmission"] = $carItem["transmission"];
// $carSpecs["fueltype"] = $carItem["fueltype"];
// $carSpecs["reg_number"] = $carItem["reg_number"];
// $carSpecs["engine"] = ($engineCapacity > 0) ? $engineCapacity : "TBC";
// $carSpecs["seats"] = get_field('seats', $carId) != '' ? get_field('seats', $carId) : "TBC";
// $carSpecs["body"] = get_field('bodytype', $carId) != '' ? get_field('bodytype', $carId) : "TBC";


$carSpecs["doors"] = get_field('doors', $carId) != '' ? get_field('doors', $carId) : "TBC";
$carDate = get_field('reg_date', $carId) != '' ? get_field('reg_date', $carId) : "TBC";
$carDate = explode('/', $carDate);
$carSpecs['date'] = $carDate[2];
$carSpecs["mileage"] = $carItem["mileage"];
$carSpecs['make-model'] = $carItem["make_title"] . ', ' . $carItem['model_title'];
$carSpecs['fuel-door'] = $carItem["fueltype"] . ', ' . $carSpecs["doors"] . ' doors';
$carSpecs['specs'] = $carItem["derivative"];

$altSpecs = array();
$altSpecs['fuel'] = get_field('alt_car_fuel_type', $carId) != '' ? get_field('alt_car_fuel_type', $carId) : "TBC";
$altSpecs['door'] = get_field('alt_car_doors', $carId) != '' ? get_field('alt_car_doors', $carId) . ' doors' : "TBC";
$altSpecs['date'] = get_field('alt_car_year', $carId) != '' ? get_field('alt_car_year', $carId) : "TBC";
$altSpecs['milage'] = get_field('alt_car_miles', $carId) != '' ? get_field('alt_car_miles', $carId) . ' miles' : "TBC";
$altSpecs['make-model'] = get_field('alt_car_model', $carId) != '' ? get_field('alt_car_model', $carId) : "TBC";
$altSpecs['fuel-door'] = $altSpecs['fuel'] . ', ' . $altSpecs['door'];
$altSpecs['specs'] = get_field('alt_car_spec', $carId) != '' ? get_field('alt_car_spec', $carId) : "TBC";

?>


<!-- ALT TABLE AUTOTRADER -->
<section class="fdry-single-car-altAutotrader">
  <div class="content-block">
    <div class="table-responsive">

      <table class="table table-bordered table-sm table-hover">
        <thead>
          <tr>
            <th><span class="red">Auto</span>Trader Comparison <span class="red">Fact</span>-Checker</th>
            <th></th>
            <th>Our car</th>
            <th>Autotrader</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Autotrader car is registered in the same year as our car</td>
            <td><?php get_template_part('svg-template/svg', 'check-table') ?></td>
            <td><?= $carSpecs['date'] ?></td>
            <td><?= $altSpecs['date']  ?></td>

          </tr>
          <tr>
            <td>Autotrader car is for sale from a car dealer</td>
            <td><?php get_template_part('svg-template/svg', 'check-table') ?></td>
            <td colspan=2 class="span">Both dealer cars</td>


          </tr>
          <tr>
            <td>Autotrader car is not accident repaired Cat S/C/D/N</td>
            <td><?php get_template_part('svg-template/svg', 'check-table') ?></td>
            <td colspan=2 class="span">Neither car recorded CAT S/C/D/N</td>

          </tr>
          <tr>
            <td>Autotrader car has mileage within 5000 miles of our car (either way)</td>
            <td><?php get_template_part('svg-template/svg', 'check-table') ?></td>
            <td><?= $carSpecs["mileage"] ?> miles</td>
            <td><?= $altSpecs['milage']  ?></td>

          </tr>
          <tr>
            <td>Autotrader car is same make & model as our car</td>
            <td><?php get_template_part('svg-template/svg', 'check-table') ?></td>
            <td><?= $carSpecs['make-model']  ?></td>
            <td><?= $altSpecs['make-model'] ?></td>

          </tr>
          <tr>
            <td>Autotrader car is same fuel type and number of doors</td>
            <td><?php get_template_part('svg-template/svg', 'check-table') ?></td>
            <td><?= $carSpecs['fuel-door'] ?></td>
            <td><?= $altSpecs['fuel-door'] ?></td>

          </tr>
          <tr>
            <td>Autotrader car is not higher specification variant</td>
            <td><?php get_template_part('svg-template/svg', 'check-table') ?></td>
            <td><?= $carSpecs['specs'] ?></td>
            <td><?= $altSpecs['specs'] ?></td>

          </tr>
        </tbody>
      </table>

    </div>
  </div>
</section>