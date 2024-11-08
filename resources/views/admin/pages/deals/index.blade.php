@extends('admin.layouts.master')

@section('title', 'Profile')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<h1>Deals</h1>
<a href="{{ route('deals.create') }}" class="btn btn-primary mb-3">Add New Deal</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>SL</th>
            <th>Food Name</th>
            <th>Food Price</th>
            <th>Discount (%)</th>
            <th>Discount Price</th>
            <th>Frequency</th>
            <th>Total Use</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($deals as $product)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $product->product->name }}</td>
            <td>{{ $product->product->price }}</td>
            <td>{{ $product->discount }}%</td>
            <td>{{ $product->discount_price }}</td>
            <td>{{ $product->frequency }}</td>
            <td>{{ $product->total_use }}</td>
            <td>
                <a href="{{ route('deals.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('deals.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('deals.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this deal?');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

