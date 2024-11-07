@extends('admin.layouts.master')

@section('title', 'Edit subscribe')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit subscribe</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit subscribe</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="card">
    <div class="card-header">Edit subscribe</div>
    <div class="card-body">
        <form action="{{ route('subscribecontact.update', $subscribecontact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $subscribes->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $subscribes->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $subscribes->phone) }}" required>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', $subscribes->subject) }}" required>
                @error('subject')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <textarea class="form-control" id="note" name="note" rows="4" required>{{ old('note', $subscribes->note) }}</textarea>
                @error('note')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Update Image (Optional)</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Subscription</button>
        </form>
    </div>
</div>

@endsection


