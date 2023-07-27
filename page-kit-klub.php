<?php
/**
 * The price promise page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */
function wpb_add_google_fonts() {

    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap', false ); 
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

global $title, $hideCta;
$hideCta = true;
$title = 'Kit Klub 2022 - ' . get_bloginfo('name');
get_header();

?>

<div class="sticky-top-banner" style="margin-bottom: 25px;">
    <!-- <img class="d-none d-md-block  w-100"
src="https://cdn.tradecentregroup.io/image/upload/v1683128679/TCG-Banner-Desktop.jpg?v=<?php echo date("HdmY"); ?>"/>
    <img class="d-md-none w-100" src="<?php echo $banner_sticky_mobile  ?>?v=<?php echo date("HdmY"); ?>"/> -->
    
    <div class="marquee_text">
        WE WANT YOUR PART-EX<span class="smaller" style=" font-weight:400; letter-spacing:0.1px; position:relative;"> AND </span>WE PAY MORE - <span style="color:#c21818">PUT US TO TEST! </span>
        &nbsp; WE WANT YOUR PART-EX<span class="smaller" style=" font-weight:400; letter-spacing:0.1px; position:relative;"> AND </span>WE PAY MORE - <span style="color:#c21818">PUT US TO TEST! </span>
    </div>
</div>

        <?php
        if (have_posts()) : 
                    while (have_posts()) {
                        the_post();
                        the_content();
                    }
        endif; ?>


<?php
//if (!isset($branch) || $branch->post_name != 'merthyr-tydfil') {
//   get_template_part('template-parts/carslisting/carslisting', 'front-page');
// }
?>

<?php
//get_template_part('template-parts/bettercar-video', 'front-page');
//get_template_part('template-parts/enterreg-banner', 'front-page');
//get_template_part('template-parts/reviews', 'front-page');
//get_template_part('template-parts/actionboxes', 'front-page');
//get_template_part('template-parts/buyingguide-video', 'front-page');
get_template_part('template-parts/branch-locations', 'front-page');
get_footer();
