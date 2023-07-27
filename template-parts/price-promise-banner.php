<?php

global $hideCta; ?>
<section class="container-fluid px-0 | price-priomise__banner">
    <div class="row no-gutters">
        <div class="col col-12 col-md-12  | d-none d-sm-block">
            <a href="/price-promise"><img class="mx-auto w-100 | homebanner__image"
                                          <?php if (isset($hideCta) && $hideCta == true) : ?>
                                          src="/images/banner-price-promise.jpg"
                                          <?php else : ?>
                                          src="/images/banner-price-promise.jpg"
                                          <?php endif; ?>
                                          alt="Price promise"></a>
            <?php if (!isset($hideCta) || $hideCta !== true) : ?>
            <a href="/price-promise" class="pricepromisebutton">FIND OUT MORE</a>
            <?php endif; ?>
        </div>

        <div class="col col-12 col-md-12 | d-sm-none">
            <a href="/price-promise"><img class="mx-auto w-100 | homebanner__image"
                                          <?php if (isset($hideCta) && $hideCta == true) : ?>
                                          src="/images/price-promise-mobile-banner-nocta.jpg"
                                          <?php else : ?>
                                          src="/images/price-promise-mobile-banner.jpg"
                                          <?php endif; ?>
                                          alt="Price promise"></a>
        </div>
    </div>
</section>