<!-- Contenido General | MAPA -->
<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Mapa')
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
    crossorigin="">
</script>


<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
@endsection
<!-- Contenido -->
@section('contenido')
<div class="text-center">
    <div id="mapid" style="width:100%; height:500px;"></div>
</div>
@endsection
{{-- SCRIPTS MAPA --}}
@section('scripts')
<script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('dist/js/empresas_geojson.js')}}"></script>
<script>
    var mapa = L.map('mapid').setView([22.2687, -102.4804], 5);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZHJhZ29uemFmaXJvIiwiYSI6ImNqbmpqc2duNDBnNzQzd25vc21hc2s3a3kifQ.VqNgn6UNdwiqMYitgAgvHg', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mapa);

    // Icono Usuarios
    var userIcon = L.icon({
        iconUrl: 'dist/img/maps/markers/usuario.png',
        iconSize: [40, 40],
        iconAnchor: [50, 50],
        popupAnchor: [-25, -35]
    });
    // Obtiene posición del usuario
    mapa.locate({setView: true});

    mapa.on('click', function(e){
        console.log(e.latlng);
    });

    var userLocation;
    mapa.on('locationfound', function (e) {
        userLocation = e.latlng;
        L.marker(e.latlng,{icon: userIcon, title:"Estás aquí"}).addTo(mapa) // Agrega ícono del usuario
        .bindPopup('Tú estás aquí');
        swal({
        title: '¿Deseas guardar este sitio como tu ubicación actual? Este será el lugar de entrega de tus pedidos',
        text: "Puedes cambiar el lugar de entrega de tus pedidos más tarde",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {

            }
        })
    });

    function onEachFeature(feature, layer) {
		var popupContent = "Nombre:";
		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}

		layer.bindPopup(popupContent);
	}

	L.geoJSON(empresas, {

		style: function (feature) {
			return feature.properties && feature.properties.style;
		},

		onEachFeature: onEachFeature,

		pointToLayer: function (feature, latlng) {
			return L.circleMarker(latlng, {
				radius: 8,
				fillColor: "#00ced1",
				color: "#000",
				weight: 1,
				opacity: 1,
				fillOpacity: 0.8
			});
		}
    }).addTo(mapa);


    // L.Routing.control({
    // waypoints: [
    //     L.latLng(22.2687, -102.4804),
    //     L.latLng(24.2687, -102.4804)
    // ],
    // language: 'es',
    // }).addTo(mapa);
</script>
@endsection
