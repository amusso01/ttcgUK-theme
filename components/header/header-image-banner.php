<?php
$options = get_field('front_page', 'options');
$banner_top_desktop_front_page = $options['top_desktop'];
$banner_top_mobile_front_page = $options['top_mobile'];
$bannerUrl = $options['top_banner_url'];
?>

<section class="fdry-banner-image-top">
  <div class="fdry-banner-image-top_wrapper">
    <?php if ($bannerUrl) : ?>
      <a href="<?= $bannerUrl ?>">
      <?php endif; ?>
      <!-- DESKTOP VIDEO -->
      <img class="fdry-banner-image-top__desktop fdry-banner-image" src="<?php echo $banner_top_desktop_front_page; ?>?v=<?php echo date("HdmY"); ?>" />
      <!-- MOBILE -->
      <img class="fdry-banner-image-top__mobile fdry-banner-image" src="<?php echo $banner_top_mobile_front_page; ?>?v=<?php echo date("HdmY"); ?>" />
      <?php if ($bannerUrl) : ?>
      </a>
    <?php endif; ?>
  </div>
</section>