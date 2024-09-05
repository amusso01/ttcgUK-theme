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

  <!-- BENEFITS -->
  <section class="benefits">
    <div class="content-max">
      <h2>Why Choose Trade Centre UK?</h2>
      <p class="description"><?php echo get_field('benefits_description'); ?></p>

      <div class="checkmarks-container">
        <?php 
          if( have_rows('benefits_points') ):
              while( have_rows('benefits_points') ) : the_row(); ?>
                <div class="checkmark-item">
                  <svg width="80px" height="60px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="Interface / Check_Big">
                    <path id="Vector" d="M4 12L8.94975 16.9497L19.5572 6.34326" stroke="#12C951" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                  </svg>
                  <p><?php echo get_sub_field('benefit'); ?></p>
                </div>
        <?php
              endwhile;
          endif;
        ?>
      </div>
      <center>
          <a href="/finance-check" class="fdry-btn-locations">APPLY NOW</a>
      </center>
    </div>
  </section>

  <!-- CAR CAROUSEL -->
  <?php get_template_part('components/pages/car-slider'); ?>

  <!-- How works -->
  <section class="howworks">
    <div class="content-max">
        <h2>HOW DOES IT WORK?</h2>
        <p class="description"><?php echo get_field('how_does_it_work_description'); ?></p>

        <div class="stepboxes">
          <div class="stepscontainer">
            <?php 
              if( have_rows('steps') ):
                  while( have_rows('steps') ) : the_row(); ?>
                    <div class="step-item">
                      <div class="step-header"><span>STEP <?php echo get_row_index(); ?></span></div>
                      <div class="step-body">
                        <?php echo get_sub_field('step'); ?>
                      </div>
                    </div>
            <?php
                  endwhile;
              endif;
            ?>
          </div>
        </div>
        <center>
          <a href="/finance-check" class="fdry-btn-locations">NEXT STEPS</a>
      </center>

    </div>
  </section>

  <!-- FAQ -->
  <?php get_template_part('components/pages/accordion'); ?>

</main>

<?php
get_footer();
