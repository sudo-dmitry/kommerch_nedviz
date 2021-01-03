//Navbar shrink

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        $('.navbar').css('padding', '10px 0');
        $('.navbar .logo').css('font-size', '1.4rem');
        $('.navbar .phone').css('font-size', '1rem');
        $('.navbar .address').css('font-size', '.8rem');
    } else {
        $('.navbar').css('padding', '20px 0');
        $('.navbar .logo').css('font-size', '1.8rem');
        $('.navbar .phone').css('font-size', '1.4rem');
        $('.navbar .address').css('font-size', '1rem');
    }
};


// LAZY

$(function(){

    let observer = lozad('.lazy:not(.loaded)', {
        loaded: function(el) {
            el.classList.add('loaded');
            $(el).trigger('loaded');
        }
    });
    observer.observe();

});


// Slick carousel

$(document).ready(function(){
    $('.carousel__logos').slick({
        slidesToShow: 6,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 1500,
        accessibility: false,
        arrows: false,
        pauseOnFocus: false,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 770,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            }
        ]
    });
});


// Modal

var modal = $('#simpleModal');

var mbtn =  $('.mbtn');

var closeBtn = $('.closeBtn');

$(document).ready(function() {
   mbtn.on('click', function() {
      modal.show();
   });
   closeBtn.on('click', function() {
       modal.hide();
   });
});

$('body').bind('click', function (e) {
    if($(e.target).hasClass("modal")) {
        modal.hide();
    }
});