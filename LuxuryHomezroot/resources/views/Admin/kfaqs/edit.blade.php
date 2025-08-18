@extends('Admin.layouts.admin_master')
@section('title', 'Edit FAQ')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit FAQ</h4>
                    <a href="{{ route('Admin.kfaqs.index') }}" class="btn btn-secondary btn-sm">← Back to FAQs</a>
                </div>
            </div>

            <!-- Edit Form -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Admin.kfaqs.update', $kfaq->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Keyword Selection -->
                        <div class="form-group mb-3">
                            <label for="keyword_id">Select Keyword <span class="text-danger">*</span></label>
                            <select name="keyword_id" id="keyword_id" class="form-control" required>
                                <option value="">-- Choose Keyword --</option>
                                @foreach($keywords as $keyword)
                                    <option value="{{ $keyword->id }}" {{ $kfaq->keyword_id == $keyword->id ? 'selected' : '' }}>
                                        {{ $keyword->text }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Question -->
                        <div class="form-group mb-3">
                            <label for="question">Question <span class="text-danger">*</span></label>
                            <input type="text" name="question" id="question" class="form-control" value="{{ old('question', $kfaq->question) }}" required placeholder="Enter the FAQ question">
                        </div>

                        <!-- Answer -->
                        <div class="form-group mb-4">
                            <label for="answer">Answer <span class="text-danger">*</span></label>
                            <textarea name="answer" id="answer" rows="4" class="form-control" required placeholder="Enter the FAQ answer">{{ old('answer', $kfaq->answer) }}</textarea>
                        </div>

                        <!-- Submit -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update FAQ</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
