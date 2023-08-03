<?php
global $branch, $branchCustom;

?>
<section class=" d-md-block d-lg-block | desktop-branch-info" id="locationLink">
    <?php
    if (isset($branch)) {
    include 'branch-info.php';
    }
    ?>
</section> 
<section class="text-center py-5  d-md-block d-lg-block | branch-locations">
    <div class="container">
        <h2 class="text-center locations__title d-md-block"> 
            <?php if (isset($branch)) : ?>
            Our other Car Supermarket
            <?php else : ?>
            Visit one of our Car Supermarkets today
            <?php endif; ?>
        </h2>
        <div class="row">
            <?php
            $args = [
                'posts_per_page' => -1,
                'post_type' => 'branch',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ];

			$location_map = array();
            $myProducts = new WP_Query($args);
            while ($myProducts->have_posts()) :
            $item = $myProducts->next_post();
            if ($item->post_title === $branch->post_title) {
                continue;
            }
            $branchLogoConstant = 'SITE_LOGO_' . strtoupper($item->post_name);
            if (defined($branchLogoConstant)) {
                $logo = constant($branchLogoConstant);
            } else {
                $logo = SITE_LOGO;
            }
            $custom = get_post_custom($item->ID);
			
			   $address = '';
                if (!empty($custom['address_line_1'][0])) $address .= $custom['address_line_1'][0] . '<br/>';
                if (!empty($custom['address_line_2'][0])) $address .= $custom['address_line_2'][0] . '<br/>';
                if (!empty($custom['town_city'][0])) $address .= '<strong>' . $custom['town_city'][0] . '</strong><br/>';
                if (!empty($custom['postcode'][0])) $address .= $custom['postcode'][0] . '<br/>';
			
			
			if( !empty($custom['map_lat'][0]) and  !empty($custom['map_lng'][0]) ){
					$location_map[$item->ID] = [ $item->post_title, $custom['map_lat'][0], $custom['map_lng'][0], $address, get_the_post_thumbnail_url($item->ID)  ];
			}
            ?>
            <!-- <div class="col col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 order-1 text-left | branch-locations__place"> -->
            <div class="col col-12 col-sm-12 col-md-6 order-1 text-left | branch-locations__place" style="margin-bottom:15px;">
                <div class="row">
                    <div class="col col-6 col-sm-6 col-md-12 col-lg-12 pr-2 pr-md-3">
                        <img class="branch-locations__image" src="<?php echo get_the_post_thumbnail_url($item->ID); ?>"
                             alt="<?php echo $item->post_title; ?> Trade Centre">
                    </div>
                    <div class="col pl-1 pl-md-3">
                        <h2 class="d-none"><?php echo $item->post_title; ?></h2>
                        <address><?php echo $custom['address_line_1'][0]; ?><br/>
                            <?php echo $custom['address_line_2'][0]; ?><br>
                            <strong><?php echo $custom['town_city'][0]; ?></strong><br>
                            <?php echo $custom['postcode'][0]; ?><br>
                        </address>
                        <?php
                        if ($item->post_name != 'merthyr-tydfil') :
                        ?>
                        <!-- <a class="c-button--blue location__buttons map-button"
                           href="https://maps.google.com/maps?q=tradecentre%20<?php echo $custom['api_name'][0]; ?>"
                           target="_blank"
                           data-gmap="<?php echo $custom['map_link'][0]; ?>"
                           data-modaltitle="<?php echo $item->post_title . ' - ' . $custom['postcode'][0] ?>"><img
                                                                                                                   src="/images/maps-icon.svg"/> Directions</a> -->
                        <a class="c-button--blue location__buttons" href="/branches/<?php echo $item->post_name; ?>">More Info</a>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>



<?php if( $_GET['map'] == 1){ ?>

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function initMap() {
		const icon = {
			url: "https://www.tradecentreuk.com/images/tcuk-logo.svg", // url
			scaledSize: new google.maps.Size(80, 80), // scaled size
			origin: new google.maps.Point(0,0), // origin
			anchor: new google.maps.Point(0, 0) // anchor
		};
	  const wales = { lat:51.5520667, lng: -3.4708309 };
	  const map = new google.maps.Map(document.getElementById("googleMap"), {
		zoom: 7,
		center:  wales,
		  styles:[
			{
			  featureType: "all",
			  stylers: [
				{ saturation: -10 },
				{ lightness: 40 },
				
			  ]
			},
			{
				featureType: "road",
    			elementType: "geometry",
				stylers: [
					 { saturation: -80 }
				]
			}
      		]
	  });
	
	
	
	const infowindow = new google.maps.InfoWindow();

	<?php foreach($location_map as $key => $value){ ?>
		 const wales_<?php echo $key; ?> = { lat: <?php echo $value[1] ?>, lng: <?php echo $value[2] ?> };
		 const marker_<?php echo $key; ?> = new google.maps.Marker({
			position:  wales_<?php echo $key; ?>,
			map: map,
			title: '<?php echo $value[0] ?>',
			 icon: icon,
		  });
	
	google.maps.event.addListener(marker_<?php echo $key; ?>, "click", () => {
			const content = document.createElement("div");
			
			const divHtml = '<div class="row" style="max-width:450px"><div class="col-5"><img src="<?php echo $value[4] ?>" style="width: 100%;" /></div><div class="col-7"><h3 style=" margin-bottom: 10px;"><?php echo $value[0] ?></h3><?php echo $value[3] ?><br></div></div>';
			
			

			const placeIdElement = document.createElement("div");

			placeIdElement.innerHTML = divHtml;
			content.appendChild(placeIdElement);

			

			infowindow.setContent(content);
			infowindow.open(map,  marker_<?php echo $key; ?>);
		  });
		
	<?php } ?>
	 
		
}
	window.initMap = initMap;
	

</script>

<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcTA_7c3GNpKln28FoZRcPYWndhAWh41w&callback=initMap">
</script>
<?php } ?>

