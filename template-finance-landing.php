<?php

/**
 * The layout for finance landing page
 *
 * Template Name: Finance Landing
 * 
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

get_header('finance-landing');

$trustLogo = get_field('trustpilot_logo', 'option');

$applyUrl = get_field('url_apply')
?>

<main class="fdry-finance-landing__front fdry-finance-landing">

  <section class="fdry-finance-landing-hero">
    <div class="content-block">
      <div class="fdry-finance-landing-hero-grid">
        <div class="fdry-finance-landing-hero__content">
          <img src="<?= $trustLogo ?>" alt="trustpilot reviews logo">
          <h1>CAR FINANCING <br> MADE SIMPLE</h1>
          <a href="<?= $applyUrl ?>" class="fdry-btn-locations">APPLY NOW</a>
        </div>

      </div>
    </div>
  </section>
  <div class="credit-impact">
    <p>No impact on your credit score</p>
  </div>


  <!-- FREE 30 SEC Section -->
  <section class="fdry-finance-landing__30sec">
    <div class="content-block">
      <div class="fdry-finance-landing__30sec-content">
        <h4>FREE 30 SECOND FINANCE CHECK</h4>
        <a href="<?= $applyUrl ?>" class="fdry-btn-locations">GET A DECISION IN 60 SECONDS</a>
        <p>No impact on your credit score</p>
      </div>
    </div>
  </section>

  <!-- CAR CAROUSEL -->
  <?php get_template_part('components/pages/car-slider'); ?>

  <!-- FAQ -->
  <?php get_template_part('components/pages/accordion'); ?>

</main>

<?php
get_footer();
