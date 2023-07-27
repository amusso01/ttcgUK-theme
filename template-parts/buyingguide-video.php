<?php

global $carmake, $carmodel;
?>
<section class="your-nearest">
    <div class="container">
        <div class="row">
            <div class="col-12 px-0 mb-5 your-nearest__video">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe title="The Trade Centre Group"
                            src="https://player.vimeo.com/video/197302557?title=0&amp;byline=0&amp;portrait=0"
                            style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                            webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="col-12 your-nearest__text">

                <?php
                if (isset($carmake->post_title) && !isset($carmodel->post_title)):
                    echo '<h2>Cheap Used ' . ucwords(
                            $carmake->post_title
                        ) . ' ' . (isset($_SESSION['area']) ? "near " . $_SESSION['area'] . " " : "") . 'at The ' . SITE_NAME . ' </h2>';
                elseif (isset($carmodel->post_title)):
                    echo '<h2>Cheap Used ' . ucwords($carmake->post_title) . ' ' . ucwords(
                            $carmodel->post_title
                        ) . ' ' . (isset($_SESSION['area']) ? "near " . $_SESSION['area'] . " " : "") . 'at The ' . SITE_NAME . ' </h2>';
                elseif (isset($carmake->post_title)):
                    echo '<h2>Cheap Used ' . ucwords(
                            $carmake->post_title
                        ) . ' ' . (isset($_SESSION['area']) ? "near " . $_SESSION['area'] . " " : "") . 'at The ' . SITE_NAME . '</h2>';
                elseif (!isset($carmake->post_title) && !isset($carmodel->post_title)):
                    echo '<h2>' . (isset($_SESSION['area']) ? "Cheap Used Cars near " . $_SESSION['area'] . " " : "The Cheapest Used Cars are ") . 'at The ' . SITE_NAME . '</h2>';
                endif;

                if (isset($carmodel->post_content) && !empty($carmodel->post_content)):
                    echo '<p>' . replaceShortCodes(
                        $carmodel->post_content,
                        (isset($_SESSION['area']) ? $_SESSION['area'] : "")
                    ) . '</p>';
                    //elseif(isset($makes->description)):
                    //echo replaceShortCodes($makes->description,(isset($_SESSION['area'])?$_SESSION['area']:""));
                elseif (isset($carmake->post_content)  && !empty($carmake->post_content) && !isset($range->name)):
                    echo '<p>' . replaceShortCodes($carmake->post_content, (isset($_SESSION['area']) ? $_SESSION['area'] : "")) . '</p>';
                endif;

                $standard_content =
                    "<p>
                    The award winning and largest independent used car supermarket in the U.K, The " . SITE_NAME  . " prides itself on providing the highest quality used cars at the very best value. We sell over 40,000 used cars every year, with the added convenience of being able to drive away your perfect car today.
                    </p>

                    <p>
                        Every single car undergoes a thorough 99-point vehicle
                        safety inspection, full valet and pre-handover check, so
                        you can trust that your new car will leave the showroom [near area]
                        in prime condition. Furthermore, our dedicated customer
                        service centres [near area] are open six days a week to ensure that
                        we are always on hand for any post-sale queries or advice.
                    </p>

                    <p>
                        With used cars [near area] available for as little as £20 a week, we make upgrading your car easy.
                        Each of our outlets [near area] has a dedicated car finance team, we
                        arrange car finance for over 1000 customers every single
                        week and we can tailor-make a deal to suit your budget,
                        including paying off any current finance that you may have
                        on the car that you are trading in. Why not save time and
                        pre-arrange your car finance in just 30 seconds?
                    </p>

                    <p>
                        We hope that you will pay our car supermarket [near area] a visit soon and let us count
                        you amongst the thousands of loyal customers that never buy their car anywhere else!
                    </p>";

                echo replaceShortCodes($standard_content, (isset($_SESSION['area']) ? $_SESSION['area'] : ""));
                ?>
            </div>
        </div>
    </div>
</section>