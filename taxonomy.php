<?php

/**
 * The areas taxonomy template file
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

global $post;
$pageTerm = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$children = get_term_children($pageTerm->term_id, $pageTerm->taxonomy);
$termCustom = get_fields($pageTerm->taxonomy . '_' . $pageTerm->term_id);

//$post = get_page_by_path('mortgage-type-template');

$page = 1;
$more = 1;
$preview = '';
$pages[] = $post->post_content;

get_header();
?>
    <main>
        <?php the_content(); ?>
    </main>
<?php
get_footer();
