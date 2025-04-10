<?php
$trustLogo = get_field('trustpilot_logo', 'option');
?>
<header class="fdry-sticky-top fdry-site-header content-block-header" style="top:53px">

  <div class="fdry-site-header__wrapper">
    <div class="fdry-main-logo">
      <a href="<?= site_url() ?>">
        <img src="<?= get_template_directory_uri() ?>/dist/images/TCUK_WEB.png" alt="trade center logo">
      </a>
    </div>

    <div class="fdry-header-nav">
      <?php get_template_part('components/header/main-nav'); ?>

      <a href="<?= site_url('/locations-landing') ?>" class="nav-map__mobile">
        <img class="pinmobile" src="<?php echo get_template_directory_uri(); ?>/dist/images/find-us-tradecentre.png">
      </a>
    </div>

    <div class="fdry-header-trustpilot">
      <img src="<?= $trustLogo ?>" alt="trustpilot reviews logo">
      <a href="<?= site_url('/locations-landing') ?>" class="nav-map__desktop"><i><?php get_template_part('svg-template/svg', 'google-maps-icon') ?></i></a>
    </div>

    <div class="fdry-hamburger">
      <a id="hamburger-menu" class="closed" href="#menu">
        <div class="hamburger-line top"></div>
        <div class="hamburger-line middle"></div>
        <div class="hamburger-line bottom"></div>
      </a>
    </div>
  </div>

</header>