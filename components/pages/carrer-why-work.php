<?php

$cards = get_field('icon_cards');
?>

<section class="fdry-career-2-why-work">
  <div class="content-block content-max-small">
    <!-- <h3 class="fdry-career-2-why-work__title"><?= get_field('title_why_work') ?></h3>

    <div class="subtitle"><?= get_field('sub_title_why_work') ?></div> -->

    <h3 class="fdry-career-2-why-work__title">WHY WORK AT <br>
      TRADE CENTRE UK?</h3>

    <div class="subtitle">The Trade Centre UK has a fantastic opportunity for a <b>Car Sales Executive</b> to join the UK’s largest independent used car supermarket. We are looking for motivated and professional individuals who strive for the very best level of service in a busy retail environment.
      <br>
      <br>
      Established in 1999 and with over 700 employees across all our UK showrooms, we pride ourselves on offering our employees support and opportunity for growth within the motor trade and are committed to promoting a diverse and inclusive community within our work force.
      <br>
      <br>
      Are you ambitious, dedicated with a strong desire to develop a career in sales? Are you enthusiastic, enjoy a dynamic, energetic environment and being rewarded well for your efforts? Do you want to be a part of a team with an appetite for success?
      <br>
      <br>
      If this sounds like the type of role you are looking for then get in touch today!
      <br>
      <br>
    </div>

    <div class="fdry-career-2-why-work__grid">
      <!-- <?php foreach ($cards as $card) : ?>
        <div class="fdry-career-2-why-work__single-card">
          <?= acfFile_toSvg($card['icon']['url']) ?>
          <p><?= $card['text'] ?></p>
        </div>
      <?php endforeach; ?> -->
      <div class="fdry-career-2-why-work__single-card">
        <?= acfFile_toSvg('https://www.tradecentreuk.com/wp-content/uploads/2024/03/discount-icon.svg') ?>
        <p>Discounted car buying scheme</p>
      </div>
      <div class="fdry-career-2-why-work__single-card">
        <?= acfFile_toSvg('https://www.tradecentreuk.com/wp-content/uploads/2024/03/cycle-icon.svg') ?>
        <p>Cycle to work scheme</p>
      </div>
      <div class="fdry-career-2-why-work__single-card">
        <?= acfFile_toSvg('https://www.tradecentreuk.com/wp-content/uploads/2024/03/eye-care-icon.svg') ?>
        <p>Free eye tests and discounted glasses</p>
      </div>
      <div class="fdry-career-2-why-work__single-card">
        <?= acfFile_toSvg('https://www.tradecentreuk.com/wp-content/uploads/2024/03/support-icon.svg') ?>
        <p>Financial wellbeing support & resources</p>
      </div>
      <div class="fdry-career-2-why-work__single-card">
        <?= acfFile_toSvg('https://www.tradecentreuk.com/wp-content/uploads/2024/03/mental-health-icon.svg') ?>
        <p>Mental health support & resources/p>
      </div>
      <div class="fdry-career-2-why-work__single-card">
        <?= acfFile_toSvg('https://www.tradecentreuk.com/wp-content/uploads/2024/03/events-icon.svg') ?>
        <p>Engagement events</p>
      </div>
      <div class="fdry-career-2-why-work__single-card">
        <?= acfFile_toSvg('https://www.tradecentreuk.com/wp-content/uploads/2024/03/awards-icon.svg') ?>
        <p>Award winning employee benefits portal</p>
      </div>
      <div class="fdry-career-2-why-work__single-card">
        <?= acfFile_toSvg('https://www.tradecentreuk.com/wp-content/uploads/2024/03/holiday-icon.svg') ?>
        <p>Market leading holiday package for our Sales team</p>
      </div>
    </div>
  </div>
</section>