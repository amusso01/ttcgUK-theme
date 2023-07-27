<section class="banner__enterreg">
    <?php   
    $options = get_field('front_page', 'options');
    //print_r($fpOptions);
    if ($options['footer_mobile']!="") { 
        echo '<img class="m-auto d-block d-md-none mw-100" src="' . $options['footer_mobile'] . '" />';
    }
    if ($options['footer_desktop']!="") {
        echo '<img class="m-auto d-none d-md-block mw-100" src="' . $options['footer_desktop'] . '" />';
    }
    ?>
</section>



<!--
<section class="banner__enterreg d-block d-lg-none">
<div class="container-fluid | enterreg" style="background-position:center;background-color:#bd181e;background-image:none;padding:0">
<div class="container">
<div class="row">
<div class="col-12 text-center position-relative" style="max-width:500px;margin:auto;background-image:url('<?php //echo get_stylesheet_directory_uri() . '/images/1000more-noreg_mob.png' ?>');background-size:100% auto;background-position:top;background-repeat:no-repeat">
<div style="padding-top:130%">

</div>
</div>
</div>
</div>
</div>
</section>

<section class="banner__enterreg d-none d-lg-block d-xl-none">
<div class="container-fluid | enterreg" style="background-image:url('<?php //echo get_stylesheet_directory_uri() . '/images/1000more-noreg.png' ?>');height:425px;background-position:center;background-color:#bd181e;background-size:1700px 425px;background-repeat:no-repeat">

</div>
</section>

<section class="banner__enterreg d-none d-xl-block">
<div class="container-fluid | enterreg" style="background-image:url('<?php //echo get_stylesheet_directory_uri() . '/images/1000more-noreg.png' ?>');height:480px;background-position:center;background-color:#bd181e;background-size: auto 480px;background-repeat:no-repeat">

</div>
</section>
-->

<!--
<section class="banner__enterreg">
<div class="container-fluid | enterreg">
<div class="container">
<div class="row mb-0 pt-4">
<div class="col col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
<img class="enterreg__guaranteed--red img-fluid" src="/images/guarantee-stamp.png"
alt="Trade Centre Guaranteed Prices">
<h3 class="enterreg__title--bluecapitals">Best PX Price</h3>
<h3 class="enterreg__title--redcapitals">&pound;500 More</h3>
<h4 class="enterreg__subtitle--bluecapitals">Than any other car dealer</h4>

<form class="form-inline enterreg__form">
<div class="input-group mb-3 mr-5">
<input class="reg-input form-control" type="text" placeholder="ENTER REG"
aria-label="Registration number entry" aria-describedby="Enter Registration">

<div class="input-group-append">
<button class="btn btn-outline-secondary enterreg__form--gobtn" type="submit">Go
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<section class="banner__enterreg">
<div class="container-fluid">
<div class="enterreg d-none d-lg-flex row no-gutters justify-content-center">
<div class="col mx-auto my-auto text-center">
<h3 class="pt-4 tradeinval">&pound;1000</h3><br/>
<h3>FOR <strong>YOUR</strong> OLD <strong>CAR</strong></h3><br/>
<form class="w-100 pt-2 mx-auto d-flex justify-content-center form-inline enterreg__form">
<div class="input-group mb-3 mx-5">
<input class="reg-input form-control" type="text" placeholder="ENTER REG"
aria-label="Registration number entry" aria-describedby="Enter Registration">

<div class="input-group-append">
<button class="btn btn-outline-secondary enterreg__form--gobtn" type="submit">Go
</button>
</div>
</div>
</form>
<small class="d-block pb-4">Not to be used in conjuction with any other offer. &pound;1000 is vehicle valuation plus
over-allowance.</small>
</div>
<div class="col d-flex align-items-center p-2"><img src="/images/trade-in-car.png"/></div>
</div>
</div>
<div class="d-lg-none enterreg-mob row no-gutters">
<div class="col">
<img src="/images/trade-in-mobile.jpg"/>
<div class="enterreg__formwrapper">
<div class="row no-gutters h-100 d-flex align-items-end">
<div class="col">
<form class="w-100 mx-3 d-flex justify-content-center form-inline enterreg__form">
<div class="input-group">
<input class="reg-input form-control" type="text" placeholder="ENTER REG"
aria-label="Registration number entry" aria-describedby="Enter Registration">

<div class="input-group-append">
<button class="btn btn-outline-secondary enterreg__form--gobtn" type="submit">Go
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>-->