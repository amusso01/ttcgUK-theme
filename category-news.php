<?php
/**
 * The archive template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

global $tertiaryPage, $tertiaryBanner, $tertiaryBannerMobile, $title;
$tertiaryBanner = '/images/news.jpg?v=11-08-21.1';
$tertiaryBannerMobile = '/images/news-mob.jpg?v=11-08-21.1';
$tertiaryPage = true;

$title = 'News from ' . get_bloginfo('name');

get_header(); ?>

<?php get_template_part( 'components/header/header-marquee' ) ?>


<section class="container-fluid | tertiarypage news">
		

		
    <div class="container pb-3 fdry-catNews__wrapper-top">	
			
        <h1 class="text-left fdry-catNews-top__title">News</h1>
        <h2 class="text-left fdry-catNews-top__subtitle">Latest News</h2>
			
        <div class="wbctA" style="width: 100%; height: 100%; overflow: hidden;" data-name="onstipe">
            <script defer src=https://onstipe.com/web/js/webembed.js type="text/javascript"></script>
            <div class="wbctB" data-val="dvm53">

            </div>

        </div>

    </div>


    <div class="container pb-3 fdry-catNews__wrapper-bottom">	
			
        <h2 class="text-left fdry-catNews-top__subtitle">Blogs</h2>
			
        <div class="fdry-cat-blog__grid">
            <?php while (have_posts()) : the_post(); ?>
            <div class="fdry-blog-card">
                <div class="fdry-blog-card__wrapper">
                    <div class="fdry-blog-card-image">     
                        <a class="imagecontainer" href="<?php the_permalink(); ?>">
                        <figure>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                        </figure>
                        </a>
                    </div>
                    <div class="fdry-blog-card-info">
                        <h4><a href="<?php the_permalink(); ?>"><?php echo limit_words($post->post_title, 15) ?></a></h4>
                        <p class="fdry-blog-card-date"><?php echo date('jS F Y', strtotime($post->post_date)); ?></p>
                        <hr/>
                        <p class="fdry-blog-card-excerpt"><?php echo limit_words($post->post_excerpt, 20); ?></p>
                        <a class="fdry-btn" href="<?php the_permalink(); ?>">READ MORE </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
            <div class="row fdry-blog-pagination">
                <div class="col-12"><?php tcw_pagination(); ?>
            </div>
        </div>
    </div>
</section>



<div class="fdry-locations-other-branches fdry-blog-branches">
    <h3 class="fdry-locations-other-branches__title">OUR BRANCH LOCATIONS</h3>

    <?php get_template_part( 'components/pages/branches-loop' ) ?>

    
</div>

<?php

get_footer();
