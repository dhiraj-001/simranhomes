@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Properties')
@section('content')
@push('styles')

@endpush

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Properties</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Properties</a></li>
                                <li class="breadcrumb-item active">Properties List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                            <i class="mdi mdi-check-all label-icon"></i>
                            <strong>Success</strong> - {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- Success Message End -->
                    
                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                            <i class="mdi mdi-block-helper label-icon"></i>
                            <strong>Error</strong> - {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- Error Message End -->

                    <div class="card">
                        <div class="card-body">

                            <!-- Buttons row -->
                            <form action="{{ route('Admin.properties.updateOrder') }}" method="POST" id="orderForm">
                                @csrf
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                    <button type="submit" class="btn btn-primary">Update Order</button>
                                    <a href="{{ route('Admin.properties.create') }}" class="btn btn-light">
                                        <i class="bx bx-plus me-1"></i> Add New
                                    </a>
                                </div>

                                <!-- Table -->
                                <div class="table-responsive mb-4">
                                    <table class="table align-middle datatable dt-responsive table-check nowrap"
                                        style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 15px;">
                                                    <div class="form-check font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th scope="col">Sr</th>
                                                <th scope="col">Heading</th>
                                                <th scope="col">Main Image</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Order</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($properties as $index => $property)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="property{{ $property->id }}">
                                                        <label class="form-check-label" for="property{{ $property->id }}"></label>
                                                    </div>
                                                </th>

                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $property->heading }}</td>
                                                <td>
                                                    @php
                                                    $imagePath = str_replace('/storage', '', $property->main_image);
                                                    @endphp
                                                    <img src="{{ asset('storage/app/public/' . $imagePath) }}"
                                                        alt="Slider Image" class="avatar-sm">
                                                </td>
                                                <td>
                                                    @if($property->status == 1)
                                                    <span class="badge badge-pill bg-success-subtle text-success font-size-12">Active</span>
                                                    @else
                                                    <span class="badge badge-pill bg-danger-subtle text-danger font-size-12">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <input type="number" name="sequence[{{ $property->id }}]" value="{{ $property->sequence ?? ($index + 1) }}" style="width: 60px;">
                                                </td>

                                                <td>{{ $property->created_at->format('Y-m-d') }}</td>

                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ route('Admin.properties.edit', $property->id) }}" class="text-success">
                                                            <i class="mdi mdi-pencil font-size-18"></i>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            onclick="confirmDelete('{{ $property->id }}')"
                                                            class="text-danger waves-effect waves-light" id="sa-warning">
                                                            <i class="mdi mdi-delete font-size-18"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

<!-- Hidden Delete Form -->
<form id="deletePropertyForm" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Set form action to the specific property's delete route
            const deleteForm = document.getElementById('deletePropertyForm');
            deleteForm.action = "{{ route('Admin.properties.destroy', '') }}/" + id;

            // Submit the form
            deleteForm.submit();
        }
    });
}
</script>
@endpush

@stop
