(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Initiate the wowjs
    new WOW().init();


   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonial carousel
    $(".testimonial-carousel-1").owlCarousel({
        loop: true,
        dots: false,
        margin: 25,
        autoplay: true,
        slideTransition: 'linear',
        autoplayTimeout: 0,
        autoplaySpeed: 10000,
        autoplayHoverPause: false,
        responsive: {
            0:{
                items:1
            },
            575:{
                items:1
            },
            767:{
                items:2
            },
            991:{
                items:3
            }
        }
    });

    $(".testimonial-carousel-2").owlCarousel({
        loop: true,
        dots: false,
        rtl: true,
        margin: 25,
        autoplay: true,
        slideTransition: 'linear',
        autoplayTimeout: 0,
        autoplaySpeed: 10000,
        autoplayHoverPause: false,
        responsive: {
            0:{
                items:1
            },
            575:{
                items:1
            },
            767:{
                items:2
            },
            991:{
                items:3
            }
        }
    });

    // bonus fade animition

    let slideIndex = 0;
    showSlides();

    function showSlides() {
    let i;
    const slides = document.getElementsByClassName("mySlides");
       
   

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) { slideIndex = 1; }

    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
    }


    // let slideIndex1 = 0;
    // showSlides("slideshow-container1");

    // let slideIndex2 = 0;
    // showSlides("slideshow-container2");

    // function showSlides(containerClass) {
    //     let i;
    //     const slides = document.querySelectorAll(`.${containerClass} .mySlides`);

    //     for (i = 0; i < slides.length; i++) {
    //         slides[i].style.display = "none";
    //     }

    //     if (containerClass === "slideshow-container1") {
    //         slideIndex1++;
    //         if (slideIndex1 > slides.length) { slideIndex1 = 1; }
    //         slides[slideIndex1 - 1].style.display = "block";
    //         setTimeout(() => showSlides(containerClass), 3000);
    //     } else if (containerClass === "slideshow-container2") {
    //         slideIndex2++;
    //         if (slideIndex2 > slides.length) { slideIndex2 = 1; }
    //         slides[slideIndex2 - 1].style.display = "block";
    //         setTimeout(() => showSlides(containerClass), 3000);
    //     }
    // }


})(jQuery);

