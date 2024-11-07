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
                        <h2>about list</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('admin/about/create') }}" class="btn btn-success btn-sm" title="Add New About">
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
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>image</th>
                                        <th>description</th>
                                        <th>behind</th>
                                        <th>mission</th>
                                        <th>service</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($abouts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ url('admin/about/' . $item->id) }}" title="View About"><button class="btn btn-info btn-sm Admincontact-btn">View</button></a>
                                            <a href="{{ url('admin/about/' . $item->id . '/edit') }}" title="Edit About"><button class="btn btn-primary btn-sm Admincontact-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('admin/about' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm Admincontact-btn" title="Delete About" onclick="return confirm('Confirm delete?')"></i> Delete</button>
                                            </form>
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->subtitle }}</td>
                                        <td><img src="{{ asset('storage/'. $item->image) }}" alt="{{ $item->title }}" width="100"></td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->behind }}</td>
                                        <td>{{ $item->mission }}</td>
                                        <td>{{ $item->service }}</td>
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


