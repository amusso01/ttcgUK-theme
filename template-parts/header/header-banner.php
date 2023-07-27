<?php

global $custom, $tertiaryBanner, $tertiaryBannerMobile, $tertiaryVideo, $tertiaryVideoMobile, $tertiaryPage, $branch;
?>
<section class="banner <?php
echo (((!isset($tertiaryBanner) || (empty($tertiaryBanner) && empty($tertiaryVideo))) && $tertiaryPage) ? 'no-image' : '') ?>">
    <?php
    if ($tertiaryPage && empty($tertiaryVideo)) :
        if (isset($tertiaryBannerMobile) && !empty($tertiaryBannerMobile)) : ?>
            <div class="tertiarypage__banner d-sm-none" style="background-image: url('<?php
            echo $tertiaryBannerMobile; ?>')">
            </div>
            <div class="tertiarypage__banner d-none d-sm-block" style="background-image: url('<?php
            echo $tertiaryBanner; ?>')">
            </div>
        <?php
        elseif (isset($tertiaryBanner) && !empty($tertiaryBanner)) : ?>
            <div class="tertiarypage__banner" style="background-image: url('<?php
            echo $tertiaryBanner; ?>')">
            </div>
        <?php
        endif;
    else :
        if (!empty($tertiaryVideo)) {
            $mobileSlider = $tertiaryVideoMobile;
            $desktopSlider = $tertiaryVideo;
        } else {
            $mobileSlider = get_theme_mod('mobile_slider')
                ? get_theme_mod('mobile_slider')
                : 'https://cdn.tradecentregroup.io/video/upload/q_auto/f_auto/v1606837487/web/TCW-Mobile-600x400.mp4';
            $desktopSlider = get_theme_mod('desktop_slider')
                ? get_theme_mod('desktop_slider') 
                : 'https://cdn.tradecentregroup.io/video/upload/q_auto/f_auto/v1606837488/web/TCW-Desktop-1920x400.mp4';
        }
        ?>
        <!-- <img class="d-md-none" src="/images/header-banner-mobile-wales.png" alt="Video for Tradecentre"> -->
        <video muted="" playsinline="" class="d-sm-none" src="<?php echo $mobileSlider; ?>?v=<?php
        echo date("HdmY"); ?>" width="100%" autoplay loop
               style="background-image:url('/images/banner_bg_mob_tcw.jpg')">
        </video>
        <video class="d-none d-sm-block"
               src="<?php echo $desktopSlider; ?>?v=<?php
               echo date("HdmY"); ?>" width="100%" autoplay loop muted
               style="background-image:url('/images/banner_bg_tcw.jpg')"></video>
    <?php
    endif; ?>
</section>
