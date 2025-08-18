@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Enquiry Data')
@section('content')

@push('styles')
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Enquiry</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">All Data</a></li>
                                <li class="breadcrumb-item active">Enquiry List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

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
                                        <h5 class="card-title">All Enquiry <span class="text-muted fw-normal ms-2">({{ $enquiries->count() }})</span></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mb-4">
                                <table class="table align-middle datatable dt-responsive table-check nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr</th>
                                            <th scope="col">Email</th>                                    
                                            <th scope="col">Phone</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Enquiry Date</th>
                                            <th scope="col">Action</th> <!-- Column for extra details -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiries as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->email }}</td>  
                                                <td>{{ $item->mobile }}</td> 
                                                <td>{{ ucfirst($item->type) }} Enquiry</td>
                                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <!-- View Button for Extra Details -->
                                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#enquiryModal{{ $item->id }}">View</button>
                                                    <button type="submit" class="btn btn-danger" onclick="confirmDelete('{{ $item->id }}')">Delete</button>
                                                    <!-- Modal for Enquiry Details -->
                                                    <div class="modal fade" id="enquiryModal{{ $item->id }}" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="enquiryModalLabel">{{ ucfirst($item->type) }} Enquiry Details</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Type-Specific Information -->
                                                                    @if($item->type === 'property')
                                                                       <p><strong>Name:</strong> {{ $item->name }}</p>
                                                                        <p><strong>Page Url:</strong> {{ $item->page_url }}</p>
                                                                    @elseif($item->type === 'general')
                                                                        <p><strong>Name:</strong> {{ $item->name }}</p>
                                                                        <p><strong>Page Url:</strong> {{ $item->page_url }}</p>
                                                                    @elseif($item->type === 'contact')
                                                                        <p><strong>Name:</strong> {{ $item->name }}</p>
                                                                        <p><strong>Page Url:</strong> {{ $item->page_url }}</p>
                                                                        <p><strong>Budget Rang:</strong> {{ $item->budget_range }}</p>
                                                                        <p><strong>Message:</strong> {{ $item->message }}</p>
                                                                    @elseif($item->type === 'blog')
                                                                        <p><strong>Name:</strong> {{ $item->name }}</p>
                                                                        <p><strong>Page Url:</strong> {{ $item->page_url }}</p>
                                                                        <p><strong>Message:</strong> {{ $item->message }}</p>
                                                                    @endif
                                                                    <!-- Common Information -->
                                                                    <p><strong>Email:</strong> {{ $item->email }}</p>
                                                                    <p><strong>Phone:</strong> {{ $item->countryCode }} {{ $item->mobile }}</p>
                                                                    <p><strong>Type:</strong> {{ ucfirst($item->type) }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        </div> <!-- container-fluid -->
    </div>
</div>

<!-- Hidden Delete Form -->
<form id="deleteEnquiryForm" action="" method="POST" style="display: none;">
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
                // Set form action to the specific service's delete route
                const deleteForm = document.getElementById('deleteEnquiryForm');
                deleteForm.action = "{{ route('Admin.enquiries.destroy', '') }}/" + id;
                
                // Submit the form
                deleteForm.submit();
            }
        });
    }
</script>
@endpush

@stop
