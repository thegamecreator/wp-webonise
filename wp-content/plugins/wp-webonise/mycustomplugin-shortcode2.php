<?php
	function mcp_form_shortcode($atts,$content=null){
		wp_nonce_field(basename(__FILE__),"mcp_party_nonce");
		$mcp_stored_meta=get_post_meta($post->ID);
		$paged=get_query_var('paged')?get_query_var('paged'):1; 
		$s1='<form action="#" method="post">
		<div class="form-group">
PartyID:			<input type="text" class="form-control" name="party_id" id="party_id" placeholder="Party ID" value="';
		if(!empty($mcp_stored_meta['party_id']))
			$s1=$s1.esc_attr($mcp_stored_meta['party_id'][0]); 
		$s1=$s1.'" />
			</div>
			<div class="form-group">
				<label for="Party-desp" class="mcp-desp">Party Description:</label>
				<textarea name="party_desp" id="party_desp" class="form-control" placeholder="Party Description">';
		if(!empty($mcp_stored_meta['party_desp'])) 
			$s1=$s1.esc_attr($mcp_stored_meta['party_desp'][0]); 
			$s1=$s1.'</textarea>
			</div>
			<div class="form-group">
				<label for="Party-location" class="mcp-row">Party Location:</label>
				<input type="text" class="form-control" name="party_location" id="party_location" placeholder="Party Location" />
						<div id="googleMap" style="width:500px;height:380px;"></div>
						<script>
						var input = /** @type {!HTMLInputElement} */(
							        document.getElementById("party_location"));
							function initMap() {
							    var map = new google.maps.Map(document.getElementById("googleMap"), {
							      center: {lat: -33.8688, lng: 151.2195},
							      zoom: 13
							    });
							    
	
							    var autocomplete = new google.maps.places.Autocomplete(input);
							    autocomplete.bindTo("bounds", map);
	
							    var infowindow = new google.maps.InfoWindow();
							    var marker = new google.maps.Marker({
							      map: map,
							      anchorPoint: new google.maps.Point(0, -29)
							    });
							    autocomplete.addListener("place_changed", function() {
							      infowindow.close();
							      marker.setVisible(false);
							      var place = autocomplete.getPlace();
							      if (!place.geometry) {
							        window.alert("Autocomplete returned place contains no geometry");
							        return;
							      }
	
							      // If the place has a geometry, then present it on a map.
							      if (place.geometry.viewport) {
							        map.fitBounds(place.geometry.viewport);
							      } else {
							        map.setCenter(place.geometry.location);
							        map.setZoom(10);  // Why 17? Because it looks good.
							      }
							      marker.setIcon(/** @type {google.maps.Icon} */({
							        url: place.icon,
							        size: new google.maps.Size(71, 71),
							        origin: new google.maps.Point(0, 0),
							        anchor: new google.maps.Point(17, 34),
							        scaledSize: new google.maps.Size(35, 35)
							      }));
							      marker.setPosition(place.geometry.location);
							      marker.setVisible(true);
	
							      var address = "";
							      if (place.address_components) {
							        address = [
							          (place.address_components[0] && place.address_components[0].short_name || ""),
							          (place.address_components[1] && place.address_components[1].short_name || ""),
							          (place.address_components[2] && place.address_components[2].short_name || "")
							        ].join(" ");
							      }
	
							      infowindow.setContent("<div><strong>" + place.name + "</strong><br>" + address);
							      infowindow.open(map, marker);
							    });
							}
						</script>
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUfuE9kFsnJNVN4Voz0M4Ee2dTKw00JbM&libraries=places&callback=initMap"
	        async defer></script>
					</div>
					<div class="form-group">
						<label for="Party-date" class="mcp-row">Party Date:</label>
						<input type="date" class="form-control datepicker" name="party_date" id="party_date" placeholder="Party Date"/>
					</div>
					<div class="checkbox">
						<label for="Party-food">Food Types:</label><br>
						<label for="Party-food"><input type="checkbox" id="mcp-veg" name="mcp-veg" ';
					if(isset($mcp_stored_meta['mcp-veg'][0])){
							$s1=$s1."checked";
						}
						$s1=$s1.'>Veg</label>
								</div>
								<div class="checkbox">
									<label for="Party-food" class="mcp-row"><input type="checkbox" id="mcp-nveg" name="mcp-nveg"';
					if(isset($mcp_stored_meta['mcp-nveg'][0])){
							$s1=$s1."checked";
						}
						$s1=$s1.'>Non Veg</label>
					</div>
					<input type="submit" name="submit"/>
			</form>';
			//$s1="fd";
	// if(isset($_REQUEST['submit'])){
	// 	$met = array('' => , );
	// }
			return $s1;
}
add_shortcode('mcp-party-form','mcp_form_shortcode');

?>