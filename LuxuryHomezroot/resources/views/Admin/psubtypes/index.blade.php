@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Property Sub Types')
@section('content')

@push('styles')
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Title & Success Msg -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Property Sub Types</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Properties</a></li>
                                <li class="breadcrumb-item active">Sub Types</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Sub Types Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-3">
                                <h5>All Sub Types <span class="text-muted">({{ $psubtypes->count() }})</span></h5>
                                <a href="{{ route('Admin.psubtypes.create') }}" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Image</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $usedOrderNumbers = $psubtypes->pluck('order_number')->filter()->toArray();
                                        @endphp
                                        @foreach($psubtypes as $index => $subtype)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $subtype->psubtype_name }}</td>
                                                <td>{{ $subtype->slug }}</td>
                                                <td>
                                                    @if($subtype->main_image)
                                                        <img src="{{ asset('uploads/psubtypes/' . $subtype->main_image) }}" width="60" class="img-thumbnail">
                                                    @else
                                                        <span class="text-muted">No image</span>
                                                    @endif
                                                </td>

                                                <td class="d-flex gap-2 align-items-center">
                                                    <select class="form-select form-select-sm order-select" style="width: 90px;" data-id="{{ $subtype->id }}">
                                                        <option value="0" {{ $subtype->order_number == 0 ? 'selected' : '' }}>No Order</option>
                                                        @for ($i = 1; $i <= $psubtypes->count(); $i++)
                                                            <option value="{{ $i }}"
                                                                @if ($subtype->order_number != $i && in_array($i, $usedOrderNumbers)) disabled @endif
                                                                {{ $subtype->order_number == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    <button class="btn btn-sm btn-outline-primary update-order-btn" data-id="{{ $subtype->id }}">
                                                        <i class="mdi mdi-check"></i>
                                                    </button>
                                                </td>

                                                <td>
                                                    @if($subtype->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $subtype->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('Admin.psubtypes.edit', $subtype->id) }}" class="btn btn-sm btn-success">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </a>
                                                        <button onclick="confirmDelete('{{ $subtype->id }}')" class="btn btn-sm btn-danger">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $subtype->id }}" method="POST" action="{{ route('Admin.psubtypes.destroy', $subtype->id) }}" style="display: none;">
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

                        </div> <!-- card-body -->
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
        text: "You will not be able to recover this!",
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

function disableUsedOrderOptions() {
    let usedNumbers = [];

    $('.order-select').each(function () {
        const val = parseInt($(this).val());
        if (val !== 0) usedNumbers.push(val);
    });

    $('.order-select').each(function () {
        const currentSelect = $(this);
        const currentVal = parseInt(currentSelect.val());

        currentSelect.find('option').each(function () {
            const optionVal = parseInt($(this).val());
            if (optionVal === 0) return;

            if (usedNumbers.includes(optionVal) && optionVal !== currentVal) {
                $(this).prop('disabled', true);
            } else {
                $(this).prop('disabled', false);
            }
        });
    });
}

$(document).ready(function () {
    disableUsedOrderOptions();

    $('.update-order-btn').on('click', function () {
        const subtypeId = $(this).data('id');
        const selectedOrder = $(`select[data-id="${subtypeId}"]`).val();

        $.ajax({
            url: "{{ route('Admin.psubtypes.updateOrder') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: subtypeId,
                order_number: selectedOrder
            },
            success: function (response) {
                if (response.status === 'success') {
                    toastr.success(response.message);
                    disableUsedOrderOptions();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function () {
                toastr.error('Something went wrong!');
            }
        });
    });
});
</script>
@endpush

@stop
