<?php

global $carItem, $saleModeDiscount, $amount, $listingType, $hide1hrMsg, $regYear, $carId;

if (empty($carItem['image'])) {
    $carItem['image'] = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '.png';
    // $carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&make='.$carItem['make_name'].'&modelFamily='.$carItem['model_name'].'&modelYear='.$carItem['reg_year'].'&modelRange='.$carItem['model_range'].'&modelVariant='.$carItem['model_variant'].'&powerTrain='.$carItem['power_train'].'&bodySize='.$carItem['body_size'].'&trim='.$carItem['trim'].'&paintId='.$carItem['paint_id'].'&paintDescription='.$carItem['paint_description'].'&rimId='.$carItem['rim_id'].'&rimDescription='.$carItem['rim_description'].'&interiorId='.$carItem['interior_id'].'&interiorDescription='.$carItem['interior_description'].'&fileType=webp&zoomType=fullscreen&zoomLevel=10&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.15&countryCode=GB';
}

$classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 col-xl-3 px-2 | carlist carlist_normalmode carlist_row';
$classesB = 'col col-5 col-md-12 | carlist__carimage';
$classesC = 'col col-7 col-md-12';

$fromPrice = $carItem['rrp'] ? $carItem['rrp'] : 'TBC';

if (strtolower($carItem['make_title']) == 'mercedes-benz') {
    $carItem['make_title'] = 'Mercedes';
}

$saleMessage = $saleModeDiscount;
if (isset($carItem['sale_mode_override']) && !empty($carItem['sale_mode_override'])) {
    $saleMessage = html_entity_decode($carItem['sale_mode_override']);
}

if ($amount <= 2) {
    $classesA = 'col-10 px-2 my-3 | carlist carlist_normalmode one-car';
    $classesB = 'col-12 col-sm-5 col-md-6 | carlist__carimage';
    $classesC = 'col col-md-6 pt-2 pt-sm-0 pt-md-4 pt-lg-5';
}
/*
elseif ($amount == 2) {
    $classesA = 'col-10 col-md-6 col-lg-4 px-2 | carlist carlist_normalmode two-car';
    $classesB = 'col-12 col-sm-5 col-md-12 | carlist__carimage';
    $classesC = 'col col-md-12 pt-2 pt-sm-0';
} 
*/
elseif ($amount == 3) {
    $classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 px-2 | carlist carlist_normalmode carlist_row';
}

//if (!isset($carmodel) || $listingType === 'similarcarlisting') {
if (empty($carId) || $listingType === 'similarcarlisting') {
    //$link = 'href="' . area_link('/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'], true) . '"';
    $link = 'href="' . '/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '/' . $carItem['car_id'] . '"';
} else {
    $link = '';
}


?>


<div class="<?php
            echo $classesA; ?>"
     data-rrp="<?php
               echo $carItem['rrp']; ?>"
     data-make="<?php
                echo $carItem['make_title']; ?>"
     data-range="<?php
                 echo $carItem['model_title']; ?>"
     data-location="<?php
                    echo $carItem['location_title']; ?>"
     data-branch="<?php
                  echo $carItem['api_name']; ?>"
    
     data-discount="<?php
                    echo $carItem['discount']; ?>"

     data-current-area="<?php
                        if (isset($branch)) {
                            if ($branch->ID == $carItem['location']) {
                                echo '1';
                            } else {
                                echo '0';
                            }
                        } else {
                            echo '0';
                        }
                        ?>">
    <div class="row">
        <?php if(isset($carmodel) && $carItem['derivative']!="&nbsp;" && $listingType !== 'similarcarlisting' && $amount <= 2 && $carId=="") { ?>
        <div class="col-12 text-center">
            <h4 class="deriv mb-0">
                <?php echo '<strong>'.$regYear . ' ' . strtoupper($carItem['make_title']) . ' ' . strtoupper($carItem['model_title']) . '</strong> ' . $carItem['derivative'];?>
            </h4>
        </div>
        <?php } elseif ($carId!="" && $listingType !== 'similarcarlisting') { ?>
        <div class="col-12 text-center">
            <h1 class="deriv">
                <?php echo $regYear . ' ' . strtoupper($carItem['make_title']) . ' ' . strtoupper($carItem['model_title']) . '<strong> ' . $carItem['derivative'] . '</strong>';?>
            </h1>
        </div>
        <?php } ?>
        <?php if (!isset($carmodel) || $listingType === 'similarcarlisting' || ($amount > 2) && isset($carmodel)) : ?>
        <div class="col-12 d-block d-md-none">
            <div class="car-name">
            <?php echo strlen($carItem['title']) > 23 ? substr($carItem['title'],0,23)."..." : $carItem['title']; ?>
                </br>
                <light><?php echo ' ' . $carItem['derivative']; ?></light>
            </div>
        </div>
        <?php
        endif; ?>
        <div class="<?php
                    echo $classesB; ?>">
            <?php if (!isset($carmodel) || $listingType === 'similarcarlisting' || ($amount > 2) && isset($carmodel)) : ?>
			
            <a <?php
               echo $link; ?> class="car-link">
				<div class="text-center car-name d-none d-md-block">
				    <?php echo strlen($carItem['title']) > 23 ? substr($carItem['title'],0,23)."..." : $carItem['title']; ?>
					<small><?php echo $carItem['derivative']; ?></small>
				</div>
			</a>
            <?php
            endif; ?>
            <a <?php
               echo $link; ?> class="car-link">
                <div class="img-holder" data-vrm="<?php echo $carItem['reg_number']; ?>">
                    <img class="car-img" src="<?php
                                              echo $carItem['image']; ?>" alt="<?php
                                                                               echo $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" />
                    <!--<div class="carlist__carreg--opaque larger">HUGE CHOICE</div>-->
                    <div class="carlist__carreg--opaque larger"><?php
                        echo $carItem['reg_number']; ?></div>
                </div>
            </a>
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
         
        </div>
        <!-- WE ADD THIS PADDING WHEN WE REMOVED THE BANNER FROM ACF -->
        <div class="<?php
                    echo $classesC; ?>" style="padding-top:24px">
            <div class="row">
                <a <?php
                   echo $link; ?> class="col col-12 col-md-12 | carlist__prices">
                   <!-- BELOW BANNER FROM ACF -->
                   <!-- <img class="svg-banner svg-banner-desktop" style="max-width: 100%;" src="<?php echo $saleMessage; ?>" /> -->
                    <div class="row no-gutters text-center price_info">
                        <div class="col | carlist__prices__price from_price px-1">
                          
                            <small style="line-height:14px">CAS  <span style="font-weight:300;line-height:14px;font-size: .7rem;text-transform:lowercase;" >or</span> <br> FINANCE</small>
                            <span>&pound;<?php echo  $carItem['rrp']  ?></span>


                            <!-- <div class="drive-away px-1">
                                WITH PX PAY ONLY
                                <br />
                                    <span class="pound">&pound;</span><span class="fdry-deposit"><?php echo  $carItem['rrp'] - 1500 ?>
                                </span>
                            

                            </div> -->



                        </div>

                        <!-- <div class="fdryEXTooltip">
                            <p style="color:white; font-weight:500" >EQ</p>
                        </div> -->

                        <div class="col | carlist__prices__deposit from_price">
                        <!-- <small>Just</small> -->
                            &pound;<span class="text-center"><?php echo TcFinance::getWeeklyPrice($fromPrice); ?></span>
                            <!-- <span class="text-center"><?php echo TcFinance::getWeeklyPrice( get_field('discounted_price',  $carItem['car_id']));?></span> -->

                            
                       
                        </div>
                        <div class="carlist__prices__divider">or</div>
                    </div>
                </a>
                <div class="col col-d-none col-md-12 offset-md-0 | carlist__finance">
                    <!-- <a href="#freefinance" class="text-center | carlist__button"> -->
                    <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?php echo $carItem['car_id']; ?>" class="text-center | carlist__button">
                        <div class="text">
                            <span>FREE</span> NO OBLIGATION <br>
                            <span>FINANCE CHECK</span>
                        </div>
                        <img class="ffc" src="<?php echo get_stylesheet_directory_uri() . '/images/click_here.svg'; ?>" alt="Click here" />
                    </a>
                    <figure data-image="<?php
                                        echo $carItem['image']; ?>" data-title="<?php
                                                                                echo $carItem['make_title'] . ' ' . $carItem['model_title'] ?>" data-rrp="<?php
                                                                                    echo $fromPrice; ?>" class="finance-example">Finance Example
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>