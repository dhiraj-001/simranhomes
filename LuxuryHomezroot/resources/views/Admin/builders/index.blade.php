@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Builders')
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
                        <h4 class="mb-sm-0 font-size-18">Builders</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Builders</a></li>
                                <li class="breadcrumb-item active">Builders List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- Sucess Messgae -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                            <i class="mdi mdi-check-all label-icon"></i>
                                <strong>Success</strong> - {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                <!-- Sucess Messgae End -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5 class="card-title">All Builders<span
                                                class="text-muted fw-normal ms-2">({{ $builders->count() }})</span></h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                        <div>
                                            <a href="{{ route('Admin.builders.create') }}" class="btn btn-light"><i
                                                    class="bx bx-plus me-1"></i> Add New</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

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
                                            <th scope="col">Name</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Status</th>
                                            <th style="width: 80px; min-width: 80px;">Created At</th>
                                            <th style="width: 80px; min-width: 80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($builders as $index => $builder)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check font-size-16">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="builder{{ $builder->id }}">
                                                    <label class="form-check-label" for="slider{{ $builder->id }}"></label>
                                                </div>
                                            </th>

                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $builder->name }}</td>

                                            <td>
                                                @php
                                                $imagePath = str_replace('/storage', '', $builder->logo);
                                                @endphp
                                                <img src="{{ asset('storage/app/public/' . $imagePath) }}"
                                                    alt="Slider Image" class="avatar-sm">
                                            </td>

                                            <td>
                                                @if($builder->status == 1)
                                                <span
                                                    class="badge badge-pill bg-success-subtle text-success font-size-12">Active</span>
                                                @else
                                                <span
                                                    class="badge badge-pill bg-danger-subtle text-danger font-size-12">Inactive</span>
                                                @endif
                                            </td>

                                            <td>{{ $builder->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('Admin.builders.edit', $builder->id) }}"
                                                        class="text-success">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        onclick="confirmDelete('{{ $builder->id }}')"
                                                        class="text-danger waves-effect waves-light" id="sa-warning">
                                                        <i class="mdi mdi-delete font-size-18"></i>
                                                    </a>

                                                    <!-- Hidden form for delete -->
                                                    <form id="delete-form-{{ $builder->id }}"
                                                        action="{{ route('Admin.builders.destroy', $builder->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                            <!-- end table responsive -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

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
            // Submit the form with DELETE method
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>

@endpush

@stop