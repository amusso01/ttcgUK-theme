<?php

global $carItem, $saleModeDiscount, $amount, $listingType, $hide1hrMsg;


if (empty($carItem['image'])) {
    $carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&make='.$carItem['make_name'].'&modelFamily='.$carItem['model_name'].'&modelYear='.$carItem['model_year'].'&modelRange='.$carItem['model_range'].'&modelVariant='.$carItem['model_variant'].'&powerTrain='.$carItem['power_train'].'&bodySize='.$carItem['body_size'].'&trim='.$carItem['trim'].'&paintId='.$carItem['paint_id'].'&paintDescription='.$carItem['paint_description'].'&rimId='.$carItem['rim_id'].'&rimDescription='.$carItem['rim_description'].'&interiorId='.$carItem['interior_id'].'&interiorDescription='.$carItem['interior_description'].'&fileType=webp&zoomType=fullscreen&zoomLevel=10&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.15&countryCode=GB';
}

$classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 col-xl-3 px-2 | carlist carlist_salemode';
$classesB = 'col col-12 col-md-12 col-sm-5 | carlist__carimage';
$classesC = 'col col-12 col-md-12 col-sm-7';

$fromPrice = $carItem['from_price'] ? $carItem['from_price'] : 'TBC';
$rrp = $carItem['rrp'] ? $carItem['rrp'] : 'TBC';

$discount =  $carItem['discount'] ?  $carItem['discount'] : 0;
$totalPrice = $rrp - $discount;

$saleMessage = $saleModeDiscount;
if (isset($carItem['sale_mode_override']) && !empty($carItem['sale_mode_override'])) {
    $saleMessage = html_entity_decode($carItem['sale_mode_override']);
}

if ($amount == 1) {
    $classesA = 'col-10 px-2 | carlist carlist_salemode one-car';
    $classesB = 'col-12 col-sm-5 col-md-6 | carlist__carimage';
    $classesC = 'col col-md-6 pt-2 pt-sm-0 pt-md-4 pt-lg-5';
} elseif ($amount == 2) {
    $classesA = 'col-10 col-md-6 col-lg-4 px-2 | carlist carlist_salemode two-car';
    $classesB = 'col-12 col-sm-5 col-md-12 | carlist__carimage';
    $classesC = 'col col-md-12 pt-2 pt-sm-0';
} elseif ($amount == 3) {
    $classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 px-2 | carlist carlist_salemode less-than-4';
}

if (!isset($carmodel) || $listingType === 'similarcarlisting') {
    //$link = 'href="' . area_link('/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'], true) . '"';
    $link = 'href="' . '/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '/' . $carItem['car_id'] . '"';
} else {
    $link = '';
}
?>
<div class="<?php
echo $classesA; ?>"
     data-rrp=""
     data-make="<?php
     echo $carItem['make_title'] ?>"
     data-range="<?php
     echo $carItem['model_title'] ?>"
     data-location=""
     data-branch=""
     data-current-area="0">
    <div class="row">
        <div class="col-12 d-none d-md-block | carlist__prices__salerow">
            <div class="text-center car-name" style="position: relative;"> 
				<?php echo $carItem['title']; ?>
				<small style="text-align: center; line-height: 0.8em;  margin-bottom: 20px;"><?php echo $carItem['derivative']; ?></small>

			</div>
            
        </div>
        <div class="<?php
        echo $classesB; ?>">
 
            <a <?php echo $link; ?> class="car-link">
                
                <div class="d-md-none carlist__prices__salerow"> <!--<img src="<?php echo $saleMessage; ?>" />-->
					 <div class="text-center car-name" style="position: relative;"> <?php
                    echo ''.$carItem['make_title'] . ' ' . $carItem['model_title']; ?>
					<small style="text-align: center; line-height: 0.8em;  margin-bottom: 20px;"><?php echo $carItem['derivative']; ?></small>

					</div>
				</div>
                <div class="img-holder">
                    <img class="car-img" src="<?php
                    echo $carItem['image']; ?>" alt="<?php
                    echo $carItem['make_title'] . ' ' . $carItem['model_title']; ?>"/>
                    <?php
                    if (!isset($carmodel) || $listingType === 'similarcarlisting') : ?>
                       <!-- <div class="text-center car-name d-md-none"><small> </small><?php
                    echo $carItem['make_title'] . ' ' . $carItem['model_title']; ?></div> -->
                    <?php
                    endif; ?>
                    <div class="deposit" style="display:none">
                        <div class="deposittext">&pound;<?php
                            echo '99';//TcFinance::getDeposit($fromPrice); ?></div>
                        <div class="depositlabel">DEPOSIT</div>
                    </div>
					
					<div class="icon-plate">
						<?php print_r($carItem['reg_number']) ; ?>
					</div>
                </div>
				
				
				
				
                <?php
                if (!isset($carmodel) || $listingType === 'similarcarlisting') : ?>
                  <!--   <div class="text-center car-name d-none d-md-block"><small> </small><?php
                        echo $carItem['title']; ?></div> -->
                <?php
                endif; ?>
            </a>
        </div>
        <div class="<?php
        echo $classesC; ?>">
            <!--<div class="row">
                <a <?php //echo $link; ?> class="col col-12 col-md-12 | carlist__prices blue-price-box" >
                    <h3>PLUS! <span>£1000</span></h3>
                    <p>OVER MARKET VALUE FOR YOUR PART-EX</p>
                </a>
                <a <?php
                echo $link; ?> class="col col-12 col-md-12 | carlist__prices" style="display:none">
                    <div class="row no-gutters" style="text-align: center;">
                        <div class="col-6 carlist__saleprices">
                            <div class="row no-gutters">
                                <div class="col-12 carlist__wasprice">
                                    <span class="smalltext">Was</span>
                                    <span class="pricetext">&pound;
										<?php //echo $fromPrice + 1000; ?>
										<?php echo $rrp; ?>
									</span>
                                </div>
                                <div class="col-12 carlist__nowprice">
                                    <span class="smalltext">Now</span>
                                    <span class="pricetext">&pound;
										<?php //echo $fromPrice; ?>
										<?php echo $totalPrice; ?>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 carlist__weeklyprice" style="">
                            <span class="smalltext">Just</span>
                            <span class="weeklyprice">&pound;<?php
                                echo TcFinance::getWeeklyPrice($totalPrice); ?></span>
                            <span class="weektext">Per Week</span>
                        </div>
                        <div class="carlist__prices__divider">or</div>
                    </div>
                </a>
                <div class="col col-12 col-md-12 offset-md-0 | carlist__finance">
                    <a href="/finance-check/" class="text-center | carlist__button"><img class="ffc ls-is-cached lazyloaded" src="https://wordpress-531426-2343812.cloudwaysapps.com/wp-content/themes/tradecentrewales/images/click_here.svg" data-src="https://wordpress-531426-2343812.cloudwaysapps.com/wp-content/themes/tradecentrewales/images/click_here.svg" alt="Click here"> Free Finance
                        Check</a>
                    <figure data-image="<?php
                    echo $carItem['image']; ?>" data-title="<?php
                    echo $carItem['make_title'] . ' ' . $carItem['model_title'] ?>" data-rrp="<?php
                    echo $totalPrice; ?>" class="finance-example">Finance Example
                    </figure>
                </div>

               
            </div>-->
			
			 <div class="spec-holder clearfix ">
				<?php 
                $techinfo = cns_car_technical_data( $carItem['car_id'] ); 
                
                $mpg = "";
                $insurence = "";
                foreach ($techinfo as $categoryName => $data) :
                    foreach ($data as $featureTitle => $featureValue) : 
                        if( $featureValue != "Not Available"){
                            if(strpos($featureTitle, "(mpg)" ) !== false){
                                $mpg = $featureValue;
                            } 
    
                            if(strpos($featureTitle, "Insurance" ) !== false){
                                $insurence = $featureValue;
                            } 

                        }
                      
                    endforeach;
                    
                endforeach;
                
                ?>
                <?php if($carItem['transmission']!="") { ?>
                <div class="spec"><i class="fal fa-cogs"></i><?php echo $carItem['transmission']; ?></div>
                <?php } ?>  
                <?php if($carItem['fueltype']!="") { ?>
                <div class="spec"><i class="far fa-gas-pump"></i><?php echo $carItem['fueltype']; ?></div>
                <?php } ?> 
                <?php if($carItem['mileage']>0) { ?>
                <div class="spec"><i class="far fa-tachometer"></i><?php echo number_format($carItem['mileage']); ?></div>
                <?php } ?> 
				
				 <?php if($mpg!="") { ?>
                <div class="spec"><i class="fal fa-car"></i><?php echo $mpg; ?> mpg</div>
                <?php } ?>  
                <?php if($insurence!="") { ?>
                <div class="spec"><i class="far fa-shield-check"></i><?php echo $insurence; ?> Ins. Group</div>
                <?php } ?>   
            </div>

			
			
			 <div class="row">
                <a <?php
                   echo $link; ?> class="col col-12 col-md-12 | carlist__prices">
					
					 <img class="svg-banner" style="max-width: 100%;"   src="<?php echo $saleMessage; ?>" />
					
                    <div class="row no-gutters text-center price_info sale-try">
                        <div class="col | carlist__prices__price from_price">
                            <small>Was</small>
                            &pound;<span><?php
                            echo $totalPrice+2000; ?></span>


                            <div class="drive-away px-1">
								<small>NOW</small>
                               <span> &pound;<?php
                            	echo $totalPrice; ?></span>

                            </div>



                        </div>
                        <div class="col | carlist__prices__deposit from_price">
                            <small>Just</small>
                            &pound;<span class="text-center"><?php
                            echo TcFinance::getWeeklyPrice($totalPrice); ?></span>
                        </div>
						<svg class="flag-icon" version="1.1" id="Layer_1" 
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 172.4 98.4"
	 style="enable-background:new 0 0 172.4 98.4;" xml:space="preserve">
<style type="text/css">
	
	.st4{fill:#FFFFFF;}
	
</style>
	
	<g>
		<polygon points="136.5,0.1 172.4,27.7 172.4,0.1 		"/>
		<path class="st4" d="M167.5,17.6l-2-1.6l-0.5,0.6l0.6,0.5l-1.6,2l0.7,0.5l1.6-2l0.7,0.5L167.5,17.6z M165.2,15.8l-0.7-0.5
			l-2.1,2.7l0.7,0.5L165.2,15.8z M161.2,17c0.5,0.4,1.1,0.4,1.5-0.1c0.3-0.4,0.3-0.9-0.1-1.4c-0.3-0.4-0.2-0.6-0.2-0.6
			c0.1-0.1,0.2-0.1,0.3,0c0.2,0.1,0.3,0.3,0.3,0.5l0.8-0.1c-0.1-0.4-0.2-0.7-0.6-1c-0.5-0.4-1.1-0.4-1.5,0.1c-0.4,0.5-0.2,1,0.1,1.4
			c0.3,0.5,0.2,0.6,0.2,0.6c-0.1,0.1-0.2,0.1-0.3,0c-0.2-0.1-0.3-0.3-0.4-0.6l-0.8,0.1C160.5,16.3,160.8,16.6,161.2,17 M160.1,12.8
			c0.4,0.3,0.5,0.9,0.2,1.3c-0.3,0.4-0.9,0.5-1.3,0.2c-0.4-0.3-0.5-0.9-0.2-1.3C159.2,12.5,159.7,12.5,160.1,12.8 M158.5,14.9
			c0.8,0.6,1.9,0.5,2.5-0.3c0.6-0.8,0.4-1.9-0.3-2.5c-0.8-0.6-1.9-0.5-2.5,0.3C157.6,13.2,157.7,14.3,158.5,14.9 M157.5,10.7
			c0.2,0.1,0.2,0.4,0.1,0.6c-0.2,0.2-0.4,0.2-0.6,0.1l-0.2-0.2l0.6-0.7L157.5,10.7z M156.6,12c0.5,0.4,1.2,0.3,1.6-0.2
			c0.4-0.5,0.3-1.2-0.2-1.6l-1-0.8l-2.1,2.7l0.7,0.5l0.6-0.8L156.6,12z M154.6,11.7l0.5-0.6l-1.1-0.9l0.4-0.5l1.1,0.9l0.4-0.6
			l-1.1-0.9l0.3-0.4l1.1,0.9l0.5-0.6l-1.8-1.4l-2.1,2.7L154.6,11.7z M152.6,6.9c0.4,0.3,0.4,0.9,0.1,1.3c-0.3,0.4-0.9,0.5-1.3,0.2
			l-0.3-0.2l1.2-1.5L152.6,6.9z M151.2,9.1c0.7,0.6,1.7,0.4,2.3-0.3C154,8,154,7,153.2,6.4l-1.1-0.9L150,8.2L151.2,9.1z"/>
		<path class="st4" d="M167.2,11.2c-0.4-0.3-0.4-0.8-0.2-1.1c0.2-0.3,0.7-0.4,1.1-0.1c0.4,0.3,0.5,0.9,0.2,1.2
			C168.2,11.4,167.6,11.5,167.2,11.2 M169.2,8.7c-1.1-0.9-2.6-0.8-3.4,0.3c-0.8,1-0.5,2.5,0.5,3.3c0.2,0.2,0.5,0.4,0.8,0.4
			c-0.5,0.4-1,0.4-1.3,0.1c-0.3-0.2-0.5-0.6-0.4-1.1l-1.6,0.2c0,1,0.4,1.6,1.1,2.2c1.3,1.1,3.1,0.5,4.3-1.1
			C170.7,11.1,170.3,9.6,169.2,8.7 M162.4,7.4c-0.4-0.3-0.4-0.8-0.2-1.1c0.2-0.3,0.7-0.4,1.1-0.1c0.4,0.3,0.5,0.9,0.2,1.2
			C163.4,7.7,162.8,7.8,162.4,7.4 M164.4,5c-1.1-0.9-2.6-0.8-3.4,0.3c-0.8,1-0.5,2.5,0.5,3.3c0.2,0.2,0.5,0.4,0.8,0.4
			c-0.5,0.4-1,0.4-1.3,0.1c-0.3-0.2-0.5-0.6-0.4-1.1l-1.6,0.2c0,1,0.4,1.6,1.1,2.2c1.3,1.1,3.1,0.5,4.3-1.1
			C165.9,7.4,165.5,5.8,164.4,5 M156.4,5.5c0.3-0.2,0.5-0.4,0.7-0.6l1.1,0.9l0.8-1.1l-1-0.8c0.1-0.1,0.2-0.3,0.3-0.3
			c0.2-0.2,0.4-0.4,0.6-0.5c0.1-0.1,0.3-0.1,0.5,0c0.2,0.1,0.2,0.3,0.2,0.5l1.5-0.2c0-0.6-0.3-1.2-0.8-1.6c-0.6-0.5-1.4-0.5-2.1,0
			c-0.1,0.1-0.2,0.2-0.4,0.3c-0.2,0.1-0.4,0.3-0.7,0.7c0,0-0.1,0.1-0.2,0.2l-0.6-0.5l-0.8,1.1l0.4,0.3c-0.5,0.5-1.2,1.2-2.2,1.6
			c0.7,0.2,1.1,0.5,1.3,0.7c0.1,0.1,0.4,0.3,0.5,0.5c0.2,0.3,0.6,0.7,0.9,0.9c0.4,0.3,0.5,0.4,1,0.6l1.1-1.3c-0.3,0-0.7-0.2-0.9-0.4
			c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.1-0.3-0.3-0.4-0.4C156.8,5.7,156.7,5.6,156.4,5.5z"/>
	</g>
</svg>

                        <div class="carlist__prices__divider">or</div>
                    </div>
                </a>
                <div class="col col-12 col-md-12 offset-md-0 | carlist__finance">
                    <!-- <a href="#freefinance" class="text-center | carlist__button"> -->
                    <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?php echo $carItem['car_id']; ?>" class="text-center | carlist__button">
                        <img class="ffc" src="<?php echo get_stylesheet_directory_uri() . '/images/click_here.svg'; ?>" alt="Click here" />
                        Free Finance
                        Check</a>
                    <figure data-image="<?php
                    echo $carItem['image']; ?>" data-title="<?php
                    echo $carItem['make_title'] . ' ' . $carItem['model_title'] ?>" data-rrp="<?php
                    echo $totalPrice; ?>" class="finance-example">Finance Example
                    </figure>
                </div>
            </div>
			
			
			
        </div>
    </div>
</div>