@extends('layouts.master')
@section('title', $builder-> name)
@section('keywords', $builder-> meta_keywords)
@section('description',$builder-> meta_description)
@section('content')
@push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/blogs.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/developers.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/hoztab.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/allprojects.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aresponsive.css" />
@endpush


<div class="banner home-banner">
            <div class="ar-bg">
                
                <!-- banner slider -->
                    <div class="ar-hero-section">
                        <div class="ar-hero-slider" id="ar-hero-slider">
                        <div class="ar-hero-slide" style="background-image: url('{{url('')}}/frontend_assets/images/bg1.webp');"></div>
                        <div class="ar-hero-slide" style="background-image: url('{{url('')}}/frontend_assets/images/bg2.webp');"></div>
                        <div class="ar-hero-slide" style="background-image: url('{{url('')}}/frontend_assets/images/bg3.webp');"></div>
                        <div class="ar-hero-slide" style="background-image: url('{{url('')}}/frontend_assets/images/bg4.webp');"></div>
                        </div>
                        <div class="ar-hero-text">Project by {{ $builder->name }}</div>
                    </div>
                <!-- banner slider -->
            </div>

            <div class="banner-wrapper">
                <div class="container">
                    <div class="content content-white text-center"> 
                        <x-search-bar />
                    </div>
                </div>
            </div>
        </div>
         


        <!-- Main div --> 
        <section>
             <div class="home-secC sec-pad gray-bg">
                     <div class="container">  
                            <div class="ar-dev-abt">
                               
                            <div class="upper_sec heading">
                        <div class="icon ar-devd-logo">
                            <img src="{{ asset('storage/app/public/' . $builder->logo) }}" alt="">
                        </div> 
                            </div>
                            <div class="count-wrap">
                                <div class="count-info-wrap">
                                    <div class="ar-devcount-info">
                                        <div class="upper_wrap"> 
                                            <h5><span class="count" data-count="{{ $builder->years_of_experience }}">{{ $builder->years_of_experience }}</span>+</h5>
                                        </div>
                                        <p>
                                        Years of Experience
                                        </p>
                                    </div>
                                </div>
                                <div class="count-info-wrap">
                                    <div class="ar-devcount-info">
                                        <div class="upper_wrap"> 
                                            <h5><span class="count" data-count="{{ $builder->total_projects }}">{{ $builder->total_projects }}</span>+</h5>
                                        </div>
                                        <p>
                                        Total Projects
                                        </p>
                                    </div>
                                </div>
                                <div class="count-info-wrap">
                                    <div class="ar-devcount-info">
                                        <div class="upper_wrap"> 
                                            <h5><span class="count" data-count="{{ $builder->total_cities }}">{{ $builder->total_cities }}</span>+</h5>
                                        </div>
                                        <p>
                                        Total Cities
                                        </p>
                                    </div>
                                </div> 
                            </div>
                                 

                                <div>
                                        <div class="ar-devd-cnt">
                                <p>{!! $builder->content !!}</p>
                            </div>
                                </div>
                                    <div class="btn_wrapper text-center">
                            <div class="btn btn-btn border-black" onclick="openModal(this)" data-title-first="Enquire" data-title-highlight="Now" style="cursor: pointer;">Enquire Now
                            </div>
                                </div>
                            </div>
                    </div>
             </div>
        </section> 
        <!-- Main div -->
 
        
        <!-- projects -->
        <section>
            <div class="home-secE sec-pad">
                <div class="container">
                    
                    <div class="prop_types_wrapper">
                        <div class="tab-nav-content prop_nav_content over_hidden">
                            <div class="tabs active" data-tab="new_launch" data-animate="fade-out">
                                
                                 @forelse ($builder->properties as $property)
                                <div class="prop_col">
                                    <a href="{{ url('property/' . $property->slug) }}"> <figure>
                                        <img src="{{ asset('storage/app/public/' . $property->main_image) }}" class="prop_img" alt="{{$property->heading}}">
                                        <a href="{{ url('property/' . $property->slug) }}" class="exp_pro">
                                            Explore projects <img src="{{url('')}}/frontend_assets/icon/top-right.svg" alt="">
                                        </a>
                                        <span class="stick">
                                            {{$property->property_status}}
                                        </span>
                                    </figure> </a>
                                    <figcaption>
                                        <h6>{{$property->heading}}</h6>
                                        <p class="ar-pt">By {{ optional($property->builder)->name ?? 'N/A' }}</p>
                                        <ul class="details">
                                            <li class="loc">
                                                <img class="arsvg ar-smooth-blink" src="{{url('')}}/frontend_assets/icon/mappin1.svg" alt="">
                                                <p>{{$property->location}}</p>
                                            </li>
                                            <li>
                                                <img class="svg" src="{{url('')}}/frontend_assets/icon/rupee.svg" alt="">
                                                <p>{{$property->price}}</p>
                                            </li>
                                            <li>
                                                <img class="svg" src="{{url('')}}/frontend_assets/icon/hotel.svg" alt="">
                                                <p>{{$property->configuration}}</p>
                                            </li>
                                        </ul>
                                    </figcaption>
                                </div>
                                @empty
                <p>No properties available for this Developer.</p>
            @endforelse
                                
                            </div>
                        </div>
                        <div class="btn_wrapper text-center" data-animate="fade-up">
                            <!--<div class="btn btn-btn border-black">Load More-->
                            <!--    <img src="{{url('')}}/frontend_assets/icon/right-arrow.svg" alt="" class="svg">-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
       <!-- projects -->

         <!-- faq --> 
         <section  class="sec-pad gray-bg">
            <div class="home-secF">
                <div class="container"> 
                    <div class="ar-faqs-card">
                             <div class="ar-faqs-header">
                           <h2 class="ar-heading">Frequently <span>Asked Questions</span></h2>
                    </div>
                    <div class="ar-faqs-body">
                        <div class="ar-faq-container">
                            <div class="ar-faq-accordion">
                                <div class="ar-faq-item">
                                        <input class="ar-faq-hidden" type="checkbox" id="ar-faq-q1">
                                <label class="ar-faq-question" for="ar-faq-q1">
                                    1. What are the amenities included in the project?
                                </label>
                                    
                                    <div class="ar-faq-answer">
                                        <p >
                                The project features a luxury clubhouse, rooftop infinity pool, fully equipped gym, yoga deck, indoor games room, co-working spaces, landscaped gardens, and a 24x7 concierge service.
                                </p>
                                    </div> 
                                </div>

                                <div class="ar-faq-item">
                                <input class="ar-faq-hidden" type="checkbox" id="ar-faq-q2">
                                <label class="ar-faq-question" for="ar-faq-q2">
                                    2. Is the property RERA registered?
                                </label>
                                <p class="ar-faq-answer">
                                Yes, this project is RERA registered under registration number HRERA-GGM-2024-00567, ensuring transparency and timely possession as per government norms.
                                </p>
                                </div>

                                <div class="ar-faq-item">
                                <input class="ar-faq-hidden" type="checkbox" id="ar-faq-q3">
                                <label class="ar-faq-question" for="ar-faq-q3">
                                    3. What is the payment plan and booking amount?
                                </label>
                                <p class="ar-faq-answer">
                                We offer flexible payment plans including CLP, PLP, and subvention schemes. The booking amount starts from ₹2 Lakhs, with milestone-based payments throughout the construction period.
                                </p>
                                </div>

                                <div class="ar-faq-item">
                                <input class="ar-faq-hidden" type="checkbox" id="ar-faq-q4">
                                <label class="ar-faq-question" for="ar-faq-q4">
                                    4. How far is the project from major landmarks?
                                </label>
                                <p class="ar-faq-answer">
                                The project is just 10 minutes from the airport, 5 minutes from NH-48, and walking distance to top international schools, hospitals, and the nearest metro station.
                                </p>
                                </div>

                                <div class="ar-faq-item">
                                <input class="ar-faq-hidden" type="checkbox" id="ar-faq-q5">
                                <label class="ar-faq-question" for="ar-faq-q5">
                                5. Are there any rental or resale options available?
                                </label>
                                <p class="ar-faq-answer">
                                Yes, our dedicated resale and rental team helps buyers lease or resell units with ease. The expected rental yield is around 4.5% annually, based on current market trends.
                                </p>
                                </div> 
                    </div>
                    </div> 
                    </div>
                    </div>
                   
                    
 

                </div>
            </div>
        </section> 
         <!-- faq -->

        <!-- testimonials -->
       <x-testimonial-section :testimonials="$testimonials" :global-settings="$global_settings" />
        <!-- testimonials -->



@push('scripts')

@endpush

@stop
