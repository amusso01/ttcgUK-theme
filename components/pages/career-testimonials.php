<?php
$testimonials = get_field('testimonials')

?>

<section class="fdry-career-2-testimonials">
  <div class="content-block content-max">
    <div class="glide fdry-glide__testimonials">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          <?php foreach ($testimonials as $testimonial) : ?>
            <li class="glide__slide">
              <div class="fdry-career-2-testimonial__grid">
                <div class="image">
                  <figure>
                    <img src="<?= $testimonial['image']['url'] ?>">
                  </figure>
                </div>

                <div class="content">
                  <div class="quote">
                    <?= $testimonial['quote'] ?>
                  </div>
                  <p class="name"><?= $testimonial['name'] ?></p>
                  <p class="role"><?= $testimonial['role'] ?></p>
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

      <div class="glide__bullets" data-glide-el="controls[nav]">
        <?php foreach ($testimonials as $key => $testimonial) : ?>
          <button class="glide__bullet" data-glide-dir="=<?= $key ?>"></button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>