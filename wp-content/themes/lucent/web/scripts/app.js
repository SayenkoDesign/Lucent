jQuery(function() {
    jQuery(document).foundation();
    jQuery('.fancybox, li.contact > a').fancybox();
    jQuery('.slick').slick({
        arrows: true,
        centerMode: true,
        slidesToShow: 3,
        responsive: [{
            breakpoint: 700,
            settings: {
                slidesToShow: 1,
                centerMode: true
        }}, {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                centerMode: true
            }
        }]
    });
});