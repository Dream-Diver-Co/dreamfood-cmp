
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Dream Foods</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('/admin/assets/images/logo1.jpg') }}">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">


        <!-- {{-- subscription stylesheet --}} -->
        <link href="{{ asset('frontend/css/subscription.css')}}" rel="stylesheet" >

        <!-- {{-- text stylesheet --}} -->
        <link href="{{ asset('frontend/css/text.css')}}" rel="stylesheet" >

        <!-- {{-- text stylesheet --}} -->
        <link href="{{ asset('frontend/css/modal.css')}}" rel="stylesheet">

        <!-- hero-responsive -->
        <link href="{{ asset('frontend/css/hero-responsive.css')}}" rel="stylesheet" >

    </head>
    <body>


    {{-- header start --}}
    @include("frontend.partials.header")
    {{-- header end --}}


    {{-- main content --}}
    @yield("content")
    {{-- main content --}}

    <!-- Footer Start -->
    @include("frontend.partials.footer")
    <!-- Footer End -->


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js')}} "></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js')}} "></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js')}} "></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js')}} "></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js')}} "></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js')}} "></script>



    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js')}} "></script>

        <script>
            const slideshowContainers = ["slideshow-container1", "slideshow-container2", "slideshow-container3", "slideshow-container4"];
            slideshowContainers.forEach(containerId => {
                showSlides(containerId);
            });

            function showSlides(containerId) {
                let slideIndex = 0;
                const slides = document.querySelectorAll(`#${containerId} .mySlides`);

                function displaySlide() {
                    for (let i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slides[slideIndex].style.display = "block";
                }

                function nextSlide() {
                    slideIndex++;
                    if (slideIndex >= slides.length) {
                        slideIndex = 0;
                    }
                    displaySlide();
                }

                function autoChange() {
                    nextSlide();
                    setTimeout(autoChange, 3000);
                }

                autoChange();
            }
        </script>
</body>

</html>
