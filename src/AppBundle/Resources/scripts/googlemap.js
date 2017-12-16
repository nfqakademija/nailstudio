// Map
function initMap() {
    var uluru = {lat: 55.9306458, lng: 23.3162949};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: uluru,
        scrollwheel: false,
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
    var infoWindow = new google.maps.InfoWindow({
        content: "Eglės Nagų Studija. Vilniaus g. 134 (2 aukštas) Šiauliai"
    });
    infoWindow.open(map, marker);
    marker.setMap(map);
}
