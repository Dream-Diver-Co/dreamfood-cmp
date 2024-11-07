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
  <div class="card-header">Edit About</div>
  <div class="card-body">
      <form action="{{ url('admin/about/' .$abouts->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" id="id" value="{{$abouts->id}}" />
        <label>Title</label></br>
        <input type="text" name="title" id="title" value="{{$abouts->title}}" class="form-control"></br>
        <label>Subtitle</label></br>
        <input type="text" name="subtitle" id="subtitle" value="{{$abouts->subtitle}}" class="form-control"></br>
        <label>Image</label></br>
        <input type="file" name="image" id="image" value="{{$abouts->image}}" class="form-control"></br>
        <label>description</label></br>
        <input name="description" id="description" value="{{$abouts->description}}" class="form-control" ><br>
        <label>behind</label></br>
        <input name="behind" id="behind" class="form-control" value="{{$abouts->behind}}" ><br>
        <label>mission</label></br>
        <input name="mission" id="mission" class="form-control" value="{{$abouts->mission}}" ><br>
        <label>service</label></br>
        <input name="service" id="service" class="form-control" value="{{$abouts->service}}" ><br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  </div>
</div>

@endsection

