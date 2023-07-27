<?php
/**
 * The page template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

global $post;
$title = $post->post_title . ' - ' . get_bloginfo('name');

get_header();
?>
    <main class="container">
        <?php
        if (have_posts()) : ?>
            <h1 class="mt-5"><?php
                echo $post->post_title; ?></h1>
            <div class="row justify-content-center">
                <div class="col">
                    <?php
                    while (have_posts()) {
                        the_post();

                        the_content();
                    }
                    ?>
                </div>
            </div>
        <?php
        endif; ?>
    </main>
<?php
get_template_part('template-parts/branch-locations', 'front-page');
get_footer();
