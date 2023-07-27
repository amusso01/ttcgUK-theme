<?php

/**
 * The news post single template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

global $tertiaryPage, $tertiaryBanner, $title, $metaDescription, $metaImage;
$tertiaryBanner = '';
$tertiaryPage = true;

$title = $post->post_title . ' - ' . get_bloginfo('name');
$metaImage = $tertiaryBanner;
$metaDescription = limit_words($post->post_content, 20);

get_header(); 
?>

<?php get_template_part( 'components/header/header-marquee' ) ?>


    <main class="container mb-5 fdry-single-blog__main">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <h1 class="fdry-single-blog-title"><?php
                    the_title(); ?></h1>
                <?php
                echo '<span><i class="fa fa-calendar-alt"></i> ' . get_the_date('l jS F Y') . '</span><br/><br/>';?>
                <figure class="fdry-single-blog-figure">
                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="blog featured image">
                </figure>

                <div class="fdry-signle-blog__content">
                    <?php  the_content(); ?>
                </div>
            </div>
        </div>
    </main>


<?php

get_footer();
