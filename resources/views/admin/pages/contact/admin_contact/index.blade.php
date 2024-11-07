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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Admin Contact</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('admin/admincontact/create') }}" class="btn btn-success btn-sm" title="Add New Admincontact">
                            Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Actions</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Map location</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($admincontacts as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ url('admin/admincontact/' . $item->id) }}" title="View Admincontact"><button class="btn btn-info btn-sm Admincontact-btn">View</button></a>
                                            <a href="{{ url('admin/admincontact/' . $item->id . '/edit') }}" title="Edit Admincontact"><button class="btn btn-primary btn-sm Admincontact-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('admin/admincontact' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm Admincontact-btn" title="Delete Admincontact" onclick="return confirm('Confirm delete?')">Delete</button>
                                            </form>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->map }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

