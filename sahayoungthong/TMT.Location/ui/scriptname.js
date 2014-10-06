function creategooglemap( num ){
			console.log("google : "+num);
			var myLatlng = new google.maps.LatLng(13.742239, 100.513119);
			function initialize() {	
				var mapOptions = {	
					center: myLatlng,	
					zoom: 16	
				};	
				var map = new google.maps.Map(document.getElementById("map-canvas-"+num), mapOptions);	
		
			// var marker = new google.maps.Marker({	
			// 		position: myLatlng,	
			// 		map: map,	
			// 		draggable:true,	
			// 		title:"Drag me!"	
			// 	});	
			// 	google.maps.event.addListener(marker, "dragend", function(e) {	
			// 		var LAT = this.getPosition().lat();	
			// 		var LNG = this.getPosition().lng();	
			// 		console.log( "LAT:"+LAT+"  LNG:"+LNG );
			// 		document.getElementById("lat_val_"+num).value = LAT;	
			// 		document.getElementById("long_val_"+num).value = LNG;	
				
			// });	
			// google.maps.event.addListener(map, "zoom_changed", function() {	
			// 	var zoomLevel = map.getZoom();
			// 	console.log( "ZOOM:"+zoomLevel);	
			// 	document.getElementById("zoom_val_"+num).value = zoomLevel;	
			// 	});	
			 }
			google.maps.event.addDomListener(window, "load", initialize);
			
	}