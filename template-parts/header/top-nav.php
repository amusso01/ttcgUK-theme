<header class="sticky-top tcheader">
    <?php
    global $branchCustom, $mobile_ribbon_text;
    if (isset($branchCustom)) : ?>
        <section class="d-none d-md-block | branches">
            <div class="d-flex justify-content-end | branches-block">
                <span class="branches__place"><?php
                    echo $branchCustom['address_line_1'][0] . ', ' . $branchCustom['address_line_2'][0] . ', ' .
                        $branchCustom['town_city'][0] . ', ' . $branchCustom['postcode'][0]; ?></span>
                <span class="branches__address"><a
                            class="button-red opening-times">Opening Times and Directions</a></span>
            </div>
        </section>
    <?php
    else : ?>
        <section class="d-none d-md-block | locations mr-5 pr-5">
            <div class="d-flex justify-content-end | locations-block pr-3">
                <span class="trustpilot-location-fdry" 
                style="
                width: 81px;
                margin-right: auto;
                margin-left: 156px;
                "
                >
                <img class="trustpilot " src="https://www.thetradecentrewales.co.uk/wp-content/uploads/2023/04/Truspilot-4-Star.svg"
                                 alt="Trustpilot Score">
                </span>
                <span class="locations__intro">Our Car Supermarkets:</span>
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
                    ?>
                    <span class="locations__place icon"><a href="/branches/<?php
                        echo $item->post_name; ?>"><?php
                            echo $item->post_title; ?></a></span>
                <?php
                endwhile; ?>
            </div>
        </section>
    <?php
    endif; ?>
    <section class="d-flex | navigation">
        <div class="container-fluid">
            <div class="row | navigation__wrapper">
                <div class="col col-12 navigation__container">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="col col-2 col-md-1">
                            <a class="navbar-brand | site-logo" href="<?php
                            area_link('/'); ?>">
                                <div class="img logo logo-wales" style="background-image: url(/images/tcw-logo.svg?09e287fb86c606917c1e32eac94a500c)"></div>
                            </a>
                        </div>
                        <div class="col col-4 col-md-4 col-lg-2 order-lg-1 mr-xl-5 fdry-trustpilot-top-nav" style="text-align:center;">
                            <img class="trustpilot d-lg-none d-xl-block" src="https://www.thetradecentrewales.co.uk/wp-content/uploads/2023/04/Truspilot-4-Star.svg"
                                 alt="Trustpilot Score">
                        </div>

                        <div class="col pl-0 d-md-none text-right">
                            <a class="fdry-find-us" style="color:white; font-size:12px;line-height: 12px;display: flex; text-align: left; align-items: center;
                                border-radius: 3px;
                                border:1px solid white;
                                border-color: rgba(255,255,255,.1);
                                padding: 0.4rem 0.75rem;
                            ">
                                <span class="locations__place icon" style="color:white"></span>
                                FIND US
                                <!-- <i class="far fa-map-marker fa-2 navbar-phone"></i> -->
                            </a>
                        </div>
                        <button class="order-lg-1 navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="col offset-md-1 offset-xl-0 collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto | ">
                                <?php
                                $linkArray = [
                                    [area_link('/', true), 'Home'],
                                   // ['/social-distancing', 'Safety'],
                                    ['/finance', 'Finance'],
                                    // ['/part-exchange', 'Value My Part-Ex'],
                                    ['/lifetime-warranty', 'Lifetime Warranty'],
                                    ['/price-promise', 'Price Promise'],
                                    ['/kit-klub', 'Kit Klub'],
                                    ['/news', 'News'],
                                    ['/careers', 'Careers'],
                                    ['/locations-landing', 'Locations', '', ''],
                                    ['/contact', 'Contact'],
                                ];
                                //var_dump($linkArray);die;
                                foreach ($linkArray as $linkItem) :
                                    $active = '';
                                    if ('/' . $wp->request == $linkItem[0]) {
                                        $active = 'active ';
                                    }
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo $active; ?>" href="<?php echo $linkItem[0]; ?>"><?php echo $linkItem[1]; ?></a>
                                    </li>

                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 ribbon-container">
                    <div class="hidden-print mobile-ribbon d-md-none animated slideInDown"><?php
                        echo $mobile_ribbon_text; ?></div>
                </div>
            </div>
        </div>
    </section>
</header>