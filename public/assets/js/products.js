;(($) => {

$(function () {
    $('.owl-carousel').owlCarousel({
        loop: false,
        responsiveClass: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        autoHeight: false,
        margin: 0,
        autoWidth: false,
        items: 2,
        responsive: {
            0: { 
                items: 1,
                nav: true
            },
            1200: {
                items: 2,
                nav: true
            }
        }
    })
})

})(jQuery);