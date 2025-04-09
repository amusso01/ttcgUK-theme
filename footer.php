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
            <img src="<?= get_template_directory_uri() ?>/dist/images/FFC-btn.svg" alt="Free finance check button">
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


<!-- <script
    async type="text/javascript"
    src="//static.klaviyo.com/onsite/js/STkTCz/klaviyo.js"></script> -->

<script type="text/javascript" async="" src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=STkTCz"></script>

<script>
    ! function() {
        if (!window.klaviyo) {
            window._klOnsite = window._klOnsite || [];
            try {
                window.klaviyo = new Proxy({}, {
                    get: function(n, i) {
                        return "push" === i ? function() {
                            var n;
                            (n = window._klOnsite).push.apply(n, arguments)
                        } : function() {
                            for (var n = arguments.length, o = new Array(n), w = 0; w < n; w++) o[w] = arguments[w];
                            var t = "function" == typeof o[o.length - 1] ? o.pop() : void 0,
                                e = new Promise((function(n) {
                                    window._klOnsite.push([i].concat(o, [function(i) {
                                        t && t(i), n(i)
                                    }]))
                                }));
                            return e
                        }
                    }
                })
            } catch (n) {
                window.klaviyo = window.klaviyo || [], window.klaviyo.push = function() {
                    var n;
                    (n = window._klOnsite).push.apply(n, arguments)
                }
            }
        }
    }();
</script>


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
    tippy('.fdryRrpInfo', {
        content: 'Recommended Retail Prices (RRP) listed on our website are provided as a guide by CAP HPI, who are recognised experts in providing data to the automotive industry. These figures are updated monthly to maintain accuracy. Figures quoted for ‘RRP’ are used market values.',
        arrow: true,
    });
</script>

<script>
    $(document).ready(function() {
        $('#frm_field_21_container select').on('change', function() {
            var valor = $(this).val();
            if (valor === "Customer care") {
                $(".vehicleregistration").addClass("active");
                $('#field_qq6fd').attr('required', true);
                $("#field_qq6fd_label").append('<span class="frm_required">*</span>');
            } else {
                $(".vehicleregistration").removeClass("active");
                $('#field_qq6fd').attr('required', false);
            }
        });
    });
</script>

</body>

</html>