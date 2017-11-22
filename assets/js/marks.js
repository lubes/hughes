var MYMAP = {
  map: null,
	bounds: null
}

      var gmarkers = []; 


MYMAP.init = function(selector, latLng, zoom) {

	
var stylez = [
  {
    "featureType": "landscape.man_made",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "landscape.natural.terrain",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "landscape",
    "stylers": [
      { "visibility": "on" },
      { "color": "#c1c1c1" }
    ]
  },{
    "featureType": "poi",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "water",
    "stylers": [
      { "color": "#ffffff" }
    ]
  },{
  }
];	
	
  var myOptions = {
    zoom:zoom,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
	panControl: false,
	streetViewControl: false,
	zoomControl: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL
    }
  }
  
  this.map = new google.maps.Map($(selector)[0], myOptions);
  this.bounds = new google.maps.LatLngBounds();

	 var styledMapOptions = {
	 map: this.map,
	 name: "tips4phpHip-Hop"
	 }
	
	 var testmap =  new google.maps.StyledMapType(stylez,styledMapOptions);
	
	 this.map.mapTypes.set('tips4php', testmap);
	 this.map.setMapTypeId('tips4php');

/*var imageBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(25.5,-126),
    new google.maps.LatLng(49.5,-67));

	var oldmap = new google.maps.GroundOverlay("usa1.png",imageBounds);
	oldmap.setMap(this.map);

*/
}

MYMAP.placeMarkers = function(filename) {
	var infoWindow = new google.maps.InfoWindow();

	$.get(filename, function(xml){
		$(xml).find("marker").each(function(){
			var ID = $(this).find('ID').text();
			var name = $(this).find('name').text();
			var plink = name;
			plink = plink.replace(/ /gi,"-");
			plink = plink.toLowerCase();
			var address = $(this).find('address').text();
			var city = $(this).find('city').text();
			var state = $(this).find('state').text();
			//var fb = $(this).find('fb').text();
			// create a new LatLng point for the marker
			//var web = $(this).find('website').text();
			var lat = $(this).find('lat').text();
			var lng = $(this).find('lng').text();
			var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
			
			// extend the bounds to include the new point
			MYMAP.bounds.extend(point);
			
			var marker = new google.maps.Marker({
				position: point,
				map: MYMAP.map,
				icon: '/assets/img/contact/marker.png'  

			});
				
			var html='<div style="float:right; padding-left:2px;";></div><a href="/properties/'+ plink +'/"><strong>'+name+'</strong></a><br />'+address+'<br />'+city+', '+state +'<div style="clear:both;	font-style:italic">';
			
			html += '<a href="javascript:MYMAP.map.setCenter(new google.maps.LatLng('+point.lat().toFixed(6) + ',' + point.lng().toFixed(6) +')); MYMAP.map.setZoom(16);">Zoom To</a></div>';
		
	
			google.maps.event.addListener(marker, 'click', function() {
				infoWindow.setContent(html);
				infoWindow.open(MYMAP.map, marker);
			});
			    gmarkers.push(marker);

			//fitToMarkers();
			MYMAP.map.fitBounds(MYMAP.bounds);
		});
	});

}


MYMAP.placeMark = function(filename) {
				var infoWindow = new google.maps.InfoWindow();

	$.get(filename, function(xml){
		$(xml).find("marker").each(function(){
			var ID = $(this).find('ID').text();
			var name = $(this).find('name').text();
			var plink = name;
			plink = plink.replace(/ /gi,"-");
			plink = plink.toLowerCase();
			var address = $(this).find('address').text();
			var city = $(this).find('city').text();
			var state = $(this).find('state').text();
			//var fb = $(this).find('fb').text();
			// create a new LatLng point for the marker
			//var web = $(this).find('website').text();
			var lat = $(this).find('lat').text();
			var lng = $(this).find('lng').text();
			var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
			
			// extend the bounds to include the new point
			MYMAP.bounds.extend(point);
			
			var marker = new google.maps.Marker({
				position: point,
				map: MYMAP.map,
			});
					
			var html='<div style="float:right; padding-left:2px;";></div><a href="/properties/'+ plink +'/"><strong>'+name+'</strong></a><br />'+address+'<br />'+city+', '+state +'<div style="clear:both;	font-style:italic">';
			
			html += '<a href="javascript:MYMAP.map.setCenter(new google.maps.LatLng('+point.lat().toFixed(6) + ',' + point.lng().toFixed(6) +')); MYMAP.map.setZoom(16);">Zoom To</a></div>';
			google.maps.event.addListener(marker, 'click', function() {
				infoWindow.setContent(html);
				infoWindow.open(MYMAP.map, marker);
			});
			    gmarkers.push(marker);

			
		});
	});
	
}


function zoomIn(lat, long){
	//var myLatLng = new google.maps.LatLng(lat,long);
  	//MYMAP.init('#map', myLatLng, 16);
	//MYMAP.placeMarkers('markers.php');

	
	gMap = new google.maps.Map(document.getElementById('map')); 
	gMap.setZoom(15); // This will trigger a zoom_changed on the map
	gMap.setCenter(new google.maps.LatLng(lat, long));
	gMap.setMapTypeId(google.maps.MapTypeId.ROADMAP);
	
}

function myclick(i) {

  google.maps.event.trigger(gmarkers[i], "click");

}