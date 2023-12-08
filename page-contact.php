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
$holidayTime = get_field('holiday_opening_hours');

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
                    <h3>Prefer to Call?</h3>
                    <p class="fdry-text__small">If you would prefer to speak to Trade Centre on the phone, please see below:</p>

                    <?php if(get_field('email')) : ?>
                    <div class="fdry-grey-box fdry-gry-box__email">
                        <div class="single-grey-box__card">
                            <h5>Email</h5>
                            <a href="mailto:<?= get_field('email') ?>"><?= get_field('email') ?></a>
                        </div>
                    </div>
                    <?php endif; ?>

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
            <div class="fdry-contact-grid__right <?= $holidayTime ? 'fdry-contact-grid__right-holiday' : '' ?>">

                <?php if($holidayTime) : ?>
                <div class="fdry-grey-box fdry-gry-box__open-hours fdry-gry-box__open-hours-holiday">
                    <div class="svg">
                        <svg enable-background="new 0 0 90 90" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="m17.43 23.01c-.43-3.95-.1-7.76.95-11.49.5-1.77 1.23-3.43 2.48-4.83.42-.47.87-.7 1.52-.69 5.11.12 9.68 1.85 13.79 4.77 1.94 1.38 3.68 3.04 5.53 4.54.27.22.65.4.98.41 1.69.04 3.38.05 5.06 0 .37-.01.83-.2 1.08-.47 3.92-3.98 8.44-7.01 13.87-8.45 1.79-.48 3.68-.58 5.54-.76.38-.04.91.24 1.2.54 1.73 1.84 2.51 4.14 3.04 6.54.61 2.76.8 5.56.7 8.38-.02.48-.14.96-.23 1.55h.79 6.82c1.98 0 3.58 1.56 3.59 3.55.02 3.28.03 6.57.01 9.85-.01 2.05-1.51 3.54-3.55 3.58-1.39.02-1.36-.23-1.36 1.37.01 12.9.02 25.79.03 38.69 0 2.32-1.49 3.84-3.8 3.84-20.19 0-40.38-.01-60.57.02-1.97 0-3.85-1.66-3.77-3.61.06-1.36-.02-2.72-.02-4.08 0-11.77.01-23.54.01-35.31 0-.89-.03-.96-.9-.9-2.46.19-4.1-1.91-4.02-3.95.11-3.09.02-6.19.04-9.28.01-2.24 1.5-3.74 3.74-3.76 2.27-.02 4.55 0 6.82-.01.22 0 .4-.02.63-.04zm32.59 37.74c-.01 6.7 0 13.41-.02 20.11 0 .69.32.73.86.73 8.11-.01 16.22-.01 24.33-.01 1.4 0 1.8-.4 1.8-1.79 0-12.52 0-25.04-.01-37.55 0-.54-.01-1.08 0-1.62 0-.41-.19-.6-.6-.58-.21.01-.42-.01-.63-.01-8.3 0-16.6.01-24.89-.01-.64 0-.85.16-.85.83.02 6.63.01 13.26.01 19.9zm-9.65.12h.03c0-6.21 0-12.42 0-18.64 0-.54.01-1.08 0-1.62 0-.39-.18-.6-.61-.58-.51.02-1.03 0-1.55 0-7.99 0-15.99 0-23.98 0-.48 0-.84-.01-.84.69.02 13.01.01 26.02.01 39.03 0 1.43.4 1.83 1.84 1.83h23.49c1.61 0 1.61 0 1.61-1.59 0-6.37 0-12.75 0-19.12zm12.13-23.23c.18.02.27.05.36.05h27.7c.79 0 1.26-.47 1.27-1.28.01-3.23.01-6.47 0-9.7 0-.71-.39-1.15-1.08-1.26-.32-.05-.65-.04-.98-.04-4.76 0-9.51 0-14.27 0-3.94 0-7.87 0-11.81 0-1.19 0-1.19 0-1.19 1.22v5.76zm-14.56.05c0-.33 0-.58 0-.83 0-3.49 0-6.98 0-10.48 0-.96 0-.96-.96-.96-8.88 0-17.76-.01-26.64-.01-.14 0-.28 0-.42.01-.87.09-1.29.54-1.31 1.43-.01.21 0 .42 0 .63 0 2.88-.01 5.76-.01 8.65 0 1.08.44 1.53 1.52 1.56h.49 26.5zm9.8 23.11c-.01 0-.01 0 0 0-.01-6.68-.02-13.36 0-20.05 0-.58-.21-.73-.74-.72-1.17.02-2.35.02-3.52-.02-.63-.02-.8.23-.8.83.02 12.47.02 24.95.02 37.42 0 .87.02 1.74-.01 2.6-.02.53.12.76.71.73 1.19-.05 2.39-.04 3.59 0 .59.02.76-.16.76-.75-.02-6.68-.01-13.36-.01-20.04zm22.79-45.04c.01-1.9-1.27-5.77-2.32-7.03-.17-.21-.56-.37-.84-.35-.98.07-1.97.15-2.92.37-4.71 1.04-8.72 3.42-12.3 6.6-2.17 1.93-2.17 1.94-2.13 4.83.01.55 0 1.1 0 1.82 6.41-3.87 13.04-6.41 20.51-6.24zm-30.24 6.17c.06-.24.12-.37.12-.5-.01-1.22 0-2.44-.06-3.65-.01-.29-.21-.62-.42-.84-2.08-2.19-4.44-4.01-7.07-5.5-2.82-1.6-5.8-2.69-9.05-3.01-1.33-.13-1.5-.11-2.08 1.11-.47.99-.9 2.01-1.22 3.05-.31 1.01-.46 2.06-.7 3.16 7.55-.14 14.17 2.36 20.48 6.18zm-.01 9.6c0 1.85.01 3.7-.01 5.55 0 .45.14.62.6.61 2.9-.02 5.81-.02 8.71 0 .44 0 .57-.15.57-.57-.01-3.72-.01-7.45 0-11.17 0-.42-.15-.57-.58-.57-2.86.02-5.71.02-8.57 0-.53 0-.75.16-.74.73.04 1.81.02 3.62.02 5.42zm12.84-8.6c.01.04.03.08.04.12h1.21 11.17c1.36 0 2.72-.01 4.08 0 .6 0 1.05-.25 1.08-.86.06-1.06.06-2.14 0-3.2-.04-.62-.48-.94-1.12-.9-.96.05-1.92.03-2.87.15-4.36.53-8.46 1.93-12.34 3.97-.43.23-.83.48-1.25.72zm-15.89.12c.02-.05.03-.1.05-.16-.3-.18-.58-.38-.89-.54-3.97-2.07-8.13-3.56-12.59-4.11-.95-.12-1.91-.14-2.87-.15-.49-.01-1.09.04-1.14.68-.08 1.08-.16 2.19-.05 3.26.09.88.39 1.01 1.3 1.01h14.82c.45.01.91.01 1.37.01zm7.98 0c.61 0 1.22-.03 1.83.01.52.03.71-.15.69-.67-.03-1.19-.03-2.39 0-3.59.01-.51-.14-.72-.68-.71-1.24.02-2.48.01-3.73-.01-.45-.01-.65.16-.64.61.01 1.29 0 2.58-.01 3.87 0 .4.18.52.56.51.67-.03 1.33-.02 1.98-.02z" fill="#1f339a" stroke="#1f339a" stroke-miterlimit="10" stroke-width="2"/></svg>
                    </div>
                    <div class="fdry-open-hours__cf">
                        <h4>Christmas Opening Hours</h4>
                        <?= get_field('holiday_opening_hours');  ?>
                    </div>
                </div>
                <?php endif; ?>

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
