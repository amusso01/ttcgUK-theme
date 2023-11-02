<?php

/**
 * The footer template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

$footerLegalTop = get_field('footer_legal_info', 'options');
$footerApr = get_field('footer_apr', 'options');
?>


<footer class="fdry-footer">
    <div class="fdry-footer__wrapper-top">
        <div class="content-block">
            <div class="fdry-footer-social">
                <div class="fdry-footer-social__wrapper">
        
                    <?php
                    if( have_rows('social_media', 'options') ):
                        while( have_rows('social_media', 'options') ) : the_row();
                        echo '<a href="'.get_sub_field('link').'" target="_blank" class="fdry-footer__social-icon">
                        <img src="'.get_sub_field('icon').'" />
                        </a>';
                     endwhile;
                    endif;
                    ?>
        
                </div>
            </div>
    
            <div class="fdry-footer-top-text">
                <?= $footerLegalTop ?>            
            </div>
        </div>

    </div>

    <div class="fdry-footer__wrapper-bottom">
        <div class="content-block">
            <p class="fdry-footer-apr__title"><?php echo get_option('cns_representative_apr'); ?>% APR Representative</p>       
            <div class="fdry-footer__apr-text">
                <?= $footerApr ?>
            </div>


            <div class="fdry-footer__menu-wrapper">
                <?php get_template_part( 'components/footer/footer-nav-top' ); ?>
                <?php get_template_part( 'components/footer/footer-nav-btm' ); ?>
            </div>
            
            
            <p class="copyright">Copyright <?php echo date('Y'); ?> The Trade Centre Group PLC.</p>
        </div>               
    </div>


</footer>



<?php
wp_footer(); ?>

<!-- MARQUEE JQuery plugin remove if not needed anymore -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.min.js"></script>
<script>
    $('.marquee_text').marquee({
    direction: 'left',
    duration: 20000,
    gap: 35,
    delayBeforeStart: 0,
    duplicated: true,
    startVisible: true
    });
</script>

<script type="text/javascript">
    var _raconfig = _raconfig || {};
    __raconfig.uid = '646cd6c4c31b2';
    __raconfig.action = 'track';
    (function () {
        var ra = document.createElement('script');
        ra.type = 'text/javascript';
        ra.src = 'https://ruler.nyltx.com/lib/1.0/ra-bootstrap.min.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ra, s);
    }());
</script>

    </body>
</html>