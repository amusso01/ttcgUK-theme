<?php
global $carItem;

if ($carId = get_query_var('car_id')) {
    $engineCapacity = cns_format_engine_capacity(get_field('enginecapacity', $carId));
    $location = get_post(get_field('location', $carId));
}

$techData = cns_car_technical_data($carId);
$standardEquipment = cns_car_standard_equiptment($carId);

$_SESSION['make'] = $carItem['make_title'];
$_SESSION['model'] = $carItem['model_title'];
$_SESSION['vid'] = $carItem['car_id'];
?>

<div class="container mb-5">
    <div class="row cardata__table">
        <div class="col-12 d-none">
            <h2>All about your car</h2>
        </div>
        <div class="col-12 col-md-4">
            <div class="row no-gutters">
                <div class="col-12 red__border">
                    Mechanical
                </div>
                <div class="col-6 grey__border">
                    Transmission
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo (get_field('transmission', $carId)!='') ? get_field('transmission', $carId) : "TBC";
                        ?></span>
                </div>
                <!--<div class="col-6 grey__border">
Milage
</div>
<div class="col-6 text-right grey__border">
<span>33,000</span>
</div>-->
                <div class="col-6 grey__border">
                    Engine
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo ($engineCapacity>0) ? $engineCapacity : "TBC";
                        ?></span>
                </div>
                <div class="col-6 grey__border">
                    Fuel
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo (get_field('fueltype', $carId)!='') ? get_field('fueltype', $carId) : "TBC";
                        ?></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="row no-gutters">
                <div class="col-12 red__border">
                    Trim
                </div>
                <div class="col-6 grey__border">
                    Body
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo (get_field('bodytype', $carId)!='') ? get_field('bodytype', $carId) : "TBC";
                        ?></span>
                </div>
                <!--<div class="col-6 grey__border">
Colour
</div>
<div class="col-6 text-right grey__border">
<span>Brown</span>
</div>-->
                <div class="col-6 grey__border">
                    Doors
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo (get_field('doors', $carId)!='') ? get_field('doors', $carId) : "TBC";
                        ?></span>
                </div>
                <div class="col-6 grey__border">
                    Seats
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo (get_field('seats', $carId)!='') ? get_field('seats', $carId) : "TBC";
                        ?></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="row no-gutters">
                <div class="col-12 red__border">
                    Useful Information
                </div>
                <div class="col-6 grey__border">
                    Registration
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo get_field('reg_number', $carId); ?></span>
                </div>
                <div class="col-6 grey__border">
                    Mileage
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo (number_format(get_field('mileage', $carId))>0) ? number_format(get_field('mileage', $carId)) : "TBC";
                        ?></span>
                </div>
                <div class="col-6 grey__border">
                    Location
                </div>
                <div class="col-6 text-right grey__border">
                    <span><?php
                        echo (get_field('destination_label', $carId)!='') ? get_field('destination_label', $carId) : "TBC";
                        ?></span>
                </div>
            </div>
        </div>
        <?php if(get_field('capid', $carId)>0) { ?>
        <div class="col-12 mt-5" >
            <div class="col-12 text-center spec-buttons">
                <button class="btn btn-green" data-toggle="modal" data-target="#carFeaturesModal">Car Features
                </button>
                <button class="btn btn-green" data-toggle="modal" data-target="#carSpecModal">Car Specs</button>
            </div>
        </div>
        <?php } ?>
        <?php  if(is_single()) : ?>
        <div class="col-12 mt-5 blue-box" style="padding-left:20px; padding-right:20px" >
            <div class="fdryLegal">
                <p style="
                font-size:13px;
                margin-top:5px;
                text-align:center;
                " >All cars subject to availability. See price promise in store. All web specials are inclusive of £199 admin fee. See Terms and Conditions. As a contribution towards our costs for vehicle transportation / logistics and preparation, a mandatory administration fee of £199.00 (including VAT) is payable on all retail vehicles we sell.
                <br>Above web special and part-exchange promotion are individual offers and cannot be used in conjunction with any other offer.    
            </p>
            </div>
        </div>
        <?php endif; ?>
		<!-----Car data finance--->
		<div class="col-12 col-md-12 financeTable blue-box " style="margin-top:40px">
            <div class="row no-gutters">
                <div class="col-12 ">
                    <h3><?php echo strtoupper($carItem['title']); ?></h3>
					<p>
						<strong>Illustrative Example (Hire Purchase):</strong>


					</p>
					<p class="d-none">
						<strong>&pound;<span class="weeklyprice"></span></strong> per week with <span class="deposit"></span> deposit
					</p>
                </div>
                <div class="col-12  ">
					<div class="list_financial_table">
                                                <!--<p>Cash Price <span>&pound;<span class="cashprice"></span></span>. 
                    Total Deposit <span>&pound;<span class="deposit"></span></span>. 
                    Credit amount <span>&pound;<span class="creditamount"></span></span>. 
                    Final payment <span>&pound;<span class="finalpayment"></span></span>. 
                    Monthly amount <span>&pound;<span class="monthlyamount"></span></span>. 
                    APR <span><span class="apr"></span>&percnt; (Fixed)</span>. 
                    Total amount <span>&pound;<span class="totalamount"></span> (Inc Deposit)</span>. 
                    Per week <span>&pound;<span class="weeklyprice"></span></span>. 
                    Finance term months <span><span class="term"></span></span>. 
                    Representative APR <span><span class="representativeapr"></span><?php echo get_option('cns_representative_apr'); ?>&percnt;</span>.</p> -->
						
						<p><?php 

								// args
								$args = array(
									'numberposts'   => -1,
									'post_type'     => 'financeexample',
									'meta_key'      => 'cash_price',
									'meta_value'    => $carItem['rrp']
								);

								$the_query = new WP_Query( $args );
								if( $the_query->have_posts() ): 
									while( $the_query->have_posts() ) : $the_query->the_post(); 
										echo get_field('representative_example'); 
									endwhile; 
								endif; 
								wp_reset_query();?>
						
						</p>
						<p>Please Note: The above is an ‘illustrative example’ with limited availability – subject to status.<br>
                        <strong>The Trade Centre Group PLC is a Credit Broker not a Lender</strong></p>
					</div>
                    
                </div>
                
            </div>
        </div>
    </div>

</div>
<!-- 
<div class="container-fluid">
    <div class="row my-5">
        <div class="col-12 px-0 text-center">
            <br />
            <small>Above web special and part-exchange promotion are individual offers and cannot be used in conjunction with any other offer.</small><br/>
        </div>
    </div>
</div> -->

<?php
