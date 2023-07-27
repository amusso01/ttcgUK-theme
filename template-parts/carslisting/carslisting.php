<?php

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
$metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;


if ($listingType != 'similarcarlisting') {
    $carsArray = [];

    if (get_option('tcw_special_offers') == SPECIAL_OFFERS_ON && !isset($carmake) && !isset($carmodel)) {
        get_template_part('template-parts/carslisting/get-cars-special', 'front-page');
    }
    
    
    if (!isset($branch) || empty($carsArray)) {
        if ($saleMode === LISTING_FROM_MODE) {
            get_template_part('template-parts/carslisting/get-cars-from-mode', 'front-page');
            shuffle($carsArray);
        } elseif ($saleMode === LISTING_SALE_MODE) {
            get_template_part('template-parts/carslisting/get-cars-sale-mode', 'front-page');
           // shuffle($carsArray);
        } else {
            get_template_part('template-parts/carslisting/get-cars-normal-mode', 'front-page');
        }
    }
}



?>
<?php
$techData = cns_car_technical_data($carId);
$standardEquipment = cns_car_standard_equiptment($carId);
?>
<!-- Modal -->
<div class="modal right fade car-info-modal" id="carSpecModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Car Specs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                                                  aria-hidden="true"><i class="fal fa-times"></i></span></button>
            </div>

            <div class="modal-body">
                <?php
                $i = mt_rand(0, 999999);
                foreach ($techData as $categoryName => $data) :
                ?>
                <div class="wp-block-pb-accordion-item c-accordion__item js-accordion-item is-read"
                     data-initially-open="false" data-click-to-close="true" data-auto-close="true"
                     data-scroll="false" data-scroll-offset="0"><h2 id="at-<?php
                    echo $i; ?>"
                                                                    class="c-accordion__title js-accordion-controller"
                                                                    role="button" tabindex="0"
                                                                    aria-controls="ac-<?php
                    echo $i; ?>" aria-expanded="false">
                    <?php
                    echo $categoryName; ?></h2>
                    <div id="ac-<?php
                             echo $i++; ?>" class="c-accordion__content" style="display: none;" hidden="hidden">
                        <ul>
                            <?php
                            foreach ($data as $featureTitle => $featureValue) :
                            ?>
                            <li>
                                <?php
                                echo $featureTitle; ?>
                                <span>
                                    <?php
                                    echo $featureValue; ?>
                                </span>
                            </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
<div class="modal right fade car-info-modal" id="carFeaturesModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Car Features</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                                                  aria-hidden="true"><i class="fal fa-times"></i></span></button>
            </div>

            <div class="modal-body">
                <?php
                $i = mt_rand(0, 999999);
                foreach ($standardEquipment as $name => $data) :
                ?>
                <div class="wp-block-pb-accordion-item c-accordion__item js-accordion-item is-read"
                     data-initially-open="false" data-click-to-close="true" data-auto-close="true"
                     data-scroll="false" data-scroll-offset="0"><h2 id="at-<?php
                    echo $i; ?>"
                                                                    class="c-accordion__title js-accordion-controller"
                                                                    role="button" tabindex="0"
                                                                    aria-controls="ac-<?php
                    echo $i; ?>" aria-expanded="false">
                    <?php
                    echo $name; ?></h2>
                    <div id="ac-<?php
                             echo $i++; ?>" class="c-accordion__content" style="display: none;" hidden="hidden">
                        <ul>
                            <?php
                            foreach ($data as $featureValue) :
                            ?>
                            <li>
                                <?php
                                echo $featureValue; ?>
                            </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
<?php

$showListing = true;
$fpOptions = get_field('front_page', 'options');
if ($wp->request === '' && !empty($fpOptions['top_desktop'])) :
    $banner_top_desktop_front_page = $fpOptions['top_desktop'];
    $banner_top_mobile_front_page = $fpOptions['top_mobile'];
    $banner_sticky_mobile = $fpOptions['sticky_mobile'];
?>


<img class="d-none d-md-block  w-100"
src="<?php echo $banner_top_desktop_front_page; ?>?v=<?php echo date("HdmY"); ?>"/>
<img class="d-md-none w-100"
src="<?php echo $banner_top_mobile_front_page; ?>?v=<?php echo date("HdmY"); ?>"/>

<div class="sticky-top-banner" style="margin-bottom: 25px;">
    <!-- <img class="d-none d-md-block  w-100"
src="https://cdn.tradecentregroup.io/image/upload/v1683128679/TCG-Banner-Desktop.jpg?v=<?php echo date("HdmY"); ?>"/>
    <img class="d-md-none w-100" src="<?php echo $banner_sticky_mobile  ?>?v=<?php echo date("HdmY"); ?>"/> -->
    
    <div class="marquee_text">
        WE WANT YOUR PART-EX<span class="smaller" style=" font-weight:400; letter-spacing:0.1px; position:relative;"> AND </span>WE PAY MORE - <span style="color:#c21818">PUT US TO TEST! </span>
        &nbsp; WE WANT YOUR PART-EX<span class="smaller" style=" font-weight:400; letter-spacing:0.1px; position:relative;"> AND </span>WE PAY MORE - <span style="color:#c21818">PUT US TO TEST! </span>
    </div>
</div>

<div class="blue-box">
	<div class="container">
		<p><strong>Representative example (Hire purchase):</strong> The Trade Centre Group PLC is a Credit Broker not a lender* Representative APR 13.9%</p>
		<div class="blue-grid">
			<?php
				if( have_rows('items','options') ):
					while( have_rows('items','options') ) : the_row();
						echo '<p class="info-blue"><span class="info">'.get_sub_field('title').'</span><br><strong>'.get_sub_field('value').'</strong></p>';
					endwhile;
				endif;
			?>
			
		</div>
	</div>
</div>
<?php
endif;
?>
<section class="container-fluid | carslisting <?php
                echo $listingType; ?>">

    <?php
    $banner_break_front_page = [];
    if (count($fpOptions['break_collection'])) :
    foreach ($fpOptions['break_collection'] as $breakRow) {
        $banner_break_front_page[] = [
            'desktop' => $breakRow['break_desktop'],
            'desktop_link' => $breakRow['break_desktop_link'],
            'mobile' => $breakRow['break_mobile'],
            'mobile_link' => $breakRow['break_mobile_link']
        ];
    }
    ?>
    <script type="text/javascript">
        const breakBanners = <?php echo json_encode($banner_break_front_page); ?>;
    </script>
    <div class="row pb-3 d-none carlist-break">
        <div class="col">
            <img class="d-none carlist-desktop-break d-md-block w-100"
                 src="<?php echo $banner_break_front_page[0]['desktop']; ?>?v=<?php echo date("HdmY"); ?>"/>
            <img class="d-md-none carlist-mobile-break w-100"
                 src="<?php echo $banner_break_front_page[0]['mobile']; ?>?v=<?php echo date("HdmY"); ?>"/>
        </div>
    </div>
    <?php
    endif;
    ?>
    <div class="d-none col-12 py-5 mb-3" style="background-color: #0D64E5"><h1 style="color: #fff; text-align: center;">BREAK</h1></div>
    <?php
    if (isset($show404)) {
        get_template_part('template-parts/404-block', 'front-page');
    }
    if ($listingType != 'similarcarlisting') :
    if (!empty($fpOptions['sdm_desktop'])) :
    $banner_sdm_desktop_front_page = $fpOptions['sdm_desktop'];
    $banner_sdm_mobile_front_page = $fpOptions['sdm_mobile'];
    ?>
    <div class="row pb-5">
        <div class="col">
            <a href="/social-distancing">
                <img src="<?php echo $banner_sdm_desktop_front_page; ?>?v=<?php echo date("HdmY"); ?>" class="d-none d-md-block w-100 safetyimg" />
                <img src="<?php echo $banner_sdm_mobile_front_page; ?>?v=<?php echo date("HdmY"); ?>" class="d-md-none w-100 safetyimgmob" /></a>
        </div>
    </div>
    <?php
    endif;
    if (!empty($fpOptions['header_desktop'])) :
    $banner_desktop_front_page = $fpOptions['header_desktop'];
    $banner_mobile_front_page = $fpOptions['header_mobile'];
    ?>
    <div class="row pb-5">
        <div class="col">
            <img class="d-none d-md-block w-100"
                 src="<?php echo $banner_desktop_front_page; ?>?v=<?php echo date("HdmY"); ?>"/>
            <img class="d-md-none w-100"
                 src="<?php echo $banner_mobile_front_page; ?>?v=<?php echo date("HdmY"); ?>"/>
        </div>
    </div>
    <?php
    endif;
    endif;
    /*if($carmodel) {
        $post = get_post($query->posts[0]);
        $modelyear = $post->year;
    }*/
    ?>
    <?php
    if ($wp->request !== '' && $carId=="") :
    ?>
    <h1 class="text-center">
        <?php if ($wp->request === '') : echo '<img class="d-none d-md-inline" height="92px" src="' . SITE_LOGO . '" />'; endif; ?>
        <?php if($modelyear!="" && !isset($similarCars)) echo str_replace('Used',$modelyear,$title);
        else echo $title; ?>
        <?php if ($wp->request === '') : echo '<img class="d-none d-md-inline" height="92px" src="' . SITE_LOGO . '" />'; endif; ?>
    </h1>
    <p class="text-center d-block">
        <?php
        if ($wp->request == '') {
        ?>
        See our <a class="price-promise-link" href="/price-promise">Price Promise</a>
        <?php } ?>
    </p>
    <?php
    endif;
    if($carId!="" && isset($similarCars)) echo '<h1 class="text-center">' . $title . '</h1>';
    if ($showListing) : ?>
    <!--<h5 class="text-center">
<?php
if ($wp->request == '') {
?>
Over 3,000 Cars In Stock
<?php } ?>
</h5>-->

<?php
if($saleMode ===  LISTING_CAR_MODE){

    $amount = count($carsArray);
    $saleArray =  array();
    $cars_list_Array =  array();
    if ($amount) {
        $i = 0;
        foreach ($carsArray as $carItem) {
            if( get_field('is_on_sale',$carItem['car_id']) ){
                $saleArray[] =  $carItem;
            }else{
                $cars_list_Array[] =  $carItem;
            }

        }

        $carsArray=$cars_list_Array;
    }
}
?>


    <div class="row justify-content-center | carlistrow">
        <?php

      

        $amount = count($carsArray);

        
        
        if ($amount) {
            $i = 0;
            foreach ($carsArray as $carItem) {
                $i++;
                //var_dump($i);
                //var_dump($i % 4);
                switch ($carItem['type']) {
                    case LISTING_NORMAL_MODE :
                        
                        if(false){
                            if( get_field('is_on_sale',$carItem['car_id']) ){
                                get_template_part('template-parts/carslisting/sale-mode-cars-item', 'front-page');
                            }else{
                                get_template_part('template-parts/carslisting/normal-mode-cars-item', 'front-page');
                            }
                        }else{
                            get_template_part('template-parts/carslisting/normal-mode-cars-item', 'front-page');
                        }
                        break;
                    case LISTING_SALE_MODE :
                        get_template_part('template-parts/carslisting/sale-mode-cars-item', 'front-page');
                        break;
                    case LISTING_FROM_MODE :
                        get_template_part('template-parts/carslisting/from-mode-cars-item', 'front-page');
                        break;
                    case LISTING_SPECIALS :
                        get_template_part('template-parts/carslisting/special-cars-item', 'front-page');
                        break;
                }
            }
        } else {
            if (!$carmake->post_title) {
                $carname = 'cars';
            } else {
                $carname = $carmake->post_title . ' ' . $carmodel->post_title;
            }
        ?>
        <p>We currently have no <?php
            echo $carname; ?> in our Daily Specials, however we have a large
            selection to choose from at our car supermarkets.</p>
        <?php
        }
        ?>
    </div>
	
	
<?php
if($saleMode ===  LISTING_CAR_MODE){

    
    $amount = count( $saleArray);
    if ($amount) {
        echo ' <div class="row justify-content-center | carlistrow list_car_listing">';
        $i = 0;
        foreach ( $saleArray as $carItem) {
            get_template_part('template-parts/carslisting/normal-mode-cars-item', 'front-page');
        }
        echo '</div>';
    }

    
}
?>

	
	
	
    <div class="col-12 text-center">
        <?php if(($carId=='') || $listingType==='similarcarlisting') { ?>
        <small>Above web special and part-exchange promotion are individual offers and cannot be used in conjunction with any other offer.</small><br/>
        <?php } ?>
        <?php
        if ($amount > 6) : ?>
        <!--<a class="c-button--grey d-lg-none load-more" data-type="<?php
echo $listingType; ?>">Load More</a>-->
        <?php
        endif;
        if ($amount > 8) : ?>
        <!--<a class="c-button--grey d-none d-lg-inline-block d-xxl-none load-more" data-type="<?php
echo $listingType; ?>">Load More</a>-->
        <?php
        endif;
        if ($amount > 10) : ?>
        <!--<a class="c-button--grey d-none d-xxl-inline-block load-more" data-type="<?php
echo $listingType; ?>">Load More</a>-->
        <?php
        endif; ?>
       <a class="fdry-find-us c-button--blue" style="color:white; font-size:12px;line-height: 12px;display: inline-flex; text-align: left; align-items: center;
            border-radius: 3px;
            border:1px solid white;
            border-color: rgba(255,255,255,.1);
            padding: 0.4rem 0.75rem;
        ">
            <span class="locations__place icon" style="color:white"></span>
            FIND US
        </a>
    </div>
    <?php
    endif;
    if ($carId && !$similarCars) {
        get_template_part('template-parts/carslisting/car-detail', 'front-page');
    }
    ?>
</section>
<?php
if ($carId && !$similarCars) {
    get_template_part('template-parts/carslisting/tc-promise', 'front-page');
}


?>