@extends('layouts.master')

@section('title', 'Special Day Gift')
@section('content')

<!-- Start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 text-primary font-weight-bold">Special Day Gift</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active">Special Day Gift</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End page title -->

<!-- Success and error messages -->
<div class="container my-3">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->has('error'))
                <div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white font-weight-bold">Create New Special Day Contact</div>
        <div class="card-body">
            <form action="{{ url('specialcontacts') }}" method="POST">
                @csrf

                <!-- Name and Email Fields -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>
                </div>

                <!-- Phone and Address Fields -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                    </div>
                </div>

                <!-- Date and Day Name Fields -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="date" class="form-label">Special Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="day_name" class="form-label">Day Name</label>
                        <input type="text" class="form-control" id="day_name" name="day_name" placeholder="Enter special day name" required>
                    </div>
                </div>

                <!-- Note Field -->
                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea class="form-control" id="note" name="note" rows="3" placeholder="Additional notes (optional)"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #0c7dc2;">Add Special Day</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white font-weight-bold">Your Special Date List</div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Special Day Name</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Status</th>

                        @foreach($contacts as $contact)
                            @if($contact->status != 'Gift')
                                <th>Action</th>
                            @endif
                        @endforeach

                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->day_name }}</td>
                            <td>{{ $contact->date }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->status }}</td>

                            @if($contact->status !== 'Gift')
                                <td>
                                    <button onclick="openEditModal({{ json_encode($contact) }})" class="btn btn-warning">Edit</button>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Make the modal larger -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Special Day Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="contact_id" name="contact_id">

                    <div class="row"> <!-- Create a new row for the grid -->
                        <div class="col-md-6 mb-3"> <!-- First column -->
                            <label for="edit_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>

                        <div class="col-md-6 mb-3"> <!-- Second column -->
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email">
                        </div>

                        <div class="col-md-6 mb-3"> <!-- Third column -->
                            <label for="edit_phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="edit_phone" name="phone" required>
                        </div>

                        <div class="col-md-6 mb-3"> <!-- Fourth column -->
                            <label for="edit_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="edit_address" name="address" required>
                        </div>

                        <div class="col-md-6 mb-3"> <!-- Fifth column -->
                            <label for="edit_date" class="form-label">Special Date</label>
                            <input type="date" class="form-control" id="edit_date" name="date" required>
                        </div>

                        <div class="col-md-6 mb-3"> <!-- Sixth column -->
                            <label for="edit_day_name" class="form-label">Day Name</label>
                            <input type="text" class="form-control" id="edit_day_name" name="day_name" required>
                        </div>

                        <div class="col-12 mb-3"> <!-- Full-width column for the note -->
                            <label for="edit_note" class="form-label">Note</label>
                            <textarea class="form-control" id="edit_note" name="note" rows="3"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="background-color: #0c7dc2;">Update Special Day</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    function openEditModal(contact) {
        // Populate modal fields with contact data
        document.getElementById('contact_id').value = contact.id;
        document.getElementById('edit_name').value = contact.name;
        document.getElementById('edit_email').value = contact.email;
        document.getElementById('edit_phone').value = contact.phone;
        document.getElementById('edit_address').value = contact.address;
        document.getElementById('edit_date').value = contact.date;
        document.getElementById('edit_day_name').value = contact.day_name;
        document.getElementById('edit_note').value = contact.note || '';

        // Set the form action for updating
        document.getElementById('editForm').action = "{{ url('specialcontacts') }}/" + contact.id;

        // Show the modal
        $('#editModal').modal('show');
    }
</script>


<script>
    // Auto-hide success and error messages after 5 seconds
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');

        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        }

        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        }
    });
</script>

@endsection
