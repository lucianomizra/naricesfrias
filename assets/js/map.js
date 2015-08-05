var Map = {
	token: 'pk.eyJ1IjoibHVjaWFub21penJhaGkiLCJhIjoiZmMxZjdkNTNiYTk4NjA5NDlmNDVhZWFkMmJiMTA2YmUifQ.vPuds0-shSuCOt3dlm5zLw',
	init: function() {
		L.mapbox.accessToken = Map.token;
	    var geolocate = document.getElementById('geolocate');
	    var map = L.mapbox.map('map', 'mapbox.streets').addControl(L.mapbox.geocoderControl('mapbox.places'));;

	    var myLayer = L.mapbox.featureLayer().addTo(map);


	    if (!navigator.geolocation) {
	      geolocate.innerHTML = 'Geolocatización esta desactivada';
	    } else {

	      map.locate();
	    }


	    // Once we've got a position, zoom and center the map
	    // on it, and add a single marker.
	    map.on('locationfound', function(e) {
	        map.fitBounds(e.bounds);

	        myLayer.setGeoJSON({
	            type: 'Feature',
	            geometry: {
	                type: 'Point',
	                coordinates: [e.latlng.lng, e.latlng.lat]
	            },
	            properties: {
	                'title': 'Este soy yo!',
	                'marker-color': '#d66f4e',
	                'marker-symbol': 'star'
	            }
	        });

	        // And hide the geolocation button
	        // geolocate.parentNode.removeChild(geolocate);
	    });

	    // If the user chooses not to allow their location
	    // to be shared, display an error message.
	    map.on('locationerror', function() {
	        geolocate.innerHTML = 'Activa la geolocalizacion para navegar';
	    });
	},
	groups : [
      red: makeGroup('red'),
      green: makeGroup('green'),
      orange: makeGroup('orange'),
      blue: makeGroup('blue'),
      yellow: makeGroup('yellow')
    ]
};