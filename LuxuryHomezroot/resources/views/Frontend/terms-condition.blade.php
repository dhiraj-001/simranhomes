@extends('layouts.master')
@section('title','Terms & Conditions | Luxury Homez')
@section('description','Luxury Homez')
@section('content')

@push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/hoztab.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/allprojects.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aresponsive.css" />

<style>
    .banner.home-banner .banner-wrapper {
        bottom: 10%;
    }

.banner.home-banner .content .search-div {
    bottom: 5px;
}
</style>
@endpush

<div class="banner home-banner">
    {{-- If video --}}
    @if($banner && $banner->type === 'video' && $banner->video)
        <div class="bg">
            <video playsinline autoplay muted loop width="100%" height="600">
                <source src="{{ asset('storage/' . $banner->video) }}" type="video/mp4" />
            </video>
        </div>
        <div class="banner-wrapper">
            <div class="container">
                <div class="content content-white text-center ar-resp-flx">
                     <span class="span-a">{{ $banner->sub_heading }} </span>
                    @php
                    $words = explode(' ', $banner->heading); // ['Prestigious', 'Address']
                    @endphp
                    <h1>
                        @foreach($words as $word)
                            <span>{{ substr($word, 0, 1) }}</span>{{ substr($word, 1) }}
                        @endforeach
                    </h1>
                    <p data-animate="fade-up" data-animate-delay="300" class="kmr-animate">{!! $banner->description !!}</p>
                    <x-search-bar />
                </div>
            </div>
        </div>
    
    {{-- If image slider --}}
    @elseif($banner && $banner->type === 'image' && $banner->images->count())
        <div class="ar-bg">
            <div class="ar-hero-section">
                <div class="ar-hero-slider" id="ar-hero-slider">
                    @foreach($banner->images as $image)
                        <div class="ar-hero-slide" style="background-image: url('{{ asset('storage/' . $image->image) }}');"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="banner-wrapper">
            <div class="container">
                <div class="content content-white text-center ar-resp-flx">
                     <span class="span-a">{{ $banner->sub_heading }} </span>
                    @php
                    $words = explode(' ', $banner->heading); // ['Prestigious', 'Address']
                    @endphp
                    <h1>
                        @foreach($words as $word)
                            <span>{{ substr($word, 0, 1) }}</span>{{ substr($word, 1) }}
                        @endforeach
                    </h1>
                    <p data-animate="fade-up" data-animate-delay="300" class="kmr-animate">{!! $banner->description !!}</p>
                    <x-search-bar />
                </div>
            </div>
        </div>
    @endif
</div>
          
        <!-- Main div --> 
        <section>
             <div class="home-secC sec-pad gray-bg ar-tp-pd">
                     <div class="container">  
                            <div class="ar-tp">
                                
                                <div> 
                                    <h5>Effective Date: [Insert Date]</h5>
                                     <h6>1. Introduction</h6>
                                <p>Welcome to Luxury Homez. These Terms and Conditions govern your use of our website (www.luxuryhomez.com) and our services. By accessing or using our website, you agree to comply with these Terms.</p>

                                <h6>2. Eligibility</h6>
                                <p>You must be at least 18 years old and legally capable of entering into binding agreements to use our services.</p>
                                     

                                    <h6>3. Services Offered</h6>
                                <p>Luxury Homez provides real estate brokerage services, including property listings, consultations, and project details primarily in Gurugram and surrounding areas. All content is for informational purposes only and does not constitute legal or financial advice.</p>
                                    

                                    <h6>4. User Responsibilities</h6>
                                <p><b>We do not sell</b> your personal information. We may share data with:</p>
                                    <ul>
                                        <li>
                                            You agree not to use the website for unlawful purposes.
                                        </li>
                                        <li>
                                            You will not post false or misleading information.
                                        </li>
                                        <li>
                                           You will not attempt to disrupt or damage the website.
                                        </li>  
                                    </ul>

                                    <h6>5. Property Listings & Accuracy</h6>
                                <p>While we strive to keep listings accurate and up to date, we do not guarantee completeness or availability of any property. Prices, availability, and other details are subject to change without notice.</p>

                                <h6>6. Intellectual Property</h6>
                                <p>All content on the website, including text, images, logos, and design, is the property of Luxury Homez or its licensors and is protected under Indian copyright and trademark laws.</p>

                                 <h6>7. Limitation of Liability</h6>
                                <p>Luxury Homez is not responsible for any loss or damage arising from your use of our website or reliance on any content.</p>


                                <h6>8. External Links</h6>
                                <p>We may provide links to third-party websites. We do not endorse or control these sites and are not responsible for their content or practices.</p>
                                     

                                     <h6>9. Governing Law</h6>
                                <p>These Terms are governed by the laws of India. Any disputes will be subject to the exclusive jurisdiction of the courts in Gurugram, Haryana.</p>

                                
                                     <h6>10. Contact Us</h6>
                                <p>For privacy-related concerns, contact us at:</p>
                                <ul>
                                        <li>
                                            Email: info@luxuryhomez.com
                                        </li>
                                        <li>
                                            Phone: [Insert Phone Number]
                                        </li>
                                        <li>
                                           Address: [Insert Office Address], Gurugram, Haryana, India
                                        </li>  
                                    </ul>
                            </div> 
                            </div>
                    </div>
             </div>
        </section> 
        <!-- Main div -->

@push('scripts')

@endpush
@stop
