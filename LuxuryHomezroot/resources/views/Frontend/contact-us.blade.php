@extends('layouts.master') 
@section('title','Contact Us | Luxury Homez') 
@section('description','Get in touch with Luxury Homez for premier real estate services. Contact us for inquiries about properties, developments, or collaborations.') 

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
<section class="relative h-[70vh] min-h-[550px] bg-navy-dark text-white flex items-center">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('storage/' . $banner->images->first()->image) }}" alt="Contact Luxury Homez" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6">
        <div class="max-w-4xl text-center mx-auto" data-animate="fade-up">
            <p class="font-display text-gold-accent font-semibold tracking-widest uppercase mb-4">{{ $banner->sub_heading ?? 'Get in Touch' }}</p>
            <h1 class="font-display text-5xl md:text-7xl font-bold leading-tight">
                {{ $banner->heading ?? 'Contact Us' }}
            </h1>
            <p class="max-w-2xl mx-auto mt-4 text-base text-gray-300 font-elegant">
                {!! $banner->description !!}
            </p>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: HERO SECTION                                                                 -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: CONTACT FORM & MAP SECTION (REDESIGNED)                                    -->
<!-- =================================================================================== -->
<section class="bg-white py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">

            <!-- Left Column: Contact Info & Form -->
            <div data-animate="fade-up">
                @php $headingParts = explode('||', $global_settings->contact_sec1_heading); @endphp
                <h2 class="font-display text-4xl md:text-5xl text-navy-dark font-bold">
                    {{ $headingParts[0] ?? 'Send Us' }}
                    @if(isset($headingParts[1]))
                        <span class="text-gold-accent">{{ $headingParts[1] }}</span>
                    @endif
                </h2>
                <p class="font-elegant text-gray-600 mt-4 mb-8">We're here to help. Fill out the form below and a member of our team will get back to you shortly.</p>

                <!-- Contact Info -->
                <div class="space-y-6 mb-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-gold-accent/10 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h5 class="font-display text-lg font-bold text-navy-dark">Our Address</h5>
                            <p class="font-elegant text-sm text-gray-600">{!! $global_settings->address !!}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-gold-accent/10 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h5 class="font-display text-lg font-bold text-navy-dark">Email Us</h5>
                            <a href="mailto:{{ $global_settings->email }}" class="font-elegant text-sm text-gray-600 hover:text-gold-accent transition-colors">{{ $global_settings->email }}</a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <form class="space-y-4" action="{{ route('enquiry.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="contact" />
                    <input type="hidden" name="page_url" value="{{ url()->current() }}" />

                    <input type="text" class="w-full p-3 border border-gray-300 rounded-md focus:ring-gold-accent focus:border-gold-accent" name="name" placeholder="Name*" required/>
                    <input type="email" class="w-full p-3 border border-gray-300 rounded-md focus:ring-gold-accent focus:border-gold-accent" name="email" placeholder="Email*" required/>
                    <input type="tel" class="w-full p-3 border border-gray-300 rounded-md focus:ring-gold-accent focus:border-gold-accent" name="mobile" placeholder="Phone*" required />
                    <textarea class="w-full p-3 border border-gray-300 rounded-md focus:ring-gold-accent focus:border-gold-accent" name="message" rows="4" placeholder="Your Message..."></textarea>
                    <button type="submit" class="w-full bg-navy-dark text-white font-bold py-3 rounded-md hover:bg-gold-accent hover:text-navy-dark transition-colors duration-300 font-display">Send Message</button>
                </form>
            </div>

            <!-- Right Column: Map -->
            <div data-animate="fade-up" data-animate-delay="200">
                <div class="h-full w-full rounded-2xl overflow-hidden shadow-lg">
                    {!! $global_settings->map_embed_code !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: CONTACT FORM & MAP SECTION                                                   -->
<!-- =================================================================================== -->

@push('scripts')
{{-- No specific scripts needed for this page unless you add complex form validation --}}
@endpush 
@stop
