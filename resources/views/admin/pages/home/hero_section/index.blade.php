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
                    <h2>Hero Section List</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('hero.create') }}" class="btn btn-success btn-sm" title="Add New Hero">
                        Add New
                    </a>
                    <br/><br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($heroes as $hero)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hero->title }}</td>
                                        <td>{{ $hero->description }}</td>
                                        <td><img class="admin-index-img" src="{{ asset('storage/'. $hero->image) }}" alt="{{ $hero->title }}" width="100"></td>
                                        <td>
                                            <a href="{{ route('hero.show', ['hero' => $hero->id]) }}" title="View Hero" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            <a href="{{ route('hero.edit', ['hero' => $hero->id]) }}" title="Edit Hero" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                                            <form method="POST" action="{{ route('hero.destroy', ['hero' => $hero->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Hero" onclick="return confirm('Are you sure you want to delete this hero?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
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
