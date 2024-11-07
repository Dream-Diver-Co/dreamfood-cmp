@extends('admin.layouts.master')

@section('title', 'Special Gift')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Special Gift Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Special Gift Details</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-header">Special Gift Details</div>
    <div class="card-body">
        <div>
            <strong>User ID:</strong> {{ $specialcontact->id }} <!-- Displaying User ID -->
        </div>
        <div>
            <strong>Name:</strong> {{ $specialcontact->name }} <!-- Existing Name Display -->
        </div>
        <div>
            <strong>Email:</strong> {{ $specialcontact->email }}
        </div>
        <div>
            <strong>Phone:</strong> {{ $specialcontact->phone }}
        </div>
        <div>
            <strong>Address:</strong> {{ $specialcontact->address }}
        </div>
        <div>
            <strong>Date:</strong> {{ $specialcontact->date }}
        </div>
        <div>
            <strong>Day Name:</strong> {{ $specialcontact->day_name }}
        </div>
        <div>
            <strong>Status:</strong> {{ $specialcontact->status }}
        </div>
        <div>
            <strong>Note:</strong> {{ $specialcontact->note }}
        </div>

        <a href="{{ route('specialcontacts.edit', $specialcontact->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('specialcontacts.destroy', $specialcontact->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="{{ route('specialcontacts.index') }}" class="btn btn-secondary">Back to List</a>

        </div>
  </div>


@endsection
