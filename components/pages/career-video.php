<?php
$videos = get_field('videos-option', 'option');

?>


<div>

</div>
<section class="fdry-career-2-videos">
  <div class="content-block content-max">
    <h2 class="fdry-career-2-videos__title">HEAR FROM OUR TEAM</h2>
    <div class="fdry-career-2-videos__main">
      <div class="video-info">
        <p class="name" id='videoName'> <?= $videos[0]['name'] ?></p>
        <p class="role" id="videoRole"> <?= $videos[0]['role'] ?></p>


        <video class="fdry-video fdry-video-desktop" id=videoIframe poster=<?= $videos[0]['poster'] ?> src="<?php echo $videos[0]['video_url'] ?>?v=<?php echo date("HdmY"); ?>" width="100%" controls preload="metadata"></video>
      </div>
    </div>
    <div class="glide fdry-glide__videos">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          <?php foreach ($videos as $video) : ?>
            <li class="glide__slide">
              <div class="fdry-career-2-videos__thumbnails" data-video="<?= $video['video_url'] ?>" data-name="<?= $video['name'] ?>" data-role="<?= $video['role'] ?>">
                <div class="image">
                  <figure>
                    <img class="videoPosterThumb" src="<?= $video['poster'] ? $video['poster'] : 'https://www.tradecentreuk.com/wp-content/uploads/2024/07/Screenshot-2024-07-15-at-16.49.36.jpg' ?>" alt="career video testimonial">
                  </figure>

                  <p class="name"><?= $video['name'] ?></p>
                  <p class="role"><?= $video['role'] ?></p>
                </div>

              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>


      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><svg xmlns="http://www.w3.org/2000/svg" width="26.04" height="47.836" viewBox="0 0 26.04 47.836">
            <path id="arrow-prev-small-svgrepo-com" d="M32.367,6.476a3.625,3.625,0,0,0-5.126,0L9.524,24.21a7.25,7.25,0,0,0,0,10.25L27.254,52.188a3.625,3.625,0,0,0,5.127-5.126L17.207,31.889a3.625,3.625,0,0,1,0-5.126L32.367,11.6A3.624,3.624,0,0,0,32.367,6.476Z" transform="translate(-7.402 -5.414)" fill="#fff" />
          </svg>
        </button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
          <svg xmlns="http://www.w3.org/2000/svg" width="26.04" height="47.836" viewBox="0 0 26.04 47.836">
            <path id="arrow-prev-small-svgrepo-com" d="M32.367,6.476a3.625,3.625,0,0,0-5.126,0L9.524,24.21a7.25,7.25,0,0,0,0,10.25L27.254,52.188a3.625,3.625,0,0,0,5.127-5.126L17.207,31.889a3.625,3.625,0,0,1,0-5.126L32.367,11.6A3.624,3.624,0,0,0,32.367,6.476Z" transform="translate(-7.402 -5.414)" fill="#fff" />
          </svg>
        </button>
      </div>

    </div>
  </div>
</section>