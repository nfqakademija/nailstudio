
// Map
    function myMap() {
        var mapCanvas = document.getElementById("map");
        var myCenter = new google.maps.LatLng(55.9306458, 23.3162949);
        var mapOptions = {
            center: myCenter,
            zoom: 16,
            scrollwheel: false,
        };


        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter,
            //animation: google.maps.Animation.BOUNCE
        });
        var infowindow = new google.maps.InfoWindow({
            content: "Eglės Nagų Studija. Vilniaus g. 134 (2 aukštas) Šiauliai"
        });

        infowindow.open(map, marker);
        marker.setMap(map);
    }


// ---------------------------------------------- //
// Preventing URL update on navigation link click
// ---------------------------------------------- //
$('.navbar-nav a, #scroll-down, .btn').bind('click', function (e) {
    var anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $(anchor.attr('href')).offset().top - 50
    }, 1250, 'easeInOutExpo');
    e.preventDefault();
});


// ---------------------------------------------- //
// Navbar Shrinking Behavior
// ---------------------------------------------- //
    $(window).scroll(function () {
        if ($(window).scrollTop() > 50) {
            $('nav.navbar').addClass('shrink');
        } else {
            $('nav.navbar').removeClass('shrink');
        }
    });

// ---------------------------------------------- //
// Scroll to top button
// ---------------------------------------------- //
    $('#scrollTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 1000);
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 560) {
            $('#scrollTop').fadeIn();
        } else {
            $('#scrollTop').fadeOut();
        }
    });

// ---------------------------------------------- //
// Time picker initialization
// ---------------------------------------------- //

$('body').scrollspy({
    target: '.navbar',
    offset: 80
});


$('#theCarousel').find('.item').first().addClass('active');
// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
    interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    if (next.next().length>0) {
        next.next().children(':first-child').clone().appendTo($(this));
    } else {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
});

// <!-- auto-generate carousel indicator html -->
// var myCarousel = $("#theCarousel");
// myCarousel.append("<ol class='carousel-indicators li'></ol>");
// var indicators = $(".carousel-indicators");
// myCarousel.find(".carousel-inner").children(".item").each(function(index) {
//     (index === 0) ?
//         indicators.append("<li data-target='#theCarousel' data-slide-to='"+index+"' class='active'></li>") :
//         indicators.append("<li data-target='#theCarousel' data-slide-to='"+index+"'></li>");
// });
//


