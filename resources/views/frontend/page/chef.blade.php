@extends("frontend.layouts.master")

@section("content")
<!-- success message -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Check for success message -->
            @if(session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
<!-- success message -->
<!-- Hero End -->
<div class="container-fluid bg-light mt-0">
    <div class="container">
        <div class="row g-5 align-items-center bg-light hero-border">
            <div class="col-lg-7 col-md-12">
                {{-- <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated zoomIn">Welcome to Chef-At-Home</small> --}}
                <h1 class="display-1 mb-4 animated zoomIn">Take Our<span class="text-primary">Chef At Home</span>And Prepare Favourite Food!</h1>
                {{-- <a href="booking.html" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated zoomIn">Book Now</a> --}}

            </div>
            <div class="col-lg-5 col-md-12">
                <div class="slideshow-container animated zoomIn">
                    <div class="mySlides fade">
                      <img src="{{ asset('frontend/img/Shef2.png') }}" class="img-fluid rounded">
                    </div>

                    <div class="mySlides fade">
                      <img src="{{ asset('frontend/img/Shef3.png') }}" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>



<!-- Service Start -->
<div class="container-fluid service py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <h1 class="display-5 mb-5">Shef Services</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                <div class="bg-wheat rounded menu-2">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <img src="{{ asset('frontend/img/Shef1.png') }}" class="img-fluid rounded animated zoomIn" alt="">
                            <h4 class="mb-3">Mr.Nehal Chef</h4>
                            <p class="mb-4">A chef is a skilled culinary professional who prepares, creates, and presents delicious, artful meals.</p>
                            {{-- <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInRight" data-wow-delay="0.3s">
                <div class="bg-wheat rounded menu-2">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <img src="{{ asset('frontend/img/Shef2.png') }}" class="img-fluid rounded animated zoomIn" alt="">
                            <h4 class="mb-3">Mr.Zozo Chef</h4>
                            <p class="mb-4">A chef is a skilled culinary professional who prepares, creates, and presents delicious, artful meals.</p>
                            {{-- <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInLeft" data-wow-delay="0.5s">
                <div class="bg-wheat rounded menu-2">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <img src="{{ asset('frontend/img/Shef3.png') }}" class="img-fluid rounded animated zoomIn" alt="">
                            <h4 class="mb-3">Mr.Jhon Chef</h4>
                            <p class="mb-4">A chef is a skilled culinary professional who prepares, creates, and presents delicious, artful meals.</p>
                            {{-- <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                <div class="bg-wheat rounded menu-2">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <img src="{{ asset('frontend/img/Shef1.png') }}" class="img-fluid rounded animated zoomIn" alt="">
                            <h4 class="mb-3">Mr.Leo Chef</h4>
                            <p class="mb-4">A chef is a skilled culinary professional who prepares, creates, and presents delicious, artful meals.</p>
                            {{-- <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Book Us Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-0">
            <div class="col-1">
                <img src="{{ asset('frontend/img/background-site.jpg') }}" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-wheat py-5 px-4">
                    <div class="text-center">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-white border border-primary rounded-pill px-4 py-1 mb-3">Book Us</small>
                        <h1 class="display-5 mb-5">Where you want Our Chef Services</h1>
                    </div>
                    <form action="{{ url('chefcontact') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-4 form">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" name="name" class="form-control border-primary p-2" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="email" name="email" class="form-control border-primary p-2" placeholder="Your Email" required>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="text" name="phone" class="form-control border-primary p-2" placeholder="Your Phone" required>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="text" name="address" class="form-control border-primary p-2" placeholder="Your Address">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="date" name="date" class="form-control border-primary p-2" placeholder="Date">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="time" name="time" class="form-control border-primary p-2" placeholder="Time">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" name="event_name" class="form-control border-primary p-2" placeholder="Event Name">
                            </div>
                            {{-- <div class="col-lg-6 col-md-6">
                                <input type="text" name="chef_name" class="form-control border-primary p-2" placeholder="Chef Name">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" name="subject" class="form-control border-primary p-2" placeholder="Subject" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <textarea name="note" class="form-control border-primary p-2" placeholder="NOTE" required></textarea>
                            </div> --}}
                            <div class="col-lg-6 col-md-6">
                                <input type="file" name="image" class="form-control border-primary p-2" placeholder="Image">
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <textarea name="note" class="form-control border-primary p-2" placeholder="Your Note" required></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-1">
                <img src="{{ asset('frontend/img/background-site.jpg') }}" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Book Us End -->

<script>
    // Auto-hide the success message after 5 seconds
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
</script>

@endsection


