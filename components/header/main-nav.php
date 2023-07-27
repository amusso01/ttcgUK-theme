<?php
/**
 * Primary Nav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

if ( has_nav_menu( 'header-menu' ) ) :
    wp_nav_menu([
        'theme_location'    => 'header-menu',
        'menu_id'           => 'menu_main-l',
        'container'         => 'nav',
        'container_class'   => 'site-header__item site-header__menu',
        'menu_class'        => 'menu-top-level'
    ]);
endif;