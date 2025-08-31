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

<section class="relative h-[60vh] min-h-[500px] bg-navy-dark text-white flex items-center">
    <div class="absolute inset-0 z-0">
        @if($banner && $banner->type === 'image' && $banner->images->count())
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
        @else
            {{-- Fallback background --}}
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=2070');"></div>
        @endif
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6">
        <div class="max-w-5xl" data-animate="fade-up">
            <nav class="mb-4 text-sm font-elegant text-gray-300">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <span class="mx-2">/</span>
                <span>Privacy Policy</span>
            </nav>
            <h1 class="font-display text-5xl md:text-7xl font-bold leading-tight">
                Privacy Policy
            </h1>
            <p class="max-w-2xl mt-4 text-base text-gray-200 font-elegant">
                Your privacy is important to us. This policy explains how we handle your personal information.
            </p>
        </div>
    </div>
</section>
<section class="bg-gray-50 py-20 sm:py-28">
    <div class="container mx-auto px-6">
        {{-- Main grid for sidebar and content --}}
        <div class="mx-auto max-w-7xl lg:grid lg:grid-cols-12 lg:gap-12 xl:gap-16">

            <aside class="hidden lg:block lg:col-span-4 xl:col-span-3">
                <div class="sticky top-28">
                    <h3 class="font-display text-lg font-bold text-navy-dark mb-4">On This Page</h3>
                    <nav>
                        <ul class="space-y-2 font-elegant">
                            <li><a href="#introduction" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">1. Introduction</a></li>
                            <li><a href="#information-we-collect" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">2. Information We Collect</a></li>
                            <li><a href="#how-we-use-information" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">3. How We Use Your Information</a></li>
                            <li><a href="#sharing-information" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">4. Sharing of Information</a></li>
                            <li><a href="#cookies" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">5. Cookies</a></li>
                            <li><a href="#data-security" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">6. Data Security</a></li>
                            <li><a href="#third-party-links" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">7. Third-Party Links</a></li>
                            <li><a href="#your-rights" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">8. Your Rights</a></li>
                            <li><a href="#policy-updates" class="block text-gray-600 hover:text-navy-dark hover:font-semibold transition-all">9. Updates to This Policy</a></li>
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
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-sky-100 text-sky-800">
                                {{ now()->format('F j, Y') }}
                            </span>
                        </div>

                        <h2 id="introduction">1. Introduction</h2>
                        <p>At Luxury Homez, your privacy is important to us. This policy explains how we collect, use, and protect your personal information when you visit our website or use our services.</p>

                        <h2 id="information-we-collect">2. Information We Collect</h2>
                        <p>We may collect the following types of information:</p>
                        <ul>
                            <li><strong>Personal Information:</strong> Name, email address, phone number, and location.</li>
                            <li><strong>Usage Information:</strong> Pages visited, IP address, browser type, and time spent on the site.</li>
                            <li><strong>Inquiry Data:</strong> Information submitted through forms or chat for property inquiries or consultations.</li>
                        </ul>

                        <h2 id="how-we-use-information">3. How We Use Your Information</h2>
                        <p>We use your data to:</p>
                        <ul>
                            <li>Respond to inquiries and provide services.</li>
                            <li>Send property updates and marketing emails (with your consent).</li>
                            <li>Improve user experience and website functionality.</li>
                            <li>Comply with legal obligations.</li>
                        </ul>

                        <h2 id="sharing-information">4. Sharing of Information</h2>
                        <p><strong>We do not sell</strong> your personal information. We may share data with trusted partners, such as developers, to fulfill your service requests, or with legal authorities if required by law.</p>

                        <h2 id="cookies">5. Cookies</h2>
                        <p>Our website may use cookies to enhance user experience. You can choose to disable cookies in your browser settings, though this may affect the functionality of some parts of our site.</p>

                        <h2 id="data-security">6. Data Security</h2>
                        <p>We implement reasonable security measures to protect your data from unauthorized access, alteration, or disclosure. However, no method of transmission over the internet is 100% secure.</p>

                        <h2 id="third-party-links">7. Third-Party Links</h2>
                        <p>Our website may contain links to external websites. We are not responsible for the privacy practices or content of these third-party sites.</p>

                        <h2 id="your-rights">8. Your Rights</h2>
                        <p>Under Indian law, you have the right to:</p>
                        <ul>
                            <li>Request access to your personal data.</li>
                            <li>Request corrections or deletion of your data.</li>
                            <li>Withdraw your consent for data processing at any time.</li>
                        </ul>

                        <h2 id="policy-updates">9. Updates to This Policy</h2>
                        <p>We may update this policy from time to time. The updated version will be posted on this page with the new effective date.</p>
                    </div>

                    <div id="contact-us" class="mt-16 p-8 bg-slate-50 border border-slate-200 rounded-lg">
                        <h3 class="font-display text-2xl font-bold text-navy-dark flex items-center gap-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2V4a2 2 0 012-2h8a2 2 0 012 2v4z" /></svg>
                            <span>Contact Us</span>
                        </h3>
                        <p class="mt-2 text-gray-600 font-elegant">For any privacy-related concerns or to exercise your rights, please contact us:</p>
                        <div class="mt-6 space-y-4 font-elegant">
                            <div class="flex items-center gap-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" /><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" /></svg>
                                <a href="mailto:{{ $global_settings->email ?? 'info@luxuryhomez.com' }}" class="text-navy-dark hover:underline">{{ $global_settings->email ?? 'info@luxuryhomez.com' }}</a>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" /></svg>
                                <a href="tel:{{ $global_settings->contact_number ?? '' }}" class="text-navy-dark hover:underline">{{ $global_settings->contact_number ?? '[Insert Phone Number]' }}</a>
                            </div>
                            <div class="flex items-start gap-x-4">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
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