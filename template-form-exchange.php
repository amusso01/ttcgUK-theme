<?php

/**
 * Template Name: Part EXchange
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */



get_header();
?>

<!-- 
<style>

</style> -->

<section class="fdry-banner-image-top">
	<div class="fdry-banner-image-top_wrapper">
			  <!-- DESKTOP VIDEO -->
			  <img class="fdry-banner-image-top__desktop fdry-banner-image" src="<?php echo get_field('main_banner_desktop'); ?>">
			  <!-- MOBILE -->
			  <img class="fdry-banner-image-top__mobile fdry-banner-image" src="<?php echo get_field('main_banner_mobile'); ?>">
	</div>
</section>

<section class="container-fluid | tertiarypage contactus">

  <div class="containerX" style="margin-bottom: 60px;">
    <?php do_shortcode('[part_exchange_form]') ?>

  </div>

  <div class="apr-rep-content container">
   
  </div>
</section>




<?php
get_footer();
