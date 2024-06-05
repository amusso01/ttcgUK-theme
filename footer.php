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
<?php if (!is_page('finance-check')) : ?>

    <?php
    global $carItem, $carsArray;
    $make = '';
    $model = '';
    $vid = '0009999';
    if (is_singular('carmodel')) :
        // ARRAY HOLDING CAR INFO
        $carItem = $carsArray[0];
        $make = $carItem['make_title'];
        $model = $carItem['model_title'];
        $vid = $carItem['stock_number'];
    endif;

    ?>


    <div class="sticky-footer">
        <a href="/finance-check?make=<?= $make; ?>&model=<?= $model; ?>&vid=<?= $vid;  ?>" class="fdry-finance-check-mobile__btn-img">
            <img src="<?= get_template_directory_uri() ?>/dist/images/sticky-footer.svg" alt="Free finance check button">
        </a>
    </div>
<?php endif; ?>

<footer class="fdry-footer">
    <div class="fdry-footer__wrapper-top">
        <div class="content-block">
            <div class="fdry-footer-social">
                <div class="fdry-footer-social__wrapper">

                    <?php
                    if (have_rows('social_media', 'options')) :
                        while (have_rows('social_media', 'options')) : the_row();
                            echo '<a href="' . get_sub_field('link') . '" target="_blank" class="fdry-footer__social-icon">
                        <img src="' . get_sub_field('icon') . '" />
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
                <?php get_template_part('components/footer/footer-nav-top'); ?>
                <?php get_template_part('components/footer/footer-nav-btm'); ?>
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
    (function() {
        var ra = document.createElement('script');
        ra.type = 'text/javascript';
        ra.src = 'https://ruler.nyltx.com/lib/1.0/ra-bootstrap.min.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ra, s);
    }());
</script>


<!-- Tippy -->


<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script>
    // With the above scripts loaded, you can call `tippy()` with a CSS
    // selector and a `content` prop:
    tippy('.fdryCaveat', {
        content: 'Web Special prices are checked against the cheapest comparable car on Autotrader; Comparison is for cars registered in the same year, regardless of month; Excluding private sales and Autotrader accident/repaired cars (Cat S/C/D/N); Comparison is against the lowest priced car on Autotrader, within the mileage banding within which our car sits (i.e. If our car has 26,000 miles then we search cars 25,000 to 30,000 miles price bands on Autotrader); Same make/model/ derivative/ fuel type/ number of doors; All Web Special cars are price-checked on the same day as they are added to our website; If comparative stock on Autotrader is limited, then we may compare our car to an older car, lower specification car or higher mileage car advertised on Autotrader.',
        arrow: true,
    });
</script>

</body>

</html>