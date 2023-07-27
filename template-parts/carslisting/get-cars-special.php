<?php

global $branch, $carsArray;

$args = [
    'fields' => 'ids',
    'post_type' => ['specials'],
    'posts_per_page' => '-1',
];
$meta_query = [];

if ($branch) {
    $meta_query[] = [
        'relation' => 'AND',
        [
            'key' => 'branch',
            'value' => $branch->ID,
            'compare' => '=',
        ]
    ];
}
if (!empty($meta_query)) {
    $args['meta_query'] = $meta_query;
}

$query = new WP_Query($args);
if ($query->have_posts()) :
    while ($query->have_posts()) {
        $amount = $query->post_count;
        $itemId = $query->next_post();
        $item = get_post($itemId);
        $custom = get_post_custom($itemId);
        $model = get_post($custom['model'][0]);
        $modelCustom = get_post_custom($custom['model'][0]);
        $make = get_post($model->post_parent);
        $branchPost = get_post($custom['branch'][0]);
        $branchCustom = get_post_custom($custom['branch'][0]);
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
        $carItem = [];
        $carItem['type'] = LISTING_SPECIALS;
        $carItem['make_title'] = $make->post_title;
        $carItem['make_name'] = $make->post_name;
        $carItem['model_title'] = $model->post_title;
        $carItem['model_name'] = $model->post_name;
        $carItem['model_range'] = $modelRange;
        $carItem['model_variant'] = $modelVariant;
        $carItem['power_train'] = $powerTrain;
        $carItem['body_size'] = $bodySize;
        $carItem['trim'] = $trim;
        $carItem['paint_id'] = $paintId;
        $carItem['paint_description'] = $paintDescription;
        $carItem['rim_id'] = $rimId;
        $carItem['rim_description'] = $rimDescription;
        $carItem['interior_id'] = $interiorId;
        $carItem['interior_description'] = $interiorDescription;
        $carItem['model_year'] = $model->year;
        $carItem['title'] = $item->post_title;
        $carItem['from_price'] = $custom['from_price'][0] ? $custom['from_price'][0] : '';
        $carItem['sale_mode_override'] = $custom['sale_mode_override'][0] ? $custom['sale_mode_override'][0] : false;
        $carItem['image'] = $modelCustom['image_url'][0] ? $modelCustom['image_url'][0] : get_the_post_thumbnail_url($model->ID);
        $carItem['branch_id'] = $custom['branch'][0] ? $custom['branch'][0] : '';
        $carItem['branch_title'] = $branchPost->post_title;
        $carItem['branch_name'] = $branchPost->post_name;
        $carItem['api_name'] = $branchCustom['api_name'][0] ? $branchCustom['api_name'][0] : '';

        $carsArray[] = $carItem;
    }
endif;