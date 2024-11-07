
@extends('admin.layouts.master')

@section('title', 'Food')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Food</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Food</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="card">
    <div class="card-header">Food Edit</div>
       <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <label for="category_id">Country Select <i class="fa-solid fa-caret-down"></i></label><br>
                        <select name="category_id" id="category_id"  class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select><br>
                        <label for="name">Name</label><br>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}" required><br>

                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control"><br>



                        <label for="price">Price</label><br>
                        <input class="form-control" type="number" name="price" id="price" step="0.01" value="{{ $product->price }}" required><br>
                        {{-- <div class="form-group">
                            <label for="sizes">Sizes</label><br>
                            <div class="input-group" id="size-inputs">
                                @foreach($product->sizes as $size)
                                <input class="form-control" type="text" name="sizes[]" class="form-control" value="{{ $size }}">
                                @endforeach
                                <span>
                                    <button type="button" id="add-size" class="btn btn-primary">
                                        <i class="fa-solid fa-square-plus"></i>
                                    </button>
                                </span>
                            </div><br>
                        </div> --}}
                        <label for="description">Description</label><br>
                        <textarea  class="form-control" name="description" id="description">{{ $product->description }}</textarea><br>
                        <label for="information">Information</label><br>
                        <textarea  class="form-control" name="information" id="information">{{ $product->information }}</textarea><br>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <label for="subcategory_id">Foods Items Select <i class="fa-solid fa-caret-down"></i></label><br>
                        <select name="subcategory_id" id="subcategory_id"  class="form-control" required>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                            @endforeach
                        </select><br>
                        <label for="title">Title</label><br>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $product->title }}"><br>
                        <label for="sub_title">Sub Title</label><br>
                        <input class="form-control" type="text" name="sub_title" id="sub_title" value="{{ $product->sub_title }}"><br>
                        <label for="old_price">Old Price</label><br>
                        <input class="form-control" type="number" name="old_price" id="old_price" step="0.01" value="{{ $product->old_price }}"><br>
                        {{-- <div class="form-group">
                            <label for="colors">Colors</label><br>
                            <div class="input-group" id="color-inputs">
                                @foreach($product->colors as $color)
                                <input class="form-control" type="text" name="colors[]" value="{{ $color }}">
                                @endforeach
                                <span>
                                    <button type="button" id="add-color" class="btn btn-primary">
                                        <i class="fa-solid fa-square-plus"></i>
                                    </button>
                                </span>
                            </div><br>
                        </div> --}}
                        <label for="sub_description">Sub Description</label><br>
                        <textarea  class="form-control" name="sub_description" id="sub_description">{{ $product->sub_description }}</textarea><br>
                        <label for="image">Save Image</label>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
       </div>
 </div>

 {{-- size and color script --}}
<script>
    // Function to add new input fields
    function addInput(containerId, inputName, limit) {
        var container = document.getElementById(containerId);
        // Calculate current input fields (ignoring the span/button)
        var inputCount = (container.children.length - 1);
        if (inputCount < limit) {
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = inputName;
            newInput.className = 'form-control'; // Add class for consistent styling and spacing
            newInput.required = true; // Ensure it's marked as required
            container.insertBefore(newInput, container.lastElementChild);
        }
    }

    // Event listener for adding size inputs
    document.getElementById('add-size').addEventListener('click', function() {
        addInput('size-inputs', 'sizes[]', 6);
    });

    // Event listener for adding color inputs
    document.getElementById('add-color').addEventListener('click', function() {
        addInput('color-inputs', 'colors[]', 6);
    });
</script>

@endsection





