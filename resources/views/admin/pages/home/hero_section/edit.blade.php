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
  <div class="card-header">Edit Hero</div>
  <div class="card-body">

    <form action="{{ route('hero.update', ['hero' => $hero->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Title</label><br/>
        <input type="text" name="title" id="title" value="{{ $hero->title }}" class="form-control"><br/>
        <label>Description</label><br/>
        <input type="text" name="description" id="description" value="{{ $hero->description }}" class="form-control"><br/>
        <label>Image</label><br/>
        <input type="file" name="image" id="image" class="form-control"><br/>
        <input type="submit" value="Update" class="btn btn-success"><br/>
    </form>

  </div>
</div>


@if(session('success_message'))
    <script>
        $(document).ready(function() {
            alert('{{ session('success_message') }}');
        });
    </script>
@endif

@endsection

