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
  <div class="card-header">Edit ChefContact</div>
  <div class="card-body">

      <form action="{{ url('chefcontact/' .$chefcontacts->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" value="{{$chefcontacts->id}}">
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$chefcontacts->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$chefcontacts->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$chefcontacts->mobile}}" class="form-control"></br>
        <label>Title</label></br>
        <input type="text" name="title" id="title" value="{{$chefcontacts->title}}" class="form-control"></br>
        <label>Subtitle</label></br>
        <input type="text" name="subtitle" id="subtitle" value="{{$chefcontacts->subtitle}}" class="form-control"></br>
        <label>Image</label></br>
        <input type="file" name="image" id="image" class="form-control"></br>
        @if($chefcontacts->image)
            <img src="{{ asset('storage/' . $chefcontacts->image) }}" alt="{{ $chefcontacts->title }}" width="100">
        @endif
        <br>
        <label>Date</label></br>
        <input type="date" name="date" id="date" value="{{$chefcontacts->date}}" class="form-control"></br>
        <label>File</label></br>
        <input type="file" name="file" id="file" class="form-control"></br>
        <label>Note</label></br>
        <input type="text" name="note" id="note" value="{{$chefcontacts->note}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@endsection
