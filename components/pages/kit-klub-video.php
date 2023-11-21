<?php

$vimeoSrc = get_field('vimeo_iframe_src', 'option');
?>

<style>
    .fdry-video__kit{
      padding-top: 70px;
      padding-bottom: 20px;
      /* display: grid;
      grid-template-columns: 1fr 1fr;
      column-gap: 20px; */
      }
      /* @media screen and (max-width: 780px) 
      {
        .fdry-video__kit{
          grid-template-columns: 1fr;
        }
      } */
</style>

<section class="fdry-video-guide fdry-video__kit" style="position:relative; z-index:5">  
  
  <div class="fdry-video__wrapper  container "> 
    <div class="embed-responsive embed-responsive-16by9">
      <iframe title="The Trade Centre Group"
        src="https://player.vimeo.com/video/874024075?badge=0&autopause=0&quality_selector=1&progress_bar=1&player_id=0&app_id=58479"
        style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
        webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="">
      </iframe>
    </div>
  </div>
  
  <!-- <div class="fdry-video__wrapper  container "> 
    <div class="embed-responsive embed-responsive-16by9">
      <iframe title="The Trade Centre Group"
        src="https://player.vimeo.com/video/873990382?badge=0&autopause=0&quality_selector=1&progress_bar=1&player_id=0&app_id=58479"
        style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
        webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="">
      </iframe>
    </div>
  </div> -->
  
</section>

