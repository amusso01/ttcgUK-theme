<?php
$video = get_field('price_promise', 'option');
$videourl = $video['video_vimeo_url'];
?>

<section class="container-fluid no-gutters | bettercar__wrapper" style="margin-bottom: 50px;">
    <div class="row" style="">
        <div class="col-12">
            <div class="embed-responsive embed-responsive-16by9 | bettercar__video">
                <iframe src="<?php echo $videourl; ?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                </iframe>
                <!--<div>
                    <i class="fas fa-volume-off fa-w-16 fa-5x center-block" id="bettercar-mutebutton" onclick="muteUnmute(document.getElementById('bettercar-video'))"></i>
                </div>-->
            </div>
        </div>
    </div>
</section>