@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Home Statistics')
@section('content')

@push('styles')
<!-- Add any custom CSS here if needed -->
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Home Statistics</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Home Statistics</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                    <i class="mdi mdi-check-all label-icon"></i>
                    <strong>Success</strong> - {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Card Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5 class="card-title">All Statistics <span class="text-muted fw-normal ms-2">({{ $stats->count() }})</span></h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                        <a href="{{ route('Admin.home_statistics.create') }}" class="btn btn-light">
                                            <i class="bx bx-plus me-1"></i> Add New
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive mb-4">
                                <table class="table align-middle datatable dt-responsive table-check nowrap"
                                       style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Icon</th>
                                            <th>Count</th>
                                            <th>Label</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stats as $index => $stat)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('storage/app/public/' . $stat->icon_path) }}" alt="Icon" width="40">
                                            </td>
                                            <td>{{ $stat->count }}</td>
                                            <td>{{ $stat->label }}</td>
                                            <td>
                                                @if($stat->status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('Admin.home_statistics.edit', $stat->id) }}" class="text-success">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="confirmDelete('{{ $stat->id }}')" class="text-danger">
                                                        <i class="mdi mdi-delete font-size-18"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $stat->id }}" action="{{ route('Admin.home_statistics.destroy', $stat->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table -->
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
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
@endpush

@stop
