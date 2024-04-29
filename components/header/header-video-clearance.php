<?php
$videoDesktop = get_field('clearance_video_desktop');
$videoMobile = get_field('clearance_video_mobile');
?>

<section class="fdry-banner-video-top">
    <div class="video_wrapper">
        <!-- DESKTOP VIDEO -->
        <video class="fdry-video fdry-video-desktop" src="<?php echo $videoDesktop; ?>?v=<?php
                                                                                            echo date("HdmY"); ?>" width="100%" autoplay loop muted style="background-image:url('/images/banner_bg_tcuk.jpg')"></video>

        <!-- MOBILE VIDEO -->
        <video muted="" playsinline="" class="fdry-video fdry-video-mobile" src="<?php echo $videoMobile ?>?v=<?php
                                                                                                                echo date("HdmY"); ?>" width="100%" autoplay loop style="background-image:url('/images/banner_bg_tcuk.jpg')">
        </video>
    </div>
</section>