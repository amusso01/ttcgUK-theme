<?php
/**
 * Template Name: Promotional
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 * @author Jonathan Soto
 */


get_header('empty');
?>

<section id="promotional_simple_box">

    <img class="back-img" src="<?php echo get_template_directory_uri(); ?>/images/Bottom_Layer.png" />
    <div class="container">

        <a class="linkfloat" target="_blank" href="https://wordpress-531426-3005584.cloudwaysapps.com/"></a>
        <a class="linkfloat uk" target="_blank" href="https://www.tradecentreuk.com/"></a>
        <img class="head-img" src="<?php echo get_template_directory_uri(); ?>/images/Top_Layer_Top.png" />

        <div class="contentPage">
            <!--[if lte IE 8]>
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
            <![endif]-->
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
            <script>
            hbspt.forms.create({
                            region: "na1",
                            portalId: "6645024",
                            formId: "3cbc63e6-6357-4e45-95f9-289c6a1cb9a2"
            });
            </script>

        </div>

        <a href="https://www.instagram.com/thetradecentrewales/" target="_blank">
            <img class="foot-img" src="<?php echo get_template_directory_uri(); ?>/images/TCW-Top_Layer_Bottom.png" />        
        </a>
        
        
        <div class="promofoot"> 
            <p>*You can unsubscribe from these communications at any time. For more information on how to unsubscribe, our privacy practices, and how we are committed to protecting and respecting your privacy, please review our Privacy Policy.</p>

            <p>By clicking "submit" above, you consent to allow The Trade Centre Group to store and process the personal information submitted above to provide you with the content requested.</p>
        
            <p><a href="<?php echo get_the_permalink(2162); ?>" style="color:#fff">Click here to read Terms & Conditions</a></p>
        </div>
    </div>

</section>


<?php
get_footer('empty');
