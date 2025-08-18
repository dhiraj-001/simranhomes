@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Banners')
@section('content')

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Banners</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Banners</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Table -->
            <div class="row">
                <div class="col-lg-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5 class="card-title">All Banners <span class="text-muted">({{ $banners->count() }})</span></h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ route('Admin.banners.create') }}" class="btn btn-light">
                                        <i class="bx bx-plus me-1"></i> Add New
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table align-middle table-check nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Page</th>
                                            <th>Type</th>
                                            <th>Preview</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banners as $index => $banner)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ ucfirst($banner->page) }}</td>
                                            <td>{{ ucfirst($banner->type) }}</td>
                                            <td>
                                                @if($banner->type == 'video')
                                                    <video src="{{ asset('storage/app/public/' . $banner->video) }}" width="100" height="60" muted></video>
                                                @elseif($banner->type == 'image')
                                                    @if($banner->images->first())
                                                        <img src="{{ asset('storage/app/public/' . $banner->images->first()->image) }}" class="avatar-sm">
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if($banner->status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $banner->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('Admin.banners.edit', $banner->id) }}" class="text-success me-2">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <a href="javascript:void(0);" onclick="confirmDelete('{{ $banner->id }}')" class="text-danger">
                                                    <i class="mdi mdi-delete font-size-18"></i>
                                                </a>
                                                <form id="delete-form-{{ $banner->id }}" action="{{ route('Admin.banners.destroy', $banner->id) }}" method="POST" style="display: none;">
                                                    @csrf @method('DELETE')
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
    </div>
</div>

@push('scripts')
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the banner permanently.",
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

@endsection
