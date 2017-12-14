
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

// ---------------------------------------------- //
// Preventing URL update on navigation link click
// ---------------------------------------------- //
$('.navbar-nav a, #scroll-down a, .btn a').bind('click', function (e) {
    var anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $(anchor.attr('href')).offset().top - 50
    }, 1250, 'easeInOutExpo');
    e.preventDefault();
});
// $('a[href^="#"]').click(function(){
// $('a[href^="#"]').click(function(){
//
//     var the_id = $(this).attr("href");
//
//     $('html, body').animate({
//         scrollTop:$(the_id).offset().top
//     }, 1250, 'easeInOutExpo');
//
//     return false;});
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

$(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
        $(this).collapse('hide');
    }
});

function showDiv() {
    $('#welcomeDiv').style.display = "block";
}

    $(".btn-block").click(function(){
                $(".reservation-contact").fadeIn("3000");
    });


