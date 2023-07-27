<?php 
$trustLogo = get_field('trustpilot_logo', 'option');
?>
<header class="fdry-sticky-top fdry-site-header content-block-header">

    <div class="fdry-site-header__wrapper">
      <div class="fdry-main-logo">
        <a href="<?= site_url()?>">
          <img src="<?= get_template_directory_uri() ?>/dist/images/tcw-logo.svg" alt="trade center logo">                        
        </a>
      </div>
  
      <div class="fdry-header-nav">
        <?php get_template_part( 'components/header/main-nav' ); ?>
      </div>
  
      <div class="fdry-header-trustpilot">
        <img src="<?= $trustLogo ?>" alt="trustpilot reviews logo">
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