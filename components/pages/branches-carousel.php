<?php

global $branchCustom, $branch, $custom;
$branch = $post;
$branchCustom = $custom; 

$args = [
    'posts_per_page' => -1,
    'post_type' => 'branch',
    'orderby' => 'menu_order',
    'post__not_in' => array($branch->ID),
    'order' => 'ASC'
];

$branches = new WP_Query($args);

$count_posts = wp_count_posts( 'branch' )->publish;

?>

<section class="fdry-branches-carousel__wrapper">

  <h3>Visit one of our car supermarkets today</h3>

  <?php if($count_posts > 3) : ?>

    <div class="fdry-glide__branches glide">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          <?php if ( $branches ->have_posts() ) : ?>
            <?php while ( $branches ->have_posts() ) : $branches ->the_post(); ?>
              <?php  $ID = $post->ID; ?>
              <?php  $address['line1'] = get_field('address_line_1' , $post->ID); ?>
              <?php  $address['line2'] = get_field('address_line_2' , $post->ID); ?>
              <?php  $address['town'] = get_field('town_city' , $post->ID); ?>
              <?php  $address['postcode'] = get_field('postcode' , $post->ID); ?>

            <li class="glide__slide fdry-branches-carousel__card">
              <div class="branch-carousel__card">
                <div class="top-image-video">
                  <img class="branch-locations__image" src="<?= get_the_post_thumbnail_url($ID); ?>"
                      alt="<?= $post->post_title; ?> Trade Centre">
                </div>
                <h5><i><?php get_template_part( 'svg-template/svg-geo-tag-icon' ) ?></i> <?= 'Trade Centre ' . $post->post_title; ?></h5>
                <p class="town"><?= $address['town']; ?></p>
                <p class="addres"><?= $address['line1']; ?></p>
                <p class="addres"><?= $address['line2']; ?></p>
                <p class="addres"><?= $address['postcode']; ?></p>
                
                <div class="fdry-btn-locations__wrapper">
                  <a href="/branches/<?= $post->post_name; ?>" class="fdry-btn-locations">MORE INFORMATION</a>
                </div>
              </div>
            </li>

            <?php endwhile; ?>
          <?php endif; ?>
        
        </ul>
      </div>

      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><</button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
      </div>
    </div>

  <?php else : ?>

    <?php get_template_part( 'components/partials/branch-carousel' ); ?>

  <?php endif; ?>

</section>





