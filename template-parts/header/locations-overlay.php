<?php

global $branch, $branchCustom;

?>
<div id="locations-overlay" class="d-none d-lg-none">
    <div class="locations__close-button"><a href="#" id="locations__close--link">Close <i
                    class="fas fa-times-circle"></i></a></div>
    <?php
    if (isset($branch)) {
        include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/tradecentrewales/template-parts/branch-info.php';
    }
    ?>
    <section class="overlay__footer-button--blue" id="mobile-locations">
        <div class="container">
            <h2 class="text-left locations__title d-md-block"><?php
                if (isset($branch)) : ?>
                    Our other Car Supermarkets
                <?php
                else : ?>
                    Visit one of our Car Supermarkets today
                <?php
                endif; ?></h2>
            <div class="row">
                <?php
                $args = [
                    'posts_per_page' => -1,
                    'post_type' => 'branch',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ];

                $myProducts = new WP_Query($args);
                while ($myProducts->have_posts()) :
                    $item = $myProducts->next_post();
                    if ($item->post_title === $branch->post_title) {
                        continue;
                    }
                    $branchLogoConstant = 'SITE_LOGO_' . strtoupper($item->post_name);
                    if (defined($branchLogoConstant)) {
                        $logo = constant($branchLogoConstant);
                    } else {
                        $logo = SITE_LOGO;
                    }
                    $custom = get_post_custom($item->ID);
                    ?>
                    <div class="col col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 order-1 text-left | branch-locations__place">
                        <div class="row">
                            <div class="col col-6 col-sm-6 col-md-12 col-lg-12 pr-2 pr-md-3">
                                <img class="branch-locations__image" src="<?php
                                echo get_the_post_thumbnail_url($item->ID); ?>"
                                     alt="<?php
                                     echo $item->post_title; ?> Trade Centre">
                                <img class="logo-img" src="<?php echo $logo; ?>" alt="<?php echo $item->post_title; ?>"/>
                            </div>
                            <div class="col pl-1 pl-md-3">
                                <h2 class="d-none"><?php
                                    echo $item->post_title; ?></h2>
                                <address><?php
                                    echo $custom['address_line_1'][0]; ?><br/>
                                    <?php
                                    echo $custom['address_line_2'][0]; ?><br>
                                    <strong><?php
                                        echo $custom['town_city'][0]; ?></strong><br>
                                    <?php
                                    echo $custom['postcode'][0]; ?><br>
                                </address>
                                <?php
                                if ($item->post_name != 'merthyr-tydfil') :
                                ?>
                                <a class="c-button--blue location__buttons map-button"
                                   href="https://maps.google.com/maps?q=tradecentre%20<?php
                                   echo $custom['api_name'][0]; ?>" target="_blank"
                                   data-gmap="<?php echo $custom['map_link'][0]; ?>"
                                   data-modaltitle="<?php
                                   echo $item->post_title . ' - ' . $custom['postcode'][0] ?>"><img
                                            src="/images/maps-icon.svg"/> Directions</a>
                                <a class="c-button--blue location__buttons" href="/branches/<?php
                                echo $item->post_name; ?>">More Info</a>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile; ?>
            </div>
        </div>
    </section>
</div>