<?php

/**
 * The post single template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

global $tertiaryPage, $tertiaryBanner, $title, $metaDescription, $metaImage;
$tertiaryBanner = get_the_post_thumbnail_url();
$tertiaryPage = true;

$title = $post->post_title . ' - ' . get_bloginfo('name');
$metaImage = $tertiaryBanner;
$metaDescription = limit_words($post->post_content, 20);

get_header(); ?>
    <main class="container mb-5">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <h1><?php
                    the_title(); ?></h1>
                <?php
                echo '<span><i class="fa fa-calendar-alt"></i> ' . get_the_date('l jS F Y') . '</span><br/><br/>';

                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    }
                }
                ?>
            </div>
        </div>
    </main>
<?php
get_footer();
