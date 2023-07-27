<?php

global $wp, $show404, $carmake, $carmodel, $car, $branch, $listingType, $custom, $title, $similarCars, $similarCarTitle,
$metaDescription, $saleModeDiscount, $carsArray, $carItem, $amount, $saleMode, $regYear, $carId;

$techData = cns_car_technical_data($carId);
$standardEquipment = cns_car_standard_equiptment($carId);
?>

<!-- MODAL -->
<div class="hystmodal" id="modalSpec" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window hystmodal__window--long" role="dialog" aria-modal="true">

            <button data-hystclose class="hystmodal__close">Close</button>  
               
            <div class="hystmodal__styled">
                <h4 class="hystmodal-title">Car Specs</h4>
                <div class="accordion-container">
                    <?php foreach ($standardEquipment as $name => $data) : ?>
                    <div class="ac">
                        <h2 class="ac-header">
                        <button type="button" class="ac-trigger"><?= $name ?></button>
                        </h2>
                        <div class="ac-panel">
                            <ul>
                                <?php
                                foreach ($data as $featureValue) :
                                ?>
                                <li>
                                    <?= $featureValue; ?>
                                </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div> 
</div><!-- modal -->

<!-- MODAL -->
<div class="hystmodal" id="modalFeatures" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window" role="dialog" aria-modal="true">

            <button data-hystclose class="hystmodal__close">Close</button>  
        
            <div class="hystmodal__styled">
                <h4 class="hystmodal-title">Car Features</h4>
                <div class="features-accordion-container">
                    <?php  foreach ($techData as $categoryName => $data) : ?>
                    <div class="ac">
                        <h2 class="ac-header">
                        <button type="button" class="ac-trigger"><?= $categoryName; ?></button>
                        </h2>
                        <div class="ac-panel">
                            <ul>
                                <?php
                                foreach ($data as $featureTitle => $featureValue) :
                                ?>
                                <li>
                                    <?= $featureTitle; ?>
                                    <span>
                                    <?= $featureValue; ?>
                                    </span>
                                </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div> 
</div><!-- modal -->

