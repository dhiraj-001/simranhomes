@extends('layouts.master')
@section('title','Terms & Conditions | Luxury Homez')
@section('description','Read the Terms and Conditions for using the Luxury Homez website and services.')

@section('content')

@push('styles')
{{-- Assuming Vite is used for a modern setup, consistent with the Privacy Policy page --}}
@vite([
    'frontend_assets/css/contact.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])
@endpush

<section class="relative h-[60vh] min-h-[500px] bg-navy-dark text-white flex items-center">
    <div class="absolute inset-0 z-0">
        {{-- A single, professional image is often better for legal pages than a slider/video --}}
        @if($banner && $banner->type === 'image' && $banner->images->count())
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
        @else
            {{-- Fallback background --}}
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1583522265345-c65d8361665e?q=80&w=2070');"></div>
        @endif
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6">
        <div class="max-w-5xl" data-animate="fade-up">
            <nav class="mb-4 text-sm font-elegant text-gray-300">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <span class="mx-2">/</span>
                <span>Terms & Conditions</span>
            </nav>
            <h1 class="font-display text-5xl md:text-7xl font-bold leading-tight">
                Terms & Conditions
            </h1>
            <p class="max-w-2xl mt-4 text-base text-gray-200 font-elegant">
                Please review the terms that govern your use of our website and services.
            </p>
        </div>
    </div>
</section>
<section class="bg-slate-50 py-20 sm:py-28">
    <div class="container mx-auto px-6">
        {{-- Main grid for sidebar and content --}}
        <div class="mx-auto max-w-7xl lg:grid lg:grid-cols-12 lg:gap-12 xl:gap-16">

            <aside class="hidden lg:block lg:col-span-4 xl:col-span-3">
                <div class="sticky top-28">
                    <h3 class="font-display text-lg font-bold text-navy-dark mb-4">On This Page</h3>
                    <nav>
                        <ul class="space-y-2 font-elegant">
                            <li><a href="#introduction" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">1. Introduction</a></li>
                            <li><a href="#eligibility" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">2. Eligibility</a></li>
                            <li><a href="#services-offered" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">3. Services Offered</a></li>
                            <li><a href="#user-responsibilities" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">4. User Responsibilities</a></li>
                            <li><a href="#property-listings" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">5. Property Listings</a></li>
                            <li><a href="#intellectual-property" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">6. Intellectual Property</a></li>
                            <li><a href="#limitation-of-liability" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">7. Limitation of Liability</a></li>
                            <li><a href="#external-links" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">8. External Links</a></li>
                            <li><a href="#governing-law" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">9. Governing Law</a></li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <main class="lg:col-span-8 xl:col-span-9" data-animate="fade-up">
                <div class="p-8 sm:p-12 bg-white rounded-lg shadow-sm">
                    {{-- Using Tailwind's Typography plugin for beautiful default styling --}}
                    <div class="prose lg:prose-lg max-w-none font-elegant text-gray-700">
                        
                        <div class="flex items-center gap-x-4 mb-6">
                            <span class="font-bold">Effective Date:</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                {{ now()->format('F j, Y') }}
                            </span>
                        </div>

                        <h2 id="introduction">1. Introduction</h2>
                        <p>Welcome to Luxury Homez. These Terms and Conditions ("Terms") govern your use of our website (www.luxuryhomez.com) and our real estate services. By accessing or using our website, you agree to comply with and be bound by these Terms.</p>

                        <h2 id="eligibility">2. Eligibility</h2>
                        <p>To use our services, you must be at least 18 years of age and possess the legal authority to enter into binding agreements. By using this site, you represent that you meet these requirements.</p>

                        <h2 id="services-offered">3. Services Offered</h2>
                        <p>Luxury Homez provides real estate brokerage services, including property listings, consultations, and project information, primarily within Gurugram, Haryana, and surrounding regions. All information and content provided on this website are for informational purposes only and should not be considered as legal, financial, or investment advice.</p>
                        
                        <h2 id="user-responsibilities">4. User Responsibilities</h2>
                        <p>As a user of this website, you agree to the following:</p>
                        <ul>
                            <li>You will provide accurate and truthful information when filling out forms or communicating with our team.</li>
                            <li>You will not use this website for any unlawful, fraudulent, or malicious activities.</li>
                            <li>You will not attempt to disrupt the security or functionality of the website, including the introduction of viruses or other harmful code.</li>
                            <li>You will respect the intellectual property rights of Luxury Homez and its partners.</li>
                        </ul>

                        <h2 id="property-listings">5. Property Listings & Accuracy</h2>
                        <p>We make a diligent effort to ensure that all property listings, including prices, floor plans, and availability, are accurate and current. However, this information is provided by developers and third parties and is subject to change without notice. Luxury Homez does not guarantee the completeness or accuracy of any listing and we recommend verifying all details independently.</p>

                        <h2 id="intellectual-property">6. Intellectual Property</h2>
                        <p>All content on this website, including but not limited to text, graphics, logos, images, and software, is the property of Luxury Homez or its licensors and is protected by Indian and international copyright and trademark laws. Unauthorized use, reproduction, or distribution of this material is strictly prohibited.</p>

                        <h2 id="limitation-of-liability">7. Limitation of Liability</h2>
                        <p>Luxury Homez, its directors, employees, and affiliates will not be liable for any direct, indirect, incidental, or consequential damages arising from your use of this website or your reliance on any information provided herein. This includes, but is not limited to, any errors or omissions in content, or any loss or damage incurred as a result of using the service.</p>

                        <h2 id="external-links">8. External Links</h2>
                        <p>Our website may contain links to third-party websites for your convenience. We do not endorse, control, or assume responsibility for the content, privacy policies, or practices of any third-party sites. Accessing these links is at your own risk.</p>

                        <h2 id="governing-law">9. Governing Law</h2>
                        <p>These Terms are governed by and construed in accordance with the laws of India. Any legal action or proceeding arising out of or related to these Terms shall be brought exclusively in the courts of Gurugram, Haryana.</p>
                    </div>

                    <div id="contact-us" class="mt-16 p-8 bg-slate-50 border border-slate-200 rounded-lg">
                        <h3 class="font-display text-2xl font-bold text-navy-dark">Contact Us</h3>
                        <p class="mt-2 text-gray-600 font-elegant">For any questions regarding these Terms, please contact us:</p>
                        <div class="mt-6 space-y-4 font-elegant">
                            <div class="flex items-center gap-x-4">
                                <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" /><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" /></svg>
                                <a href="mailto:{{ $global_settings->email ?? 'info@luxuryhomez.com' }}" class="text-navy-dark hover:underline">{{ $global_settings->email ?? 'info@luxuryhomez.com' }}</a>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" /></svg>
                                <a href="tel:{{ $global_settings->contact_number ?? '' }}" class="text-navy-dark hover:underline">{{ $global_settings->contact_number ?? '[Insert Phone Number]' }}</a>
                            </div>
                            <div class="flex items-start gap-x-4">
                               <svg class="h-5 w-5 text-gray-500 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                                <span class="text-gray-800">{!! $global_settings->address ?? '[Insert Office Address], Gurugram, Haryana, India' !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>
@push('scripts')
{{-- Optional: Add a script for smooth scrolling if not already present in master layout --}}
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush

@stop