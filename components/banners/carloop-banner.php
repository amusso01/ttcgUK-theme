<?php 
$showListing = true;
$fpOptions = get_field('front_page', 'options');
if ($wp->request === '' && !empty($fpOptions['top_desktop'])) :
    $banner_top_desktop_front_page = $fpOptions['top_desktop'];
    $banner_top_mobile_front_page = $fpOptions['top_mobile'];
    $banner_sticky_mobile = $fpOptions['sticky_mobile'];
endif;
?>

<?php
$banner_break_front_page = [];
if (count($fpOptions['break_collection'])) :
  foreach ($fpOptions['break_collection'] as $breakRow) {
      $banner_break_front_page[] = [
          'desktop' => $breakRow['break_desktop'],
          'desktop_link' => $breakRow['break_desktop_link'],
          'mobile' => $breakRow['break_mobile'],
          'mobile_link' => $breakRow['break_mobile_link']
      ];
  }
endif;
?>
<!-- THIS IS THE HTML for the CAR LOOP BANNER -->
<div class="fdry-carlist-break-banner" >
    <img class="d-none carlist-desktop-break d-md-block w-100"
          src="<?php echo $banner_break_front_page[0]['desktop']; ?>?v=<?php echo date("HdmY"); ?>"/>
    <img class="d-md-none carlist-mobile-break w-100"
          src="<?php echo $banner_break_front_page[0]['mobile']; ?>?v=<?php echo date("HdmY"); ?>"/>
</div>
<!-- END OF BANNER BREAK -->