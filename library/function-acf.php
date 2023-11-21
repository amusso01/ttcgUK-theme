<?php

  /* ***** ----------------------------------------------- ***** **
  ** ***** ACF
  ** ***** ----------------------------------------------- ***** */

  if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page();

    $child = acf_add_options_sub_page(
        array(
            'page_title' => __('Banner Settings'),
            'menu_title' => __('Banner'),
            'parent_slug' => $parent['menu_slug'],
        )
    );
    $child = acf_add_options_sub_page(
        array(
          'page_title'  => __( 'Footer', 'bymattlee' ),
          'menu_title'  => __( 'Footer', 'bymattlee' ),
          'parent_slug' => $parent['menu_slug'],
        )
    );
    $child = acf_add_options_sub_page(
        array(
          'page_title'  => __( 'Header', 'bymattlee' ),
          'menu_title'  => __( 'Header', 'bymattlee' ),
          'parent_slug' => $parent['menu_slug'],
        )
    );
    $child = acf_add_options_sub_page(
      array(
        'page_title'  => __( 'Car cards', 'bymattlee' ),
        'menu_title'  => __( 'Car cards', 'bymattlee' ),
        'parent_slug' => $parent['menu_slug'],
      )
    );
  } 

?>