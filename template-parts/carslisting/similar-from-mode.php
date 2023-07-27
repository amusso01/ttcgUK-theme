<?php

global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
       $metaDescription, $carsArray;

$carsArray = [];
get_template_part('template-parts/carslisting/get-cars-similar-from-mode', 'front-page');

if (count($carsArray)) {
    $listingType = 'similarcarlisting';
    $title = $similarCarTitle;
    get_template_part('template-parts/carslisting/carslisting', 'front-page');
}
