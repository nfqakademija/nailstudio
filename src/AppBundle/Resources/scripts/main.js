// Map
function myMap() {
    var mapCanvas = document.getElementById("map");
    var myCenter = new google.maps.LatLng(55.9306458, 23.3162949);
    var mapOptions = {
        center: myCenter,
        zoom: 16,
        // scrollwheel: false,
        // navigationControl: false,
        // mapTypeControl: false,
        // scaleControl: false,
        // How you would like to style the map.
        // This is where you would paste any style found on Snazzy Maps.
    //     styles: [{
    //         "featureType": "administrative",
    //         "elementType": "all",
    //         "stylers": [{
    //             "visibility": "on"
    //         }, {
    //             "lightness": 33
    //         }]
    //     }, {
    //         "featureType": "administrative",
    //         "elementType": "labels",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }]
    //     }, {
    //         "featureType": "administrative",
    //         "elementType": "labels.text",
    //         "stylers": [{
    //             "gamma": "0.75"
    //         }]
    //     }, {
    //         "featureType": "administrative.neighborhood",
    //         "elementType": "labels.text.fill",
    //         "stylers": [{
    //             "lightness": "-37"
    //         }]
    //     }, {
    //         "featureType": "landscape",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#f9f9f9"
    //         }]
    //     }, {
    //         "featureType": "landscape.man_made",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }, {
    //             "lightness": "40"
    //         }, {
    //             "visibility": "off"
    //         }]
    //     }, {
    //         "featureType": "landscape.natural",
    //         "elementType": "labels.text.fill",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }, {
    //             "lightness": "-37"
    //         }]
    //     }, {
    //         "featureType": "landscape.natural",
    //         "elementType": "labels.text.stroke",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }, {
    //             "lightness": "100"
    //         }, {
    //             "weight": "2"
    //         }]
    //     }, {
    //         "featureType": "landscape.natural",
    //         "elementType": "labels.icon",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }]
    //     }, {
    //         "featureType": "poi",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }, {
    //             "lightness": "80"
    //         }]
    //     }, {
    //         "featureType": "poi",
    //         "elementType": "labels",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }, {
    //             "lightness": "0"
    //         }]
    //     }, {
    //         "featureType": "poi.attraction",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "lightness": "-4"
    //         }, {
    //             "saturation": "-100"
    //         }]
    //     }, {
    //         "featureType": "poi.park",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#c5dac6"
    //         }, {
    //             "visibility": "on"
    //         }, {
    //             "saturation": "-95"
    //         }, {
    //             "lightness": "62"
    //         }]
    //     }, {
    //         "featureType": "poi.park",
    //         "elementType": "labels",
    //         "stylers": [{
    //             "visibility": "on"
    //         }, {
    //             "lightness": 20
    //         }]
    //     }, {
    //         "featureType": "road",
    //         "elementType": "all",
    //         "stylers": [{
    //             "lightness": 20
    //         }]
    //     }, {
    //         "featureType": "road",
    //         "elementType": "labels",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }, {
    //             "gamma": "1.00"
    //         }]
    //     }, {
    //         "featureType": "road",
    //         "elementType": "labels.text",
    //         "stylers": [{
    //             "gamma": "0.50"
    //         }]
    //     }, {
    //         "featureType": "road",
    //         "elementType": "labels.icon",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }, {
    //             "gamma": "0.50"
    //         }]
    //     }, {
    //         "featureType": "road.highway",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#c5c6c6"
    //         }, {
    //             "saturation": "-100"
    //         }]
    //     }, {
    //         "featureType": "road.highway",
    //         "elementType": "geometry.stroke",
    //         "stylers": [{
    //             "lightness": "-13"
    //         }]
    //     }, {
    //         "featureType": "road.highway",
    //         "elementType": "labels.icon",
    //         "stylers": [{
    //             "lightness": "0"
    //         }, {
    //             "gamma": "1.09"
    //         }]
    //     }, {
    //         "featureType": "road.arterial",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#e4d7c6"
    //         }, {
    //             "saturation": "-100"
    //         }, {
    //             "lightness": "47"
    //         }]
    //     }, {
    //         "featureType": "road.arterial",
    //         "elementType": "geometry.stroke",
    //         "stylers": [{
    //             "lightness": "-12"
    //         }]
    //     }, {
    //         "featureType": "road.arterial",
    //         "elementType": "labels.icon",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }]
    //     }, {
    //         "featureType": "road.local",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#fbfaf7"
    //         }, {
    //             "lightness": "77"
    //         }]
    //     }, {
    //         "featureType": "road.local",
    //         "elementType": "geometry.fill",
    //         "stylers": [{
    //             "lightness": "-5"
    //         }, {
    //             "saturation": "-100"
    //         }]
    //     }, {
    //         "featureType": "road.local",
    //         "elementType": "geometry.stroke",
    //         "stylers": [{
    //             "saturation": "-100"
    //         }, {
    //             "lightness": "-15"
    //         }]
    //     }, {
    //         "featureType": "transit.station.airport",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "lightness": "47"
    //         }, {
    //             "saturation": "-100"
    //         }]
    //     }, {
    //         "featureType": "water",
    //         "elementType": "all",
    //         "stylers": [{
    //             "visibility": "on"
    //         }, {
    //             "color": "#acbcc9"
    //         }]
    //     }, {
    //         "featureType": "water",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "saturation": "53"
    //         }]
    //     }, {
    //         "featureType": "water",
    //         "elementType": "labels.text.fill",
    //         "stylers": [{
    //             "lightness": "-42"
    //         }, {
    //             "saturation": "17"
    //         }]
    //     }, {
    //         "featureType": "water",
    //         "elementType": "labels.text.stroke",
    //         "stylers": [{
    //             "lightness": "61"
    //         }]
    //     }]
    };


    var map = new google.maps.Map(mapCanvas,mapOptions);
    var marker = new google.maps.Marker({
        position: myCenter,
        //animation: google.maps.Animation.BOUNCE
    });
    var infowindow = new google.maps.InfoWindow({
        content: "Eglės Nagų Studija. Vilniaus g. 134 (2 aukštas) Šiauliai"
    });

    infowindow.open(map,marker);
    marker.setMap(map);
}

if (window.location.hash && window.location.hash == '#_=_') {
    if (window.history && history.pushState) {
        window.history.pushState("", document.title, window.location.pathname);
    } else {
        // Prevent scrolling by storing the page's current scroll offset
        var scroll = {
            top: document.body.scrollTop,
            left: document.body.scrollLeft
        };
        window.location.hash = '';
        // Restore the scroll offset, should be flicker free
        document.body.scrollTop = scroll.top;
        document.body.scrollLeft = scroll.left;
    }
}
