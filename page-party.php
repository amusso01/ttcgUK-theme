<?php
/**
 * Template Name: Party
 *
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 * @author Jonathan Soto
 */


get_header('empty');
?>

<section id="promotional_simple_box" class="party">

    <img class="back-img darkHeader" src="<?php echo get_template_directory_uri(); ?>/images/KitKlub-Back.jpg" /> 
    <img class="head" src="<?php echo get_template_directory_uri(); ?>/images/KitKlub-Top.png" />
    <div class="container">

        
        <img class="head-img" src="<?php echo get_template_directory_uri(); ?>/images/KitKlub-Logo.png" />

        <div class="contentPage">
            <!--[if lte IE 8]>
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
            <![endif]-->
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
            <script>
            hbspt.forms.create({
                    region: "na1",
                    portalId: "6645024",
                    formId: "d4d929e2-6edd-4245-ab4e-04865381e260"
            });
            </script>

        </div>


        <img class="foot-img" src="<?php echo get_template_directory_uri(); ?>/images/Important.png" />        

        
        
        <img class="foot-img" src="<?php echo get_template_directory_uri(); ?>/images/Team.png" />
        <div class="party-container">
            <a href="https://wordpress-531426-3005584.cloudwaysapps.com/" target="_blank"> 
                <img class="foot-img" src="<?php echo get_template_directory_uri(); ?>/images/TCW-BFI-Logo.png" style="max-" />
            </a>    
        </div>
        
    </div>

</section>

<script>
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll <= 1300) {
        var scrollminus = -1*scroll;
        $(".back-img").css("top", scrollminus);
    } else {
    }
});
</script>

<?php
get_footer('empty');
