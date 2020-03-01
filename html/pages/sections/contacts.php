<section class="site-section contacts">
  <h2 class="heading section-heading">Контакты</h2>
  <div class="section-content">
		<div class="map" id="map"></div>
		<div class="contacts-card">
			<ul class="contacts-data">
				<li class="contacts-data-item location">г.Киев, Крюковщина</li>
				<li class="contacts-data-item phone">+38 (099) 345 9090</li>
				<li class="contacts-data-item email">spartan.vovk@gmail.com</li>
				<li class="contacts-data-item facebook">facebook.com/character.ocr/</li>
				<li class="contacts-data-item worktime">
					<strong>График работы</strong>
					Пн - Вс 07:00 - 22:00
				</li>
			</ul>
			<form>
				<div class="form-container">
					<label class="label">Ваше имя*</label>
					<input type="text" class="input" name="name">
				</div>
				<div class="form-container">
					<label class="label">Номер телефона*</label>
					<input type="text" class="input" name="phone">
				</div>
				<div class="form-container textarea">
					<label class="label">Сообщение</label>
					<textarea class="input" name="message"></textarea>
				</div>
				<button class="button">Напишите нам</button>
			</form>
		</div>
	</div>
</section>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhJcHk1nmFEpuMqaft2-JDapdZrg6KfRc"></script>
<script>
  google.maps.event.addDomListener(window, 'load', initMap);

  function initMap(){
  	 var mapOptions = {
			// How zoomed in you want the map to start at (always required)
			zoom: 15,
			disableDefaultUI: true,
			// The latitude and longitude to center the map (always required)
			center: new google.maps.LatLng(50.3706075,30.3735374),
			styles: mapStyle,
		}

		var mapElement = document.getElementById('map');
		var map = new google.maps.Map(mapElement, mapOptions);
		var marker = new google.maps.Marker({
      position: new google.maps.LatLng(50.3706075,30.3735374),
      map: map,
      title: 'Мы тут',
      icon: '<?= TH_URI ?>imgs/map-marker.png'
  	});
	}

  let mapStyle = [
	{
		"featureType": "water",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#e9e9e9"
			},
			{
				"lightness": 17
			}
		]
	},
	{
		"featureType": "landscape",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#f5f5f5"
			},
			{
				"lightness": 20
			}
		]
	},
	{
		"featureType": "road.highway",
		"elementType": "geometry.fill",
		"stylers": [
			{
				"color": "#ffffff"
			},
			{
				"lightness": 17
			}
		]
	},
	{
		"featureType": "road.highway",
		"elementType": "geometry.stroke",
		"stylers": [
			{
				"color": "#ffffff"
			},
			{
				"lightness": 29
			},
			{
				"weight": 0.2
			}
		]
	},
	{
		"featureType": "road.arterial",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#ffffff"
			},
			{
				"lightness": 18
			}
		]
	},
	{
		"featureType": "road.local",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#ffffff"
			},
			{
				"lightness": 16
			}
		]
	},
	{
		"featureType": "poi",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#f5f5f5"
			},
			{
				"lightness": 21
			}
		]
	},
	{
		"featureType": "poi.park",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#dedede"
			},
			{
				"lightness": 21
			}
		]
	},
	{
		"elementType": "labels.text.stroke",
		"stylers": [
			{
				"visibility": "on"
			},
			{
				"color": "#ffffff"
			},
			{
				"lightness": 16
			}
		]
	},
	{
		"elementType": "labels.text.fill",
		"stylers": [
			{
				"saturation": 36
			},
			{
				"color": "#333333"
			},
			{
				"lightness": 40
			}
		]
	},
	{
		"elementType": "labels.icon",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "transit",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#f2f2f2"
			},
			{
				"lightness": 19
			}
		]
	},
	{
		"featureType": "administrative",
		"elementType": "geometry.fill",
		"stylers": [
			{
				"color": "#fefefe"
			},
			{
				"lightness": 20
			}
		]
	},
	{
		"featureType": "administrative",
		"elementType": "geometry.stroke",
		"stylers": [
			{
				"color": "#fefefe"
			},
			{
				"lightness": 17
			},
			{
				"weight": 1.2
			}
		]
	}
];
</script>