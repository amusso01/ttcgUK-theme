<?php

/**
 * The search results template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

get_header();
global $wp_query;
?>
    <main>
        <div class="container search-container mb-5">
            <div class="row">
                <div class="col">
                    <?php
                    if (have_posts()) {
                        ?>
                        <h1><?php
                            /* translators: %s Search value. */
                            printf(
                                __('You searched for <strong>\'%s\'</strong> with <strong>%s results</strong>', 'tlbs'),
                                '<span>' . get_search_query() . '</span>',
                                $wp_query->found_posts
                            );
                            ?></h1>
                        <?php
                        echo tcw_full_page_search_form();
                        while (have_posts()) {
                            the_post();
                            $custom = get_post_custom();

                            get_template_part('content', 'search');
                        }
                        ?>
                        <hr/><?php
                        tcw_pagination();
                    } else {
                        get_template_part('no-results', 'search');
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();
