<?php
/**
 * The layout for kit club
 *
 * Template Name: Kit club
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<?php get_template_part( 'components/header/header-video-kit-club' ) ?>
<?php get_template_part( 'components/header/header-marquee' ) ?>

<main class="fdry-main fdry-main__kit-club">
  <div class="content-max">

    <div class="kit-club-top-banner">
      <img class="d-block d-md-none w-100" src="<?= get_field('kit_club_first_top_banner_mobile') ?>">
      <img class="d-none d-md-block w-100" src="<?= get_field('kit_club_first_top_banner') ?>">
    </div>

    <?php
    $overlayGroup = get_field('banner_text_overlay');
    ?>
    <div class="kit-club-overlay-banner" style="background-image: url(<?= $overlayGroup['background_image'] ?>);">
      <div class="overlay-content">
        <div class="content">
          <h3><?=  $overlayGroup['title'] ?></h3>
          <p><?= $overlayGroup['content'] ?></p>
        </div>
        <div class="image">
          <img src="<?= $overlayGroup['overlay_image'] ?>" >
        </div>
      </div>
    </div>

    <div class="fdry-all-sport-wrapper">
      <h3>ALL SPORTS</h3>
      <p class="tilt">Any team under 17 considered</p>

      <div class="fdry-all-sport-grid container">
        <div class="single-sport">
          <?php get_template_part( 'svg-template/svg', 'football' ) ?>
          <p>Football</p>
        </div>
        <div class="single-sport">
          <?php get_template_part( 'svg-template/svg', 'rugby' ) ?>
          <p>Rugby</p>
        </div>
        <div class="single-sport">
          <?php get_template_part( 'svg-template/svg', 'netball' ) ?>
          <p>Netball</p>
        </div>
        <div class="single-sport">
          <?php get_template_part( 'svg-template/svg', 'netball' ) ?>
          <p>Athletics</p>
        </div>
        <div class="single-sport">
          <?php get_template_part( 'svg-template/svg', 'cricket' ) ?>
          <p>Cricket</p>
        </div>
        <div class="single-sport">
          <?php get_template_part( 'svg-template/svg', 'hockey' ) ?>
          <p>Hockey</p>
        </div>
        <div class="single-sport">
          <?php get_template_part( 'svg-template/svg', 'futsal' ) ?>
          <p>Fusball</p>
        </div>
        <div class="single-sport">
          <?php get_template_part( 'svg-template/svg', 'squash' ) ?>
          <p>Tennis</p>
        </div>
      </div>

      <section class="kit-club-latest-news">
        <h3>LATEST NEWS</h3>

        <div data-name="onstipe" class="wbctA" style="width:100%;height:100%;overflow:hidden;">
          <script defer src="https://onstipe.com/web/js/webembed.js" type="text/javascript"></script>
          <div class="wbctB" data-val="dvm53">

          </div>
        </div>

      </section>

      <section class="join-the-club content-block">
        <h3>JOIN <br> THE CLUB</h3>
        <p class="tilt">The benefits of being a Kit Klub Team…</p>

        <div class="join-the-club__grid">
          <div class="single-join">
            <p class="title"><i><?php get_template_part( 'svg-template/svg', 'yellow-tick' ) ?></i> Quick application</p>
            <p class="description">
              Our club correspondents aim to turn around applications within 10 days, you could have a new kit in less than 5 weeks!
            </p>
          </div>
          <div class="single-join">
            <p class="title"><i><?php get_template_part( 'svg-template/svg', 'yellow-tick' ) ?></i> Presentation days</p>
            <p class="description">
              Our Brand Ambassador and correspondents will be active in the sporting community, when they visit your club be prepared for a fun-filled event with goodies for the team and player of the match awards.
            </p>
          </div>
          <div class="single-join">
            <p class="title"><i><?php get_template_part( 'svg-template/svg', 'yellow-tick' ) ?></i> Free kit, again & again…</p>
            <p class="description">
            After being approved a kit for the 2023 season, your team will be guaranteed a kit every year after that; providing certain terms & conditions are met. <span>Terms & Conditions are provided to successful applications</span>
            </p>
          </div>
        </div>
      </section>

      <section class="kit-club__faq">
        <div class="container">
          <div class="kit-club__faq-wrapper">
            <div class="faq-section">
              <h3>FAQ</h3>
              <div class="single-faq">
                <p class="title"><i><?php get_template_part( 'svg-template/svg', 'help' ) ?></i> Who can apply?</p>
                <p class="answer">Any under 17 sports teams in Wales, West Midlands, the North West or Yorkshire.</p>
              </div>
              <div class="single-faq">
                <p class="title"><i><?php get_template_part( 'svg-template/svg', 'help' ) ?></i> Can any Kit supplier be used?</p>
                <p class="answer">To ensure consistent quality and for ease of administration Kits will be provided by the Kit Klub nominated supplier only, Surridge Sport.</p>
              </div>
              <div class="single-faq">
                <p class="title"><i><?php get_template_part( 'svg-template/svg', 'help' ) ?></i> Can Kits be customised?</p>
                <p class="answer">Yes, you can choose from a wide pallet of colours and designs, player numbers are included and you can even add optional extras.</p>
              </div>
              <div class="single-faq">
                <p class="title"><i><?php get_template_part( 'svg-template/svg', 'help' ) ?></i> How long will it take to deliver the Kits?</p>
                <p class="answer">Our nominated Kit Klub supplier will aim to have you Kit delivered by season start date, however, delays can occur.</p>
              </div>
            </div>

            <div class="faq-image">
              <img src="<?= site_url( '/' ) ?>wp-content/uploads/2021/06/kit-1.png" alt="football kit">
            </div>
          </div>
        </div>
      </section>

      
    </div>

    <section class="kit-club__apply" style="background-image: url('<?= site_url( '/' ) ?>wp-content/uploads/2021/06/team.jpg');">
      <div class="apply-wrapper">
          <h3>APPLY TODAY</h3>
          <p class="tilt">The application window is closed.</p>
      </div>
    </section>

    <section class="fdry-kit-club__showcase" style="background-image:url(<?= site_url( '/' ) ?>wp-content/uploads/2022/10/blue-background-scaled-1.jpg)">
      <div class="content-block">
        <h4>Kit Klub Showcase</h4>
        <?php $videos = get_field('vimeo_videos'); ?>
        <div class="glide fdry-glide__kit-club">

          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
              <?php foreach($videos as $video) : ?>
              <li class="glide__slide">
                <div style="padding:56.25% 0 0 0;position:relative;">
                  <iframe src="<?= $video['vimeo_video_url'] ?>?h=dcd304d8dc&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><?php get_template_part( 'svg-template/svg', 'carret-down' ) ?></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><?php get_template_part( 'svg-template/svg', 'carret-down' ) ?></button>
          </div>

        </div>
      </div>
      <script src="https://player.vimeo.com/api/player.js"></script>
    </section>

    <section class="fdry-kit-club-testimonial">
      <div class="content-block">
        <div class="kit-club-testimonial__wrapper">
          <h3>TESTIMONIALS</h3>
          <?php $testimonials = get_field('review') ?>
          <div class="textimonials__grid">
            <?php foreach($testimonials as $key => $testimonial) : ?>
              <div class="single-testimonial">
                <div class="testimonial-image">
                  <figure><img src="<?= $testimonial['imagen'] ?>" alt=""></figure>
                </div>
                <h5><?= $testimonial['title'] ?></h5>
                <div class="description"><?= $testimonial['text'] ?></div>
              </div>
            <?php endforeach; ?>           
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<!-- BRANCHES -->
<div class="content-block content-max" style="margin-top: 50px; margin-bottom: 40px; padding-bottom:60px">
    <?php get_template_part( 'components/pages/branches-carousel' ) ?>
</div>

<?php 
get_footer();
