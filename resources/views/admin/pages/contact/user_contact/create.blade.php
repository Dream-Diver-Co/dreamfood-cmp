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
  <div class="card-header">Create New UserContact</div>
  <div class="card-body">

    <form action="{{ url('admin/usercontact') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>
        <label>phone</label></br>
        <input type="text" name="phone" id="phone" class="form-control"></br>
        <label>subject</label></br>
        <input type="subject" name="subject" id="subject" class="form-control"></br>
        <label>Note</label></br>
        <input type="text" name="note" id="note" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>




@endsection

