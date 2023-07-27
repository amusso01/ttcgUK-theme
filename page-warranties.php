<?php
/**
 * The warranties page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

global $title;
$title = 'Warranties from ' . get_bloginfo('name');

get_header();
?>
<section class="container-fluid | tertiarypage warranties">
    <?php
    if ($banner_desktop = get_theme_mod('banner_desktop_warranties_page')) :
        $banner_mobile = get_theme_mod('banner_mobile_warranties_page')
        ?>
    <div class="row py-md-3">
        <div class="col">
            <img class="d-none d-md-block w-100"
                 src="<?php echo $banner_desktop; ?>?v=<?php echo date("HdmY"); ?>"/>
            <img class="d-md-none w-100"
                 src="<?php echo $banner_mobile; ?>?v=<?php echo date("HdmY"); ?>"/>
        </div>
    </div>
    <?php
    endif;
    ?>
    <div class="container">
        <h1 class="text-center">Warranties</h1>
        <div class="row pb-5">
            <div class="col">
                <strong>What to do in the event of a vehicle failure or warranty claim?</strong><br/>
                In the event of a vehicle failure or if you’d like to make a warranty claim, please call the RAC
                Helpline 03301 003 728
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12 col-md-4">
                <div style="padding:56.25% 0 0 0;position:relative;">
                    <iframe src="https://player.vimeo.com/video/197302425?title=0&byline=0&portrait=0"
                            style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                            allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>

                <h4>99 Point Inspection</h4>
                All our cars come with a 99 Point Inspection. We carry out this extensive inspection before the
                vehicle's go on sale. Our workshops are state of the art with 32 hydraulic ramps to work on and
                advanced diagnostics equipment to find the faults that the eye can’t see.
            </div>
            <div class="col-12 col-md-4">
                <div style="padding:56.25% 0 0 0;position:relative;">
                    <iframe src="https://player.vimeo.com/video/197302501?title=0&byline=0&portrait=0"
                            style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                            allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
                <!--
<div class="image-holder">
<img alt="RAC Warranty" src="/images/rac.jpg"/>
</div>
-->
                <h4>RAC Warranty</h4>
                Most customers take advantage of our 3 year RAC Warranty and Breakdown cover which is available on every car we sell. Enjoy the peace of mind of being protected against unexpected motoring expenses and the reassurance that should the unthinkable happen, then your car will be recovered by the RAC.
            </div>
            <div class="col-12 col-md-4">
                <div class="image-holder">
                    <img alt="Free Recovery" src="/images/brokencar.jpg"/>
                </div>
                <h4>Free Recovery</h4>
                Free RAC Recovery with every RAC Warranty. You’ve probably seen or heard the adverts... Being one of
                the biggest recovery fleets in the UK you certainly don’t need to worry about breaking down! It gets
                better too, it also includes roadside assistance.
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <h4>
                    Customer Care
                </h4>
            </div>
            <div class="col-12 col-md-6">  
                <!--
                <div class="pandemic-message mb-3">Whilst our showrooms are closed due to circuit-breaker lockdown, we are fully supporting all of our customers during this period. Please see our contact page for further details.</div>
                -->
                Our workshop facilities are state of the art with 32 hydraulic ramps and 20 qualified members of
                staff which specialise in all areas of expertise, boasting the most up to date and advanced
                diagnostic equipment to support a wide spectrum of vehicles.<br/>
                Our aim at The Trade Centre Wales is to be able to deal with all sorts of issues, as soon as possible.
                That’s why we deal with everything on site, including our own internal tyre centre. Stocking all
                types of tyres for all types of vehicles. Our customer care centre is open Monday to Friday, from
                9.00am until 5.30pm and will be happy to answer any questions you may have about your used car. To
                get in touch with our customer care department at The Trade Centre Wales, you can contact us using our
                online form which is available on the ‘contact us’ page.<br/>
                Download/View a copy of our 99 Point safety inspection checklist <a href="/files/doc-tcw-chk.pdf">
                here</a>. The document is in PDF
                format.
            </div>

            <div class="col-12 col-md-6">
                <div style="padding:56.25% 0 0 0;position:relative;">
                    <iframe src="https://player.vimeo.com/video/197302465?title=0&byline=0&portrait=0"
                            style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                            allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
get_template_part('template-parts/branch-locations', 'front-page');
get_footer();
