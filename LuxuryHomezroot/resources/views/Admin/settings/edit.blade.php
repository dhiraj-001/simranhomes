@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Settings')
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
                        <h4 class="mb-sm-0 font-size-18">Edit Settings</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Settings</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row">
                <div class="col-12">
                    
                    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Edit Website Settings</h4></div>

                        <div class="card-body">
                            <form action="{{ route('Admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Logo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Logo</label>
                                    <div class="col-lg-1 mx-4">
                                        @if($setting->logo)
                                            <img src="{{ asset('storage/' . $setting->logo) }}" style="max-width: 100px;">
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                <label for="contact_page_logo" class="col-form-label col-lg-2">Contact Page Logo</label>
                                <div class="col-lg-2">
                                    @if($setting->contact_page_logo)
                                        <img src="{{ asset('storage/app/public/' . $setting->contact_page_logo) }}" alt="Contact Page Logo" style="max-height: 60px;">
                                    @endif
                                </div>
                                <div class="col-lg-8">
                                    <input type="file" name="contact_page_logo" id="contact_page_logo" class="form-control">
                                </div>
                            </div>

                                {{-- Email --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                                    </div>
                                </div>

                                {{-- Contact Number --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Contact Number</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="contact_number" class="form-control" value="{{ $setting->contact_number }}">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row mb-4">
                                <label for="social_whatsapp" class="col-form-label col-lg-2">WhatsApp Number</label>
                                <div class="col-lg-10">
                                    <input type="text" name="social_whatsapp" id="social_whatsapp" class="form-control"
                                           value="{{ old('social_whatsapp', $setting->social_whatsapp) }}">
                                </div>
                            </div>

                                {{-- Address --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Address</label>
                                    <div class="col-lg-10">
                                        <textarea name="address" class="form-control">{{ $setting->address }}</textarea>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row mb-4">
                                <label for="map_embed_code" class="col-form-label col-lg-2">Google Map Embed Code</label>
                                <div class="col-lg-10">
                                    <textarea name="map_embed_code" id="map_embed_code" class="form-control" rows="4">{{ old('map_embed_code', $setting->map_embed_code) }}</textarea>
                                    
                                </div>
                            </div>
                            
                            
                            <div class="form-group row mb-4">
                            <label for="direction_link" class="col-form-label col-lg-2">Direction Link</label>
                            <div class="col-lg-10">
                                <input type="url" name="direction_link" id="direction_link" class="form-control"
                                       value="{{ old('direction_link', $setting->direction_link) }}">
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group row mb-4">
    <label for="contact_sec1_heading" class="col-form-label col-lg-2">Contact Section 1 Heading</label>
    <div class="col-lg-10">
        <input type="text" name="contact_sec1_heading" id="contact_sec1_heading" class="form-control"
               value="{{ old('contact_sec1_heading', $setting->contact_sec1_heading) }}">
    </div>
</div>



<div class="form-group row mb-4">
    <label for="contact_sec2_heading" class="col-form-label col-lg-2">Contact Section 2 Heading</label>
    <div class="col-lg-10">
        <input type="text" name="contact_sec2_heading" id="contact_sec2_heading" class="form-control"
               value="{{ old('contact_sec2_heading', $setting->contact_sec2_heading) }}">
    </div>
</div>



                                {{-- Social Media --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Facebook</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="social_facebook" class="form-control" value="{{ $setting->social_facebook }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Instagram</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="social_instagram" class="form-control" value="{{ $setting->social_instagram }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">LinkedIn</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="social_linkedin" class="form-control" value="{{ $setting->social_linkedin }}">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                <label for="social_twitter" class="col-form-label col-lg-2">Twitter</label>
                                <div class="col-lg-10">
                                    <input type="text" name="social_twitter"  class="form-control"
                                           value="{{ old('social_twitter', $setting->social_twitter) }}">
                                </div>
                            </div>

                                {{-- Footer About --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Footer About</label>
                                    <div class="col-lg-10">
                                        <textarea name="footer_about" class="form-control">{{ $setting->footer_about }}</textarea>
                                    </div>
                                </div>

                                {{-- Footer Disclaimer --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Footer Disclaimer</label>
                                    <div class="col-lg-10">
                                        <textarea name="footer_disclaimer" class="form-control">{{ $setting->footer_disclaimer }}</textarea>
                                    </div>
                                </div>

                                {{-- Copyright --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Copyright</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="copyright" class="form-control" value="{{ $setting->copyright }}">
                                    </div>
                                </div>

                                {{-- RERA --}}
                                @php
                                $all_states = [
                                    'andhra_pradesh', 'arunachal_pradesh', 'assam', 'bihar', 'chhattisgarh', 'goa', 'gujarat', 'haryana',
                                    'himachal_pradesh', 'jharkhand', 'karnataka', 'kerala', 'madhya_pradesh', 'maharashtra', 'manipur',
                                    'meghalaya', 'mizoram', 'nagaland', 'odisha', 'punjab', 'rajasthan', 'sikkim', 'tamil_nadu',
                                    'telangana', 'tripura', 'uttar_pradesh', 'uttarakhand', 'west_bengal',
                                    'andaman_and_nicobar_islands', 'chandigarh', 'dadra_and_nagar_haveli_and_daman_and_diu', 'delhi',
                                    'jammu_and_kashmir', 'ladakh', 'lakshadweep', 'puducherry'
                                ];
                                @endphp
                                
                                @foreach($all_states as $state)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-lg-2">{{ ucwords(str_replace('_', ' ', $state)) }} RERA</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="rera_{{ $state }}" class="form-control" value="{{ $setting->{'rera_'.$state} ?? '' }}">
                                        </div>
                                    </div>
                                @endforeach


                                {{-- Home Sections --}}
                                @for ($i = 1; $i <= 9; $i++)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-lg-2">Home Section {{ $i }} Heading</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="home_sec{{ $i }}_heading" class="form-control" value="{{ $setting->{'home_sec'.$i.'_heading'} }}">
                                        </div>
                                    </div>
                                    @if($i != 3)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-lg-2">Home Section {{ $i }} Paragraph</label>
                                        <div class="col-lg-10">
                                            <textarea name="home_sec{{ $i }}_paragraph" class="form-control">{{ $setting->{'home_sec'.$i.'_paragraph'} }}</textarea>
                                        </div>
                                    </div>
                                    @endif

                                    @if($i == 5)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-lg-2">Home Section 5 Link</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="home_sec5_link" class="form-control" value="{{ $setting->home_sec5_link }}">
                                        </div>
                                    </div>
                                    @endif
                                @endfor
                                
                                
                                
                                {{-- Location Project Features Section --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Location Page Heading</label>
    <div class="col-lg-10">
        <input type="text" name="locationPFSheading" class="form-control" value="{{ old('locationPFSheading', $setting->locationPFSheading) }}">
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Location Page Sub Paragraph</label>
    <div class="col-lg-10">
        <textarea name="locationPFSsubparagraph" class="form-control" rows="3">{{ old('locationPFSsubparagraph', $setting->locationPFSsubparagraph) }}</textarea>
    </div>
</div>


<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Location Page Paragraph</label>
    <div class="col-lg-10">
        <textarea name="locationPFSparagraph" class="form-control" rows="3">{{ old('locationPFSparagraph', $setting->locationPFSparagraph) }}</textarea>
    </div>
</div>

{{-- Project Amenities Paragraph --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property Amenities Paragraph</label>
    <div class="col-lg-10">
        <textarea name="pamentiesparagraph" class="form-control">{{ old('pamentiesparagraph', $setting->pamentiesparagraph) }}</textarea>
    </div>
</div>

{{-- Price List Paragraph --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Price List Paragraph</label>
    <div class="col-lg-10">
        <textarea name="ppricelistparagraph" class="form-control">{{ old('ppricelistparagraph', $setting->ppricelistparagraph) }}</textarea>
    </div>
</div>

{{-- Floor Plan Paragraph --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property Floor Plan Paragraph</label>
    <div class="col-lg-10">
        <textarea name="pfloorplanparagraph" class="form-control">{{ old('pfloorplanparagraph', $setting->pfloorplanparagraph) }}</textarea>
    </div>
</div>

{{-- Gallery Paragraph --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property Gallery Paragraph</label>
    <div class="col-lg-10">
        <textarea name="pgalleryparagraph" class="form-control">{{ old('pgalleryparagraph', $setting->pgalleryparagraph) }}</textarea>
    </div>
</div>

{{-- Project Advantage Paragraph --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property Location Advantage Paragraph</label>
    <div class="col-lg-10">
        <textarea name="padvantageparagraph" class="form-control">{{ old('padvantageparagraph', $setting->padvantageparagraph) }}</textarea>
    </div>
</div>

{{-- Project Strip 1 --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property Strip 1 Heading</label>
    <div class="col-lg-10">
        <input type="text" name="pstrip1heading" class="form-control" value="{{ old('pstrip1heading', $setting->pstrip1heading) }}">
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property Strip 1 Paragraph</label>
    <div class="col-lg-10">
        <textarea name="pstrip1paragraph" class="form-control">{{ old('pstrip1paragraph', $setting->pstrip1paragraph) }}</textarea>
    </div>
</div>

{{-- Project Strip 2 --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property Strip 2 Heading</label>
    <div class="col-lg-10">
        <input type="text" name="pstrip2heading" class="form-control" value="{{ old('pstrip2heading', $setting->pstrip2heading) }}">
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property Strip 2 Paragraph</label>
    <div class="col-lg-10">
        <textarea name="pstrip2paragraph" class="form-control">{{ old('pstrip2paragraph', $setting->pstrip2paragraph) }}</textarea>
    </div>
</div>

{{-- FAQ Heading --}}
<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Property FAQ Heading</label>
    <div class="col-lg-10">
        <input type="text" name="pfaqheading" class="form-control" value="{{ old('pfaqheading', $setting->pfaqheading) }}">
    </div>
</div>


                                {{-- Submit Button --}}
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update Settings</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('Admin.dashboard') }}'">Cancel</button>
                                    </div>
                                </div>

                            </form>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- page-content -->
</div><!-- main-content -->

@push('scripts')
@endpush

@stop
