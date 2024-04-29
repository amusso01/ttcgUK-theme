<?php

/**
 * The layout for Cleareance
 *
 * Template Name: Career Landing
 * 
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<main class="fdry-career__front fdry-career">


  <?php get_template_part('components/pages/career-hero-video'); ?>

  <?php get_template_part('components/pages/career-hiring'); ?>

  <?php get_template_part('components/pages/carrer-why-work'); ?>

  <?php get_template_part('components/pages/career-images-text'); ?>

  <?php get_template_part('components/pages/career-testimonials'); ?>

  <!-- JOBS -->
  <div class="content-block content-max" style="margin: 50px 50px 70px;" id='jobs'>
    <h3 style="text-align:center; margin-bottom:50px">Open Positions</h3>

    <?php echo do_shortcode('[awsmjobs]'); ?>
  </div>

  <?php get_template_part('components/pages/career-logos'); ?>

  <?php get_template_part('components/pages/career-gallery'); ?>


  <?php get_template_part('components/pages/career-map'); ?>

</main>

<?php
get_footer();
