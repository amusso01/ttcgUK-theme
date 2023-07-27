<?php

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
        'posts_per_page' => '-1',
        'orderby' => 'rand',
        'tax_query' => [
            [
                'taxonomy' => 'cartype',
                'field' => 'slug',
                'terms' => $termsArray,
                'operator' => 'IN',
            ],
        ],
        'meta_query' => [       
            'relation' => 'AND',                 
            [
                'key' => 'core_range',                  
                'value' => 1,                                  
                'compare' => '='                   
            ],
            [
                'key' => 'from_price',
                'value' => 0,
                'compare' => '>'
            ]
        ]
    ];

    $similarCars = new WP_Query($args);

    if ($similarCars->have_posts()) {
        $listingType = 'similarcarlisting';
        $title = $similarCarTitle;
        get_template_part('template-parts/frommodecarslisting', 'front-page');
    }
}
