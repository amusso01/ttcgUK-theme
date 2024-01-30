<?php

/**
 * The single finance example page
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */
global $branchCustom, $branch, $custom, $finances;
$finances = $post;

get_header(); ?>

<?php get_template_part('components/header/header-video') ?>
<?php get_template_part('components/header/header-image-banner') ?>
<?php get_template_part('components/header/header-marquee') ?>

<?php $ID = $finances->ID; ?>
<?php $rrp_finance = get_field('cash_price'); ?>



<div class="fdry-single-branch__hero">
  <div class="fdry-single-branch__hero-wrapper">
    <h1>Cars priced at <?= $finances->post_title ?></h1>
  </div>
</div>

<div class="fdry-single-finances__information">


  <div class="content-block">
    <?php get_template_part('components/pages/cars-loop') ?>
  </div>

</div>


<?php
get_footer();
