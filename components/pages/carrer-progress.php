<?php

$cards = get_field('timeline_career');

$employee = get_field('employee_card');
?>

<section class="fdry-career-2-progress">
  <div class="content-block content-max-small">

    <h3 style="color: white;">CAREER PROGRESSION</h3>

    <div class="fdry-career-2-progress__2col">

      <div class="text">
        <h3 class="fdry-career-2-progress__title"><?= get_field('title_progression') ?></h3>

        <div class="subtitle"><?= get_field('sub_title_progression') ?></div>
      </div>

      <div class="fdry-career-2-progress__carrer-card">
        <figure>
          <img src="<?= $employee['image']['url'] ?>">
        </figure>
        <p><?= $employee['name'] ?></p>
      </div>
    </div>

  </div>
  <div class="fdry-career-2-progress__grid content-block">
    <?php foreach ($cards as $card) : ?>
      <div class="fdry-career-2-progress__single-card-container">
        <p class="year"><?= $card['year'] ?></p>
        <div class="fdry-career-2-progress__single-card">

          <figure>
            <img src="<?= $card['image']['url'] ?>">
          </figure>

          <div class="fdry-career-2-progress__single-card-content">
            <div class="title"><?= $card['title'] ?></div>
            <div class="body"> <?= $card['body'] ?></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>