<?php
global $branch, $branchCustom; ?>
<section class="mt-3 mt-md-5 mb-0 mb-md-5 d-md-block d-lg-block | branch-info">
    <span id="howtofindus" style="position:absolute;"></span>
    <div class="container mb-4 mb-md-5">
        <h2 class="text-center">Trade Centre <?php echo $branch->post_title; ?></h2>
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="row">
                    <div class="col">
                        <img class="branch-locations__image" height="" src="<?php echo get_the_post_thumbnail_url($branch->ID); ?>"
                             alt="Neath Trade Centre">
                    </div>
                </div>
            </div>
            <div class="col ml-3">
                <div class="row pt-4 pt-md-0">
                    <div class="col col-md-12 pl-0 pl-md-3 | branch-info__address">
                        <p><?php echo $branchCustom['address_line_1'][0]; ?><br/>
                            <?php echo $branchCustom['address_line_2'][0]; ?><br/>
                            <strong><?php echo $branchCustom['town_city'][0]; ?></strong><br/>
                            <?php echo $branchCustom['postcode'][0]; ?><br/>
                        </p>
                    </div>
                    <div class="col col-md-12 pl-0 pl-md-3 | branch-info__opentimes">
						<h4 style="margin-bottom: 10px;">Opening Times</h4>

                        <p>Mon-Fri <strong><?php echo $branchCustom['opening_times_weekdays'][0]; ?></strong><br/>
                            Sat-Sun <strong><?php echo $branchCustom['opening_times_weekends'][0]; ?></strong></p>
						
                      <!--  <p>All of our showrooms are currently closed.<br/>
                            Our Grand Reopening is the 9th November.<br/>
                            <a href="/finance">Apply Now</a> for exclusive offers.</p> -->
                        <?php
                        if ($branch->post_name != 'merthyr-tydfil') :
                        ?>
                        <!-- <a class="c-button--blue branch-info__button map-button"
                           href="https://maps.google.com/maps?q=tradecentre%20<?php echo $branchCustom['api_name'][0]; ?>"
                           target="_blank"
                           data-gmap="<?php echo $branchCustom['map_link'][0]; ?>"
                           data-modaltitle="<?php echo $branch->post_title . ' - ' . $branchCustom['postcode'][0] ?>">Directions</a> -->
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>