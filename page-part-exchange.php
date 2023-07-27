<?php
/**
 * The part exchange page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

global $title;
$title = 'Part Exchange Valuation from ' . get_bloginfo('name');

get_header();
?>
<style>
    .sticky-mobile-footer {
        display:none;
    }
</style>
    <section class="container-fluid | tertiarypage finance">
        <div class="container">
            <h1 class="text-center">Value My Part-Ex</h1>
            <h3 class="text-center">Enter your car registration to get your valuation.</h3>
            <div class="row pb-0">
				<!-- 
                <div class="col-12 col-md-4 mb-1">
                    <div class="col text-center">
                        <img src="/images/apply-step4.png">
                        <h4>Step 1</h4>
                        <span>Enter Your Reg</span>
                        <p>Simply enter your car registration below and then click GO.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-1">
                    <div class="col text-center">
                        <img src="/images/apply-step3.png">
                        <h4>Step 2</h4>
                        <span>Instant Valuation</span>
                        <p>Confirm the details and we'll text or email your valuation.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-1">
                    <div class="col text-center">
                        <img src="/images/apply-step2.png">
                        <h4>Step 3</h4>
                        <span>Choose your car</span>
                        <p>Visit one of our dealerships, trade your old car in and and drive away your new car!</p>
                    </div>
                </div>
			-->
            </div>
        </div>
    </section>
    <main style="background-color:#f0f1f5;" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <?php
                the_content(  );

                ?>
            </div>
        </div>
    </div>
</main>


<section class="banner__enterreg">
    <?php   
    $options = get_field('part_exchange', 'options');
    //print_r($fpOptions);
    if ($options['part_exchange_mobile']!="") { 
        echo '<img class="m-auto d-block d-md-none mw-100" src="' . $options['part_exchange_mobile'] . '" />';
    }
    if ($options['part_exchange_desktop']!="") {
        echo '<img class="m-auto d-none d-md-block mw-100" src="' . $options['part_exchange_desktop'] . '" />';
    }
    ?>
</section>
<?php
// get_template_part('template-parts/enterreg-banner', 'front-page');
get_footer('finance');
