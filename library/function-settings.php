<?php 


function start_session()
{
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'start_session', 1);



function tcw_theme_support()
{
    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    //add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');
    add_post_type_support('post', 'page-attributes');
    add_action(
        'rest_api_init',
        function () {
            register_rest_field(
                'post',
                'menu_order',
                [
                    'get_callback' => function ($object) {
                        if (!isset($object['menu_order'])) {
                            return 0;
                        }

                        return (int)$object['menu_order'];
                    },
                    'schema' => [
                        'type' => 'integer',
                    ]
                ]
            );
        }
    );

    // ADDED SUPPORT FROM MY STARTER THEME
    add_theme_support( 'responsive-embeds' );
    		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));


		/* Gutenberg -> enable wide images
		/––––––––––––––––––––––––*/
		add_theme_support( 'align-wide' );
}
add_action('after_setup_theme', 'tcw_theme_support');

// TILL END OF THIS FUNCTION COMING FROM MY STERTER THEME
/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// remove unused stuff from wp_head()

function wpseed_wphead_cleanup () {
	// remove the generator meta tag
	remove_action('wp_head', 'wp_generator');
	// remove wlwmanifest link
	remove_action('wp_head', 'wlwmanifest_link');
	// remove RSD API connection
	remove_action('wp_head', 'rsd_link');
	// remove wp shortlink support
	remove_action('wp_head', 'wp_shortlink_wp_head');
	// remove next/previous links (this is not affecting blog-posts)
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	// remove generator name from RSS
	add_filter('the_generator', '__return_false');
	// disable emoji support
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	// disable automatic feeds
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'feed_links', 2);
	// remove rest API link
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
	// remove oEmbed link
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
	remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('after_setup_theme', 'wpseed_wphead_cleanup');

    /* 2.2 HIDE CORE-UPDATES FOR NON-ADMINS
  /––––––––––––––––––––––––––––––––––––*/
function onlyadmin_update() {
  if (!current_user_can('update_core')) { remove_action( 'admin_notices', 'update_nag', 3 ); }
}
add_action( 'admin_head', 'onlyadmin_update', 1 );







// ADD OPTIONIN SETTING
function tcw_admin_init()
{
    add_editor_style('style-editor.css');

    add_settings_section(
        'tcw_settings_section', // Section ID
        'Tradecentre Options', // Section Title
        'tcw_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field(
        'cns_representative_apr', // Option ID
        'Representative APR', // Label
        'tcw_small_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'tcw_settings_section', // Name of our section
        array( // The $args
            'cns_representative_apr' // Should match Option ID
        )
    );

    add_settings_field(
        'cns_closing_hour_weekdays', // Option ID
        'Closing Hour Weekdays', // Label
        'tcw_small_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'tcw_settings_section', // Name of our section
        array( // The $args
            'cns_closing_hour_weekdays' // Should match Option ID
        )
    );

    add_settings_field(
        'cns_closing_hour_weekends', // Option ID
        'Closing Hour Weekends', // Label
        'tcw_small_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'tcw_settings_section', // Name of our section
        array( // The $args
            'cns_closing_hour_weekends' // Should match Option ID
        )
    );

    // add_settings_field( // Sale Mode Discount
    //     'cns_opening_desktop_override', // Option ID
    //     'Yellow Opening Message Desktop Override', // Label
    //     'tcw_textbox_callback', // !important - This is where the args go!
    //     'general', // Page it will be displayed (General Settings)
    //     'tcw_settings_section', // Name of our section
    //     array( // The $args
    //         'cns_opening_desktop_override' // Should match Option ID
    //     )
    // );

    // add_settings_field( // Sale Mode Discount
    //     'cns_opening_mobile_override', // Option ID
    //     'Yellow Opening Message Mobile Override', // Label
    //     'tcw_textbox_callback', // !important - This is where the args go!
    //     'general', // Page it will be displayed (General Settings)
    //     'tcw_settings_section', // Name of our section
    //     array( // The $args
    //         'cns_opening_mobile_override' // Should match Option ID
    //     )
    // );

    // add_settings_field( // Sale Mode Switch
    //     'tcw_sale_mode', // Option ID
    //     'Sale Mode', // Label
    //     'tcw_sale_mode_callback', // !important - This is where the args go!
    //     'general', // Page it will be displayed (General Settings)
    //     'tcw_settings_section', // Name of our section
    //     array( // The $args
    //         'tcw_sale_mode' // Should match Option ID
    //     )
    // );

    // add_settings_field( // Sale Mode Discount
    //     'tcw_sale_discount', // Option ID
    //     'Sale Mode Discount Message', // Label
    //     'tcw_textbox_callback', // !important - This is where the args go!
    //     'general', // Page it will be displayed (General Settings)
    //     'tcw_settings_section', // Name of our section
    //     array( // The $args
    //         'tcw_sale_discount' // Should match Option ID
    //     )
    // );

    // add_settings_field( // Sale Mode Switch
    //     'tcw_special_offers', // Option ID
    //     'Show Special Offers', // Label
    //     'tcw_special_offers_callback', // !important - This is where the args go!
    //     'general', // Page it will be displayed (General Settings)
    //     'tcw_settings_section', // Name of our section
    //     array( // The $args
    //         'tcw_special_offers' // Should match Option ID
    //     )
    // );

    // add_settings_field( // Sale Mode Discount
    //     'tcw_special_offers_header', // Option ID
    //     'Special Offers Header', // Label
    //     'tcw_textbox_callback', // !important - This is where the args go!
    //     'general', // Page it will be displayed (General Settings)
    //     'tcw_settings_section', // Name of our section
    //     array( // The $args
    //         'tcw_special_offers_header' // Should match Option ID
    //     )
    // );

    /*add_settings_field( // Option 2
        'option_2', // Option ID
        'Option 2', // Label
        'tcw_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'tcw_settings_section', // Name of our section (General Settings)
        array( // The $args
            'option_2' // Should match Option ID
        )
    );*/

    register_setting('general', 'cns_representative_apr', 'esc_attr');
    register_setting('general', 'cns_closing_hour_weekends', 'esc_attr');
    register_setting('general', 'cns_closing_hour_weekdays', 'esc_attr');
    // register_setting('general', 'cns_opening_desktop_override', 'esc_attr');
    // register_setting('general', 'cns_opening_mobile_override', 'esc_attr');
    // register_setting('general', 'tcw_sale_mode', 'esc_attr');
    // register_setting('general', 'tcw_sale_discount', 'esc_attr');
    // register_setting('general', 'tcw_special_offers', 'esc_attr');
    // register_setting('general', 'tcw_special_offers_header', 'esc_attr');
}
add_action('admin_init', 'tcw_admin_init');

function tcw_section_options_callback()
{ // Section Callback
    echo '<p>You can put the site into sale mode here.</p>';
}

function tcw_small_textbox_callback($args)
{  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="' . $args[0] . '" name="' . $args[0] . '" value="' . $option . '" size="10" />';
}

function tcw_textbox_callback($args)
{  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="' . $args[0] . '" name="' . $args[0] . '" value="' . $option . '" size="100" />';
}


// function tcw_sale_mode_callback($args)
// {
//     $option = get_option($args[0]);

//     $choices = [
//         LISTING_NORMAL_MODE => 'Normal',
//         LISTING_SALE_MODE => 'Sale',
//         LISTING_FROM_MODE => 'From Price',
//         LISTING_CAR_MODE => 'Car List'
//     ];

//     echo '<select id="' . $args[0] . '" name="' . $args[0] . '">';
//     foreach ($choices as $k => $v) {
//         echo '<option value="' . $k . '" ' . selected($k, $option) . '>' . $v . '</option>';
//     }
//     echo '</select>';
// }

// function tcw_special_offers_callback($args)
// {
//     $option = get_option($args[0]);

//     $choices = [
//         SPECIAL_OFFERS_OFF => 'Off',
//         SPECIAL_OFFERS_ON => 'On'
//     ];

//     echo '<select id="' . $args[0] . '" name="' . $args[0] . '">';
//     foreach ($choices as $k => $v) {
//         echo '<option value="' . $k . '" ' . selected($k, $option) . '>' . $v . '</option>';
//     }
//     echo '</select>';
// }



// function tcw_checkbox_callback($args)
// {  // Checkbox Callback
//     $option = get_option($args[0]);
//     echo '<input type="checkbox" id="' . $args[0] . '" name="' . $args[0] . '" value="1" ' . checked(
//         1,
//         $option,
//         false
//     ) . ' />';
// }


/*==================================================================================
  4.0 SETUP WP-MENUS
==================================================================================*/
// loads wordpress-menus, add your custom menus here or remove if not needed
// by default, only 'mainmenu' is shown
// => https://codex.wordpress.org/Function_Reference/register_nav_menus
function wpseed_register_theme_menus() {
  register_nav_menus([
    'header-menu' => __('Header Menu', 'theme'),
    'footer-menu-top' => __('Footer Top', 'theme'),
    'footer-menu-bottom' => __('Footer Bottom', 'theme'),
  ]);
}
add_action( 'init', 'wpseed_register_theme_menus');

/*==================================================================================
  STYLE REGISTER
==================================================================================*/
function load_stylesheets()
{
    // BOOTSTRAP 
    wp_register_style(
        'bootstrap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css',
        [],
        '4.0.0',
        'all'
    );
    wp_enqueue_style('bootstrap');

    // OWL CAROUSEL REMOVED
    // wp_register_style(
    //     'owlcarousel',
    //     'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
    //     [],
    //     '4.0.0',
    //     'all'
    // );
    // wp_enqueue_style('owlcarousel');

    //FONTAWESOME REMOVED
    // wp_register_style(
    //     'fontawesome',
    //     'https://pro.fontawesome.com/releases/v5.15.1/css/all.css',
    //     [],
    //     '4.0.0',
    //     'all'
    // );
    // wp_enqueue_style('fontawesome');

    wp_register_style(
        'tcw',
        get_template_directory_uri() . '/tradecentrewales.css',
        [],
        '30-07-21.1',
        'all'
    );
    wp_enqueue_style('tcw');

    wp_register_style( 
          'foundry-styles', 
          get_template_directory_uri() . '/dist/styles/' . '/main.css', 
          [], 
          '1.0', 
          'all' 
    );
		wp_enqueue_style( 'foundry-styles' );


    if (get_page_template_slug() === 'page-finance-application.php') {
      // ADD IT TO THIS PAGE SEEMS TO BE REQUIRED
        wp_register_style(
            'bootstrap',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css',
            [],
            '4.0.0',
            'all'
        );
        wp_enqueue_style('bootstrap');


        $version53D = '1.0.0';
        wp_register_style(
            '53d-bootstrap-icons',
            'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css',
            [],
            $version53D,
            'all'
        );
        wp_enqueue_style('53d-bootstrap-icons');
      
        wp_register_style(
            '53d-predictiveaddress',
            'https://webservices.data-8.co.uk/content/predictiveaddress.css',
            [],
            $version53D,
            'all'
        );
        wp_enqueue_style('53d-predictiveaddress');
      
        wp_register_style(
            '53d-slider',
            'https://tcg-creditapp.53dnorth.com/assets/css/slider.css',
            [],
            $version53D,
            'all'
        );
        wp_enqueue_style('53d-slider');
      
        wp_register_style(
            '53d-loader',
            'https://tcg-creditapp.53dnorth.com/assets/css/loader.css',
            [],
            $version53D,
            'all'
        );
        wp_enqueue_style('53d-loader');
      
        wp_register_style(
            '53d-styles',
            'https://tcg-creditapp.53dnorth.com/assets/css/styles.css',
            [],
            $version53D,
            'all'
        );
        wp_enqueue_style('53d-styles');
      
        wp_register_style(
            '53d-stepper',
            'https://tcg-creditapp.53dnorth.com/assets/css/stepper.css',
            [],
            $version53D,
            'all'
        );
        wp_enqueue_style('53d-stepper');
    }
}
add_action('wp_enqueue_scripts', 'load_stylesheets');


/*==================================================================================
  SCRIPT REGISTER
==================================================================================*/
function load_javascript()
{
    wp_deregister_script('jquery');
    wp_register_script(
        'jquery',
        'https://code.jquery.com/jquery-3.4.1.min.js',
        [],
        '3.4.1',
        true
    );
    wp_enqueue_script('jquery');

    wp_deregister_script('axios');
    wp_register_script(
        'axios',
        'https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js',
        [],
        '0.19.2',
        true
    );
    wp_enqueue_script('axios');


    wp_deregister_script('qs');
    wp_register_script(
        'qs',
        'https://cdnjs.cloudflare.com/ajax/libs/qs/6.9.4/qs.min.js',
        [],
        '6.9.4',
        true
    );
    wp_enqueue_script('qs');

    // NOT SURE ABOUT THIS LEFT THE FILE IN JS FOLDER
    // wp_deregister_script('contenttabs');
    // wp_register_script(
    //     'contenttabs',
    //     get_template_directory_uri() . '/js/components/contenttabs.js',
    //     [],
    //     '1.0',
    //     true
    // );
    // wp_enqueue_script('contenttabs');

    // SAME AS THE COMMENT ABOVE, NO THIS IS REQUIRED FOR
    wp_deregister_script('carlisting');
    wp_register_script(
        'carlisting',
        get_template_directory_uri() . '/js/components/carlisting.js',
        [],
        '01-06-21.2',
        true
    );
    wp_enqueue_script('carlisting');

    // wp_deregister_script('pxval');
    // wp_register_script(
    //     'pxval',
    //     get_template_directory_uri() . '/js/components/pxval.js',
    //     [],
    //     '1.0',
    //     true
    // );
    // wp_enqueue_script('pxval');

    // wp_deregister_script('gmaps');
    // wp_register_script(
    //     'gmaps',
    //     get_template_directory_uri() . '/js/components/gmaps.js',
    //     [],
    //     '1.0',
    //     true
    // );
    // wp_enqueue_script('gmaps');

    // wp_register_script( 
    //   'bootstrap',
    //   'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js', 
    //   array(), 
    //   '1.0', 
    //   true 
    // );
    // wp_enqueue_script( 'bootstrap' );

    wp_register_script( 
      'foundry-js',
      get_template_directory_uri() . '/dist/scripts/' . 'main.js', 
      array(), 
      '1.0', 
      true 
    );
    wp_enqueue_script( 'foundry-js' );

    wp_localize_script(
        'site',
        'wpApiSettings',
        [
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest'),
        ]
    );
    
    if (get_page_template_slug() === 'page-finance-application.php') {
        $version53D = '1.01';
        wp_deregister_script('53d-moment');
        wp_register_script(
            '53d-moment',
            'https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js',
            [],
            $version53D,
            true
        );
        wp_enqueue_script('53d-moment');
    
        wp_deregister_script('53d-underscore');
        wp_register_script(
            '53d-underscore',
            'https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.6/underscore-min.js',
            [],
            $version53D,
            true
        );
        wp_enqueue_script('53d-underscore');
    
        wp_deregister_script('53d-clndr');
        wp_register_script(
            '53d-clndr',
            'https://cdnjs.cloudflare.com/ajax/libs/clndr/1.1.0/clndr.min.js',
            [],
            $version53D,
            true
        );
        wp_enqueue_script('53d-clndr');
    
        wp_deregister_script('53d-predictiveaddress');
        wp_register_script(
            '53d-predictiveaddress',
            'https://webservices.data-8.co.uk/javascript/predictiveaddress.js',
            [],
            $version53D,
            true
        );
        wp_enqueue_script('53d-predictiveaddress');
    
        wp_deregister_script('53d-EmailValidation');
        wp_register_script(
            '53d-EmailValidation',
            'https://webservices.data-8.co.uk/Javascript/Loader.ashx?key=EEHK-HJJC-3V5M-Q9YT&load=EmailValidation',
            [],
            $version53D,
            true
        );
        wp_enqueue_script('53d-EmailValidation');
        
        wp_deregister_script('53d-app');
        wp_register_script(
            '53d-app',
            'https://tcg-creditapp.53dnorth.com/assets/js/app-v2.js',
            [],
            $version53D,
            true
        );
        wp_enqueue_script('53d-app');
    }
}
add_action('wp_enqueue_scripts', 'load_javascript');

