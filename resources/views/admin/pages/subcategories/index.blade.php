
@extends('admin.layouts.master')

@section('title', 'Foods Items List')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Foods Items List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Foods Items List</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

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

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Foods Items List</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('subcategories.create') }}" class="btn btn-success btn-sm" title="Add New Hero">
                        Create Foods Items
                    </a>
                    <br/><br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foods Items Name</th>
                                    <th>Country Name</th>
                                    <th>Total Foods</th>
                                    <th>Image</th>
                                    {{-- <th>Status</th> --}}
                                    {{-- <th>Description</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td>{{ optional($subcategory->category)->name }}</td>
                                    <td>{{ $subcategory->products_count }} Foods</td>
                                    <td>
                                        <img style="height: 50px; width: 80px;" src="{{ asset('storage/' . $subcategory->image) }}" alt="{{ $subcategory->name }}">
                                    </td>
                                    {{-- <td>
                                        <form action="{{ route('subcategories.updateStatus', $subcategory) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()" class="status form-control-sm">
                                                <option value="breakfast" {{ (old('status', $subcategory->status) == 'breakfast') ? 'selected' : '' }}>Breakfast</option>
                                                <option value="lunch" {{ (old('status', $subcategory->status) == 'lunch') ? 'selected' : '' }}>Lunch</option>
                                                <option value="dinner" {{ (old('status', $subcategory->status) == 'dinner') ? 'selected' : '' }}>Dinner</option>
                                                <option value="drinks" {{ (old('status', $subcategory->status) == 'drinks') ? 'selected' : '' }}>Drinks</option>
                                                <option value="dessert" {{ (old('status', $subcategory->status) == 'dessert') ? 'selected' : '' }}>Dessert</option>
                                            </select>
                                        </form>
                                    </td> --}}

                                    {{-- <td>{{ $subcategory->description }}</td> --}}
                                    <td>
                                        <a href="{{ route('subcategories.edit', $subcategory) }}" title="Edit" class="btn btn-primary btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('subcategories.destroy', $subcategory) }}" accept-charset="UTF-8" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm('Are you sure you want to delete this SubCategory?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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



