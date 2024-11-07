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

                <div class="card">
                    <div class="card-header">client Details</div>

                    <div class="card-body">

                        <p class="card-text">Image: <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}" width="100"></p>
                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('client.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
                        </form>
                        <a href="{{ route('client.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
@endsection


