<?php
$whichPage = "all";
if (is_page('car-filters-small')) {
  $whichPage = 'small';
} elseif (is_page('car-filters-family')) {
  $whichPage = 'medium/large';
} elseif (is_page('car-filters-premium')) {
  $whichPage = 'premium';
} elseif (is_page('car-filters-suv')) {
  $whichPage = 'suv';
}

?>

<div class="content-max content-block__carloop fdry-filter__top-nav">

  <!-- <h3>Car Filter</h3> -->
  <div class="fdry-filter__nav">

    <button class='filterBtn-noAjax <?= $whichPage === 'all' ? 'selected' : '' ?>' data-filter="all"><a href="<?= site_url() ?>">ALL</a></button>
    <button class='filterBtn-noAjax <?= $whichPage === 'small' ? 'selected' : '' ?>' data-filter="small"><a href="<?= site_url('/car-filters-small') ?>">SMALL</a></button>
    <button class='filterBtn-noAjax <?= $whichPage === 'medium/large' ? 'selected' : '' ?>' data-filter="family"><a href="<?= site_url('/car-filters-family') ?>">FAMILY</a></button>
    <button class='filterBtn-noAjax <?= $whichPage === 'premium' ? 'selected' : '' ?>' data-filter="premium"><a href="<?= site_url('/car-filters-premium') ?>">PREMIUM</a></button>
    <button class='filterBtn-noAjax <?= $whichPage === 'suv' ? 'selected' : '' ?>' data-filter="suv"><a href="<?= site_url('/car-filters-suv') ?>">SUV</a></button>

  </div>


</div>