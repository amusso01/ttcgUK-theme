<?php

global $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
       $metaDescription, $carItem, $amount, $hide1hrMsg;

if (empty($carItem['image'])) {
    $carItem['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&make='.$carItem['make_name'].'&modelFamily='.$carItem['model_name'].'&modelYear='.$carItem['model_year'].'&modelRange='.$carItem['model_range'].'&modelVariant='.$carItem['model_variant'].'&powerTrain='.$carItem['power_train'].'&bodySize='.$carItem['body_size'].'&trim='.$carItem['trim'].'&paintId='.$carItem['paint_id'].'&paintDescription='.$carItem['paint_description'].'&rimId='.$carItem['rim_id'].'&rimDescription='.$carItem['rim_description'].'&interiorId='.$carItem['interior_id'].'&interiorDescription='.$carItem['interior_description'].'&fileType=webp&zoomType=fullscreen&zoomLevel=10&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.15&countryCode=GB';
}

$classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 col-xl-3 px-2 | carlist carlist_special';
$classesB = 'col col-5 col-md-12 | carlist__carimage';
$classesC = 'col col-7 col-md-12';

if ($amount == 1) {
    $classesA = 'col-10 px-2 | carlist carlist_special one-car';
    $classesB = 'col-12 col-sm-5 col-md-6 | carlist__carimage';
    $classesC = 'col col-md-6 pt-2 pt-sm-0 pt-md-4 pt-lg-5';
} elseif ($amount == 2) {
    $classesA = 'col-10 col-md-6 col-lg-4 px-2 | carlist carlist_special two-car';
    $classesB = 'col-12 col-sm-5 col-md-12 | carlist__carimage';
    $classesC = 'col col-md-12 pt-2 pt-sm-0';
} elseif ($amount == 3) {
    $classesA = 'col-12 col-sm-10 col-md-6 col-lg-4 px-2 | carlist carlist_special less-than-4';
}

if (!isset($branch)) {
    $link = 'href="' . area_link('/branches/' . $carItem['branch_name'], true) . '"';
} else {
    $link = '';
}
?>
    <div class="<?php
    echo $classesA; ?>"
         data-rrp="<?php
         echo $carItem['from_price']; ?>"
         data-make="<?php
         echo $carItem['make_name'] ?>"
         data-range="<?php
         echo $carItem['model_name'] ?>"
         data-location="<?php
         echo $carItem['branch_title'] ?>"
         data-branch="<?php
         echo $carItem['api_name']; ?>"
         data-current-area="<?php
         if (isset($branch)) {
             if ($branch->ID == $carItem['branch_id']) {
                 echo '1';
             } else {
                 echo '0';
             }
         } else {
             echo '0';
         }
         $branchLogoConstant = 'SITE_LOGO_' . strtoupper($carItem['branch_name']);
         if (defined($branchLogoConstant)) {
             $logo = constant($branchLogoConstant);
         } else {
             $logo = SITE_LOGO;
         }
         ?>">
        <div class="row">
            <div class="<?php
            echo $classesB; ?>">
                <div class="text-center car-name d-md-none"><?php
                    echo $carItem['make_name'] . ' ' . $carItem['model_name']; ?></div>
                <a <?php
                echo $link; ?> class="car-link">
                    <div class="img-holder">
                        <img class="car-img" src="<?php
                        echo $carItem['image']; ?>" alt="<?php
                        echo $carItem['title']; ?>"/>
                        <div class="carlist__carreg--opaque larger">BUDGET SPECIAL</div>
                    </div>
                    <div class="text-center car-name d-none d-md-block"><?php
                        echo $carItem['title']; ?></div>
                </a>
            </div>
            <div class="<?php
            echo $classesC; ?>">
                <div class="row">
                    <a <?php
                    echo $link; ?> class="col col-12 col-md-12 | carlist__prices">
                        <?php
                        if (!$hide1hrMsg) :
                        ?>
                        <div class="text-center drive-away">Drive Away <strong>today</strong></div>
                        <?php
                        endif;
                        ?>
                        <div class="row no-gutters text-center">
                            <div class="col | carlist__prices__price">
                                &pound;<span><?php
                                    echo $carItem['from_price']; ?></span>
                                <small class="location"><?php
                                    echo $carItem['branch_title']; ?></small>
                            </div>
                            <div class="col | carlist__prices__deposit">
                                &pound;<span class="text-left"><?php
                                    echo TcFinance::getWeeklyPrice(
                                        $carItem['from_price']
                                    ); ?></span>
                                <div>&pound;<i><?php
                                        echo TcFinance::getDeposit(
                                            $carItem['from_price']
                                        ); ?></i> Deposit
                                </div>
                            </div>
                            <div class="carlist__prices__divider">or</div>
                        </div>
                    </a>
                    <div class="col col-12 col-md-12 offset-md-0 | carlist__finance">
                        <a href="#freefinance" class="text-center | carlist__button">Free Finance
                            Check</a>
                        <figure data-image="<?php
                        echo $carItem['image']; ?>" data-title="<?php
                        echo $carItem['title']; ?>" data-rrp="<?php
                        echo $carItem['from_price']; ?>" class="finance-example">Finance
                            Example
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>