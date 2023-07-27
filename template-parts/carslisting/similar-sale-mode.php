<?php

global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
       $metaDescription, $carsArray;

$carsArray = [];
get_template_part('template-parts/carslisting/get-cars-similar-sale-mode', 'front-page');

if (count($carsArray)) {
    $listingType = 'similarcarlisting';
    $title = $similarCarTitle;
    get_template_part('template-parts/carslisting/carslisting', 'front-page');
}


global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle, $metaDescription;

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
        'posts_per_page' => '-1',,
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

    $similarCars = new WP_Query($args);


    if ($similarCars->have_posts()) {
        $listingType = 'similarcarlisting';
        $title = $similarCarTitle;
        get_template_part('template-parts/carslisting/sale-mode', 'front-page');
    }
}
