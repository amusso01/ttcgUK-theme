<?php

/**
 * The layout for birmingham shutdown
 *
 * Template Name: Birmingham South Notice
 * 
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<?php
$banner_top_desktop_front_page = get_field('banner_image');
$banner_top_mobile_front_page = get_field('banner_image_mobile');
$isVideo = get_field('is_video');

?>
<?php if (!$isVideo) : ?>
  <section class="fdry-banner-image-top">
    <div class="fdry-banner-image-top_wrapper">
      <!-- DESKTOP VIDEO -->
      <img class="fdry-banner-image-top__desktop fdry-banner-image" src="<?php echo $banner_top_desktop_front_page; ?>?v=<?php echo date("HdmY"); ?>" />
      <!-- MOBILE -->
      <img class="fdry-banner-image-top__mobile fdry-banner-image" src="<?php echo $banner_top_mobile_front_page; ?>?v=<?php echo date("HdmY"); ?>" />
    </div>
  </section>
<?php else : ?>

  <section class="fdry-banner-video-top">
    <div class="video_wrapper">
      <!-- DESKTOP VIDEO -->
      <video class="fdry-video fdry-video-desktop" src="<?= $banner_top_desktop_front_page ?>?v=<?php
                                                                                                echo date("HdmY"); ?>" width="100%" autoplay loop muted style="background-image:url('/images/banner_bg_tcuk.jpg')"></video>

      <!-- MOBILE VIDEO -->
      <video muted="" playsinline="" class="fdry-video fdry-video-mobile" src="<?= $banner_top_mobile_front_page ?>?v=<?php
                                                                                                                      echo date("HdmY"); ?>" width="100%" autoplay loop style="background-image:url('/images/banner_bg_tcuk.jpg')">
      </video>
    </div>
  </section>
<?php endif; ?>

<main class="fdry-main__bs fdry-main">

  <h1 style="text-align: center; margin-top:25px">Our Megastores Located In The Midlands:</h1>

  <?php
  $args = [
    'posts_per_page' => -1,
    'post_type' => 'branch',
    'orderby' => 'menu_order',
    'post__not_in' => array(5117, 1810, 778),
    'order' => 'ASC'
  ];


  $branches = new WP_Query($args);
  ?>
  <div class="content-max-small content-block">


    <div class="bs-notice__grid">


      <?php if ($branches->have_posts()) : ?>
        <?php while ($branches->have_posts()) : $branches->the_post(); ?>

          <?php $ID = $post->ID; ?>
          <?php $address['line1'] = get_field('address_line_1', $post->ID); ?>
          <?php $address['line2'] = get_field('address_line_2', $post->ID); ?>
          <?php $address['town'] = get_field('town_city', $post->ID); ?>
          <?php $address['postcode'] = get_field('postcode', $post->ID); ?>
          <?php $video = get_field('branch_video', $post->ID); ?>
          <?php $otWeek = get_field('opening_times_weekdays', $post->ID); ?>
          <?php $otSat = get_field('opening_times_saturday', $post->ID); ?>
          <?php $otSun = get_field('opening_times_sunday', $post->ID); ?>
          <?php $otWeekEnds = get_field('opening_times_weekends', $post->ID); ?>
          <?php $carNumber = get_field('code', $post->ID); ?>
          <?php $phoneNumber = get_field('telephone_number', $post->ID); ?>

          <!-- 777 is ID WEdnesbury -->
          <?php $mapLink = $ID === 777 ? 'https://www.google.com/maps?ll=52.559157,-2.02638&z=14&t=m&hl=en&gl=GB&mapclient=embed&cid=12280174976825451102' : 'https://www.google.com/maps?ll=52.454394,-1.498532&z=14&t=m&hl=en&gl=GB&mapclient=embed&cid=8530235291250426066'  ?>
          <?php $mapApple = $ID === 777 ? 'https://maps.apple.com/?address=Darlaston%20Rd,%20Walsall,%20Wednesbury,%20WS10%207HX,%20England&auid=11542213028588134924&ll=52.559338,-2.025869&lsp=9902&q=The%20Trade%20Centre%20UK' : 'https://maps.apple.com/?address=Silverstone%20Drive,%20Longford,%20Coventry,%20CV6%206PA,%20England&auid=14784553051452358669&ll=52.454519,-1.498411&lsp=9902&q=The%20Trade%20Centre'  ?>

          <div class="fdry-locations-landing-singleLocation">
            <h5 class="fdry-locations-landing__top-info-title"><?= 'Trade Centre ' . $post->post_title; ?></h5>
            <div class="top-image-video">
              <?php if ($video) : ?>
                <video width="100%" height="260" autoplay disablepictureinpicture loop="true" muted="false" poster="<?= get_the_post_thumbnail_url($ID); ?>">
                  <source src="<?= $video ?>" type="video/mp4">
                </video>
                <img class="branch-locations__image-mobile" src="<?= get_the_post_thumbnail_url($ID); ?>" alt="<?= $post->post_title; ?> Trade Centre">
              <?php else : ?>
                <img class="branch-locations__image" src="<?= get_the_post_thumbnail_url($ID); ?>" alt="<?= $post->post_title; ?> Trade Centre">
              <?php endif; ?>
            </div>

            <div class="fdry-locations-landing__top-info">

              <address style="font-size:16px;line-height:24px; letter-spacing:0px;">

                <?= $address['line1']; ?>
                <br>

                <?= $address['line2']; ?>
                <br>

                <span><?= $address['town']; ?></span>

                <br>
                <?= $address['postcode']; ?>

              </address>
            </div>
            <div class="fdry-grey-line"></div>
            <div class="fdry-locations-landing__middle-info">

              <div class="fdry-locations-landing__middle-info-container">


                <div class="fdry-locations-landing-singleLocation-time">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path id="Icon_material-timelapse" data-name="Icon material-timelapse" d="M15.816,8.184A5.377,5.377,0,0,0,12,6.6V12L8.184,15.816a5.4,5.4,0,1,0,7.632-7.632ZM12,3a9,9,0,1,0,9,9A9,9,0,0,0,12,3Zm0,16.2A7.2,7.2,0,1,1,19.2,12,7.2,7.2,0,0,1,12,19.2Z" transform="translate(-3 -3)" fill="#0575e6" />
                  </svg>
                  <div class="times">
                    <p class="fdry-car-numbers">Mon-Fri <?= $otWeek ?> </p>
                    <?php if ($otWeekEnds) : ?>
                      <p class="fdry-car-numbers">Sat-Sun <?= $otWeekEnds ?> </p>
                    <?php else : ?>
                      <p class="fdry-car-numbers">Sat <?= $otSat ?> </p>
                      <p class="fdry-car-numbers">Sun <?= $otSun ?> </p>
                    <?php endif; ?>
                  </div>
                </div>

              </div>

            </div>
            <div class="fdry-grey-line"></div>
            <div class="fdry-locations-landing__bottom-info">
              <div class="fdry-loactions-landing__phone">
                <p>Call Dealership:</p>
                <a href="tel:<?= $phoneNumber ?>"><?= $phoneNumber ?></a>
              </div>

              <div class="fdry-btn-locations__wrapper">
                <a href="<?= $mapLink ?> " target="_blank" class="fdry-btn-locations">Open in Google Map<i><?php get_template_part('svg-template/svg', 'gmap') ?></i></a>
              </div>
              <div class="fdry-btn-locations__wrapper">
                <a href="<?= $mapApple ?> " target="_blank" class="fdry-btn-locations">Open in Apple Maps<i><?php get_template_part('svg-template/svg', 'apple') ?></i></a>
              </div>
            </div>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>

  <div style="margin-top: 70px;"></div>

  <!-- TRUSTPILOT -->
  <?php get_template_part('components/pages/trustpilot') ?>
  <!-- ACTION BOX GRID -->
  <?php get_template_part('components/pages/action-box-grid') ?>

</main>

<?php
get_footer();
