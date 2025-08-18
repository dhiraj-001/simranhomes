@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Blog')
@section('content')

@push('styles')

@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Blog</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('Admin.blogs.index') }}">Blog</a></li>
                                <li class="breadcrumb-item active">Edit Blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Blog Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.blogs.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-form-label col-lg-2">Heading</label>
                                    <div class="col-lg-10">
                                        <input name="heading" type="text" class="form-control" id="heading"
                                            value="{{ old('heading', $blog->heading) }}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Slug</label>
                                    <div class="col-lg-10">
                                        <input name="slug" type="text" class="form-control" id="slug"
                                            value="{{ old('slug', $blog->slug) }}" readonly>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label for="current_image" class="col-form-label col-lg-2">Main Image</label>
                                    <div class="col-lg-1">
                                        @if($blog->main_image)
                                        <img src="{{ asset('storage/app/public/' . $blog->main_image) }}"
                                            alt="Current Image" class="me-2" style="max-width: 100%;">
                                        @else
                                        <span>No image uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="main_image">Upload New Main Image:</label>
                                        <label class="image-upload-guide">(Size: W: 457px / H: 524px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control">

                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label for="current_image" class="col-form-label col-lg-2">Banner Image</label>
                                    <div class="col-lg-1">
                                        @if($blog->breadcrumbs_image)
                                        <img src="{{ asset('storage/app/public/' . $blog->breadcrumbs_image) }}"
                                            alt="Current Image" class="me-2" style="max-width: 100%;">
                                        @else
                                        <span>No image uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="breadcrumbs_image">Upload New Banner Image:</label>
                                        <label class="image-upload-guide">(Size: W: 1511px / H: 667px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="breadcrumbs_image" name="breadcrumbs_image"
                                            class="form-control">

                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Full Content</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1"
                                            name="full_content">{{ old('full_content', $blog->full_content) }}</textarea>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                <label class="col-form-label col-lg-2">Blog FAQs</label>
                                <div class="col-lg-10">
                                <div id="faq-repeater-wrapper">
                                    @forelse ($blog->faqs as $index => $faq)
                                    <div class="faq-item border p-3 mb-3">
                                        <input type="hidden" name="faqs[{{ $index }}][id]" value="{{ $faq->id }}">
                                        <div class="form-group mb-2">
                                            <label>Question</label>
                                            <input type="text" name="faqs[{{ $index }}][question]" class="form-control" value="{{ $faq->question }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Answer</label>
                                            <textarea name="faqs[{{ $index }}][answer]" class="form-control" rows="2" required>{{ $faq->answer }}</textarea>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                    </div>
                                    @empty
                                    <div class="faq-item border p-3 mb-3">
                                        <div class="form-group mb-2">
                                            <label>Question</label>
                                            <input type="text" name="faqs[0][question]" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Answer</label>
                                            <textarea name="faqs[0][answer]" class="form-control" rows="2" required></textarea>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                    </div>
                                    @endforelse
                                </div>
                                
                                <button type="button" id="add-faq" class="btn btn-secondary btn-sm">+ Add FAQ</button>
                                </div>
                            </div>



                                <!--Seo Start-->
                                <div class="form-group row mb-4">
                                    <label for="meta_title" class="col-form-label col-lg-2">Meta Title </label>
                                    <div class="col-lg-10">
                                        <input name="meta_title" type="text" class="form-control" id="meta_title"
                                            value="{{ old('meta_title', $blog->meta_title) }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="meta_keywords" class="col-form-label col-lg-2">Meta Keywords </label>
                                    <div class="col-lg-10">
                                        <input name="meta_keywords" type="text" class="form-control" id="meta_keywords"
                                            value="{{ old('meta_keywords', $blog->meta_keywords) }}">
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label for="meta_description" class="col-form-label col-lg-2">Meta Description
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="meta_description" rows="4" cols="50" class="form-control"
                                            id="meta_description">{{ old('meta_description', $blog->meta_description) }}</textarea>
                                    </div>
                                </div>

                                <!--Seo Stop-->


                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2" for="customSwitchsizemd">Status
                                        (Inactive/Active)</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <!-- Hidden input to ensure the value is 0 if the checkbox is unchecked -->
                                            <input type="hidden" name="status" value="0">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                name="status" value="1" {{ $blog->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update
                                            Blog</button>
                                        <button type="button" class="btn btn-secondary"
                                            onclick="window.location.href='/admin/blogs/'"><i class="fas fa-reply"></i>
                                            Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

@push('scripts')

<script>
// Function to generate slug based on input value
function slugify(text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-') // Replace spaces with -
        .replace(/[^\w\-]+/g, '') // Remove all non-word chars
        .replace(/\-\-+/g, '-') // Replace multiple - with single -
        .replace(/^-+/, '') // Trim - from start of text
        .replace(/-+$/, ''); // Trim - from end of text
}

// Event listener for input field
document.getElementById('heading').addEventListener('keyup', function() {
    var headingValue = document.getElementById('heading').value;
    var slugValue = slugify(headingValue);
    document.getElementById('slug').value = slugValue;
});
</script>

<script>
let faqIndex = {{ count($blog->faqs) }};

document.getElementById('add-faq').addEventListener('click', function () {
    const wrapper = document.getElementById('faq-repeater-wrapper');
    const faqHTML = `
        <div class="faq-item border p-3 mb-3">
            <div class="form-group mb-2">
                <label>Question</label>
                <input type="text" name="faqs[${faqIndex}][question]" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Answer</label>
                <textarea name="faqs[${faqIndex}][answer]" class="form-control" rows="2" required></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
        </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', faqHTML);
    faqIndex++;
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-faq')) {
        e.target.closest('.faq-item').remove();
    }
});
</script>

@endpush

@stop