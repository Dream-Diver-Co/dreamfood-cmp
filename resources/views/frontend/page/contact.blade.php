@extends("frontend.layouts.master")

@section("content")

<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <div class="col-12">
                @if(session('flash_message'))
                    <div class="alert alert-success" id="flash-message">
                        {{ session('flash_message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

        <!-- Hero Start -->
        <div class="container-fluid bg-light mt-0">
            <div class="container text-center animated bounceInDown">
                <h1 class="display-1 mb-4">Contact</h1>
                <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
                </ol>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Contact Start -->
        <div class="container-fluid contact wow bounceInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="p-5 bg-wheat rounded contact-form">
                    <div class="row g-4">
                        <div class="col-12">
                            <h1 class="display-5 mb-0">Contact Us For Any Queries!</h1>
                        </div>
                        <div class="col-md-6 col-lg-7">
                            {{-- <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                            <form action="{{ url('usercontact') }}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- This generates the CSRF token to secure the form submission -->
                                <input type="text" name="name" id="name" class="w-100 form-control p-3 mb-4 border-primary bg-white" placeholder="Your Name">
                                <input type="email" name="email" id="email" class="w-100 form-control p-3 mb-4 border-primary bg-white" placeholder="Enter Your Email">
                                <input type="tel" name="phone" id="phone" class="w-100 form-control p-3 mb-4 border-primary bg-white" placeholder="Phone Number">
                                <input type="text" name="subject" id="subject" class="w-100 form-control p-3 mb-4 border-primary bg-white" placeholder="Subject">
                                <textarea name="note" id="note" class="w-100 form-control mb-4 p-3 border-primary bg-white" rows="4" cols="10" placeholder="Your Message"></textarea>
                                <button type="submit" value="Save" class="w-100 btn btn-primary form-control p-3 border-primary bg-primary rounded-pill">Submit Now</button>
                            </form>

                        </div>
                        <div class="col-md-6 col-lg-5">
                            @if($admincontacts->isNotEmpty())
                            @php
                                $item = $admincontacts->first();
                            @endphp
                            <div>
                                <div class="d-inline-flex w-100 border border-primary p-2 rounded mb-4">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Address</h4>
                                        <p>{{ $item->address }}</p>
                                    </div>
                                </div>
                                <div class="d-inline-flex w-100 border border-primary p-2 rounded mb-4">
                                    <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Mail Us</h4>

                                        <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                    </div>
                                </div>
                                <div class="d-inline-flex w-100 border border-primary p-2 rounded">
                                    <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Telephone</h4>
                                        {{-- <p class="mb-2">{{ $item->phone }}</p> --}}
                                        <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Contact map Start -->
        <div class="container-fluid contact wow bounceInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="p-2 bg-wheat rounded contact-form">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            @if($admincontacts->isNotEmpty())
                            @php
                                $item = $admincontacts->first();
                            @endphp
                            <iframe class="contact-map col-lg-12 col-12" style="height: 400px;" src="{{ $item->map }}">
                            </iframe>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Contact map End -->

    <script>
        // Wait for the DOM to fully load
        document.addEventListener('DOMContentLoaded', function () {
            // Set a timeout to hide the flash message after 5 seconds (5000 ms)
            setTimeout(function () {
                let flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    flashMessage.style.display = 'none'; // Hide the flash message
                }
            }, 3000); // 3000 ms = 3 seconds
        });
    </script>


@endsection

