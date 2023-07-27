<?php

/**
 * The header template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

// THIS REDIRECT WARANTIES TO LIFETIME WARANTIES
// if( get_the_ID() == 46){
// 	wp_redirect( get_the_permalink(3974) );
// 	exit;
// }
// if( get_the_ID() == 3974){
// 	$title = get_the_title();
// }

global $wp, $title, $metaDescription, $metaImage, $mobile_ribbon_text;

if (empty($title)) {
    if (isset($_SESSION['area'])) {
        $title = sprintf(
            'Cheap Used Cars near %s',
            str_replace(
                '-',
                ' ',
                $_SESSION['area']
            )
        );
    } else {
        $title = sprintf(
            'The UKs Cheapest Cars'
        );
    }
}



if (empty($metaDescription) && ($wp->request == '' || substr($wp->request, 0, 3) === 'in/')) {
    if (isset($_SESSION['area'])) {
        $metaDescription = "Our " . $_SESSION['areaBranch'] . " showroom near " . $_SESSION['area'] . " is one of Wales' " .
            "Largest Used Car Supermarkets. Our showrooms and floodlit forecourts are brimming with thousands of cars" .
            ", from superminis to SUV's or sporty convertibles and are open until 9pm weekdays and 6pm at weekends.";
    } else {
        $metaDescription = "Wales' Largest Used Car Supermarket with sites in Abercynon & Neath. Our " .
            "showrooms and floodlit forecourts are brimming with thousands of cars, from superminis to SUV's or " .
            "sporty convertibles and are open until 9pm weekdays and 6pm at weekends.";
    }
}

$metaDescription = wp_strip_all_tags($metaDescription);

$genTitle = wp_strip_all_tags($title ? $title : '');
if (!str_contains($title, get_bloginfo('name'))) {
    $genTitle .= ' | ' . get_bloginfo('name');
}

$today = date('l');
$closing_time_weekends = get_option('cns_closing_hour_weekends') ? get_option('cns_closing_hour_weekends') : '18';
$closing_time_weekdays = get_option('cns_closing_hour_weekdays') ? get_option('cns_closing_hour_weekdays') : '21';
$closing_time = ($today == 'Saturday' || $today == 'Sunday') ? $closing_time_weekends : $closing_time_weekdays;

$currentdate = new DateTime("now", new DateTimeZone('Europe/London'));
$current_hour = $currentdate->format('H');
//echo $current_hour;
//$current_hour = date('H');

if($current_hour >= $closing_time || $current_hour < 6) {
    $ribbon_text = 'OPEN AGAIN AT 9AM';
    $mobile_ribbon_text = 'OPEN AGAIN AT <strong>9AM</strong>';
}
else {
    if ($closing_time > 12) {
        $closing_time -=12;
    }
    $ribbon_text = 'OPEN  UNTIL '.$closing_time.'PM   TONIGHT';
    $mobile_ribbon_text = 'OPEN UNTIL <strong>'.$closing_time.'PM </strong> TONIGHT';
}
if (get_option('cns_opening_desktop_override')) {
    $ribbon_text = html_entity_decode(get_option('cns_opening_desktop_override'));
}
if (get_option('cns_opening_mobile_override')) {
    $mobile_ribbon_text = html_entity_decode(get_option('cns_opening_mobile_override'));
}

?><!doctype html>
<html lang="en">
<head>
	
    <title><?php echo $genTitle; ?></title>
	<meta name="facebook-domain-verification" content="eftbl5amvdioil49ycov4jqiunva1t" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


	
    <?php 
    wp_head(); ?>
    <link rel="apple-touch-icon" href="icon.png">
    <meta property="og:title" content="<?php echo $genTitle; ?>"/>
    <meta name="twitter:title" content="<?php echo $genTitle; ?>"/>
    <meta name="twitter:card" content="summary_large_image"/>

    <?php if (!empty($metaDescription)) : ?>
    <meta name="description"
          content="<?php
          echo $metaDescription; ?>"/>
    <?php endif; ?>
    <meta property="og:description"
          content="<?php
          echo $metaDescription; ?>"/>
    <meta name="twitter:description"
          content="<?php
          echo $metaDescription; ?>"/>
    <?php
    if ($metaImage) :
        ?>
        <meta property="og:image" content="<?php
        echo $metaImage; ?>"/>
        <meta property="twitter:image" content="<?php
        echo $metaImage; ?>"/>
    <?php
    else : ?>
        <meta property="og:image" content="/images/standard-sharing-image-tcw.jpg"/>
        <meta property="twitter:image" content="/images/standard-sharing-image-tcw.jpg"/>
    <?php
    endif;
    ?>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script type="text/javascript">
    <?php echo getJsFinanceExamples(); ?>
    </script>

    <meta name="facebook-domain-verification" content="tcol8jwubyqbc78czzbkyhzr3ymnar" />

    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-21171026-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-21171026-1'); 
    </script>
    <!-- Google Tag Manager -->


    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->

</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P46QVGQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="fdry-top-hour-banner fdry-sticky-top">
    <div class="content-block">
        <?php echo $ribbon_text; ?>
    </div>
</div>
<?php

get_template_part('components/header/top-nav', 'header'); ?>

