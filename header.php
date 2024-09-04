<?php

/**
 * The header template file
 *
 * @package CNS
 * @subpackage TradeCentreUK
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
        $metaDescription = "Our " . $_SESSION['areaBranch'] . " showroom near " . $_SESSION['area'] . " is one of the " .
            "Largest Used Car Supermarkets in the UK. Our showrooms and floodlit forecourts are brimming with thousands " .
            "of cars, from superminis to SUV's or sporty convertibles and are open until 9pm weekdays and 6pm at weekends.";
    } else {
        $metaDescription = "The Trade Centre UK, Home of Probably the UK's Cheapest Cars. The Regions Largest Used Car " .
            "Supermarket with sites in Coventry, Rochdale, Rotherham, Birmingham South and Wednesbury. Our showrooms and floodlit forecourts are " .
            "brimming with thousands of cars, from superminis to SUV's or sporty convertibles and are open until " .
            "9pm weekdays and 6pm at weekends.";
    }
}

$metaDescription = wp_strip_all_tags($metaDescription);

// $genTitle = wp_strip_all_tags($title ? $title : '');
// if (!str_contains($title, get_bloginfo('name'))) {
//     $genTitle .= ' | ' . get_bloginfo('name');
// }
$genTitle = get_bloginfo('name') . ' | ' . get_the_title();
if (is_front_page()) {
    $genTitle = get_bloginfo('name');
}


$today = date('l');
$closing_time_sat = get_option('cns_closing_hour_sat');
$closing_time_sun = get_option('cns_closing_hour_sun');
$closing_time_weekdays = get_option('cns_closing_hour_weekdays');
if ($today == 'Saturday') {
    $closing_time = $closing_time_sat;
} elseif ($today == 'Sunday') {
    $closing_time = $closing_time_sun;
} else {
    $closing_time = $closing_time_weekdays;
}

$opening_time_sat = get_option('cns_opening_hour_sat');
$opening_time_sun = get_option('cns_opening_hour_sun');
$opening_time_weekdays = get_option('cns_opening_hour_weekdays');
if ($today == 'Saturday') {
    $opening_time = $opening_time_sun;
} elseif ($today == 'Sunday') {
    $opening_time = $opening_time_weekdays;
} else {
    $opening_time = $opening_time_weekdays;
}

$currentdate = new DateTime("now", new DateTimeZone('Europe/London'));
$current_hour = $currentdate->format('H');

if ($current_hour >= $closing_time || $current_hour < $opening_time) {
    $ribbon_text = 'OPEN AGAIN AT ' . $opening_time . 'AM';
} else {
    if ($closing_time > 12) {
        $closing_time -= 12;
    }
    $ribbon_text = 'OPEN  UNTIL ' . $closing_time . 'PM   TONIGHT';
}

$ribbon_text_override = get_option('cns_banner_text');

if ($ribbon_text_override) {
    $ribbon_text = $ribbon_text_override;
}


?>
<!doctype html>
<html lang="en">

<head>

    <title><?php echo $genTitle; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">



    <?php
    wp_head(); ?>
    <link rel="apple-touch-icon" href="icon.png">
    <meta property="og:title" content="<?php echo $genTitle; ?>" />
    <meta name="twitter:title" content="<?php echo $genTitle; ?>" />
    <meta name="twitter:card" content="summary_large_image" />

    <?php if (!empty($metaDescription)) : ?>
        <meta name="description"
            content="<?php
                        echo $metaDescription; ?>" />
    <?php endif; ?>
    <meta property="og:description"
        content="<?php
                    echo $metaDescription; ?>" />
    <meta name="twitter:description"
        content="<?php
                    echo $metaDescription; ?>" />
    <?php
    if ($metaImage) :
    ?>
        <meta property="og:image" content="<?php
                                            echo $metaImage; ?>" />
        <meta property="twitter:image" content="<?php
                                                echo $metaImage; ?>" />
    <?php
    else : ?>
        <meta property="og:image" content="/images/standard-sharing-image-tcuk.jpg" />
        <meta property="twitter:image" content="/images/standard-sharing-image-tcuk.jpg" />
    <?php
    endif;
    ?>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script type="text/javascript">
        <?php echo getJsFinanceExamples(); ?>
    </script>

    <meta name="facebook-domain-verification" content="eqzaudvw68jxsa95gen5n9l8bcbfmt" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90660030-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-90660030-1');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W5MGKV3');
    </script>
    <!-- End Google Tag Manager -->


    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->

    <!-- CustomerLabs Tag -->
    <script>
        ! function(t, e, r, c, a, n, s) {
            t.ClAnalyticsObject = a, t[a] = t[a] || [], t[a].methods = ["trackSubmit", "trackClick", "pageview", "identify", "track", "trackConsent"], t[a].factory = function(e) {
                return function() {
                    var r = Array.prototype.slice.call(arguments);
                    return r.unshift(e), t[a].push(r), t[a]
                }
            };
            for (var i = 0; i < t[a].methods.length; i++) {
                var o = t[a].methods[i];
                t[a][o] = t[a].factory(o)
            };
            n = e.createElement(r), s = e.getElementsByTagName(r)[0], n.async = 1, n.crossOrigin = "anonymous", n.src = c, s.parentNode.insertBefore(n, s)
        }(window, document, "script", "https://cdn.js.customerlabs.co/cl6129jjnuk5po.js", "_cl");
        _cl.SNIPPET_VERSION = "2.0.0"
    </script>
    <!-- End of CustomerLabs Tag -->


</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5MGKV3"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="fdry-top-hour-banner fdry-sticky-top">
        <div class="content-block">
            <?php echo html_entity_decode($ribbon_text); ?>
        </div>
    </div>
    <?php

    get_template_part('components/header/top-nav', 'header'); ?>