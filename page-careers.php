<?php

/**
 * Template Name: Careers Page
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */


get_header(); ?>

<?php if (!isset($_POST['position'])) { ?>
    <section class="banner-careers">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 col-12 title-banner">
                    <h1>TRADE CENTRE GROUP <span>CAREERS</span></h1>
                    <p>The Trade Centre Group prides itself on providing careers across multiple departments for people from all walks of life.</p>

                    <p>Working within our five values of Service, Teamwork, Passion, Integrity, and Community, the Trade Centre Group gives those who embrace them every chance to have a rewarding career regardless of role.</p>
                    <a href="#jobs" class="read-more">View Jobs</a>
                </div>
                <div class="col-md-5 col-12 image-banner">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/careers/User-assets.png" alt="Users" />
                </div>
            </div>
        </div>
    </section>


    <section id="actively" class="special-section">
        <div class="container">
            <h2>WE ARE ACTIVELY LOOKING FOR</h2>
            <div class="row list-activity">
                <div class="col-md-3 col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Parts-advisor.svg" alt="Parts Advisor" />
                    <p><strong>Parts Advisor</strong></p>
                </div>
                <div class="col-md-3 col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Car-sales-icon.svg" alt="Car Sales" />
                    <p><strong>Car Sales</strong></p>
                </div>
                <div class="col-md-3 col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Car-mechanic-icon.svg" alt="Vehicle Mechanic" />
                    <p><strong>Vehicle Mechanic</strong></p>
                </div>
                <div class="col-md-3 col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/careers/VehicleTechnician-icon.svg" alt="Vehicle Mechanic" />
                    <p><strong>Customer Service Representatives</strong></p>
                </div>
            </div>

            <a href="#jobs" class="read-more-colorfull">FIND OUT MORE</a>
    </section>

    <section id="benefits" class="container">

        <div class="benefits">
            <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Car-image.png" alt="Vehicle Mechanic" />
            <p class="benefit-info">Founded in 1999, with one branch in Neath, South Wales, The Trade Centre Group plc has grown to seven sites, taking its employees on the journey, with plenty of chances for internal progression and growth as well as enjoying the day-to-day working.</p>
            <p class="benefit-info">A family feel that spreads from South Wales to South Yorkshire, the Trade Centre Group’s fast-paced and dynamic approach means no two days are ever the same.</p>
            <div class="principal-box-benefits">
                <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Ellipse-2-icon.svg" class="principal-circle" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Polygon-icon.svg" class="principal-polygon" />

                <div class="principal-benefits">
                    <div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/careers/Employee-benefits-icon.svg" alt="principal-benefits" /></div>
                    <p>Employee Benefits</p>

                </div>
            </div>

            <div class="row  align-items-center list-activity list-benefits">
                <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Dots-icons.svg" class="principal-dots" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Dots-2.svg" class="second-dots" />
                <div class="col-md-4 col-6">
                    <div class="benefits-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Discount-icon.svg" alt="Parts Advisor" />
                        <p>Discounted car buying scheme</p>
                    </div>
                </div>
                <div class="col-md-4 col-6  align-center">
                    <div class="benefits-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Cycle-icon.svg" alt="Car Sales" />
                        <p>Cycle to work scheme</p>
                    </div>
                </div>
                <div class="col-md-4 col-6 align-right">
                    <div class="benefits-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Heart-icon.svg" alt="Vehicle Mechanic" />
                        <p>Financial wellbeing support and resources</p>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="benefits-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Mental-health-icon.svg" alt="Vehicle Mechanic" />
                        <p>Mental health support and resources</p>
                    </div>
                </div>
                <div class="col-md-4 col-6 align-center">
                    <div class="benefits-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/careers/Eye-test-icon.svg" alt="Vehicle Mechanic" />
                        <p>Free eye tests and discounted glasses</p>
                    </div>
                </div>
                <div class="col-md-4 col-6 align-right">
                    <div class="benefits-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/careers/VehicleTechnician-icon.svg" alt="Vehicle Mechanic" />
                        <p>Engagement events</p>
                    </div>
                </div>
                <div class="col-md-6 col-6 align-center svg-2">
                    <div class="benefits-box">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 126.34 118.15" width="75px" height="70px">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: none;
                                        stroke: #fff;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                        stroke-width: .75px;
                                    }

                                    .cls-2 {
                                        fill: url(#linear-gradient);
                                    }

                                    .cls-3,
                                    .cls-4 {
                                        fill: #fff;
                                    }

                                    .cls-5 {
                                        fill: url(#linear-gradient-8);
                                    }

                                    .cls-6 {
                                        fill: url(#linear-gradient-3);
                                    }

                                    .cls-7 {
                                        fill: url(#linear-gradient-4);
                                    }

                                    .cls-8 {
                                        fill: url(#linear-gradient-2);
                                    }

                                    .cls-9 {
                                        fill: url(#linear-gradient-6);
                                    }

                                    .cls-10 {
                                        fill: url(#linear-gradient-7);
                                    }

                                    .cls-11 {
                                        fill: url(#linear-gradient-5);
                                    }

                                    .cls-4 {
                                        fill-rule: evenodd;
                                    }
                                </style>
                                <linearGradient id="linear-gradient" x1="20.87" y1="-18.34" x2="14.93" y2="-39.56" gradientTransform="translate(128.63 56.9) rotate(-159.81)" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#c33764" />
                                    <stop offset="1" stop-color="#1d2671" />
                                </linearGradient>
                                <linearGradient id="linear-gradient-2" x1="49.08" y1="-50.78" x2="43.14" y2="-72" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-3" x1="34.05" y1="17.55" x2="28.11" y2="-3.66" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-4" x1="76.04" y1="24.72" x2="70.1" y2="3.5" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-5" x1="105.2" y1="-8.92" x2="99.26" y2="-30.13" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-6" x1="93.4" y1="-45.01" x2="87.46" y2="-66.23" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-7" x1="74.88" y1="56.89" x2="68.28" y2="33.33" gradientTransform="translate(83.9 132.46) rotate(-135)" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-8" x1="84.63" y1="71.32" x2="45.58" y2="71.32" gradientTransform="matrix(1,0,0,1,0,0)" xlink:href="#linear-gradient" />
                            </defs>
                            <circle class="cls-2" cx="101.8" cy="78.44" r="11.34" />
                            <circle class="cls-8" cx="64.13" cy="99.15" r="11.34" />
                            <circle class="cls-6" cx="101.82" cy="40.21" r="11.34" />
                            <circle class="cls-7" cx="64.88" cy="18.99" r="11.34" />
                            <circle class="cls-11" cx="25.9" cy="40.5" r="11.34" />
                            <circle class="cls-9" cx="24.52" cy="78.44" r="11.34" />
                            <g>
                                <circle class="cls-10" cx="64.88" cy="50.48" r="12.6" />
                                <path class="cls-5" d="m44.02,77.75h40.21c-.38-1.47-1.13-3.58-2.69-5.68-5.16-6.93-14.35-7.13-16.44-7.18-2.09-.05-11.7.01-17.82,7.27-1.72,2.04-2.69,4.09-3.26,5.58Z" />
                            </g>
                            <path class="cls-3" d="m59.12,16.54c0,1.25.94,2.28,2.15,2.44.34,1.53,1.62,2.7,3.2,2.88v1.23h-1.64c-.91,0-1.64.74-1.64,1.64v.41c0,.23.18.41.41.41h6.58c.23,0,.41-.18.41-.41v-.41c0-.91-.74-1.64-1.64-1.64h-1.65v-1.23c1.58-.17,2.86-1.35,3.2-2.88,1.21-.16,2.14-1.19,2.14-2.44v-1.24c0-.68-.55-1.23-1.23-1.23h-.82c0-.91-.74-1.64-1.64-1.64h-4.11c-.91,0-1.64.74-1.64,1.64h-.83c-.68,0-1.23.55-1.23,1.23v1.23Zm1.23-1.64h.83v3.23c-.71-.18-1.24-.83-1.24-1.59v-1.23c0-.23.18-.41.41-.41Zm8.22,0h.82c.23,0,.41.18.41.41v1.24c0,.76-.52,1.41-1.23,1.59v-3.24Zm-.82-.82v4.11c0,1.59-1.29,2.88-2.88,2.88s-2.81-1.22-2.87-2.75v-4.24h0c0-.45.37-.82.82-.82h4.11c.45,0,.82.37.82.82Zm-5.75,10.66c0-.45.37-.82.82-.82h4.11c.45,0,.82.37.82.82h-5.75Z" />
                            <g>
                                <rect class="cls-1" x="96.52" y="37.58" width="10.94" height="2.73" rx=".46" ry=".46" />
                                <path class="cls-1" d="m106.55,40.31v4.1c0,.25-.2.46-.46.46h-8.2c-.25,0-.46-.2-.46-.46v-4.1" />
                                <line class="cls-1" x1="101.99" y1="37.58" x2="101.99" y2="44.87" />
                                <path class="cls-1" d="m104.57,36.94c-.65.64-2.58.64-2.58.64,0,0,0-1.93.64-2.58.53-.53,1.4-.53,1.94,0,.53.53.53,1.4,0,1.94h0Z" />
                                <path class="cls-1" d="m99.41,36.94c.65.64,2.58.64,2.58.64,0,0,0-1.93-.64-2.58-.53-.53-1.4-.53-1.94,0-.53.53-.53,1.4,0,1.94h0Z" />
                            </g>
                            <g>
                                <circle class="cls-1" cx="101.8" cy="76.62" r="4.57" />
                                <circle class="cls-1" cx="101.8" cy="76.62" r="2.74" />
                                <polyline class="cls-1" points="104.54 80.27 104.54 84.84 101.8 83.47 99.06 84.84 99.06 80.27" />
                            </g>
                            <path id="primary" class="cls-3" d="m66.94,103.8h-5.79c.76-1.32,1.06-2.85.86-4.35h2.44c.34,0,.62-.28.62-.62s-.28-.62-.62-.62h-2.74l-.04-.11c-.19-.57-.3-1.16-.33-1.75,0-1.74.75-2.49,2.49-2.49,1.18.05,2.2.87,2.49,2.02.08.34.43.56.77.47.34-.08.56-.43.47-.77-.42-1.72-1.96-2.94-3.73-2.96-2.41,0-3.73,1.32-3.73,3.73.01.63.12,1.26.32,1.87h-.94c-.34,0-.62.28-.62.62s.28.62.62.62h1.24c.22,1.13.14,2.43-1.18,4.66-.18.3-.08.68.22.85.1.06.22.09.34.09h6.84c.34,0,.62-.28.62-.62s-.28-.62-.62-.62Z" />
                            <path class="cls-4" d="m19.46,74.86c-.61.62-.95,1.47-.95,2.35s.34,1.73.95,2.35l4.14,4.25c.24.25.58.39.92.39s.68-.14.92-.39c.75-.77,4.13-4.26,4.13-4.26.61-.62.95-1.47.95-2.35s-.34-1.72-.95-2.35h0c-.61-.63-1.44-.98-2.3-.98s-1.69.35-2.3.98l-.46.47-.45-.47c-.61-.63-1.44-.98-2.3-.98s-1.69.35-2.3.98m.62.6c.45-.46,1.05-.72,1.68-.72s1.24.26,1.68.72l.76.78c.08.08.19.13.31.13s.23-.05.31-.13l.77-.79c.45-.46,1.05-.72,1.68-.72s1.24.26,1.68.72c0,0,0,0,0,0,.45.46.7,1.09.7,1.74s-.25,1.29-.7,1.75c0,0-3.38,3.49-4.13,4.26-.08.08-.19.13-.3.13s-.22-.05-.3-.13l-4.14-4.25c-.45-.46-.7-1.09-.7-1.75s.25-1.28.7-1.75" />
                            <path class="cls-4" d="m24.09,78.61h-.86c-.24,0-.43.19-.43.43s.19.43.43.43h.86v.86c0,.24.19.43.43.43s.43-.19.43-.43v-.86h.86c.24,0,.43-.19.43-.43s-.19-.43-.43-.43h-.86v-.86c0-.24-.19-.43-.43-.43s-.43.19-.43.43v.86h0Z" />
                            <g id="Shopicon">
                                <rect class="cls-3" x="19.18" y="39.88" width="13.43" height="1.23" transform="translate(-21.05 30.18) rotate(-45)" />
                                <path class="cls-3" d="m22.82,39.88c1.36,0,2.46-1.1,2.46-2.46s-1.1-2.46-2.46-2.46-2.46,1.1-2.46,2.46,1.1,2.46,2.46,2.46Zm0-3.7c.68,0,1.23.55,1.23,1.23s-.55,1.23-1.23,1.23-1.23-.55-1.23-1.23.55-1.23,1.23-1.23Z" />
                                <path class="cls-3" d="m28.98,46.04c1.36,0,2.46-1.1,2.46-2.46s-1.1-2.46-2.46-2.46-2.46,1.1-2.46,2.46,1.1,2.46,2.46,2.46Zm0-3.7c.68,0,1.23.55,1.23,1.23s-.55,1.23-1.23,1.23-1.23-.55-1.23-1.23.55-1.23,1.23-1.23Z" />
                            </g>
                        </svg>
                        <p>Award Winning Employee Benefits Portal</p>
                    </div>
                </div>
                <div class="col-md-6 col-6 align-center svg-2">
                    <div class="benefits-box">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 48" width="55px" height="70px">
                            <defs>
                                <style>
                                    .hol1 {
                                        stroke: url(#linear-gradient-2);
                                    }

                                    .hol1,
                                    .hol2 {
                                        fill: none;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                        stroke-width: 2px;
                                    }

                                    .hol2 {
                                        stroke: url(#linear-gradient);
                                    }

                                    .hol3 {
                                        fill: url(#linear-gradient-3);
                                    }
                                </style>
                                <linearGradient id="linear-gradient" x1="36.3" y1="22.95" x2="4.81" y2="22.95" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#c33764" />
                                    <stop offset="1" stop-color="#1d2671" />
                                </linearGradient>
                                <linearGradient id="linear-gradient-2" y1="15.81" y2="15.81" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-3" x1="33.19" y1="29.12" x2="9.34" y2="29.12" xlink:href="#linear-gradient" />
                            </defs>
                            <g>
                                <path class="hol2" d="m12.36,8.2v3.28m16.39-3.28v3.28m-.39,26.22h1.7c1.84,0,2.75,0,3.45-.36.62-.31,1.12-.82,1.43-1.43.36-.7.36-1.62.36-3.45v-15.73c0-1.84,0-2.75-.36-3.45-.31-.62-.82-1.12-1.43-1.43-.7-.36-1.62-.36-3.45-.36H11.05c-1.84,0-2.75,0-3.45.36-.62.31-1.12.82-1.43,1.43-.36.7-.36,1.62-.36,3.45v15.73c0,1.84,0,2.75.36,3.45.31.62.82,1.12,1.43,1.43" />
                                <path class="hol1" d="m5.81,15.81h29.49" />
                            </g>
                            <path class="hol3" d="m9.34,37.66c0-.73.59-1.32,1.32-1.32h11.39v-8.18c0-.18.07-.34.2-.47l1.05-1.05c-.1-.23-.17-.49-.17-.76,0-.39-.32-.71-.71-.71-1.04,0-1.88-.84-1.88-1.88,0-.19-.07-.37-.21-.5h0c-.13-.13-.31-.21-.5-.21-.94,0-1.77-.8-1.86-1.72-.07-.2-.03-.43.14-.59,3.29-3.29,8.54-3.43,12.01-.44l.4-.4c.26-.26.68-.26.93,0,.26.26.26.68,0,.93l-.4.4c2.99,3.47,2.85,8.72-.44,12.01,0,0,0,0,0,0-.05.05-.12.09-.19.12-.07.03-.15.05-.22.05-1,0-1.88-.88-1.88-1.88,0-.39-.32-.71-.71-.71h-.05c-.49-.01-.94-.21-1.28-.55h0c-.35-.36-.55-.83-.55-1.33,0-.39-.32-.71-.71-.71-.28,0-.55-.07-.79-.18l-.85.85v7.9s.4,0,.4,0l2.69-3.84c.42-.6,1.24-.74,1.84-.32.6.42.74,1.24.32,1.84l-2.95,4.21.96,1.27c.22.29.16.7-.13.93-.12.09-.26.13-.4.13-.2,0-.4-.09-.53-.26l-1.01-1.33s-.08.01-.12.01h-11.73l-1,1.31c-.13.17-.33.26-.53.26-.14,0-.28-.04-.4-.13-.29-.22-.35-.63-.13-.93l.39-.52h-.41c-.73,0-1.32-.59-1.32-1.32Z" />
                        </svg>
                        <p>Market leading holiday package for our Sales teams</p>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>



    <section id="jobs">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h3 style="margin-bottom: 20px;">Available Jobs:</h3>
                </div>
                <div class="col-6">
                </div>
            </div>
            <?php
            $domOBJ = new DOMDocument();
            $domOBJ->load("https://isw.changeworknow.co.uk/the_trade_centre/vms/e/careers/search.rss"); //XML page URL

            $content = $domOBJ->getElementsByTagName("item");
            $data_position = 0;

            foreach ($content as $data) {

                $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
                $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
                $description = $data->getElementsByTagName("description")->item(0)->nodeValue;

                $location = explode(' ', strip_tags($description));

                if ((strpos($location[1], "Birmingham") !== false)
                    || (strpos($location[1], "Coventry") !== false)
                    || (strpos($location[1], "Rochdale") !== false)
                    || (strpos($location[1], "Rotherham") !== false)
                    || (strpos($location[1], "Wednesbury") !== false)
                ) :

            ?>

                    <div class="row align-items-center  job-box">
                        <div class="col-sm-9 col-12">
                            <h3><?php echo $title; ?></h3>
                            <div class="description"><?php echo $description; ?></div>
                        </div>
                        <div class="col-sm-3 col-12 ">
                            <p class="align-right">
                            <form action="<?php echo  get_the_permalink() ?>" method="POST">
                                <input type="hidden" name="position" value="<?php echo $data_position; ?>" />
                                <button class="go-more">More Details</button>
                            </form>
                        </div>
                    </div>

            <?php
                endif;
                $data_position++;
            }
            ?>
            <?php echo do_shortcode('[awsmjobs]'); ?>
        </div>
    </section>
<?php } else {
    $domOBJ = new DOMDocument();
    $domOBJ->load("https://isw.changeworknow.co.uk/the_trade_centre/vms/e/careers/search.rss"); //XML page URL

    $content = $domOBJ->getElementsByTagName("item");

    $title = $content[$_POST['position']]->getElementsByTagName("title")->item(0)->nodeValue;
    $link = $content[$_POST['position']]->getElementsByTagName("link")->item(0)->nodeValue;
    $description = $content[$_POST['position']]->getElementsByTagName("description")->item(0)->nodeValue;


?>

    <section class="banner-careers second-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <h1><?php echo $title; ?></h1>
                    <div class="banner-description"><?php echo $description; ?></div>
                    <a href="<?php echo $link; ?>" target="_blank" class="read-more">Apply Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container job-information">
        <h3><?php echo $title; ?></h3>
        <?php echo $description; ?>
        <a href="<?php echo $link; ?>" target="_blank" class="read-more-colorfull">Apply Now</a>
    </section>

<?php } ?>

<?php get_footer();
