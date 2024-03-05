<?php

$vimeoSrc = get_field('vimeo_iframe_src', 'option');
$infoTitle = get_field('info_title', 'option');
$infoText = get_field('info_content', 'option');
?>
<section class="fdry-video-guide">

    <div class="fdry-video__wrapper">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe title="The Trade Centre Group" src="<?= $vimeoSrc  ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="">
            </iframe>
        </div>
    </div>
    <!--   
  <div class="fdry-video-guide__info">
    <div class="container">
      <h3 class="fdry-video-guide__title"><?= $infoTitle ?></h3>
      <div class="fdry-video-content">
        <?= $infoText ?>
      </div>
    </div>
  </div> -->
</section>