//animation offre
$(document).ready(function() {
    $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        var offerTop = $('#offer').offset().top;
        var windowHeight = $(window).height();
        
        if (scrollTop > offerTop - windowHeight / 2) {
            $('.animated-item').each(function(index) {
                $(this).addClass('animate');
            });
        }
    });
    
    $(window).trigger('scroll');
});

//animation contact
window.addEventListener('scroll', function() {
    var contactItems = document.querySelectorAll('.contact-item');
    var screenHeight = window.innerHeight;

    contactItems.forEach(function(item) {
        var positionFromTop = item.getBoundingClientRect().top;

        if (positionFromTop - screenHeight <= 0) {
            item.classList.add('show');
        }
    });
});


//test
// VARIABLES

