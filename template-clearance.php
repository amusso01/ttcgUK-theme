<?php

/**
 * The layout for Cleareance
 *
 * Template Name: Clearance
 * 
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<?php get_template_part('components/header/header-video-clearance') ?>

<main class="fdry-main__front fdry-main">

  <h2 style="text-align: center; margin-top:25px"> <?= get_the_title() ?></h2>

  <?php get_template_part('components/pages/cars-loop-clearance') ?>

</main>

<?php
get_footer();
