<?php

// THIS FUNCTION REBUILD THE URL AND REDIRECT TO HOME THE REQUEST
// IF REMOVED THE SINGLE CAR CANNOT BE SEEN

function tcw_template_redirect()
{
    global $wp_query, $wp, $custom, $tertiaryBanner, $tertiaryBannerMobile, $tertiaryVideo, $tertiaryVideoMobile,
        $title, $similarCarTitle, $metaDescription, $metaImage, $customerPhotos, $tertiaryPage, $pageUrl, $area,
        $areaSuffix, $post, $carmake, $carmodel, $branch, $branchCustom, $saleMode, $saleModeDiscount, $carId;
    $pageUrl = str_replace(site_url() . '/', '', home_url($wp->request));

    $saleMode = get_option('tcw_sale_mode');
    if (isset($_GET['mode'])) {
        $saleMode = $_GET['mode'];
    }
    $saleModeDiscount = html_entity_decode(get_option('tcw_sale_discount'));

    $title = '';
    $similarCarTitle = '';
    $metaDescription = '';
    $metaImage = '';
    $customerPhotos = [];

    // BUILD THE SESSION PARAMS USED BY PLUGIN FINANCE FORM AND THE THEME
    $_SESSION['utm_source'] = (isset($_GET['utm_source'])) ? $_GET['utm_source'] : $_SESSION['utm_source'];
    $_SESSION['utm_medium'] = (isset($_GET['utm_medium'])) ? $_GET['utm_medium'] : $_SESSION['utm_medium'];
    $_SESSION['utm_content'] = (isset($_GET['utm_content'])) ? $_GET['utm_content'] : $_SESSION['utm_content'];
    $_SESSION['utm_campaign'] = (isset($_GET['utm_campaign'])) ? $_GET['utm_campaign'] : $_SESSION['utm_campaign'];
    $_SESSION['utm_term'] = (isset($_GET['utm_term'])) ? $_GET['utm_term'] : $_SESSION['utm_term'];
    $_SESSION['utm_gclid'] = (isset($_GET['gclid'])) ? $_GET['gclid'] : $_SESSION['utm_gclid'];
    $_SESSION['utm_make'] = (isset($_GET['make'])) ? $_GET['make'] : $_SESSION['utm_make'];
    $_SESSION['utm_model'] = (isset($_GET['model'])) ? $_GET['model'] : $_SESSION['utm_model'];
    $_SESSION['utm_category'] = (isset($_GET['utm_category'])) ? $_GET['utm_category'] : $_SESSION['utm_category'];
    $_SESSION['utm_price'] = (isset($_GET['utm_price'])) ? $_GET['utm_price'] : $_SESSION['utm_price'];
    $_SESSION['utm_vid'] = (isset($_GET['vid'])) ? $_GET['vid'] : $_SESSION['utm_vid'];
    $_SESSION['utm_fbclid'] = (isset($_COOKIE['_fbc'])) ? $_COOKIE['_fbc'] : $_SESSION['utm_fbclid'];

    // Reset the branch.
    if ($pageUrl === 'in/reset') {
        unset($_SESSION['areaBranch']);
        unset($_SESSION['areaBranchId']);
        unset($_SESSION['areaId']);
        unset($_SESSION['area']);
        unset($_SESSION['areaSuffix']);
        wp_redirect('/');
        exit;
    }

    if ($post) {
        if ($post->post_type === 'carmodel') {
            $carmodel = $post;
            if ($parent = get_post($post->post_parent)) {
                $carmake = $parent;
            }
        }
        if ($post->post_type === 'carmake') {
            $carmake = $post;
        }
    }

    $custom = get_post_custom($post->ID);
    $areaSuffix = '';

    $areaSlug = get_query_var('area');
    $carId = get_query_var('car_id');

    // Backup method of getting it.
    /*$areaCheck = explode('/in/', $wp->request);
    if (isset($areaCheck[1])) {
        $areaSlug = $areaCheck[1];
    }*/

    if (isset($wp_query->queried_object->taxonomy) && $wp_query->queried_object->taxonomy === 'areas') {
        // We are on the area
        $area = $wp_query->queried_object;
    } elseif (isset($areaSlug)) {
        $area = get_term_by('slug', sanitize_text_field($areaSlug), 'areas');
    }

    if ($area) {
        $args = [
            'fields' => 'ids',
            'post_type' => ['branch'],
            'posts_per_page' => '-1',
            'tax_query' => [
                [
                    'taxonomy' => 'areas',
                    'field' => 'slug',
                    'terms' => $area->slug
                ],
            ]
        ];

        $branches = new WP_Query($args);
        if ($branches->have_posts()) {
            $branchId = $branches->next_post();
            $branch = get_post($branchId);
            $_SESSION['areaBranch'] = $branch->post_title;
            $_SESSION['areaBranchId'] = $branch->ID;
        }

        $_SESSION['areaId'] = $area->term_id;
        $_SESSION['area'] = $area->name;
        $_SESSION['areaSuffix'] = '/in/' . $area->slug;
    }

    if (isset($_SESSION['areaSuffix'])) {
        $areaSuffix = $_SESSION['areaSuffix'];
    }

    if (!empty($carId)) {
        $branch = get_field('destination', $carId);
        $branchCustom = get_post_custom($branch->ID);
    } elseif (isset($_SESSION['areaBranchId'])) {
        $branch = get_post($_SESSION['areaBranchId']);
        $branchCustom = get_post_custom($_SESSION['areaBranchId']);
    }

    $tertiaryPage = false;
    $tertiaryBanner = '';
    $tertiaryBannerMobile = '';
    $tertiaryVideo = '';
    $tertiaryVideoMobile = '';
    if (isset($custom['tertiary_page']) && $custom['tertiary_page'][0] === '1') {
        $tertiaryPage = true;
        $tertiaryBanner = $custom['tertiary_banner'][0] ? $custom['tertiary_banner'][0] : '';
        $tertiaryBannerMobile = $custom['tertiary_banner_mobile'][0] ? $custom['tertiary_banner_mobile'][0] : '';
        $tertiaryVideo = $custom['tertiary_video'][0] ? $custom['tertiary_video'][0] : '';
        $tertiaryVideoMobile = $custom['tertiary_video_mobile'][0] ? $custom['tertiary_video_mobile'][0] : '';
    }
}
add_action('template_redirect', 'tcw_template_redirect');


function set_posts_per_page($query)
{
    global $wp_the_query;

    if ((!is_admin()) && ($query === $wp_the_query) && ($query->is_search())) {
        // $query->set('posts_per_page', 3);
    } elseif ((!is_admin()) && ($query === $wp_the_query) && ($query->is_archive())) {
        $query->set('posts_per_page', 9);
    }
    // Etc..

    return $query;
}
add_action('pre_get_posts', 'set_posts_per_page');

function tcw_template_include($template)
{
    global $templateName;
    //var_dump(is_page());die;
    //echo $templateName;
    //die;
    $templateName = $template;
    return $template;
}
add_filter('template_include', 'tcw_template_include');

function tcw_category_single_template($template)
{
    $categorySlugs = [];
    foreach (get_the_category() as $cat) {
        $categorySlugs[] = $cat->slug;
    }
    if (in_array('news', $categorySlugs)) {
        return get_template_directory() . '/single-news.php';
    }
    return $template;
}
add_filter('single_template', 'tcw_category_single_template');


function advanced_search_query($query)
{
    if ($query->is_search()) {
        if (isset($_GET['support'])) {
            $childCategories = get_categories(
                ['child_of' => 40]
            );
            $categories = [40];
            foreach ($childCategories as $category) {
                $categories[] = $category->cat_ID;
            }
            $query->set('category__in', $categories);
        }
        // tag search
        //if (isset($_GET['taglist']) && is_array($_GET['taglist'])) {
        //    $query->set('tag_slug__and', $_GET['taglist']);
        //}

        return $query;
    }
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

// + Cron jobs
function tcw_deactivate()
{
    wp_clear_scheduled_hook('tcw_cars_import_event');
}
