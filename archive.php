<?php
/**
 * The archive template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="sticky-top-banner" style="margin-bottom: 25px;">
    <!-- <img class="d-none d-md-block  w-100"
src="https://cdn.tradecentregroup.io/image/upload/v1683128679/TCG-Banner-Desktop.jpg?v=<?php echo date("HdmY"); ?>"/>
    <img class="d-md-none w-100" src="<?php echo $banner_sticky_mobile  ?>?v=<?php echo date("HdmY"); ?>"/> -->
    
    <div class="marquee_text">
        WE WANT YOUR PART-EX<span class="smaller" style=" font-weight:400; letter-spacing:0.1px; position:relative;"> AND </span>WE PAY MORE - <span style="color:#c21818">PUT US TO TEST! </span>
        &nbsp; WE WANT YOUR PART-EX<span class="smaller" style=" font-weight:400; letter-spacing:0.1px; position:relative;"> AND </span>WE PAY MORE - <span style="color:#c21818">PUT US TO TEST! </span>
    </div>
</div>
    <main class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <h1><?php single_cat_title(); ?></h1>
                <?php if (have_posts()) : while (have_posts()) :
                    the_post(); ?>

                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-success">Read more</a>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </main>
<?php
get_footer();
