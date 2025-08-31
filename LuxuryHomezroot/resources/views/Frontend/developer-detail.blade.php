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
                    @php $status = $property->property_status; @endphp
                    <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden group h-full flex flex-col border border-gray-100 hover:border-golden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <!-- Image Container with Enhanced Overlay -->
                        <div class="relative overflow-hidden">
                            <a href="{{ url('property/' . $property->slug) }}" class="block">
                                <img src="{{ asset('storage/' . $property->main_image) }}" class="w-full h-72 object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $property->heading }}" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                            </a>
                            
                            <!-- Enhanced Badges -->
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                @if($property->is_featured)
                                    <span class="bg-gradient-to-r from-golden to-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        Featured
                                    </span>
                                @endif
                                @if($status === 'ready-to-move')
                                    <span class="bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Ready To Move
                                    </span>
                                @endif
                                @if($status === 'new-launch')
                                    <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/>
                                        </svg>
                                        New Launch
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Price Tag -->
                            <div class="absolute bottom-4 left-4">
                                <div class="bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2 shadow-lg">
                                    <p class="text-navy font-bold text-sm">{{ $property->price }}</p>
                                </div>
                            </div>
                            
                          
                        </div>
                        
                        <!-- Enhanced Content Section -->
                        <div class="p-6 flex flex-col flex-grow">
                            <!-- Property Title with Hover Effect -->
                            <h3 class="font-display text-xl text-navy font-bold mb-2 line-clamp-2 hover:text-golden transition-colors duration-300">
                                <a href="{{ url('property/' . $property->slug) }}" class="hover:text-golden transition-colors">{{ $property->heading }}</a>
                            </h3>
                            
                            <!-- Developer with Logo -->
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center mr-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-5L9 2H4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 text-sm font-medium">By {{ $builder->name }}</p>
                            </div>
                            
                            <!-- Enhanced Property Details -->
                            <div class="space-y-3 text-gray-700">
                                <div class="flex items-center text-sm">
                                    <div class="w-5 h-5 bg-golden/10 rounded-full flex items-center justify-center mr-2">
                                        <svg class="w-3 h-3 text-golden" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">{{ $property->location }}</span>
                                </div>
                                
                                <div class="flex items-center text-sm">
                                    <div class="w-5 h-5 bg-golden/10 rounded-full flex items-center justify-center mr-2">
                                        <svg class="w-3 h-3 text-golden" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-1a1 1 0 100-2h1a4 4 0 014 4v6a4 4 0 01-4 4H6a4 4 0 01-4-4V7a4 4 0 014-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">{{ $property->configuration }}</span>
                                </div>
                                
                                <div class="flex items-center text-sm">
                                    <div class="w-5 h-5 bg-golden/10 rounded-full flex items-center justify-center mr-2">
                                        <svg class="w-3 h-3 text-golden" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                            <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">{{ $property->area ?? 'N/A' }} sq ft</span>
                                </div>
                            </div>
                            
                            <!-- Enhanced CTA Button -->
                            <div class="mt-auto pt-4">
                                <a href="{{ url('property/' . $property->slug) }}" class="inline-flex items-center justify-center w-full bg-gradient-to-r from-navy to-navy/90 text-white hover:from-golden hover:to-yellow-500 px-6 py-3 rounded-xl font-medium text-sm hover:-translate-y-0.5 transition-all duration-300 group/button shadow-md hover:shadow-lg">
                                    <span>View Details</span>
                                    <svg class="w-4 h-4 ml-2 transform transition-transform duration-300 group-hover/button:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
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
