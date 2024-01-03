<?php

/**
 * The carmodel post single template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
$metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;
?>

<?php
get_header();



?>
<?php get_template_part( 'components/getters/car-getter' ) ?>

<?php
// ARRAY HOLDING CAR INFO
$carItem = $carsArray[0];

$amount = count($carsArray);

// CAR NAME IF AMOUNT IS 0 hence no car are present in the array
$carname = $carmake->post_title . ' ' . $carmodel->post_title;

// CAR IMAGE
if (empty($carItem['image'])) {
$carItem['image'] = 'https://cdn.tradecentregroup.io/image/upload/q_auto/f_auto/w_400/web/Group/cars/' . $carItem['make_name'] . '/' . $carItem['model_name'] . '.png';
}

$carPriceRRP = $carItem['rrp'] ? $carItem['rrp'] : 'TBC';

// REPLACE MERCEDES TITLE
if (strtolower($carItem['make_title']) == 'mercedes-benz') {
    $carItem['make_title'] = 'Mercedes';
}

// GET CAR SPEC
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

<?php get_template_part( 'components/header/header-video' ) ?>
<?php get_template_part( 'components/header/header-image-banner' ) ?>
<?php get_template_part( 'components/header/header-marquee' ) ?>


<?php get_template_part( 'components/modal/car-info' ) ?>

<main class="fdry-main__single-car">
    <?php if($amount) : ?>

    <?php 
    // GLOBAL DISCOUNT
    $isDiscount = get_field('discount_active', 'option');
    $tagImg = get_field('tag_image_for_discount', 'option');
    ?>
        
    <section class="fdry-single-car__specs content-block content-max">
        <div class="single-car__grid">
            <div class="car-figure <?= $isDiscount ? 'discount-tag' : '' ?>">
                <figure class="fdry-single-car-figure" data-vrm="<?= $carItem['reg_number']; ?>">
         
                    <img class="car-img" src="<?= $carItem['image']; ?>" alt="<?= $carItem['make_title'] . ' ' . $carItem['model_title']; ?>" />
    
                    <p class="fdry-car-reg"><?= $carItem['reg_number']; ?></p>
                    <?php if($isDiscount) : ?>
                        <img src="<?= $tagImg ?>" alt="" class="fdry-car-single__discount-tag">               
                    <?php endif; ?>

                </figure>
                <h3>Car Overview</h3>
            </div>
            <?php global $branch; ?>

            <div class="car-specs-card__wrapper">
                <div class="car-spec-card__info">
                    <h1 class="car-name"><?= strtoupper($carItem['make_title']) .' '.strtoupper($carItem['model_title']) ?></h1>
                    <p class="model"><?= $carItem['derivative'] ?></p>

                    <div class="fdry-car-spec">
                        <div class="single-spec">
                            <p class="spec"><a href="<?= get_the_permalink( $branch->ID ) ?>"><?= $branch->post_title ?></a></p>
                        </div>
                        <div class="single-spec">
                            <?php if($carItem['fueltype']!="") { ?>
                            <p class="spec"><?php echo $carItem['fueltype']; ?></p>
                            <?php } ?>  
                        </div>
                        <div class="single-spec">
                            <?php if($carItem['mileage']>0) { ?>
                            <p class="spec"><?php echo $carItem['mileage']; ?> Miles</p>
                            <?php } ?>  
                        </div>
                        <?php if($insurence!= "") { ?>
                        <div class="single-spec">
                            <p class="spec"><?php echo $insurence ; ?> Ins. Group</p>
                        </div>
                        <?php } ?>  
                    </div>
                    <?php if(!$isDiscount) : ?>
                    <div class="fdry-car-single__cost">
                        <div class="fdry-cash-cost fdry-car-single__cost-card">
                            <p class="fdry-text fdry-text-top">Now Just</p>
                            <p class="fdry-red-price">&pound;<?= $carItem['rrp'] ?></p>
                            <p class="fdry-text fdry-text-bottom">Cash <span>or</span> Finance</p>
                        </div>
                        <div class="fdry-grey-line"></div>
                        <div class="fdry-cash-cost-or">
                            <p>Or</p>
                        </div>
                        <div class="fdry-monthly-cost fdry-car-single__cost-card">
                            <p class="fdry-text fdry-text-top">Fixed</p>
                            <p class="fdry-blue-cost">&pound;<?php echo TcFinance::getMonthlyPrice($carPriceRRP); ?></p>
                            <p class="fdry-text fdry-text-bottom">Per Month</p>
                         </div>
                    </div>
                    <?php else :  ?>
                    <div class="fdry-car-single__discount-grid">
                        <div class="fdry-car-single__discount-was">
                            <p class="text-top">WAS</p>
                            <p class="price"><span class="strike"></span>&pound;<?= $carItem['rrp']  ?></p>
                        </div>
                        <div class="fdry-car-single__discount-now">
                            <p class="text-top">NOW</p>
                            <p class="price" >&pound;<?= $carItem['discounted_price'] ?></p>
                        </div>
                    </div>


                    <div class="fdry-car-single__discount-finance">
                    <p> <span class="light">Or just</span> <span class="yellow"> &pound;<?php echo TcFinance::getMonthlyPrice($carItem['discounted_price'] ); ?></span> per month</p>
                    </div>

                    <?php endif; ?>
                </div>
                <div class="fdry-car-finance-check">
                    <!-- <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?php echo $carItem['car_id']; ?>" class="fdry-finance-check__btn">
                        FREE 30 SECONDS FINANCE CHECK 
                        <span>Click<br>Here</span>
                    </a> -->
                    <a href="/finance-check?make=<?php echo $carItem['make_title']; ?>&model=<?php echo $carItem['model_title']; ?>&vid=<?php echo $carItem['car_id']; ?>" class="fdry-finance-check__btn-img">
                        <img src="<?= get_template_directory_uri() ?>/dist/images/free30btn.svg" alt="Free finance check button">
                    </a>
                </div>
                <div class="fdry-visit-us">
                    <a href="<?= get_permalink( $branch->ID )?>">
                        <i><?php get_template_part( 'svg-template/svg', 'geo-tag-icon' ) ?></i>
                        VISIT US
                    </a>
                </div>
            </div>

        </div>
    </section>
    
  
    <div class="content-max">
        <!-- CAR OVERVIEW SECTION -->
        <?php get_template_part( 'components/partials/car-overview' ) ?>
    </div>

    <div class="content-max">
        <!-- CAR BANNERS -->
        <?php get_template_part( 'components/partials/car-legal-banner' ) ?>
   </div>

    <div class="content-max">
        <!-- TC PROMISE CARD -->
        <?php get_template_part( 'components/partials/car-tc-promise-card' ) ?>
    </div>

    <div class="content-max">
        <!-- VIDEO -->
        <?php get_template_part( 'components/banners/better-car-video' ) ?>   
    </div>

    <!-- BANNERS -->
    <?php get_template_part( 'components/banners/price-promise' ) ?>

    <!-- BRANCHES -->
    <div class="content-block content-max" style="margin-top: 50px; margin-bottom: 40px; padding-bottom:60px">
        <?php get_template_part( 'components/pages/branches-carousel' ) ?>
    </div>

    <div class="content-max">
        <!-- TRUSTPILOT -->
        <?php get_template_part( 'components/pages/trustpilot' ) ?>

        <!-- ACTION BOX GRID -->
        <?php get_template_part( 'components/pages/action-box-grid' ) ?>

        <!-- VIDEO GUIDE -->
        <?php get_template_part( 'components/pages/video-guide' ) ?>
    </div>

    <?php else: ?>
        <p>We currently have no <?= $carname; ?> in our centres, however we have a large
            selection to choose from at our car supermarkets.</p>
    <?php endif; ?>

    <?php
    $techData = cns_car_technical_data($carId);
    $standardEquipment = cns_car_standard_equiptment($carId);
    ?>

</main>

<?php 

get_footer();