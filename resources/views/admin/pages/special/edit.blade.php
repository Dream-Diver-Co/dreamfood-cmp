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

<h1>Edit Contact</h1>
<form action="{{ route('specialcontacts.update', $specialcontact->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $specialcontact->name }}" required>
    <input type="email" name="email" value="{{ $specialcontact->email }}" required>
    <input type="text" name="phone" value="{{ $specialcontact->phone }}" required>
    <input type="text" name="address" value="{{ $specialcontact->address }}" required>
    <input type="date" name="date" value="{{ $specialcontact->date }}" required>
    <input type="text" name="day_name" value="{{ $specialcontact->day_name }}" required>
    <textarea name="note">{{ $specialcontact->note }}</textarea>
    <button type="submit">Update Contact</button>
</form>

@endsection

