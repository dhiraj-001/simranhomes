@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Blog')
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
                        <h4 class="mb-sm-0 font-size-18">Add Blog</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add Blog</li>
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
                            <h4 class="card-title">Create New Blog</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-form-label col-lg-2">Heading </label>
                                    <div class="col-lg-10">
                                        <input name="heading" type="text" class="form-control" id="heading"
                                            placeholder="Enter Service Heading..." required>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Slug </label>
                                    <div class="col-lg-10">
                                        <input name="slug" type="text" class="form-control" id="slug"
                                            placeholder="Slug Automaticaly..." readonly>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label for="main_image" class="col-form-label col-lg-2">Main Image </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 457px / H: 524px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control">
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="breadcrumbs_image" class="col-form-label col-lg-2">Banner Image</label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 1511px / H: 667px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="breadcrumbs_image" name="breadcrumbs_image"
                                            class="form-control">
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Full Content</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1" name="full_content"></textarea>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row mb-4">
                                <label class="col-form-label col-lg-2">Blog FAQs</label>
                                <div class="col-lg-10">
                                    <div id="faq-repeater-wrapper">
                                        <div class="faq-item border p-3 mb-3">
                                            <div class="form-group mb-2">
                                                <label>Question</label>
                                                <input type="text" name="faqs[0][question]" class="form-control" placeholder="Enter question..." required />
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Answer</label>
                                                <textarea name="faqs[0][answer]" class="form-control" rows="2" placeholder="Enter answer..." required></textarea>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                        </div>
                                    </div>
                                    <button type="button" id="add-faq" class="btn btn-secondary btn-sm">+ Add FAQ</button>
                                </div>
                            </div>


                                <div class="form-group row mb-4">
                                    <label for="meta_title" class="col-form-label col-lg-2">Meta Title </label>
                                    <div class="col-lg-10">
                                        <input name="meta_title" type="text" class="form-control" id="meta_title"
                                            placeholder="Enter Meta Title..." required>
                                    </div>
                                </div>




                                <div class="form-group row mb-4">
                                    <label for="meta_keywords" class="col-form-label col-lg-2">Meta Keywords </label>
                                    <div class="col-lg-10">
                                        <input name="meta_keywords" type="text" class="form-control" id="meta_keywords"
                                            placeholder="Enter Meta Keywords..." required>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="meta_description" class="col-form-label col-lg-2">Meta Description
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="meta_description" rows="4" cols="50" class="form-control"
                                            id="meta_description" placeholder="Enter Meta  Description..."></textarea>
                                    </div>
                                </div>





                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2">Status (Inactive/Active)</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                name="status" value="1">
                                        </div>
                                    </div>
                                </div>






                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Create
                                            Blog</button>
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
let faqIndex = 1;

document.getElementById('add-faq').addEventListener('click', function () {
    const wrapper = document.getElementById('faq-repeater-wrapper');

    const faqHTML = `
    <div class="faq-item border p-3 mb-3">
        <div class="form-group mb-2">
            <label>Question</label>
            <input type="text" name="faqs[${faqIndex}][question]" class="form-control" placeholder="Enter question..." required>
        </div>
        <div class="form-group mb-2">
            <label>Answer</label>
            <textarea name="faqs[${faqIndex}][answer]" class="form-control" rows="2" placeholder="Enter answer..." required></textarea>
        </div>
        <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
    </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', faqHTML);
    faqIndex++;
});

// Remove FAQ
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-faq')) {
        e.target.closest('.faq-item').remove();
    }
});
</script>

@endpush

@stop