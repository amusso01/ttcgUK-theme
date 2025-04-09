<?php

/**
 * The layout for Filtering
 *
 * Template Name: Filter cars
 * 
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<?php get_template_part('components/header/header-image-banner') ?>

<main class="fdry-filter__main fdry-main" style="background-color: black;">
  <?php get_template_part('components/pages/cars-filter') ?>
</main>

<?php
get_footer();
