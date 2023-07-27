<?php
global $branch;
?>
<div class="d-md-none sticky-mobile-footer">
    <div class="container-fluid d-block d-xs-block d-sm-block d-md-none d-lg-none d-xl-none | sticky-mobile-footer__buttons">
        <div class="row">
            <!-- <div class="col list-group | sticky-mobile-footer__button--left">
                <a href="#pxvaluation" id="link--px-valuation">PX<br>Valuation</a>
            </div> -->
            <!-- <div class="col list-group | sticky-mobile-footer__button--left">
                <a href="/our-locations" id="px-valuation" style="display:inline-flex; align-items:center; justify-content:center"  >OUR<br>LOCATIONS
                    <img style="width:20px; margin-left:7px" src="https://www.thetradecentrewales.co.uk/wp-content/themes/tradecentrewales/images/finance-arrow.svg" >
                </a>

            </div> -->

            <!-- <div class="col | sticky-mobile-footer__button--middle">
                <a href="#" id="link--locations">
                    <?php if (isset($branch)) : ?>
                    Directions &amp; Opening Times
                    <?php else : ?>
                    Locations
                    <br><i class="far fa-map-marked-alt"></i>
                    <?php endif; ?>
                </a>
            </div> -->

            <div class="col list-group | sticky-mobile-footer__button--right">
                <!--   <a href="#freefinance" id="link--ffc">Free Finance Check</a> -->
                <a href="/finance-check" style="display:inline-flex; align-items:center; justify-content:space-around;padding:6px 6px 6px 6px;margin-top:0px">
					<span style="font-weight: 500; font-size: 14px; ">Free 30 sec Finance Check</span>
                    <img style="width:40px;margin-right:24px;" src="https://wordpress-531426-3318793.cloudwaysapps.com/wp-content/uploads/2023/05/CLICK-HERE_White.svg" >
					<?php //echo '<span>Rep. APR '.get_option('cns_representative_apr').'%</span>'; ?>
				</a>
                <!-- <i class="far fa-regular fa-arrow-right" style="color: #ffffff; position:relative; top:-5px"></i> -->
            </div>
        </div>
    </div>
</div>