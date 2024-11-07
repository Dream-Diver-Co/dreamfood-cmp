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

<div class="card">
  <div class="card-header">Create New ChefContact</div>
  <div class="card-body">

    <form action="{{ route('chefcontact.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label><br>
            <input type="text" name="name" class="form-control" required><br>
        </div>
        <div class="form-group">
            <label for="email">Email</label><br>
            <input type="email" name="email" class="form-control" required><br>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label><br>
            <input type="text" name="phone" class="form-control" required><br>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label><br>
            <input type="text" name="subject" class="form-control" required><br>
        </div>
        <div class="form-group">
            <label for="note">Note</label><br>
            <textarea name="note" class="form-control" required></textarea><br>
        </div>
        <div class="form-group">
            <label for="address">Address</label><br>
            <input type="text" name="address" class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="date">Date</label><br>
            <input type="date" name="date" class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="time">Time</label><br>
            <input type="time" name="time" class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="event_name">Event Name</label><br>
            <input type="text" name="event_name" class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="chef_name">Chef Name</label><br>
            <input type="text" name="chef_name" class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="image">Image</label><br>
            <input type="file" name="image" class="form-control"><br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

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



