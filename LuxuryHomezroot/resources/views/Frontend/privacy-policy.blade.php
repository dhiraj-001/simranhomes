@extends('layouts.master')
@section('title','Privacy Policy | Luxury Homez')
@section('description','Review the Luxury Homez privacy policy to understand how we collect, use, and protect your personal information.')

@section('content')

@push('styles')
@vite([
    'frontend_assets/css/contact.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])
@endpush

<!-- =================================================================================== -->
<!-- START: HERO SECTION (REDESIGNED)                                                  -->
<!-- =================================================================================== -->
<section class="relative h-[60vh] min-h-[500px] bg-navy-dark text-white flex items-center">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        @if($banner && $banner->type === 'image' && $banner->images->count())
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
        @else
            {{-- Fallback background --}}
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=2070');"></div>
        @endif
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6">
        <div class="max-w-4xl text-center mx-auto" data-animate="fade-up">
            <h1 class="font-display text-5xl md:text-7xl font-bold leading-tight">
                Privacy Policy
            </h1>
            <p class="max-w-2xl mx-auto mt-4 text-base text-gray-300 font-elegant">
                Your privacy is important to us. This policy explains how we handle your personal information.
            </p>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: HERO SECTION                                                                 -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: PRIVACY POLICY CONTENT SECTION (REDESIGNED)                                -->
<!-- =================================================================================== -->
<section class="bg-white py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            {{-- Using Tailwind's Typography plugin for beautiful default styling --}}
            <div class="prose lg:prose-lg max-w-none font-elegant text-gray-700" data-animate="fade-up">
                
                <p class="lead"><strong>Effective Date:</strong> {{ now()->format('F j, Y') }}</p>

                <h2>1. Introduction</h2>
                <p>At Luxury Homez, your privacy is important to us. This policy explains how we collect, use, and protect your personal information when you visit our website or use our services.</p>

                <h2>2. Information We Collect</h2>
                <p>We may collect the following types of information:</p>
                <ul>
                    <li>
                        <strong>Personal Information:</strong> Name, email address, phone number, and location.
                    </li>
                    <li>
                        <strong>Usage Information:</strong> Pages visited, IP address, browser type, and time spent on the site.
                    </li>
                    <li>
                       <strong>Inquiry Data:</strong> Information submitted through forms or chat for property inquiries or consultations.
                    </li> 
                </ul>

                <h2>3. How We Use Your Information</h2>
                <p>We use your data to:</p>
                <ul>
                    <li>Respond to inquiries and provide services.</li>
                    <li>Send property updates and marketing emails (with your consent).</li>
                    <li>Improve user experience and website functionality.</li> 
                    <li>Comply with legal obligations.</li> 
                </ul>

                <h2>4. Sharing of Information</h2>
                <p><strong>We do not sell</strong> your personal information. We may share data with trusted partners, such as developers, to fulfill your service requests, or with legal authorities if required by law.</p>

                <h2>5. Cookies</h2>
                <p>Our website may use cookies to enhance user experience. You can choose to disable cookies in your browser settings, though this may affect the functionality of some parts of our site.</p>

                <h2>6. Data Security</h2>
                <p>We implement reasonable security measures to protect your data from unauthorized access, alteration, or disclosure. However, no method of transmission over the internet is 100% secure.</p>

                <h2>7. Third-Party Links</h2>
                <p>Our website may contain links to external websites. We are not responsible for the privacy practices or content of these third-party sites.</p>

                <h2>8. Your Rights</h2>
                <p>Under Indian law, you have the right to:</p>
                <ul>
                    <li>Request access to your personal data.</li>
                    <li>Request corrections or deletion of your data.</li>
                    <li>Withdraw your consent for data processing at any time.</li>  
                </ul>

                <h2>9. Updates to This Policy</h2>
                <p>We may update this policy from time to time. The updated version will be posted on this page with the new effective date.</p>
                
                <h2>10. Contact Us</h2>
                <p>For any privacy-related concerns or to exercise your rights, please contact us at:</p>
                <ul>
                    <li><strong>Email:</strong> <a href="mailto:{{ $global_settings->email ?? 'info@luxuryhomez.com' }}">{{ $global_settings->email ?? 'info@luxuryhomez.com' }}</a></li>
                    <li><strong>Phone:</strong> <a href="tel:{{ $global_settings->contact_number ?? '' }}">{{ $global_settings->contact_number ?? '[Insert Phone Number]' }}</a></li>
                    <li><strong>Address:</strong> {!! $global_settings->address ?? '[Insert Office Address], Gurugram, Haryana, India' !!}</li>  
                </ul>
            </div> 
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: PRIVACY POLICY CONTENT SECTION                                               -->
<!-- =================================================================================== -->
       
@push('scripts')
{{-- No specific scripts needed for this page --}}
@endpush

@stop
