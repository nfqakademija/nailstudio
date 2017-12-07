$(document).ready(function () {
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
$('.navbar-nav a, #scroll-down').bind('click', function (e) {
    var anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $(anchor.attr('href')).offset().top
    }, 1000);
    e.preventDefault();
});

// ---------------------------------------------- //
// Navbar Shrinking Behavior
// ---------------------------------------------- //
    $(window).scroll(function () {
        if ($(window).scrollTop() > 20) {
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
        if ($(window).scrollTop() >= 1500) {
            $('#scrollTop').fadeIn();
        } else {
            $('#scrollTop').fadeOut();
        }
    });
//
// // Select all links with hashes
// $('a[href*="#"]')
// // Remove links that don't actually link to anything
//     .not('[href="#"]')
//     .not('[href="#0"]')
//     .click(function(event) {
//         // On-page links
//         if (
//             location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
//             &&
//             location.hostname == this.hostname
//         ) {
//             // Figure out element to scroll to
//             var target = $(this.hash);
//             target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//             // Does a scroll target exist?
//             if (target.length) {
//                 // Only prevent default if animation is actually gonna happen
//                 event.preventDefault();
//                 $('html, body').animate({
//                     scrollTop: target.offset().top
//                 }, 1000, function() {
//                     // Callback after animation
//                     // Must change focus!
//                     var $target = $(target);
//                     $target.focus();
//                     if ($target.is(":focus")) { // Checking if the target was focused
//                         return false;
//                     } else {
//                         $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
//                         $target.focus(); // Set focus again
//                     };
//                 });
//             }
//         }
//     });
//
// function Scroll() {
//
//     var navbar = document.getElementById('startchange');
//     var ypos = window.pageYOffset;
//     if (ypos > 500) {
//         navbar.style.backgroundColor = "#31b0d5";
//
//     }
//     else {
//         navbar.style.backgroundColor = "darksalmon";
//         // brand.style.color = "white";
//     }
// }

// $(function() {
//     //  jQueryUI 1.10 and HTML5 ready
//     //      http://jqueryui.com/upgrade-guide/1.10/#removed-cookie-option
//     //  Documentation
//     //      http://api.jqueryui.com/tabs/#option-active
//     //      http://api.jqueryui.com/tabs/#event-activate
//     //      http://balaarjunan.wordpress.com/2010/11/10/html5-session-storage-key-things-to-consider/
//     //
//     //  Define friendly index name
//     var index = 'key';
//     //  Define friendly data store name
//     var dataStore = window.sessionStorage;
//     //  Start magic!
//     try {
//         // getter: Fetch previous value
//         var oldIndex = dataStore.getItem(index);
//     } catch(e) {
//         // getter: Always default to first tab in error state
//         var oldIndex = 0;
//     }
//     $('#tabs').tabs({
//         // The zero-based index of the panel that is active (open)
//         active : oldIndex,
//         // Triggered after a tab has been activated
//         activate : function( event, ui ){
//             //  Get future value
//             var newIndex = ui.newTab.parent().children().index(ui.newTab);
//             //  Set future value
//             dataStore.setItem( index, newIndex )
//         }
//     });
// });

//
// $(document).ready(function () {
//     $(document).on("scroll", onScroll);
//
//     //smoothscroll
//     $('a[href^="#"]').on('click', function (e) {
//         e.preventDefault();
//         $(document).off("scroll");
//
//         $('a').each(function () {
//             $(this).removeClass('active');
//         })
//         $(this).addClass('active');
//
//         var target = this.hash,
//             menu = target;
//         $target = $(target);
//         $('html, body').stop().animate({
//             'scrollTop': $target.offset().top+2
//         }, 500, 'swing', function () {
//             window.location.hash = target;
//             $(document).on("scroll", onScroll);
//         });
//     });
// });
//
// function onScroll(event){
//     var scrollPos = $(document).scrollTop();
//     $('#menu-center a').each(function () {
//         var currLink = $(this);
//         var refElement = $(currLink.attr("href"));
//         if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
//             $('#menu-center ul li a').removeClass("active");
//             currLink.addClass("active");
//         }
//         else{
//             currLink.removeClass("active");
//         }
//     });
// }
});
