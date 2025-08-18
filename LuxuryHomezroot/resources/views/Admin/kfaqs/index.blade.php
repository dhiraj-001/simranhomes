@extends('Admin.layouts.admin_master')
@section('title', 'All FAQs')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>All FAQs</h4>
                <a href="{{ route('Admin.kfaqs.create') }}" class="btn btn-primary btn-sm">+ Add FAQ</a>
            </div>

            <!-- Success Toast -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Table -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Keyword</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kfaqs as $index => $faq)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $faq->keyword->text ?? 'N/A' }}</td>
                                    <td>{{ Str::limit($faq->question, 60) }}</td>
                                    <td>{{ Str::limit(strip_tags($faq->answer), 80) }}</td>
                                    <td>
                                        <a href="{{ route('Admin.kfaqs.edit', $faq->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $faq->id }}">Delete</button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $faq->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $faq->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('Admin.kfaqs.destroy', $faq->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $faq->id }}">Confirm Deletion</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this FAQ?
                                                            <br><strong>Q:</strong> {{ $faq->question }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No FAQs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
