<?php
/**
 * The finance page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

global $title;
$title = 'Finance - ' . get_bloginfo('name');

get_header();
?>
<section class="container-fluid | tertiarypage finance">
    <div class="container">
        <?php
        if ($banner_desktop = get_theme_mod('banner_desktop_finance_page')) :
        $banner_mobile = get_theme_mod('banner_mobile_finance_page')
        ?>
        <div class="row">
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
        <h1 class="text-center">Finance In Under 30 Seconds</h1>
        <h3 class="text-center">Fill in the simple form to get your answer in under 30 seconds.</h3>
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="col text-center">
                    <img src="/images/apply-step1.png">
                    <h4>Step 1</h4>
                    <span>Free Finance Check</span>
                    <p>Our Soft Search technology means that your credit score will not be affected by applying.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="col text-center">
                    <img src="/images/apply-step3.png">
                    <h4>Step 2</h4>
                    <span>Super-Fast Decision</span>
                    <p>
                        Your answer in under 30 seconds</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="col text-center">
                    <img src="/images/apply-step2.png">
                    <h4>Step 3</h4>
                    <span>Drive Your New Car Today</span>
                    <p>
                        Our team will contact you during normal working hours, 7 days a week to arrange your new car
                        purchase. We are open 7 days a week, until 9 pm Mon-Fri and have over 6,000 cars in stock,
                        all ready to drive away.</p>
                </div>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col text-center">
                <!--   <a class="c-button--green" id="nav-pfc" href="#">Free Finance Check <i class="fas fa-arrow-circle-right"></i></a> -->
                <a class="c-button--green" href="/finance-check">Free Finance Check <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
