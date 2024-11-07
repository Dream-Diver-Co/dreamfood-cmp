@extends('admin.layouts.master')

@section('title', 'Special Day Gift')
@section('content')

<!-- start page title -->
<div class="row mb-4">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Special Day Gift</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Special Day Gift</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Special Day Gift List</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        {{-- <th>Address</th> --}}
                        <th>Special Day Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            {{-- <td>{{ $contact->address }}</td> --}}
                            <td>{{ $contact->day_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($contact->date)->format('d M Y') }}</td>
                            <td>
                                <!-- Update Order Status Form -->
                                <form action="{{ route('specialcontacts.updateStatus', $contact->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="status-1 form-control-sm">
                                        <option value="Pending" {{ $contact->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Gift" {{ $contact->status == 'Gift' ? 'selected' : '' }}>Gift</option>
                                    </select>
                                </form>
                           </td>
                            <td class="text-center">
                                <a href="{{ route('specialcontacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                                <form action="{{ route('specialcontacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
