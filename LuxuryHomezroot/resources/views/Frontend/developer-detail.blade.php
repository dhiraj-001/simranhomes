@extends('layouts.master') 
@section('title', $builder->name) 
@section('keywords', $builder->meta_keywords) 
@section('description', $builder->meta_description) 

@section('content') 

@push('styles')
@vite([
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/property.css',
    'frontend_assets/css/fancybox.css',
    'frontend_assets/css/aresponsive.css'
])
{{-- Alpine.js is used for the interactive FAQ accordion --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

<!-- =================================================================================== -->
<!-- START: HERO SECTION (REDESIGNED)                                                  -->
<!-- =================================================================================== -->
<section class="relative h-[60vh] min-h-[500px] bg-navy-dark text-white flex items-center justify-center text-center">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ Vite::asset('frontend_assets/images/bg1.webp')}}" alt="Developer Background" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6" data-animate="fade-up">
        <p class="font-elegant text-lg text-gray-300 mb-2">Projects By</p>
        <h1 class="font-display text-5xl md:text-7xl font-bold leading-tight text-golden">
            {{ $builder->name }}
        </h1>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: HERO SECTION                                                                 -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: DEVELOPER INFO & PROJECTS SECTION (REDESIGNED)                             -->
<!-- =================================================================================== -->
<section class="bg-white py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Developer Intro -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 mb-20" data-animate="fade-up">
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-2xl p-8 text-center shadow-lg">
                        <img src="{{ asset('storage/' . $builder->logo) }}" alt="{{ $builder->name }} Logo" class="h-24 mx-auto mb-6">
                        <div class="grid grid-cols-3 gap-4 text-navy-dark">
                            <div>
                                <p class="font-display text-3xl font-bold text-golden">{{ $builder->years_of_experience }}<span class="text-xl">+</span></p>
                                <p class="font-elegant text-xs text-gray-500">Years Experience</p>
                            </div>
                            <div>
                                <p class="font-display text-3xl font-bold text-golden">{{ $builder->total_projects }}<span class="text-xl">+</span></p>
                                <p class="font-elegant text-xs text-gray-500">Total Projects</p>
                            </div>
                            <div>
                                <p class="font-display text-3xl font-bold text-golden">{{ $builder->total_cities }}<span class="text-xl">+</span></p>
                                <p class="font-elegant text-xs text-gray-500">Cities</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 prose max-w-none font-elegant text-gray-700 text-sm">
                    {!! $builder->content !!}
                </div>
            </div>

            <!-- Projects Grid -->
            <div data-animate="fade-up">
                <h2 class="font-display text-4xl text-navy-dark font-bold text-center mb-12">
                    Our Projects by <span class="text-gold-accent">{{ $builder->name }}</span>
                </h2>
                @if($builder->properties->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($builder->properties as $property)
                    <div class="bg-white rounded-lg overflow-hidden group h-full flex flex-col border hover:border-transparent hover:border-gold-accent shadow-lg hover:shadow-xl transition-all duration-300">
                        <a href="{{ url('property/' . $property->slug) }}" class="block relative overflow-hidden">
                            <img src="{{ asset('storage/' . $property->main_image) }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" alt="{{$property->heading}}" />
                            <span class="absolute top-4 left-4 bg-navy-dark/80 text-white text-xs font-bold px-3 py-1 rounded-full">{{$property->property_status}}</span>
                        </a>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="font-display text-xl text-navy-dark font-bold mb-2 truncate">
                                <a href="{{ url('property/' . $property->slug) }}" class="hover:text-gold-accent transition">{{$property->heading}}</a>
                            </h3>
                            <div class="space-y-3 text-gray-700 font-elegant text-sm">
                                <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $property->location }}</p>
                                <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 4h4m-8 4h8m-7-8a2 2 0 00-2 2v4a2 2 0 002 2h5a2 2 0 002-2v-1a1 1 0 00-1-1H9"></path></svg> Price: {{ $property->price }}</p>
                                <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ $property->configuration }}</p>
                            </div>
                            <a href="{{ url('property/' . $property->slug) }}" class="inline-block mt-auto pt-4 font-display text-navy-dark font-bold group/link">
                                View Details <span class="inline-block transition-transform duration-300 group-hover/link:translate-x-1">&rarr;</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-20 border-2 border-dashed rounded-2xl">
                    <svg class="w-16 h-16 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h4 class="mt-4 font-display text-2xl text-navy-dark">No Properties Found</h4>
                    <p class="mt-2 text-gray-500 font-elegant">No properties are currently listed for this developer.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: DEVELOPER INFO & PROJECTS SECTION                                            -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: FAQ SECTION (REDESIGNED)                                                   -->
<!-- =================================================================================== -->
<section class="bg-gray-50 py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto" data-animate="fade-up">
            <div class="text-center mb-12">
                <h2 class="font-display text-4xl text-navy-dark font-bold">Frequently Asked <span class="text-gold-accent">Questions</span></h2>
            </div>
            <div class="space-y-4">
                {{-- This is a placeholder for FAQs. You should fetch these from your database for the specific builder. --}}
                @php
                    $faqs = [
                        ['question' => 'What are the amenities included in the project?', 'answer' => 'The project features a luxury clubhouse, rooftop infinity pool, fully equipped gym, yoga deck, indoor games room, co-working spaces, landscaped gardens, and a 24x7 concierge service.'],
                        ['question' => 'Is the property RERA registered?', 'answer' => 'Yes, this project is RERA registered under registration number HRERA-GGM-2024-00567, ensuring transparency and timely possession as per government norms.'],
                        ['question' => 'What is the payment plan and booking amount?', 'answer' => 'We offer flexible payment plans including CLP, PLP, and subvention schemes. The booking amount starts from ₹2 Lakhs, with milestone-based payments throughout the construction period.'],
                    ];
                @endphp

                @foreach($faqs as $faq)
                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="bg-white rounded-lg border border-gray-200">
                    <button @click="open = !open" class="w-full flex justify-between items-center text-left p-6">
                        <h5 class="font-display font-bold text-navy-dark">{{ $faq['question'] }}</h5>
                        <svg class="w-5 h-5 text-gold-accent transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 font-elegant text-gray-600 text-sm">
                        <p>{{ $faq['answer'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: FAQ SECTION                                                                  -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: TESTIMONIALS SECTION                                                       -->
<!-- =================================================================================== -->
<x-testimonial-section :global_settings="$global_settings" :testimonials="$testimonials" />

<!-- =================================================================================== -->
<!-- END: TESTIMONIALS SECTION                                                         -->
<!-- =================================================================================== -->

@push('scripts')
{{-- Add any specific scripts for this page here --}}
@endpush 

@stop
