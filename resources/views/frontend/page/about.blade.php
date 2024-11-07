@extends("frontend.layouts.master")

@section("content")


        <!-- Hero Start -->
        <div class="container-fluid bg-light mt-0">
            <div class="container text-center animated bounceInDown">
                <h1 class="display-1 mb-4">About Us</h1>
                <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">About</li>
                </ol>
            </div>
        </div>
        <!-- Hero End -->


   <!-- About Satrt -->
<div class="container-fluid menu bg-light my-6">
    <div class="container">
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill active" data-bs-toggle="pill" href="#tab-6">
                        <span class="text-dark" style="width: 250px;">Our History</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill" href="#tab-7">
                        <span class="text-dark" style="width: 250px;">Mission and Vision</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill" href="#tab-8">
                        <span class="text-dark" style="width: 250px;">Core Values</span>
                    </a>
                </li>
                <!-- <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill" href="#tab-9">
                        <span class="text-dark" style="width: 300px;">Delicious Deals for Delicious Meals</span>
                    </a>
                </li> -->
            </ul>
            <div class="tab-content">
                <div id="tab-6" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                            <img src="{{ asset('frontend/img/about.jpg') }}" class="img-fluid rounded" alt="">
                        </div>
                        <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                            <h1 class="display-5 mb-4">Certainly! Here's a sample script for telling the history of a restaurant:</h1>
                            <p class="mb-4">Welcome to Foody Moody, where every dish has a story to tell. Our journey began decades ago, with a dream and a passion for bringing people together through the joy of food.

                                It all started in [Year], when [Founder's Name] opened the doors of our humble eatery. Armed with family recipes passed down through generations, they set out to create a place where flavors from around the world could converge on the plates of our guests.

                                In the early days, Foody Moody was a cozy spot, known only to locals who cherished the warmth of our hospitality and the richness of our culinary offerings. As word spread, so did our reputation, drawing diners from far and wide who sought out the unique experience we offered.

                                Over the years, we've weathered challenges and celebrated triumphs, but one thing has remained constant: our commitment to quality and authenticity. Each dish that graces our menu is a testament to the craftsmanship and care that goes into every aspect of what we do.

                                As we've grown, so too has our family of staff and patrons. Many faces have come and gone, but the spirit of Foody Moody endures, infused with the memories and moments shared within these walls.

                                Today, as you sit down to enjoy your meal, we invite you to savor not just the flavors on your plate, but the history and heritage that have shaped Foody Moody into what it is today. From our kitchen to your table, thank you for being a part of our story.</p>
                        </div>
                    </div>
                </div>
                <div id="tab-7" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                            <h1 class="display-5 mb-4">Mission and Vision</h1>
                            <p class="mb-4">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore eit esdioilore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullaemco laboeeiris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor iesdein reprehendeerit in voluptate velit esse cillum dolore.</p>
                            <div class="row g-4 text-dark mb-5">
                                <div class="col-sm-6">
                                    <p><i class="fas fa-share text-primary me-2">Mission Statement:</i>
                                        "Our mission at Foody Moody is to delight our guests with exceptional culinary experiences, creating memorable moments through flavorful dishes, warm hospitality, and a commitment to excellence. We strive to source the finest ingredients, craft innovative menus, and provide attentive service, ensuring every visit leaves a lasting impression of satisfaction and enjoyment."
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="fas fa-share text-primary me-2">Vision Statement:</i>"At Foody Moody, we envision becoming the destination of choice for discerning diners seeking elevated dining experiences. We aim to continually push the boundaries of culinary creativity, fostering a culture of innovation and passion among our team. Through sustainable practices and community engagement, we aspire to not only excel in the realm of gastronomy but also contribute positively to the broader social and environmental landscape."</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                            <img src="{{ asset('frontend/img/menu1-2.png') }}" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                </div>
                <div id="tab-8" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                            <img src="{{ asset('frontend/img/menu1-1.png') }}" class="img-fluid rounded" alt="">
                        </div>
                        <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                            <h1 class="display-5 mb-4">Core Values</h1>
                            <p class="mb-4">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore eit esdioilore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullaemco laboeeiris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor iesdein reprehendeerit in voluptate velit esse cillum dolore.</p>
                            <div class="row g-4 text-dark mb-5">
                                <div class="col-sm-6">
                                    <p><i class="fas fa-share text-primary me-2">Quality:</i>Commitment to providing the highest quality ingredients, food, and service to customers.</p>

                                </div>
                                <div class="col-sm-6">
                                    <P><i class="fas fa-share text-primary me-2">Customer Satisfaction:</i>Dedication to exceeding customer expectations and ensuring a positive dining experience.</P>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="fas fa-share text-primary me-2">Integrity:</i>Operating with honesty, transparency, and ethical behavior in all aspects of the business.</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="fas fa-share text-primary me-2">Teamwork:</i>Fostering a collaborative and supportive environment where staff work together cohesively to achieve common goals.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="tab-9" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                            <h1 class="display-5 mb-4">Trusted By 200 + satisfied clients</h1>
                            <p class="mb-4">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore eit esdioilore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullaemco laboeeiris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor iesdein reprehendeerit in voluptate velit esse cillum dolore.</p>
                            <div class="row g-4 text-dark mb-5">
                                <div class="col-sm-6">
                                    <i class="fas fa-share text-primary me-2"></i>Fresh and Fast food Delivery
                                </div>
                                <div class="col-sm-6">
                                    <i class="fas fa-share text-primary me-2"></i>24/7 Customer Support
                                </div>
                                <div class="col-sm-6">
                                    <i class="fas fa-share text-primary me-2"></i>Easy Customization Options
                                </div>
                                <div class="col-sm-6">
                                    <i class="fas fa-share text-primary me-2"></i>Delicious Deals for Delicious Meals
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                            <img src="{{ asset('frontend/img/Shef1.png') }}" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection

