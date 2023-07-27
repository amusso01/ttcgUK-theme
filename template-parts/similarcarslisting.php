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
        'tax_query' => [
            [
                'taxonomy' => 'cartype',
                'field' => 'slug',
                'terms' => $termsArray,
                'operator' => 'IN',
            ],
        ]
    ];

    $models = [];
    $carModels = new WP_Query($args);

    if ($carModels->have_posts()) {
        while ($carModels->have_posts()) {
            $models[] = $carModels->next_post();
        }

        $args = [
            'fields' => 'ids',
            'post_type' => ['car'],
            'posts_per_page' => '-1',
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'model',
                    'value' => $models,
                    'compare' => 'IN',
                ]
            ]
        ];

        $similarCars = new WP_Query($args);
        if ($similarCars->have_posts()) {
            $listingType = 'similarcarlisting';
            $title = $similarCarTitle;
            get_template_part('template-parts/carslisting', 'front-page');
        }
    }
}
