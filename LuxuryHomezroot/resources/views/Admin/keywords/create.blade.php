@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Add Keyword Section')
@section('content')

@push('styles')
<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Keyword Section</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Keywords</a></li>
                                <li class="breadcrumb-item active">Add Section</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Create New Keyword Section</h4></div>
                        <div class="card-body">
                            <form action="{{ route('Admin.keywords.store') }}" method="POST">
                                @csrf

                                <!-- Section Title -->
                                <div class="form-group row mb-4">
                                    <label for="title" class="col-form-label col-lg-2">Section Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="e.g. Gurgaon Projects" required>
                                    </div>
                                </div>

                                <!-- Keywords Repeater -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Keywords</label>
                                    <div class="col-lg-10">
                                        <div id="keyword-repeater-wrapper">
                                            <div class="keyword-item border p-3 mb-3">
                                                <div class="form-group mb-2">
                                                    <input type="text" name="keywords[0][text]" class="form-control" placeholder="Keyword Text" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" name="keywords[0][slug]" class="form-control" placeholder="Keyword URL (optional)">
                                                </div>
                                                 <div class="form-group mb-2">
                                                    <label>Content</label>
                                                    <textarea name="keywords[0][content]" class="form-control" rows="3" placeholder="Optional content..."></textarea>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label>Select Properties</label>
                                                    <select name="keywords[0][properties][]" multiple class="form-control choices-multiple">
                                                        @foreach($properties as $property)
                                                            <option value="{{ $property->id }}">{{ $property->heading }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-keyword">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" id="add-keyword" class="btn btn-secondary btn-sm">+ Add Keyword</button>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2">Status</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" name="status" value="1" id="customSwitchActive" checked>
                                            <label class="form-check-label" for="customSwitchActive">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Create Section</button>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col-12 -->
            </div> <!-- row -->

        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

@push('scripts')
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
let keywordIndex = 1;
const properties = @json($properties);

// Slug generator
function generateSlug(text) {
    return text.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .trim()
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

function bindSlugAutoFill(keywordItem) {
    const textInput = keywordItem.querySelector('[name*="[text]"]');
    const slugInput = keywordItem.querySelector('[name*="[slug]"]');

    if (textInput && slugInput) {
        textInput.addEventListener('input', () => {
            slugInput.value = generateSlug(textInput.value);
        });
    }
}

function bindChoicesJs(selectElement) {
    new Choices(selectElement, {
        removeItemButton: true,
        placeholderValue: 'Choose Property',
        searchEnabled: true
    });
}

// Initial bind
document.addEventListener('DOMContentLoaded', () => {
    const firstItem = document.querySelector('.keyword-item');
    bindSlugAutoFill(firstItem);
    bindChoicesJs(firstItem.querySelector('.choices-multiple'));
});

// Add new keyword block
document.getElementById('add-keyword').addEventListener('click', function () {
    const wrapper = document.getElementById('keyword-repeater-wrapper');

    let propertyOptions = '';
    properties.forEach(p => {
        propertyOptions += `<option value="${p.id}">${p.heading}</option>`;
    });

    const html = `
        <div class="keyword-item border p-3 mb-3">
            <div class="form-group mb-2">
                <input type="text" name="keywords[${keywordIndex}][text]" class="form-control" placeholder="Keyword Text" required>
            </div>
            <div class="form-group mb-2">
                <input type="text" name="keywords[${keywordIndex}][slug]" class="form-control" placeholder="Keyword URL (auto)">
            </div>
            <div class="form-group mb-2">
            <label>Content</label>
            <textarea name="keywords[${keywordIndex}][content]" class="form-control" rows="3" placeholder="Optional content..."></textarea>
        </div>
            <div class="form-group mb-2">
                <label>Select Properties</label>
                <select name="keywords[${keywordIndex}][properties][]" multiple class="form-control choices-multiple">
                    ${propertyOptions}
                </select>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-keyword">Remove</button>
        </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', html);

    const newItem = wrapper.lastElementChild;
    bindSlugAutoFill(newItem);
    bindChoicesJs(newItem.querySelector('.choices-multiple'));

    keywordIndex++;
});

// Remove keyword block
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-keyword')) {
        e.target.closest('.keyword-item').remove();
    }
});
</script>
@endpush

@stop
