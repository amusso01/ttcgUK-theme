<?php

/**
 * The footer template file
 *
 * @package CNS
 * @subpackage TradeCentreWales
 * @since 1.0
 * @version 1.0
 */

?>
</main>
<?php

// Check rows exists.
if( have_rows('review') ):

    echo '<section id="reviews-section" class="black-bg pb-5">
				<div class="container pt-5 pb-5">
					<h3 class="eastsea skew mb-5">Testimonials</h3>
					<div class="row">';
	$testimonial_number = 0;
    while( have_rows('review') ) : the_row();
			$testimonial_number++;
			$total_words = 54;
			$class="";
			if(str_word_count(get_sub_field('text')) > $total_words){
				$contentbox = '<p ><strong>'.get_sub_field('author').'<br>'.get_sub_field('title').'</strong></p>
							<div class="content-more" total="'.str_word_count(get_sub_field('text')).'"><p>'.wp_trim_words( get_sub_field('text'), 55 ).'...</p></div>
							<div class="content-info">'.get_sub_field('text').'</div>
							
							<a href="javascript:void(0)" class="more-info-box" number="#'.$testimonial_number.'">Read More</a>';
			}else{
				$class="disable";
				$contentbox = '<p ><strong>'.get_sub_field('author').'<br>'.get_sub_field('title').'</strong></p>
							<div total="'.str_word_count(get_sub_field('text')).'" class="content-more "><p>'.wp_trim_words( get_sub_field('text'), 55 ).'...</p></div>
							<div class="content-info">'.get_sub_field('text').'</div>';
			}
			
			echo '<div class="col-md-4 col-12">
						<div id="'.$testimonial_number .'" class="item-review '.$class.'">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 27.5 24.2" style="enable-background:new 0 0 27.5 24.2;" xml:space="preserve">
<style type="text/css">
	.st0{enable-background:new    ;}
	.st1{fill:#FCEE21;}
</style>
<g class="st0">
	<path class="st1" d="M9.1,7.8v4.1c0,0.9,0,1.7,0,2.5c0,0.8,0,1.3-0.1,1.6c0.2,1.1,0.4,2,0.6,2.8c0.2,0.7,0.8,1.6,1.6,2.6
		c-0.2,0.2-0.5,0.5-1.1,1.1c-0.6,0.6-0.9,0.9-1,0.9L8.3,23l-0.8,0.4l-0.6,0.5c-0.3,0.2-0.7,0.2-1.1,0.2c-0.2,0-0.5,0-0.8-0.1
		C4.6,24,4.3,24,4,24c-0.6,0-1.1,0.1-1.4,0.2L2,23c-0.2-0.4-0.5-1-1-1.9c-0.5-0.9-0.8-1.6-0.8-2.3c0-0.3,0.1-0.6,0.2-0.7
		c-0.2-1-0.3-1.8-0.4-2.4C0,15.1,0,14.4,0,13.8c0-0.4,0-0.8,0.1-1.2c0-0.4,0.1-0.9,0.2-1.4l-0.1-0.2c1-2,1.9-3.9,2.8-5.7
		C3.9,3.4,5.2,1.7,7.1,0l2.5,0.4L10.7,3C10.3,3.6,10,4.1,10,4.4C9.9,4.8,9.8,5,9.8,5.3c0,0.2-0.1,0.5-0.1,0.8C9.6,6.4,9.4,7,9.1,7.8
		z M25.4,7.8v4.1c0,0.9,0,1.7,0,2.5c0,0.8,0,1.3-0.1,1.6c0.2,1.1,0.4,2,0.6,2.8c0.2,0.7,0.8,1.6,1.6,2.6c-0.2,0.2-0.5,0.5-1.1,1.1
		c-0.6,0.6-0.9,0.9-1,0.9L24.6,23l-0.8,0.4l-0.6,0.5c-0.3,0.2-0.7,0.2-1.1,0.2c-0.2,0-0.5,0-0.8-0.1c-0.3,0-0.6-0.1-1-0.1
		c-0.6,0-1.1,0.1-1.4,0.2L18.4,23c-0.2-0.4-0.5-1-1-1.9c-0.5-0.9-0.8-1.6-0.8-2.3c0-0.3,0.1-0.6,0.2-0.7c-0.2-1-0.3-1.8-0.4-2.4
		c-0.1-0.6-0.1-1.3-0.1-1.9c0-0.4,0-0.8,0.1-1.2c0-0.4,0.1-0.9,0.2-1.4l-0.1-0.2c1-2,1.9-3.9,2.8-5.7c0.9-1.8,2.3-3.5,4.1-5.2
		l2.5,0.4L27,3c-0.4,0.6-0.6,1.1-0.7,1.4c-0.1,0.3-0.1,0.6-0.2,0.8c0,0.2-0.1,0.5-0.1,0.8C25.9,6.4,25.8,7,25.4,7.8z"/>
</g>
</svg>

							<img src="'.get_sub_field('imagen').'" />
							'.$contentbox.'
						</div>
				  </div>'	;		

    endwhile;
		 echo '		</div>
		 		</div>
			</section>';
endif;
?>
<footer style="display:none;">
    <div class="container | footer-all-devices">
        <div class="row | footer__text">
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 text__block--left">
                <p>The Trade Centre Wales is a trading name of The Trade Centre Group PLC | Registered in England and Wales
                    (#4921555) our VAT Registration number is #821 833 735.</p>
                <p>Registered Address: The Trade Centre Wales, Euro Centre, Neath Abbey Business Park, Neath, SA10
                    7DR</p>
                <p>We can introduce you to a select group of lenders who may be able to help you finance your vehicle
                    of choice. We do not charge fees for our consumer credit services but we will typically receive a
                    commission payment from the lender should you decide to enter into an agreement. The commission
                    payment we will receive has no effect upon the amount of credit available to you or any amounts
                    payable by you.</p>
				


                    <?php
                    if( have_rows('social_media', 'options') ):
                        while( have_rows('social_media', 'options') ) : the_row();
                            echo '<a href="'.get_sub_field('link').'" target="_blank" class="social-icon">
                                <img src="'.get_sub_field('icon').'" />
                                </a>';
                        endwhile;
                    endif;
                    ?>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 text__block--right">
                <p>The Trade Centre Group PLC is authorised and regulated by the Financial Conduct Authority (our
                    registration number is 689365) and is permitted to carry on relevant regulated consumer credit
                    activities including acting as a credit broker and not a lender.</p>
                <p>You can check this on the FCA’s register by visiting the FCA’s website www.fca.org.uk/register or by
                    contacting the FCA on 0800 111 6768.</p>
                <p class="reprapr"><?php echo get_option('cns_representative_apr'); ?>% APR Representative</p>
              
                <p><strong>Representative Example (Hire Purchase):</strong>Cash Price £6399.00. Total Deposit £1500.00. Total Amount of Credit £4899.00. 60 Equal Payments of £108.35. Agreement Duration 60 Months. Option to Purchase Fee£10.00. Interest Charges £1602.00. Total Amount Payable £8,011.00. Annual Rate of Interest is 12.4% (fixed).Representative APR <?php echo get_option('cns_representative_apr'); ?>%. Monthly payment is equivalent to £25.00 per week. We are a broker, not a lender. Written Guarantee may be required. Subject to Status – Alternative Deals Available. See website or in store for details. See price promise in store.</p>
				
                
                <p>All cars subject to availability. See price promise in store. All web specials are inclusive of £199 admin fee. See Terms and Conditions. As a contribution towards our costs for vehicle transportation/logistics and preparation, a mandatory administration fee of £199.00 (including VAT) is payable on all retail vehicles we sell.
					<br><br>
					£1500 for your car in part exchange is provided by part-exchange over-allowance, essentially a discount is provided on the car of your choice to increase (if required) the actual vehicle valuation amount to £1,500 (Spring Trade Up Offer).


 <!--Current offers include Free Fuel for a Year.<br> <br>
Free Fuel for a Year provides customers with £100 of free fuel, every month for a year. The offer is available on every car in store and to every customer that purchases a car from the Trade Centre Group from 30th June 2022. Customers taking up the offer will receive a Fuel Card, administrated by Sodexo. The first £100 will be pre-loaded on the Fuel Card delivered to the customer within 28 days of purchase. At the start of each of the subsequent 11 months the customer must validate via our ‘Free Fuel portal’ that they still own the car we sold them (which we will verify via DVLA/HPI) and that the Fuel Card is still in their possession, following which the card will be topped up with £100 each month. Full T&C’s at link below.-->
					
</p>
            </div>
        </div>

        <div class="row">
            <div class="col col-12 | footer__links">
                <div class="footer__links">
                    <!--<a href="/faq">FAQs</a>-->
                    <a href="https://uk.trustpilot.com/review/thetradecentrewales.co.uk" target="_blank">Reviews</a>
                    <a href="/finance">Free Finance Check</a>
                    <a href="/terms-and-conditions">Terms &amp; Conditions</a>
                    <a href="/privacy-notice">Privacy Notice</a>
                    <a href="/cookie-policy">Cookie Policy</a>
                    <a href="/modern-slavery-act">Modern Slavery Act</a>
                    <!--<a href="/gender-pay-gap-report-2018">Gender Pay Gap 2018</a>-->
                    <a href="/gender-pay-gap-report-2021">Gender Pay Gap</a>
					<a href="/the-trade-centre-group-tax-strategy">Tax Strategy</a>
					<!--<a href="/free-fuel-for-a-year-promotion-terms-conditions">‘Free Fuel for a Year' Terms and Conditions</a>-->	
					<!--<a href="/free-fuel-frenzy-prize-draw-terms-and-conditions">‘Free Fuel Frenzy’ Prize Draw Terms and Conditions</a>-->
					<!--<a href="/freesure-promotion-terms-conditions">Freesure Promotion Terms & Conditions</a>-->
                    <!--<a href="#">Sitemap</a>-->
                </div>
                <br/>

                <?php
                global $showAreaLinks;
                if (isset($showAreaLinks) && $showAreaLinks == true) : ?>
                <div class="area-links mb-3">
                    <p>
                        Some of the areas we cover from our  <a href="/in/reset">Trade Centre Wales stores</a>:
                        <?php
                        $areas = get_terms(['taxonomy' => 'areas', 'hide_empty' => true]);
                        $areaCount = count($areas) - 1;
                        $i = 0;
                        foreach ($areas as $area) :
                        echo '<a href="/in/' . $area->slug . '">' . $area->name . '</a>';
                        if ($i < $areaCount) {
                            echo ', ';
                        } else {
                            echo '.';
                        }
                        $i++;
                        endforeach;
                        ?>
                    </p>
                </div>
                <?php endif; ?>
                <span class="copyright">Copyright <?php echo date('Y'); ?> The Trade Centre Group PLC.</span></div>
        </div>
    </div>
</footer>

<script>
$(".more-info-box").click(function(){
	var number = $(this).attr('number');
	
	if(  $(number).hasClass("disable") ){
	   	$(number).removeClass("disable");
		$(this).html("Read More");
	}else{
	   $(number).addClass("disable");
		$(this).html("Read Less");
	}
	
});
	
	
console.log('Make', 'Model', 'VID');
console.log('<?php echo $_SESSION['make']; ?>', '<?php echo $_SESSION['model']; ?>', '<?php echo $_SESSION['vid']; ?>');
</script>



<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script>
    // With the above scripts loaded, you can call `tippy()` with a CSS
    // selector and a `content` prop:
    tippy('.fdryTooltip', {
    content: 'All cars subject to availability. See price promise in store. All web specials are inclusive of £199 admin fee. See Terms and Conditions. As a contribution towards our costs for vehicle transportation/logistics and preparation, a mandatory administration fee of £199.00 (including VAT) is payable on all retail vehicles we sell.',
    arrow: true,
    });
</script>


<?php
get_template_part('template-parts/footer/mobilefooter', 'footer');
wp_footer(); ?>

<script type="text/javascript">
    var __raconfig = __raconfig || {};
    __raconfig.uid = '646cd6c4c31b2';
    __raconfig.action = 'track';
    (function () {
        var ra = document.createElement('script');
        ra.type = 'text/javascript';
        ra.src = 'https://ruler.nyltx.com/lib/1.0/ra-bootstrap.min.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ra, s);
    }());
</script>


<script type="text/javascript"> var __raconfig = __raconfig || {}; __raconfig.uid = '646cd6c4c31b2'; __raconfig.action = 'track'; (function () { var ra = document.createElement('script'); ra.type = 'text/javascript'; ra.src = 'https://ruler.nyltx.com/lib/1.0/ra-bootstrap.min.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ra, s); }()); </script>
 

</body>
</html>
