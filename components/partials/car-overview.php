<?php

global $car, $carsArray, $carItem, $carId;

// ARRAY HOLDING CAR INFO
$carItem = $carsArray[0];


$carSpecs = array();
$engineCapacity = cns_format_engine_capacity(get_field('enginecapacity', $carId));
$carSpecs["trasmission"] = $carItem["transmission"];
$carSpecs["mileage"] = $carItem["mileage"];
$carSpecs["fueltype"] = $carItem["fueltype"];
$carSpecs["reg_number"] = $carItem["reg_number"];
$carSpecs["engine"] = ($engineCapacity > 0) ? $engineCapacity : "TBC";
$carSpecs["doors"] = get_field('doors', $carId) != '' ? get_field('doors', $carId) : "TBC";
$carSpecs["seats"] = get_field('seats', $carId) != '' ? get_field('seats', $carId) : "TBC";
$carSpecs["body"] = get_field('bodytype', $carId) != '' ? get_field('bodytype', $carId) : "TBC";

?>


<section class="fdry-single-car__overview content-block">
    <div class="overview-grid">
        <div class="overview-single-spec">
            <i>
                <?php get_template_part('svg-template/svg', 'trasmission') ?>
            </i>
            <div class="info">
                <p class="grey">Trasmission</p>
                <p class="black"><?= $carSpecs['trasmission'] ?></p>
            </div>
        </div>
        <div class="overview-single-spec">
            <i>
                <?php get_template_part('svg-template/svg', 'mileage') ?>
            </i>
            <div class="info">
                <p class="grey">Mileage</p>
                <p class="black"><?= $carSpecs['mileage'] ?></p>
            </div>
        </div>
        <div class="overview-single-spec">
            <i>
                <?php get_template_part('svg-template/svg', 'fuel') ?>
            </i>
            <div class="info">
                <p class="grey">Fuel</p>
                <p class="black"><?= $carSpecs['fueltype'] ?></p>
            </div>
        </div>
        <div class="overview-single-spec">
            <i>
                <?php get_template_part('svg-template/svg-body', 'body') ?>
            </i>
            <div class="info">
                <p class="grey">Body</p>
                <p class="black"><?= $carSpecs['body'] ?></p>
            </div>
        </div>
        <div class="overview-single-spec">
            <i>
                <?php get_template_part('svg-template/svg', 'engine') ?>
            </i>
            <div class="info">
                <p class="grey">Engine</p>
                <p class="black"><?= $carSpecs['engine'] ?></p>
            </div>
        </div>
        <div class="overview-single-spec">
            <i>
                <?php get_template_part('svg-template/svg', 'doors') ?>
            </i>
            <div class="info">
                <p class="grey">Doors</p>
                <p class="black"><?= $carSpecs['doors'] ?></p>
            </div>
        </div>
        <div class="overview-single-spec">
            <i>
                <?php get_template_part('svg-template/svg', 'pound') ?>
            </i>
            <div class="info">
                <p class="grey">Price includes <br> £299 admin fee</p>
                <!-- <p class="grey">Seats</p>
                <p class="black"><?= $carSpecs['seats'] ?></p> -->
            </div>
        </div>
        <div class="overview-single-spec">
            <i>
                <?php get_template_part('svg-template/svg', 'plate') ?>
            </i>
            <div class="info">
                <p class="grey">Registration</p>
                <p class="black"><?= $carSpecs['reg_number'] ?></p>
            </div>
        </div>
    </div>

    <!-- <div class="fdry-modal-group__button">
        <a href="#" data-hystmodal="#modalFeatures" class="fdry-btn fdry-btn__features">
            <i><?php get_template_part('svg-template/svg-car-fet') ?></i> CAR SPECS
        </a>
        <a href="#" data-hystmodal="#modalSpec" class="fdry-btn fdry-btn__specs">
            <i><?php get_template_part('svg-template/svg-car-spec') ?></i> CAR FEATURES
        </a>
    </div> -->
</section>