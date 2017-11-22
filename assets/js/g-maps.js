  // Google Maps API
  
function initialize() {
var latlng = new google.maps.LatLng(34.1297094,-118.166251);
var settings = {
zoom: 11,
disableDefaultUI: true,
center: latlng,
scrollwheel: false,
navigationControl: false,
scaleControl: false,
streetViewControl: false,
draggable: true,
 
mapTypeControl: false,
mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
navigationControl: false,
navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
mapTypeId: google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("map-canvas"), settings);


	  
	  var location1 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Hughes Main Office<br>Altadena Showroom</h1>'+
      '<div id="bodyContent" style="width:220px; height:65px;">'+
      '<p>711 West Woodbury Road, Bldg A</br>' +
      'Altadena, CA 91001 </br> '+
      '<a class="grn-link" href="http://goo.gl/maps/dS1D4" target="_blank">'+
      'Directions</a> </p>'+
      '</div>'+
      '</div>';

      var location2 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Downtown LA Arts<br> District Showroom</h1>'+
      '<div id="bodyContent" style="width:220px; height:65px;">'+
      '<p>458 South Alameda Street</br>' +
      'Los Angeles, CA 90013 </br> '+
      '<a class="grn-link" href="https://goo.gl/maps/JYO8c" target="_blank">'+
      'Directions</a> </p>'+
      '</div>'+
      '</div>';
	  
	  

  var infowindow = new google.maps.InfoWindow({
      content: location1
  });

  var infowindow2 = new google.maps.InfoWindow({
      content: location2
  });

var point = new google.maps.LatLng(34.183897,-118.166251);

var point2 = new google.maps.LatLng(34.041916,-118.238200);


var iconBase = '/wp-content/themes/Hughes/assets/img/contact/';
var markerShadow = {
  url: iconBase + 'marker-shadow.png',
  anchor: new google.maps.Point(5, 20)
};

var marker = new google.maps.Marker({
  position: point,
  map: map,
  icon: iconBase + 'marker.png',
  shadow: markerShadow
});


var marker2 = new google.maps.Marker({
    position: point2,
    map: map,
    icon: iconBase + 'marker.png',
    shadow: markerShadow
});

google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

google.maps.event.addListener(marker2, 'click', function() {
    infowindow2.open(map,marker2);
  });

var red_road_styles = [
  {
    featureType: "all",
    stylers: [
      { saturation: -100 }
    ]
  }
];

map.setOptions({styles: red_road_styles});
}
google.maps.event.addDomListener(window, 'load', initialize);






