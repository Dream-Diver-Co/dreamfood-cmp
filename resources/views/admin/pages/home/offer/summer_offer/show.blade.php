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
    <div class="card-header">Summer Details</div>
    <div class="card-body">
        
        <h2>Title: {{ $summer->title }}</h2>
        <p>Subtitle: {{ $summer->subtitle }}</p>
        @if ($summer->image)
        <div>
            <label>Image:</label><br>
            <img src="{{ asset('storage/' . $summer->image) }}" alt="{{ $summer->title }}" width="200">
        </div>
        @endif
    </div>
</div>


@endsection

