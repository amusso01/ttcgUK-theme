<section class="fdry-career-2-hero" style="background-image: url(<?= get_field('hero_image') ?>);">
  <div class="career-back-btn">
    <a href="<?= site_url() ?>/careers-landing" class="read-more"><i><?php get_template_part('svg-template/svg', 'back-arrow') ?></i> Back to Careers</a>
  </div>
  <div class="overlay"></div>
  <div class="content-block">
    <div class="hero-grid">
      <div class="fdry-career-2-hero__content">
        <h5>CAREERS</h5>
        <h1><?= get_field('hero_title') ?></h1>

        <a href="#jobs" class="read-more">JUMP TO AVAILABLE ROLES</a>
      </div>

      <div class="fdry-career-2-hero__job-info">
        <div class="job-info__inner">
          <?php
          $groupInfo = get_field('hero_job_info');
          $length = count($groupInfo['potential_location']);
          ?>
          <h4>Position Information</h4>
          <p class="salary"><span>Salary:</span> <?= $groupInfo['salary'] ?></p>
          <p class="job-type"><span>Type:</span> <?= $groupInfo['job_type']  ?></p>
          <p class="location"><span>Locations:</span> <?php foreach ($groupInfo['potential_location'] as $key => $location) :  ?>

              <?= $location->post_title ?> <?= $length !== $key + 1 ? ',' : '' ?>

            <?php endforeach ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>