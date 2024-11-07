
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

<div class="card">
    <div class="card-header">
        <h2>Foods List</h2>
    </div>
    <div class="card-body">
        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm mb-3" title="Add New Product">
            Add New Foods
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        {{-- <th>Sizes</th>
                        <th>Colors</th> --}}
                        {{-- <th>Title</th> --}}
                        {{-- <th>Sub Title</th> --}}
                        <th>Country</th>
                        {{-- <th>Foods Items</th> --}}
                        {{-- <th>Old Price</th> --}}
                        {{-- <th>Description</th>
                        <th>Sub Description</th>
                        <th>Information</th> --}}
                        <th>Status</th>
                        <th>Stock</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img style="height: 50px; width: 80px;" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            {{-- <td>{{ implode(', ', $product->sizes) }}</td>
                            <td>{{ implode(', ', $product->colors) }}</td> --}}
                            {{-- <td>{{ $product->title }}</td> --}}
                            {{-- <td>{{ $product->sub_title }}</td> --}}
                            <td>{{ optional($product->category)->name }}</td>
                            {{-- <td>{{ optional($product->subcategory)->name }}</td> --}}

                            {{-- <td>{{ $product->old_price }}</td> --}}
                            {{-- <td>{{ $product->description }}</td>
                            <td>{{ $product->sub_description }}</td>
                            <td>{{ $product->information }}</td> --}}

                            <td>
                                <form action="{{ route('products.updateStatus', $product) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="status form-control-sm">
                                        <option value="breakfast" {{ (old('status', $product->status) == 'breakfast') ? 'selected' : '' }}>Breakfast</option>
                                                <option value="lunch" {{ (old('status', $product->status) == 'lunch') ? 'selected' : '' }}>Lunch</option>
                                                <option value="dinner" {{ (old('status', $product->status) == 'dinner') ? 'selected' : '' }}>Dinner</option>
                                                <option value="drinks" {{ (old('status', $product->status) == 'drinks') ? 'selected' : '' }}>Drinks</option>
                                                <option value="dessert" {{ (old('status', $product->status) == 'dessert') ? 'selected' : '' }}>Dessert</option>
                                        {{-- <option value="Regular" {{ $product->status == 'Regular' ? 'selected' : '' }}>Regular</option>
                                        <option value="Featured" {{ $product->status == 'Featured' ? 'selected' : '' }}>Featured</option>
                                        <option value="Recent" {{ $product->status == 'Recent' ? 'selected' : '' }}>Recent</option>
                                        <option value="Offer" {{ $product->status == 'Offer' ? 'selected' : '' }}>Offer</option> --}}
                                    </select>
                                </form>
                            </td>

                            <td>
                                <form action="{{ route('products.updateStatus_1', $product) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <select name="status_1" onchange="this.form.submit()" class="status-1 form-control-sm">
                                        <option value="In Stock" {{ $product->status_1 == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                                        <option value="Out of Stock" {{ $product->status_1 == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                                    </select>
                                </form>
                            </td>

                            <td>
                                <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm action-btn">View</a>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm action-btn">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm action-btn" title="Delete product" onclick="return confirm('Confirm delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
