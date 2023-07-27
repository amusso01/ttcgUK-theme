<?php
/**
 * The finance page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

global $title, $custom;
$title = 'Contact Us at ' . get_bloginfo('name');

get_header();
?>

<?php get_template_part( 'components/header/header-marquee' ) ?>

<main  class="fdry-contact-page container" >
    <section class="fdry-contact-info">
        <h1 class="fdry-contact-title" >Contact Trade Centre</h1>
        <div class="fdry-contact-info__grid">

            <div class="fdry-contact-grid__left">
                <div class="top-text">
                    <p>
                        <?= get_field('intro_text') ?>
                    </p>
                </div>

                <div class="bottom-text">
                    <h3>Prefer to Call or Email?</h3>
                    <p class="fdry-text__small">If you would prefer to speak to Trade Centre on the phone, please see below:</p>

                    <div class="fdry-grey-box fdry-gry-box__email">
                        <div class="single-grey-box__card">
                            <h5>Email</h5>
                            <a href="mailto:<?= get_field('email') ?>"><?= get_field('email') ?></a>
                        </div>
                    </div>

                    <div class="fdry-grey-box fdry-gry-box__phone">
                        <div class="single-grey-box__card">
                            <h5>Main Line</h5>
                            <a href="tel:<?= get_field('main_line_phone') ?>"><?= get_field('main_line_phone') ?></a>
                        </div>
                        <div class="single-grey-box__card">
                            <h5>Customer Care</h5>
                            <a href="tel:<?= get_field('customer_care_phone') ?>"><?= get_field('customer_care_phone') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fdry-contact-grid__right">

                <div class="fdry-grey-box fdry-gry-box__open-hours">
                    <div class="svg">
                        <?php get_template_part( 'svg-template/svg-clock' ) ?>
                    </div>
                    <div class="fdry-open-hours__cf">
                        <h4>Opening Times</h4>
                        <?= get_field('opening_hours');  ?>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="fdry-contact-editor">
        <?php the_content() ?>
    </section>

    <?php get_template_part( 'components/pages/branches-carousel' ) ?>

</main>
<?php


get_footer();
