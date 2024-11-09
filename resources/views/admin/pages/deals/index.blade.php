@extends('admin.layouts.master')

@section('title', 'Deals')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Deals</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Deals</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<!-- Success and error messages -->
<div class="container">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->has('error'))
                <div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">Deals</div>
    <div class="card-body">
        <a href="{{ route('deals.create') }}" class="btn btn-primary mb-3">Add New Deal</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Food Name</th>
                    <th>Food Price</th>
                    <th>Discount (%)</th>
                    <th>Discount Price</th>
                    {{-- <th>Frequency</th>
                    <th>Total Use</th> --}}
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
                    {{-- <td>{{ $product->frequency }}</td>
                    <td>{{ $product->total_use }}</td> --}}
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
    </div>
</div>


<script>
    // Auto-hide success and error messages after 5 seconds
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');

        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        }

        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        }
    });
</script>

@endsection

