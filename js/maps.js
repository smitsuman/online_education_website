  function initialize()
  {
  	var map_canvas = document.getElementById('map_canvas');
  	
  	 var mapOptions = {
      center: new google.maps.LatLng(26.8612490,80.98641670000050),
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

	var map = new google.maps.Map(map_canvas,mapOptions);

	marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(26.860650696524793, 80.9867117429917)});

	infowindow = new google.maps.InfoWindow({content:"<b>Codistan</b><br/> Gomti Nagar<br/>226010 Lucknow" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});

	infowindow.open(map,marker);

	google.maps.event.addDomListener(window, 'load', initialize);

  }

  initialize();


