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
        'theme_location'    => 'footer-menu-bottom',
        'menu_id'           => 'footerMenu',
        'container'         => 'nav',
        'container_class'   => 'site-footer__menu',
        'menu_class'        => 'menu-footer-level'
    ]);
endif;