<?php

// FINANCE CPT
function tcw_define_finance_post_type()
{
    $post_type = 'financeexample';
    $args = [
        'supports' => [
            'title',
            //'editor',
            'custom-fields',
            'post-formats'
        ],
        'labels' => [
            'name' => 'Finances',
            'singular_name' => 'Finance',
            'add_new' => 'Add New Finance',
            'add_new_item' => 'Add New Finance',
            'edit_item' => 'Edit Finance',
            'new_item' => 'New Finance',
            'all_items' => 'All Finances',
            'view_item' => 'View Finance',
            'search_items' => 'Search Finances',
            'not_found' => 'No finance found',
            'not_found_in_trash' => 'No Finances found in Bin',
            'menu_name' => 'Finances',
        ],
        'public' => true,
        'hierarchical' => false,
        'has_archive' => true,
    ];
    register_post_type($post_type, $args);
}
add_action('init', 'tcw_define_finance_post_type');

// MODIFY BACKEND COLUMN NAME FOR FINANCES
// ===== TODO add  new custom field monthly fixed and credit  ======
function tcw_finance_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'title' => __('Weekly Price', 'calculation'),
        'cash_price' => __('Cash Price', 'calculation'),
        'deposit' => __('Deposit', 'calculation'),
        'credit_amount' => __('Credit Amount', 'calculation'),
        'final_payment' => __('Final Payment', 'calculation'),
        'monthly_amount' => __('Monthly Amount', 'calculation'),
        'monthly_amount' => __('Monthly Amount', 'calculation'),
        'apr' => __('Apr', 'calculation'),
        'total_amount' => __('Total Amount', 'calculation'),
        'term' => __('Term', 'calculation'),
        'date' => $columns['date'],
    ];
}
add_filter('manage_financeexample_posts_columns', 'tcw_finance_columns');

function tcw_finance_column($column, $post_id)
{
    $columns = [
        'cash_price',
        'deposit',
        'credit_amount',
        'final_payment',
        'monthly_amount',
        'apr',
        'total_amount',
        'term',
    ];
    if (in_array($column, $columns)) {
        $field = get_post_meta($post_id, $column, true);
    }

    if (isset($field)) {
        echo $field;
    }
}
add_action('manage_financeexample_posts_custom_column', 'tcw_finance_column', 10, 2);

// CARMAKE CPT
function tcw_define_car_make_post_type()
{
    $post_type = 'carmake';
    $args = [
        'supports' => [
            'title',
            'editor',
            'custom-fields',
            'post-formats'
        ],
        'labels' => [
            'name' => 'Car Makes',
            'singular_name' => 'Car Make',
            'add_new' => 'Add New Car Make',
            'add_new_item' => 'Add New Car Make',
            'edit_item' => 'Edit Car Make',
            'new_item' => 'New Car Make',
            'all_items' => 'All Car Makes',
            'view_item' => 'View Car Make',
            'search_items' => 'Search Car Makes',
            'not_found' => 'No car make found',
            'not_found_in_trash' => 'No Car Make found in Bin',
            'menu_name' => 'Car Makes',
        ],
        'rewrite' => ['slug' => 'cars'],
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
    ];
    register_post_type($post_type, $args);
}
add_action('init', 'tcw_define_car_make_post_type');

// MODIFY BACKEND COLUMN NAME FOR CARMAKE
function tcw_carmake_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'title' => __('Make', 'calculation'),
        'content' => __('Description', 'calculation'),
        'date' => $columns['date'],
    ];
}
add_filter('manage_carmake_posts_columns', 'tcw_carmake_columns');

function tcw_carmake_column($column, $post_id)
{
    $columns = [
        'make',
    ];
    if (in_array($column, $columns)) {
        $field = get_post_meta($post_id, $column, true);
    }

    if ($column === 'content') {
        if ($page = get_post($post_id)) {
            $field = limit_words(apply_filters('the_content', $page->post_content), 25);
        }
    }

    if (isset($field)) {
        echo $field;
    }
}
add_action('manage_carmake_posts_custom_column', 'tcw_carmake_column', 10, 2);

// CARMODEL CPT
function tcw_define_car_model_post_type()
{
    $post_type = 'carmodel';
    $args = [
        'supports' => [
            'title',
            'editor',
            'custom-fields',
            'thumbnail',
            'post-formats'
        ],
        'labels' => [
            'name' => 'Car Models',
            'singular_name' => 'Car Model',
            'add_new' => 'Add New Car Model',
            'add_new_item' => 'Add New Car Model',
            'edit_item' => 'Edit Car Model',
            'new_item' => 'New Car Model',
            'all_items' => 'All Car Models',
            'view_item' => 'View Car Model',
            'search_items' => 'Search Car Models',
            'not_found' => 'No car model found',
            'not_found_in_trash' => 'No Car Model found in Bin',
            'menu_name' => 'Car Models',
        ],
        'public' => true,
        'hierarchical' => false,
        'has_archive' => true,
    ];
    register_post_type($post_type, $args);
}
add_action('init', 'tcw_define_car_model_post_type');

// ADD column to CPT in backend  for CAR MODEL ?

function tcw_add_meta_boxes()
{
    add_meta_box('carmodel-parent', 'Make', 'tcw_carmodel_attributes_meta_box', 'carmodel', 'side', 'high');
}

add_action('add_meta_boxes', 'tcw_add_meta_boxes');

function tcw_carmodel_attributes_meta_box($post)
{
    $post_type_object = get_post_type_object($post->post_type);
    $pages = wp_dropdown_pages(
        array(
            'post_type' => 'carmake',
            'selected' => $post->post_parent,
            'name' => 'parent_id',
            'show_option_none' => __('(no parent)'),
            'sort_column' => 'menu_order, post_title',
            'echo' => 0
        )
    );
    if (!empty($pages)) {
        echo $pages;
    }
}

// REWRITE CPT URL 
function tcw_add_rewrite_rules()
{
    // Car Makes
    add_rewrite_rule('^cars/([^/]+)/in/([^/]+)$', 'index.php?carmake=$matches[1]&area=$matches[2]', 'top');

    // Car Models
    add_rewrite_tag('%carmodel%', '([^/]+)', 'carmodel=');
    add_permastruct('carmodel', '/cars/%carmake%/%carmodel%', false);
    add_rewrite_rule('^cars/([^/]+)/([^/]+)$', 'index.php?carmodel=$matches[2]', 'top');
    add_rewrite_rule('^cars/([^/]+)/([^/]+)/([0-9]{1,})$', 'index.php?carmodel=$matches[2]&car_id=$matches[3]', 'top');
    add_rewrite_rule('^cars/([^/]+)/([^/]+)/in/([^/]+)$', 'index.php?carmodel=$matches[2]&area=$matches[3]', 'top');

    // News
    add_rewrite_rule('news/page/?([0-9]{1,})/?$', 'index.php?category_name=news&paged=$matches[1]', 'top');
}
add_action('init', 'tcw_add_rewrite_rules');


function tcw_query_var($query_vars)
{
    $query_vars[] = 'area';
    $query_vars[] = 'car_id';
    return $query_vars;
}
add_filter('query_vars', 'tcw_query_var');

function tcw_permalinks($permalink, $post, $leavename)
{
    $post_id = $post->ID;
    if ($post->post_type != 'carmodel' || empty($permalink) || in_array(
        $post->post_status,
        array('draft', 'pending', 'auto-draft')
    )) {
        return $permalink;
    }

    $parent = $post->post_parent;
    $parent_post = get_post($parent);

    $permalink = str_replace('%carmake%', $parent_post->post_name, $permalink);

    return $permalink;
}

add_filter('post_type_link', 'tcw_permalinks', 10, 3);

function tcw_carmodel_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'make' => __('Make', 'calculation'),
        'title' => __('Model', 'calculation'),
        'core_range' => __('Core Model', 'calculation'),
        'content' => __('Description', 'calculation'),
        'sale_mode_override' => __('Sale Mode Override', 'calculation'),
        'from_price' => __('From Price', 'calculation'),
        'date' => $columns['date'],
    ];
}

add_filter('manage_carmodel_posts_columns', 'tcw_carmodel_columns');

function tcw_carmodel_column($column, $post_id)
{
    $columns = [
        'make',
        'core_range',
        'sale_mode_override',
        'from_price',
    ];
    if (in_array($column, $columns)) {
        $field = wp_strip_all_tags(get_post_meta($post_id, $column, true));
    }

    if ($column === 'content') {
        if ($page = get_post($post_id)) {
            $field = limit_words(apply_filters('the_content', $page->post_content), 25);
        }
    }

    if ($column === 'core_range') {
        $field = $field ? 'Yes' : 'No';
    }

    if ($column === 'make') {
        $post = get_post($post_id);
        if ($post->post_parent) {
            $parent = get_post($post->post_parent);
            $field = '<a href="/wp-admin/post.php?post=' . $parent->ID . '&action=edit">' . $parent->post_title . '</a>';
        } else {
            unset($field);
        }
    }

    if (isset($field)) {
        echo $field;
    }
}

add_action('manage_carmodel_posts_custom_column', 'tcw_carmodel_column', 10, 2);

function tcw_define_car_model_taxonomy()
{
    $taxonomy = 'cartype';
    $object_type = 'carmodel';
    $args = [
        'labels' => [
            'name' => 'Car Type',
            'singular_name' => 'Car Types',
            'search_items' => 'Car Types',
            'all_items' => 'All Car Types',
            'parent_item' => 'Parent Car Type',
            'parent_item_colon' => 'Parent Car Type:',
            'edit_item' => 'Edit Car Type',
            'update_item' => 'Update Car Type',
            'add_new_item' => 'Add New Car Type',
            'new_item_name' => 'New Car Type Name',
            'menu_name' => 'Car Types',
            'view_item' => 'View Car Types'
        ],
        'hierarchical' => true,
        'has_archive' => false,
        'query_var' => true,
        'rewrite' => true,
    ];
    register_taxonomy($taxonomy, $object_type, $args);
}

add_action('init', 'tcw_define_car_model_taxonomy');

function tcw_define_car_post_type()
{
    $post_type = 'car';
    $args = [
        'supports' => [
            'title',
            'editor',
            'custom-fields',
            'post-formats'
        ],
        'labels' => [
            'name' => 'Cars',
            'singular_name' => 'Car',
            'add_new' => 'Add New Car',
            'add_new_item' => 'Add New Car',
            'edit_item' => 'Edit Car',
            'new_item' => 'New Car',
            'all_items' => 'All Car',
            'view_item' => 'View Car',
            'search_items' => 'Search Cars',
            'not_found' => 'No car found',
            'not_found_in_trash' => 'No Car found in Bin',
            'menu_name' => 'Cars',
        ],
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
    ];
    register_post_type($post_type, $args);
}

add_action('init', 'tcw_define_car_post_type');

function tcw_car_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'make' => __('Make', 'calculation'),
        'model' => __('Model', 'calculation'),
        'title' => $columns['title'],
        'id' => __('ID', 'calculation'),
        'featured' => __('Featured', 'calculation'),
        'mileage' => __('Mileage', 'calculation'),
        'reg_number_with_space' => __('Reg No.', 'calculation'),
        'discounted_price' => __('Discount Price', 'calculation'),
        'content' => __('Description', 'calculation'),
        'location' => __('Location', 'calculation'),
        'date' => $columns['date'],
    ];
}

add_filter('manage_car_posts_columns', 'tcw_car_columns');

function tcw_car_column($column, $post_id)
{
    $columns = [
        'make',
        'model',
        'location',
        'reg_number_with_space',
        'discounted_price',
        'featured',
        'id',
        'mileage'
    ];
    if (in_array($column, $columns)) {
        $field = get_post_meta($post_id, $column, true);
    }

    if ($column === 'content') {
        if ($page = get_post($post_id)) {
            $field = limit_words(apply_filters('the_content', $page->post_content), 25);
        }
    }

    if ($column === 'make' || $column === 'model' || $column === 'location') {
        $post = get_post($field);
        $field = '<a href="/wp-admin/post.php?post=' . $post->ID . '&action=edit">' . $post->post_title . '</a>';
    }

    if ($column === 'id') {
        $field = $post_id;
    }

    if (isset($field)) {
        echo $field;
    }
}

add_action('manage_car_posts_custom_column', 'tcw_car_column', 10, 2);

function tcw_sortable_car_column($columns)
{
    $columns['make'] = 'make';
    $columns['model'] = 'model';

    return $columns;
}

add_filter('manage_edit-car_sortable_columns', 'tcw_sortable_car_column');

// Branches
function tcw_define_branch_type_taxonomy()
{
    $taxonomy = 'areas';
    $object_type = 'branch';
    $args = [
        'labels' => [
            'name' => 'Areas',
            'singular_name' => 'Area',
            'search_items' => 'Search Areas',
            'all_items' => 'All Areas',
            'parent_item' => 'Parent Areas',
            'parent_item_colon' => 'Parent Areas:',
            'edit_item' => 'Edit Area',
            'update_item' => 'Update Area',
            'add_new_item' => 'Add New Area',
            'new_item_name' => 'New Area',
            'menu_name' => 'Areas',
            'view_item' => 'View Areas'
        ],

        'hierarchical' => true,
        'has_archive' => false,
        'query_var' => true,
        'rewrite' => ['slug' => 'in'],
    ];
    register_taxonomy($taxonomy, $object_type, $args);
}

add_action('init', 'tcw_define_branch_type_taxonomy');

function tcw_define_branches_post_type()
{
    $post_type = 'branch';
    $args = [
        'supports' => [
            'title',
            'thumbnail',
            'custom-fields',
            'post-formats',
            'page-attributes'
        ],
        'labels' => [
            'name' => 'Branches',
            'singular_name' => 'Branch',
            'add_new' => 'Add New Branch',
            'add_new_item' => 'Add New Branch',
            'edit_item' => 'Edit Branch',
            'new_item' => 'New Branch',
            'all_items' => 'All Branches',
            'view_item' => 'View Branch',
            'search_items' => 'Search Branches',
            'not_found' => 'No branch found',
            'not_found_in_trash' => 'No Branch found in Bin',
            'menu_name' => 'Branches',
        ],
        'rewrite' => ['slug' => 'branches'],
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
    ];
    register_post_type($post_type, $args);
}

add_action('init', 'tcw_define_branches_post_type');
