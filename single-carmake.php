<?php

/**
 * The carmake post single template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

global $carmake, $carmodel, $title, $similarCarTitle, $metaDescription, $customerPhotos;

$customerPhotos = [];
$args = [
    'fields' => 'ids',
    'post_parent' => $carmake->ID,
    'post_type' => ['carmodel'],
    'posts_per_page' => '-1',
];
$carmakename = str_replace('-', ' ', strtoupper($carmake->post_title));
$carmodels = new WP_Query($args);
if ($carmodels->have_posts()) {
    while ($carmodels->have_posts()) {
        $carmodelId = $carmodels->next_post();
        $carmodelCustom = get_post_custom($carmodelId);
        if ($carmodelCustom['customer_photos'][0]) {
            $photos = unserialize($carmodelCustom['customer_photos'][0]);
            $customerPhotos = array_merge($customerPhotos, $photos);
        }
    }
} else {
    include '404.php';
    return;
}

if (isset($_SESSION['area'])) {
    // showCarMakeWithArea

    $title = sprintf(
        'Cheap Used <span>%s</span> near %s',
        strtoupper($carmake->post_title),
        $_SESSION['area']
    );

    $metaDescription = "Our " . $_SESSION['areaBranch'] . " showroom near " . $_SESSION['area'] . " is one of Wales' " .
        "Largest Used Car Supermarkets. Our showroom and floodlit forecourt is brimming with cars, including " .
        $carmake->post_title . " and is open until 9pm weekdays and 6pm at weekends.";
} else {
    // showCarMakeWithoutArea

    $title = sprintf(
        'Used <span>%s</span>',
        strtoupper($carmake->post_title)
        );

    $metaDescription = "Wales' Largest Used Car Supermarket with sites in Abercynon & Neath. Our " .
        "showrooms and floodlit forecourts are brimming with thousands of cars, including " . $carmake->post_title .
        " and are open until 9pm weekdays and 6pm at weekends.";
}

include 'front-page.php';