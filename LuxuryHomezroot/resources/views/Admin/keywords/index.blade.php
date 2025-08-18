@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Keyword Sections')
@section('content')

@push('styles')
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Keyword Sections</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Keywords</a></li>
                                <li class="breadcrumb-item active">Keyword Section List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="row">
                <div class="col-lg-12">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                            <i class="mdi mdi-check-all label-icon"></i>
                            <strong>Success</strong> - {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">

                            <!-- Header -->
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5 class="card-title">All Sections <span class="text-muted fw-normal ms-2">({{ $sections->count() }})</span></h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ route('Admin.keywords.create') }}" class="btn btn-light">
                                        <i class="bx bx-plus me-1"></i> Add New
                                    </a>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive mb-4">
                                <table class="table align-middle datatable dt-responsive table-check nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Section Title</th>
                                            <th>Total Keywords</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $index => $section)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $section->title }}</td>
                                                <td>{{ $section->keywords->count() }}</td>
                                                <td>{{ $section->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('Admin.keywords.edit', $section->id) }}" class="text-success">
                                                            <i class="mdi mdi-pencil font-size-18"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" onclick="confirmDelete('{{ $section->id }}')" class="text-danger">
                                                            <i class="mdi mdi-delete font-size-18"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $section->id }}" action="{{ route('Admin.keywords.destroy', $section->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- table-responsive -->

                        </div> <!-- card-body -->
                    </div> <!-- card -->

                </div> <!-- col-lg-12 -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

@push('scripts')
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This section and its keywords will be permanently deleted!",
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
