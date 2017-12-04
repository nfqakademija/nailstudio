// Map
function myMap() {
    var mapCanvas = document.getElementById("map");
    var myCenter = new google.maps.LatLng(55.9306458, 23.3162949);
    var mapOptions = {center: myCenter, zoom: 16};
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

