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
  <div class="card-header">Create New Summer</div>
  <div class="card-body">

      <form action="{{ url('admin/summer') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control" required></br>
        <label>Subtitle</label></br>
        <input type="text" name="subtitle" id="subtitle" class="form-control" required></br>
        <label>Image</label></br>
        <input type="file" name="image" id="image" class="form-control" required></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>


@endsection

