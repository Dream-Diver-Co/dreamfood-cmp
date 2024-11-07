
@extends('admin.layouts.master')

@section('title', 'Profile')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-chefcontacts-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-chefcontact"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-chefcontact active">Profile</li>
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
                    <h2>Chef Contact List</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Actions</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Event</th>
                                    <th>image</th>
                                    {{-- <th>Chef Name</th>
                                    <th>Subject</th> --}}
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($chefcontacts as $chefcontact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ url('admin/chefcontact/' . $chefcontact->id) }}" title="View ChefContact"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <form method="POST" action="{{ url('admin/chefcontact' . '/' . $chefcontact->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete ChefContact" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                    <td>{{ $chefcontact->name }}</td>
                                    <td>{{ $chefcontact->email }}</td>
                                    <td>{{ $chefcontact->phone }}</td>
                                    <td>{{ $chefcontact->address }}</td>
                                    <td>{{ $chefcontact->date }}</td>
                                    <td>{{ $chefcontact->time }}</td>
                                    <td>{{ $chefcontact->event_name }}</td>
                                    <td><img src="{{ asset('storage/'. $chefcontact->image) }}" alt="Image" style="width: 100px; height: 100px;"></td>
                                    {{-- <td>{{ $chefcontact->chef_name }}</td>
                                    <td>{{ $chefcontact->subject }}</td> --}}
                                    <td>{{ $chefcontact->note }}</td>
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
