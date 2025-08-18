@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Keyword Section')
@section('content')

@push('styles')
<!-- Choices.js CSS (optional if already included globally) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Keyword Section</h4>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Update Keyword Section</h4></div>
                        <div class="card-body">
                            <form action="{{ route('Admin.keywords.update', $section->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Section Title -->
                                <div class="form-group row mb-4">
                                    <label for="title" class="col-form-label col-lg-2">Section Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $section->title }}" required>
                                    </div>
                                </div>

                                <!-- Keywords -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Keywords</label>
                                    <div class="col-lg-10">
                                        <div id="keyword-repeater-wrapper">
                                            @foreach($section->keywords as $index => $keyword)
                                            <div class="keyword-item border p-3 mb-3">
                                                <input type="hidden" name="keywords[{{ $index }}][id]" value="{{ $keyword->id }}">
                                                <div class="form-group mb-2">
                                                    <input type="text" name="keywords[{{ $index }}][text]" class="form-control" value="{{ $keyword->text }}" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <input type="text" name="keywords[{{ $index }}][slug]" class="form-control" value="{{ $keyword->slug }}">
                                                </div>
                                                 <div class="form-group mb-2">
                                                    <label>Content</label>
                                                    <textarea name="keywords[{{ $index }}][content]" class="form-control" rows="3" placeholder="Optional content...">{{ old("keywords.$index.content", $keyword->content ?? '') }}</textarea>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label>Select Properties</label>
                                                    <select name="keywords[{{ $index }}][properties][]" multiple class="form-control choices-multiple">
                                                        @foreach($properties as $property)
                                                            <option value="{{ $property->id }}" {{ $keyword->properties->contains($property->id) ? 'selected' : '' }}>
                                                                {{ $property->heading }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-keyword">Remove</button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button" id="add-keyword" class="btn btn-secondary btn-sm">+ Add Keyword</button>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2">Status</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" name="status" value="1" id="customSwitchActive" {{ $section->status ? 'checked' : '' }}>
                                            <label class="form-check-label" for="customSwitchActive">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update Section</button>
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
<!-- Choices.js -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
let keywordIndex = {{ count($section->keywords) }};
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

// Initial bindings
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.keyword-item').forEach(item => {
        bindSlugAutoFill(item);
        const select = item.querySelector('.choices-multiple');
        if (select) bindChoicesJs(select);
    });
});

// Add keyword button
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

// Remove keyword item
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-keyword')) {
        e.target.closest('.keyword-item').remove();
    }
});
</script>
@endpush

@stop
