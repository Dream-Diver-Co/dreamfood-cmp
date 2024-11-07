@extends("frontend.layouts.master")

@section("content")

    <div class="container-fluid bg-light my-6 mt-0">
        <div class="container">
            <div class="row g-5 align-items-center bg-light hero-border">
                <div class="col-lg-7 col-md-12">

                    <h1 class="display-1 animated zoomIn">Most<span class="text-primary"> Featured Bonus</span> Offer in The Foody Restorant</h1>
                    <div class="animated zoomIn" id="container-text">
                        <div id="flip-text">
                        <div><div>Subscription</div></div>
                        <div><div>Special Day Gift</div></div>
                        <div><div>07 Order Gift</div></div>
                        <div><div>200% Cashback</div></div>
                        <!-- <div><div>SP</div></div>
                        <div><div>Abdullah</div></div>
                        <div><div>khan</div></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="slideshow-container animated zoomIn">
                        <div class="mySlides fade">
                          <img src="{{ asset('frontend/img/menu1-1.png') }}" style="width:100%">
                        </div>

                        <div class="mySlides fade">
                          <img src="{{ asset('frontend/img/menu-hero.png') }}" style="width:100%">
                        </div>

                        <div class="mySlides fade">
                          <img src="{{ asset('frontend/img/menu2-2.png') }}" style="width:100%">
                        </div>

                        <div class="mySlides fade">
                            <img src="{{ asset('frontend/img/menu-hero.png') }}" style="width:100%">
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
                <h1 class="display-5 mb-5">All Featured Bonus Offer</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="bg-wheat rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <img src="{{ asset('frontend/img/menu2-1.png') }}" class="img-fluid rounded animated zoomIn" alt="">
                                <h4 class="mb-3">200% Cashback</h4>
                                <p class="mb-4">Get 200% cashback on your purchases! Double your savings and enjoy exclusive rewards today!</p>
                                <a href="cashback.html" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="bg-wheat rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <img src="{{ asset('frontend/img/menu2-2.png') }}" class="img-fluid rounded animated zoomIn" alt="">
                                <h4 class="mb-3">07 Order Gift</h4>
                                <p class="mb-4">Order Gift: Surprise loved ones with thoughtful gifts delivered right to their doorstep today!</p>
                                <a href="" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="bg-wheat rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <img src="{{ asset('frontend/img/menu2-3.png') }}" class="img-fluid rounded animated zoomIn" alt="">
                                <h4 class="mb-3">Special Day Gift</h4>
                                <p class="mb-4">
                                    A Special Day Gift expresses love and appreciation, creating cherished memories and celebrating unique moments.</p>
                                <a href="" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                    <div class="bg-wheat rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <img src="{{ asset('frontend/img/menu1-1.png') }}" class="img-fluid rounded animated zoomIn" alt="">
                                <h4 class="mb-3">Deal Of The Day</h4>
                                <p class="mb-4">iscover incredible savings with our Deal of the Day—exclusive offers that won't last long!</p>
                                <a href="{{ route('deal') }}" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

@endsection

