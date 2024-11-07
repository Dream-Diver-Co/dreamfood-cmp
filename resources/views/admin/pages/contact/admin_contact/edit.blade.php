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
  <div class="card-header">Edit Admincontact</div>
  <div class="card-body">

      <form action="{{ url('admin/admincontact/' .$admincontact->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$admincontact->id}}" id="id" />
        <label>Map Location</label></br>
        <input type="text" name="map" id="map" value="{{$admincontact->map}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$admincontact->address}}" class="form-control"></br>
        <label>email</label></br>
        <input type="text" name="email" id="email" value="{{$admincontact->email}}" class="form-control"></br>
        <label>phone</label></br>
        <input type="text" name="phone" id="phone" value="{{$admincontact->phone}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>


@endsection

