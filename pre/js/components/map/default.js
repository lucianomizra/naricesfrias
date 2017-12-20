var API_KEY = 'AIzaSyAV4nYx6x2JrF25cg11QBUhA6tRWMguPbI';
var MAP_THME = [{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"},{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#a68f34"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape.man_made","elementType":"labels.text.stroke","stylers":[{"lightness":"-100"},{"saturation":"-35"},{"color":"#454444"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"color":"#e9dfd3"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#01c3c1"},{"weight":"1"},{"lightness":"-3"},{"saturation":"-37"},{"gamma":"1.22"}]}];
$.getScript("https://maps.googleapis.com/maps/api/js?key="+API_KEY+"&libraries=places&callback=initMapX");


function initMapX(MAIN) {

	var init = setInterval(function() {
		if(typeof google == "object") {
			clearInterval(init);

			if($('#select-location-map').length) 
				SelectLocationMap ();
			
			if( $('.pets-map').length ) 
				PetsMap (MAIN);

			if( $('.map-marker').length ) 
				fixedMap (MAIN, $('.map-marker'));

		}
	},200);
	
}

function PetsMap (MAIN) {

  var data = JSON.parse($('#map-all-data').html());

  var map = new google.maps.Map(document.getElementById('map'), {
    styles: MAP_THME,
    center: {lat: -34.6104477, lng: -58.4104911},
    zoom: 12, 
  });

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      map.setCenter(pos);
    }, function() {
    });
  } 

  var markers = [];
  for (var i = 0; i < data.length; i++) {
    (function(marker) {
      if ( (marker.file && marker.lat && marker.lng) ) {
        var myLatLng = { lat: parseFloat(marker.lat), lng: parseFloat(marker.lng) };

        var icon = {
            url: marker.file,
            scaledSize: new google.maps.Size(40, 40),
            origin: new google.maps.Point(0,0),
            fillOpacity: .6,
            scale: .5,
            strokeColor: '#000000',
            strokeWeight: 1,
            anchor: new google.maps.Point(0,0)
        };

        var Marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: icon,
            offset: '0',
            title: marker.name
        });

        google.maps.event.addDomListener(Marker, 'click', function() {
          window.location.href = marker.full_link;
        });

        markers.push(Marker);
      }
      })(data[i]);
  };


    var markerCluster = new MarkerClusterer(map, markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      

}

function SelectLocationMap () {
  var lat = parseFloat($('#input_select_location_lat').val());
  var lng = parseFloat($('#input_select_location_lng').val());
  var input = document.getElementById('input_keyword');
  var myLatLng = { lat: lat, lng: lng };

  var SLMAP = new google.maps.Map(document.getElementById('select-location-map'), {
    center: myLatLng,
    styles: MAP_THME,
    zoom: 12
  });


  var marker = new google.maps.Marker({
    position: myLatLng,
    draggable: true,
    animation: google.maps.Animation.DROP,
    map: SLMAP,
  });


  var searchBox = new google.maps.places.SearchBox(input);
  searchBox.addListener('places_changed', function() {

    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    place = places[0];

    $('#input_select_location_lat').val(place.geometry.location.lat());
    $('#input_select_location_lng').val(place.geometry.location.lng());

    var latlng = { lat: place.geometry.location.lat(), lng: place.geometry.location.lng() };
    marker.setPosition(latlng);
    SLMAP.setCenter(latlng);
  });    

  google.maps.event.addListener(marker, 'drag', function() {
    var p = marker.getPosition();
    $('#input_select_location_lat').val( p.lat() );
    $('#input_select_location_lng').val( p.lng() );
  });
}



function fixedMap (MAIN, el) {
	var lat = parseFloat(el.attr('data-lat'));
	var lng = parseFloat(el.attr('data-lng'));

	console.dir({lat: lat, lng: lng});

	var FMAP = new google.maps.Map(document.getElementById('fixed-map'), {
	  center: {lat: lat, lng: lng},
      styles: MAP_THME,
	  zoom: 12
	});


	var myLatLng = { lat: lat, lng: lng };
	var marker = new google.maps.Marker({
		position: myLatLng,
		animation: google.maps.Animation.DROP,
		map: FMAP,
	});

}

