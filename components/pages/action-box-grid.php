<section class="fdry-action-box">
    <div class="action-box-grid">
        <div class="action-box-single action-box1x1">
            <a href="<?= site_url('/finance-check') ?>">
                <div class="action-box__image" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/finance.png);">
                    <div class="action-box-text">
                        <i><?php get_template_part( 'svg-template/svg', '1' ) ?></i>
                        CAR FINANCE IN 60 SECONDS
                    </div>
                </div>
            </a>
        </div>

        <div class="action-box-single action-box1x2">
            <a href="<?= site_url('/price-promise' ) ?>">
                <div class="action-box__image" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/price-promise.png);">
                    <div class="action-box-text">
                        <i><?php get_template_part( 'svg-template/svg', '2' ) ?></i>
                        THE <?php echo strtoupper(SITE_NAME); ?>
                        <br>
                        PRICE PROMISE
                    </div>
                </div>
            </a>
        </div>
        <div class="action-box-single action-box1x1">
            <a href="<?= site_url('/finance-check' ) ?>">
                <div class="action-box__image" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/customer.png);">
                    <div class="action-box-text">
                        <i><?php get_template_part( 'svg-template/svg', '3' ) ?></i>
                        OVER 1000 CUSTOMERS APROVED EACH WEEK
                    </div>
                </div>
            </a>
        </div>
        <div class="action-box-single action-box2x1">
            <a href="<?= site_url('/lifetime-warranty' ) ?>">
                <div class="action-box__image" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/warranty.png);">
                    <div class="action-box-text">
                        <i><?php get_template_part( 'svg-template/svg', 'car-home' ) ?></i>
                        FIND OUT MORE ABOUT LIFETIME WARRANTY
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
