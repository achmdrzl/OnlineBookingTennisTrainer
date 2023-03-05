function tennisclub_googlemap_init(dom_obj, coords) {
	"use strict";
	if (typeof TENNISCLUB_STORAGE['googlemap_init_obj'] == 'undefined') tennisclub_googlemap_init_styles();
	TENNISCLUB_STORAGE['googlemap_init_obj'].geocoder = '';
	try {
		var id = dom_obj.id;
		TENNISCLUB_STORAGE['googlemap_init_obj'][id] = {
			dom: dom_obj,
			markers: coords.markers,
			geocoder_request: false,
			opt: {
				zoom: coords.zoom,
				center: null,
				scrollwheel: false,
				scaleControl: false,
				disableDefaultUI: false,
				panControl: true,
				zoomControl: true, //zoom
				mapTypeControl: false,
				streetViewControl: false,
				overviewMapControl: false,
				styles: TENNISCLUB_STORAGE['googlemap_styles'][coords.style ? coords.style : 'default'],
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
		};
		
		tennisclub_googlemap_create(id);

	} catch (e) {
		
		dcl(TENNISCLUB_STORAGE['strings']['googlemap_not_avail']);

	};
}

function tennisclub_googlemap_create(id) {
	"use strict";

	// Create map
	TENNISCLUB_STORAGE['googlemap_init_obj'][id].map = new google.maps.Map(TENNISCLUB_STORAGE['googlemap_init_obj'][id].dom, TENNISCLUB_STORAGE['googlemap_init_obj'][id].opt);

	// Add markers
	for (var i in TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers)
		TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].inited = false;
	tennisclub_googlemap_add_markers(id);
	
	// Add resize listener
	jQuery(window).resize(function() {
		if (TENNISCLUB_STORAGE['googlemap_init_obj'][id].map)
			TENNISCLUB_STORAGE['googlemap_init_obj'][id].map.setCenter(TENNISCLUB_STORAGE['googlemap_init_obj'][id].opt.center);
	});
}

function tennisclub_googlemap_add_markers(id) {
	"use strict";
	for (var i in TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers) {
		
		if (TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].inited) continue;
		
		if (TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].latlng == '') {
			
			if (TENNISCLUB_STORAGE['googlemap_init_obj'][id].geocoder_request!==false) continue;
			
			if (TENNISCLUB_STORAGE['googlemap_init_obj'].geocoder == '') TENNISCLUB_STORAGE['googlemap_init_obj'].geocoder = new google.maps.Geocoder();
			TENNISCLUB_STORAGE['googlemap_init_obj'][id].geocoder_request = i;
			TENNISCLUB_STORAGE['googlemap_init_obj'].geocoder.geocode({address: TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].address}, function(results, status) {
				"use strict";
				if (status == google.maps.GeocoderStatus.OK) {
					var idx = TENNISCLUB_STORAGE['googlemap_init_obj'][id].geocoder_request;
					if (results[0].geometry.location.lat && results[0].geometry.location.lng) {
						TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[idx].latlng = '' + results[0].geometry.location.lat() + ',' + results[0].geometry.location.lng();
					} else {
						TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[idx].latlng = results[0].geometry.location.toString().replace(/\(\)/g, '');
					}
					TENNISCLUB_STORAGE['googlemap_init_obj'][id].geocoder_request = false;
					setTimeout(function() { 
						tennisclub_googlemap_add_markers(id); 
						}, 200);
				} else
					dcl(TENNISCLUB_STORAGE['strings']['geocode_error'] + ' ' + status);
			});
		
		} else {
			
			// Prepare marker object
			var latlngStr = TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].latlng.split(',');
			var markerInit = {
				map: TENNISCLUB_STORAGE['googlemap_init_obj'][id].map,
				position: new google.maps.LatLng(latlngStr[0], latlngStr[1]),
				clickable: TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].description!=''
			};
			if (TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].point) markerInit.icon = TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].point;
			if (TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].title) markerInit.title = TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].title;
			TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].marker = new google.maps.Marker(markerInit);
			
			// Set Map center
			if (TENNISCLUB_STORAGE['googlemap_init_obj'][id].opt.center == null) {
				TENNISCLUB_STORAGE['googlemap_init_obj'][id].opt.center = markerInit.position;
				TENNISCLUB_STORAGE['googlemap_init_obj'][id].map.setCenter(TENNISCLUB_STORAGE['googlemap_init_obj'][id].opt.center);				
			}
			
			// Add description window
			if (TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].description!='') {
				TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].infowindow = new google.maps.InfoWindow({
					content: TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].description
				});
				google.maps.event.addListener(TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].marker, "click", function(e) {
					var latlng = e.latLng.toString().replace("(", '').replace(")", "").replace(" ", "");
					for (var i in TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers) {
						if (latlng == TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].latlng) {
							TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].infowindow.open(
								TENNISCLUB_STORAGE['googlemap_init_obj'][id].map,
								TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].marker
							);
							break;
						}
					}
				});
			}
			
			TENNISCLUB_STORAGE['googlemap_init_obj'][id].markers[i].inited = true;
		}
	}
}

function tennisclub_googlemap_refresh() {
	"use strict";
	for (id in TENNISCLUB_STORAGE['googlemap_init_obj']) {
		tennisclub_googlemap_create(id);
	}
}

function tennisclub_googlemap_init_styles() {
	// Init Google map
	TENNISCLUB_STORAGE['googlemap_init_obj'] = {};
	TENNISCLUB_STORAGE['googlemap_styles'] = {
				'default': []
		};
		if (window.tennisclub_theme_googlemap_styles!==undefined)
			TENNISCLUB_STORAGE['googlemap_styles'] = tennisclub_theme_googlemap_styles(TENNISCLUB_STORAGE['googlemap_styles']);
}