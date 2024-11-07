
@extends('admin.layouts.master')

@section('title', 'Foods')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Foods</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Foods</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">Create Foods</div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="category_id">Country Select <i class="fa-solid fa-caret-down"></i></label><br>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name ?? 'Unnamed Category' }}</option>
                        @endforeach
                    </select><br>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required><br>

                    <label for="image">Image</label><br>
                    <input type="file" name="image" id="image" class="form-control" required><br>

                    <label for="price">Price</label><br>
                    <input type="number" name="price" id="price" step="0.01" class="form-control" required><br>

                    {{-- <div class="form-group">
                        <label for="sizes">Sizes</label><br>
                        <div class="input-group" id="size-inputs">
                            <span><button type="button" id="add-size" class="btn btn-primary"><i class="fa-solid fa-square-plus"></i></button></span>
                            <input type="text" name="sizes[]" class="form-control">
                        </div><br>
                    </div> --}}

                    <label for="description">Description</label><br>
                    <textarea name="description" id="description" class="form-control"></textarea><br>
                    <label for="information">Information</label><br>
                    <textarea name="information" id="information" class="form-control"></textarea><br>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="subcategory_id">Foods Items Select <i class="fa-solid fa-caret-down"></i></label><br>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name ?? 'Unnamed Subcategory' }}</option>
                        @endforeach
                    </select><br>
                    <label for="title">Title</label><br>
                    <input type="text" name="title" id="title" class="form-control" required><br>
                    <label for="sub_title">Sub Title</label><br>
                    <input type="text" name="sub_title" id="sub_title" class="form-control"><br>
                    <label for="old_price">Old Price</label><br>
                    <input type="number" name="old_price" id="old_price" step="0.01" class="form-control"><br>


                    {{-- <div class="form-group">
                        <label for="colors">Colors</label><br>
                        <div class="input-group" id="color-inputs">
                            <span><button type="button" id="add-color" class="btn btn-primary"><i class="fa-solid fa-square-plus"></i></button></span>
                            <input type="text" name="colors[]" class="form-control">
                        </div><br>
                    </div> --}}
                    <label for="sub_description">Sub Description</label><br>
                    <textarea name="sub_description" id="sub_description" class="form-control"></textarea><br>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
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

{{-- success message --}}
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
