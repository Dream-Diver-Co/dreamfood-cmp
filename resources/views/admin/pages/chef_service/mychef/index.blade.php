@extends('admin.layouts.master')

@section('title', 'My Chef List')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">My Chef List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">My Chef List</li>
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
                    <h2>My Chef List</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('mychef.create') }}" class="btn btn-success btn-sm" title="Add New Hero">
                        Create Chef
                    </a>
                    <br/><br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mychefs as $mychef)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mychef->name }}</td>
                                    <td>
                                        <img style="height: 50px; width: 80px;" src="{{ asset('storage/' . $mychef->image) }}" alt="{{ $mychef->name }}">
                                    </td>
                                    <td>{{ $mychef->description }}</td>
                                    <td>
                                        <a href="{{ route('mychef.show', $mychef) }}" title="View" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('mychef.edit', $mychef) }}" title="Edit" class="btn btn-primary btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('mychef.destroy', $mychef) }}" accept-charset="UTF-8" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete mychef" onclick="return confirm('Are you sure you want to delete this mychef?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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

