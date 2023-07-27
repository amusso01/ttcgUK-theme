<?php
global $tertiaryPage, $pageUrl;
?><section class="content-tabs <?php echo (($tertiaryPage && $pageUrl !== 'price-promise') ? 'tabShadowPerm' : ''); ?>" role="tablist">
    <div class="list-group list-group-horizontal d-flex justify-content-center" id="content-tabs">
        <!-- <a class="list-group-item list-group-item-action text-center d-none d-md-block | tab-px" href="/part-exchange">VALUE MY PART-EX</a> -->
        <?php
        if ($tertiaryPage) :
        ?>
        <a class="list-group-item list-group-item-action active text-center | tab-ds" href="<?php area_link('/'); ?>">UK's CHEAPEST CARS</a>
        <a class="list-group-item list-group-item-action active text-center | tab-pp" href="/price-promise">PRICE PROMISE</a>
        <?php else : ?>
        <a class="list-group-item list-group-item-action active text-center | tab-ds" href="#dailyspecials" data-toggle="list" role="tab">UK's CHEAPEST CARS</a>
        <a class="list-group-item list-group-item-action text-center | tab-pp" href="/price-promise">PRICE PROMISE</a>
        <?php endif; ?>
        <a class="list-group-item list-group-item-action text-center d-none d-md-block | tab-pfc" href="/finance-check">
			FREE FINANCE CHECK
			<?php //echo '<span>Rep. APR '.get_option('cns_representative_apr').'%</span>'; ?>
		</a>
        <!--
        <a class="list-group-item list-group-item-action text-center d-none d-md-block | tab-pfc" href="#freefinance" data-toggle="list" role="tab">FREE FINANCE CHECK</a>
-->
    </div>

    <div class="tab-content">
        <div class="tab-pane fade | tab-pane--1" id="pxvaluation" role="tabpanel">
            <div class="container" style="position: relative">
                <div class="row">
                    <div class="col-12 text-right close-tab mb-5">Close <i class="far fa-times-circle"></i></div>
                    <?php
                    // echo do_shortcode('[part_exchange_form]');
                    ?>
                    <!--<div class="d-none d-md-block col col-12 col-md-4" style="">
<div id="px_image_container"><img
src="https://cdn.tradecentregroup.io/image/upload/f_auto,q_auto/v1544113615/web/Group/mobile-px.jpg"
style="width: 100%"/></div>
</div>
<div class=" col col-12 col-md-7 offset-md-1">
-- TODO: Put content for PX Valuation here --

<div class="row">
<div class="col-12">


<h3 class="">Part Exchange Valuation</h3>
<div id="error_box"></div>
<hr/>
</div>
</div>

<form autocomplete="off" id="pxvalform">
<div class="row mb-4">
<div class="col-12 col-md-4">
Registration
</div>
<div class="col-12 col-md-8" id="vrm-search">
<input type="text" class="form-control" id="vrm" name="px_vrm" required>
<button type="button" id="find_vehicle_submit" class="btn">Go</button>
</div>
</div>

<div class="row mb-4">
<div class="col-12 col-md-4">
It is a
</div>
<div id="vehicle_info" class="col-12 col-md-8">
<p style="font-size: 1em;">Please type in your registration above</p>
</div>

</div>

<div class="row mb-4">
<div class="col-12 col-md-4">
Current Mileage
</div>
<div id="vehicle_info" class="col-12 col-md-8">
<input type="number" min="0" max="9999999" step="1000" class="form-control"
id="mileage" name="mileage" required>
</div>

</div>

<div class="row mb-4">
<div class="col col-12 col-md-4">
Send my valuation to
</div>
<div class="col col-12 col-md-8">
<input class="form-control" id="email" name="email" placeholder="Email">
</div>
</div>

<div class="row mb-4">

<div class="col-sm-12">
<button type="button" class="btn c-button--blue" id="request_valuation"
disabled>Submit
</button>
</div>
</div>
<input hidden type="text" id="cap_id" value=""/>
<input hidden type="text" id="registration_year" value=""/>
</form>
</div>-->
                </div>
            </div>
        </div>

        <div class="tab-pane fade | tab-pane--4" id="freefinance" role="tabpanel">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-right close-tab">Close <i class="far fa-times-circle"></i></div>
                    <div class="col col-12">
                        <?php
                        //  echo do_shortcode('[finance_application_form]');
                        ?>
                        <!--<div id="iframe-container"></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>