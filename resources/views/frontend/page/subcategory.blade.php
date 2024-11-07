@extends("frontend.layouts.master")

@section("content")
        <!-- Hero Start -->
        <div class="container-fluid bg-light mt-0">
            <div class="container text-center animated bounceInDown">
                <h1 class="display-1 mb-4">Most Popular Food in the World</h1>
                <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">subcategories</li>
                </ol>
            </div>
        </div>
        <!-- Hero End -->

<!-- Menu Start -->
<div class="container-fluid menu bg-light">
    <div class="container">
        {{-- <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <h1 class="display-5 mb-5">Most Popular Food in the World</h1>
        </div> --}}
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                <li class="nav-item p-2">
                    <i class="fa-solid fa-mug-saucer menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill active" data-bs-toggle="pill" href="#tab-6">
                        <span class="text-dark" style="width: 150px;">Breakfast</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <i class="fa-solid fa-plate-wheat menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill" data-bs-toggle="pill" href="#tab-7">
                        <span class="text-dark" style="width: 150px;">Lunch</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <i class="fa-solid fa-utensils menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill" data-bs-toggle="pill" href="#tab-8">
                        <span class="text-dark" style="width: 150px;">Dinner</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <i class="fa-solid fa-wine-glass-empty menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill" data-bs-toggle="pill" href="#tab-9">
                        <span class="text-dark" style="width: 150px;">Drinks</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <i class="fa-solid fa-ice-cream menu-icon me-2"></i>
                    <a class="d-flex py-2 mx-2 border border-primary bg-wheat rounded-pill" data-bs-toggle="pill" href="#tab-10">
                        <span class="text-dark" style="width: 150px;">Dessert</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab-6" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach($category->subCategories as $subCategory)
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                                <a href="{{ route('subcategories.products', $subCategory->id) }}">
                                    <div class="menu-item d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset('storage/' . $subCategory->image) }}" alt="{{ $subCategory->name }}">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                                <h4>{{ $subCategory->name }}</h4>
                                            </div>
                                            <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut labore.
                                                <span class="subcategory-btn">more food</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div id="tab-7" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($category->subCategories->where('status', 'lunch') as $subCategory)
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                                <a href="{{ route('subcategories.products', $subCategory->id) }}">
                                    <div class="menu-item d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset('storage/' . $subCategory->image) }}" alt="{{ $subCategory->name }}">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                                <h4>{{ $subCategory->name }}</h4>
                                            </div>
                                            <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut labore.
                                                <span class="subcategory-btn">more food</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div id="tab-8" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($category->subCategories->where('status', 'dinner') as $subCategory)
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                                <a href="{{ route('subcategories.products', $subCategory->id) }}">
                                    <div class="menu-item d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset('storage/' . $subCategory->image) }}" alt="{{ $subCategory->name }}">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                                <h4>{{ $subCategory->name }}</h4>
                                            </div>
                                            <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut labore.
                                                <span class="subcategory-btn">more food</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div id="tab-9" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($category->subCategories->where('status', 'drinks') as $subCategory)
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                                <a href="{{ route('subcategories.products', $subCategory->id) }}">
                                    <div class="menu-item d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset('storage/' . $subCategory->image) }}" alt="{{ $subCategory->name }}">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                                <h4>{{ $subCategory->name }}</h4>
                                            </div>
                                            <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut labore.
                                                <span class="subcategory-btn">more food</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div id="tab-10" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($category->subCategories->where('status', 'dessert') as $subCategory)
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                                <a href="{{ route('subcategories.products', $subCategory->id) }}">
                                    <div class="menu-item d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset('storage/' . $subCategory->image) }}" alt="{{ $subCategory->name }}">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                                <h4>{{ $subCategory->name }}</h4>
                                            </div>
                                            <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut labore.
                                                <span class="subcategory-btn">more food</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->

@endsection

