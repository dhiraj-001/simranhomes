@extends('layouts.master')
@section('title','Privacy Policy | Luxury Homez')
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
                <source src="{{ asset('storage/app/public/' . $banner->video) }}" type="video/mp4" />
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
                        <div class="ar-hero-slide" style="background-image: url('{{ asset('storage/app/public/' . $image->image) }}');"></div>
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
                                <p>At Luxury Homez, your privacy is important to us. This policy explains how we collect, use, and protect your personal information when you visit our website or use our services.</p>

                                <h6>2. Information We Collect</h6>
                                <p>We may collect the following types of information:</p>
                                    <ul>
                                        <li>
                                            <b>Personal Information:</b> Name, email address, phone number, and location.
                                        </li>
                                        <li>
                                            <b>Usage Information:</b> Pages visited, IP address, browser type, and time spent on the site.
                                        </li>
                                        <li>
                                           <b>Inquiry Data:</b> Information submitted through forms or chat for property inquiries or consultations.
                                        </li> 
                                    </ul>

                                    <h6>3. How We Use Your Information</h6>
                                <p>We use your data to:</p>
                                    <ul>
                                        <li>
                                            Respond to inquiries and provide services
                                        </li>
                                        <li>
                                            Send property updates and marketing emails (with consent)
                                        </li>
                                        <li>
                                           Improve user experience and website functionality
                                        </li> 
                                        <li>
                                           Comply with legal obligations
                                        </li> 
                                    </ul>

                                    <h6>4. Sharing of Information</h6>
                                <p><b>We do not sell</b> your personal information. We may share data with:</p>
                                    <ul>
                                        <li>
                                            Respond to inquiries and provide services
                                        </li>
                                        <li>
                                            Send property updates and marketing emails (with consent)
                                        </li>
                                        <li>
                                           Improve user experience and website functionality
                                        </li> 
                                        <li>
                                           Comply with legal obligations
                                        </li> 
                                    </ul>

                                    <h6>5. Cookies</h6>
                                <p>Our website may use cookies to enhance user experience. You can choose to disable cookies in your browser settings.</p>

                                <h6>6. Data Security</h6>
                                <p>We implement reasonable security measures to protect your data. However, no method of transmission over the internet is 100% secure.</p>

                                 <h6>7. Third-Party Links</h6>
                                <p>Our website may contain links to external websites. We are not responsible for the privacy practices of those sites.</p>


                                <h6>8. Your Rights</h6>
                                <p>Under Indian law, you have the right to:</p>
                                    <ul>
                                        <li>
                                            Request access to your data
                                        </li>
                                        <li>
                                            Request corrections or deletion of your data
                                        </li>
                                        <li>
                                           Withdraw consent at any time
                                        </li>  
                                    </ul>

                                     <h6>9. Updates to This Policy</h6>
                                <p>We may update this policy from time to time. The updated version will be posted on this page with the effective date.</p>

                                
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
       

@push('scripts')

@endpush
@stop
