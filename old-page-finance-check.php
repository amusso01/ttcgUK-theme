<?php
/**
 * The price promise page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

global $title, $hideCta;
$hideCta = true;
$title = 'Free Finance Check at ' . get_bloginfo('name');
get_header();

session_start();
$_SESSION['email'];
$_SESSION['phone'];


?>

<style>
    .content-tabs, .sticky-mobile-footer {
        display:none;
    }
    .tertiarypage {
        margin-top: 0px;
    }
    main {
        background:#01CC00;
    }
</style>

<section class="container-fluid | tertiarypage finance-check-page" style="min-height:90vh;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                echo do_shortcode('[finance_application_form]');
                ?>
            </div>                
        </div>           
    </div>
</section>

<section class="banner__enterreg">
    <?php   
    $options = get_field('finance_check', 'options');
    //print_r($fpOptions);
    if ($options['finance_mobile']!="") { 
        echo '<img class="m-auto d-block d-md-none mw-100" src="' . $options['finance_mobile'] . '" />';
    }
    if ($options['finance_desktop']!="") {
        echo '<img class="m-auto d-none d-md-block mw-100" src="' . $options['finance_desktop'] . '" />';
    }
    ?>
</section>


<?php
//if (!isset($branch) || $branch->post_name != 'merthyr-tydfil') {
//    get_template_part('template-parts/carslisting/carslisting', 'front-page');
//}
?>
</section>
<?php
//get_template_part('template-parts/bettercar-video', 'front-page');
// get_template_part('template-parts/enterreg-banner', 'front-page');
//get_template_part('template-parts/reviews', 'front-page');
//get_template_part('template-parts/actionboxes', 'front-page');
//get_template_part('template-parts/buyingguide-video', 'front-page');
get_footer('finance');
