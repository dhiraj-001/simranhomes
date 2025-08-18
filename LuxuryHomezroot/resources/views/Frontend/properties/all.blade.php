@extends('layouts.master') @section('title','Properties | Luxury Homez') @section('description','') @section('content') @push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/developers.css" />
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
    @if(request()->is('city/*') && isset($city))
        <span>P</span>roperties in <strong>{{ $city->city_name }}</strong>
    @elseif(request()->is('search-properties'))
        <span>S</span>earch Results
        @php
            $city = request('city');
            $developer = request('developer');
        @endphp
        @if($city)
            <small>in <strong>{{ ucfirst($city) }}</strong></small>
        @endif
        @if($developer)
            <small>for <strong>{{ strtoupper($developer) }}</strong></small>
        @endif
    @else
        <span>A</span>ll Properties
    @endif
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
                    @if(request()->is('city/*') && isset($city))
                        <span>P</span>roperties in <strong>{{ $city->city_name }}</strong>
                    @elseif(request()->is('search-properties'))
                        <span>S</span>earch Results
                        @php
                            $city = request('city');
                            $developer = request('developer');
                        @endphp
                        @if($city)
                            <small>in <strong>{{ ucfirst($city) }}</strong></small>
                        @endif
                        @if($developer)
                            <small>for <strong>{{ strtoupper($developer) }}</strong></small>
                        @endif
                    @else
                        <span>A</span>ll Properties
                    @endif
                </h1>

                    <p data-animate="fade-up" data-animate-delay="300" class="kmr-animate">{!! $banner->description !!}</p>
                    <x-search-bar />
                </div>
            </div>
        </div>
    @endif
</div>

<!-- filteration -->
<section>
    <div class="home-secE ar-sec-pad">
        <div class="container">
            <div class="ar-filterbox ar-filterbox3">
                <form id="ar-search-form" name="ar-search-form" method="post" novalidate="novalidate">
                    <input type="hidden" name="_token" />

                    <select class="ar-form-select" id="ar-location" name="location">
                        <option value=" " selected>Location</option>
                        @foreach ($cities as $id => $city_name)
                        <option value="{{ $id }}">{{ $city_name }}</option>
                        @endforeach
                    </select>

                    <select class="ar-form-select" id="ar-category" name="category">
                        <option value="" selected>Category</option>
                        <option value=" ">Luxury Apartments</option>
                        <option value=" ">Gated Floors</option>
                        <option value=" ">Plots</option>
                    </select>

                    <select class="ar-form-select" id="ar-property-type" name="property-type">
                        <option value="" selected>Property Type</option>
                        <option value="1">New Launch</option>
                        <option value="2">Upcoming Launch</option>
                        <option value="2">Under Construction</option>
                        <option value="3">Ready to Move</option>
                        <option value="4">Resale</option>
                    </select>

                    <select class="ar-form-select ar-lastinput" id="ar-bedroom" name="bedroom">
                        <option value="" selected>Bedroom</option>
                        <option value="1">2 BHK</option>
                        <option value="2">3 BHK</option>
                        <option value="3">4 BHK</option>
                        <option value="4">5 BHK</option>
                        <option value="5">6 BHK</option>
                    </select>

                    <select class="ar-form-select ar-lastinput" id="ar-bedroom" name="bedroom">
                        <option value="" selected>Select Budget</option>
                        <option value="1">Under ₹5 Cr.</option>
                        <option value="2">₹5 cr to ₹7 Cr.</option>
                        <option value="3">₹7 Cr. to ₹10 Cr.</option>
                        <option value="4">₹10 Cr. to ₹15 Cr.</option>
                        <option value="5">Above ₹15 Cr.</option>
                    </select>

                    <input type="submit" value="Search" class="ar-btn-style-1" />
                </form>
            </div>
        </div>
    </div>
</section>
<!-- filteration -->

<section>
    <div class="home-secE sec-pad ar-propt-pdt">
        <div class="container">
            <div class="prop_types_wrapper">
                <div class="tab-nav-content prop_nav_content over_hidden">
                    <div class="tabs active" data-tab="new_launch" data-animate="fade-out">
                        @if($properties->count() > 0)
                        @foreach($properties as $item)
                        <div class="prop_col">
                            <a href="{{ url('property/' . $item->slug) }}"> <figure>
                                <img src="{{ asset('storage/app/public/' . $item->main_image) }}" class="prop_img" alt="" />
                                <a href="{{ url('property/' . $item->slug) }}" class="exp_pro"> Explore projects <img src="{{url('')}}/frontend_assets/icon/top-right.svg" alt="" /> </a>
                                <span class="stick">
                                    {{$item->property_status}}
                                </span>
                            </figure></a>
                            <figcaption>
                                <a href="{{ url('property/' . $item->slug) }}" target="_blank" rel="noopener noreferrer">
                                    <h6>{{$item->heading}}</h6>
                                </a>
                                <p class="ar-pt">
                                    By {{ optional($item->builder)->name ?? 'N/A' }}
                                </p>
                                <ul class="details">
                                    <li class="loc">
                                        <img class="arsvg ar-smooth-blink" src="{{url('')}}/frontend_assets/icon/mappin1.svg" alt="" />
                                        <p>{{$item->location}}</p>
                                    </li>
                                    <li>
                                        <img class="svg" src="{{url('')}}/frontend_assets/icon/rupee.svg" alt="" />
                                        <p>{{$item->price}}</p>
                                    </li>
                                    <li>
                                        <img class="svg" src="{{url('')}}/frontend_assets/icon/hotel.svg" alt="" />
                                        <p>{{$item->configuration}}</p>
                                    </li>
                                </ul>
                            </figcaption>
                        </div>
                        @endforeach
                       @else
    <div class="d-flex justify-content-center align-items-center" style="min-height: 300px; text-align: center;">
        <div>
            @if(request()->is('city/*') && isset($city))
                <h4>No properties found in {{ $city->city_name }}.</h4>
                <p>We’ll be adding new properties soon. Please check back later.</p>
            @elseif(request()->is('search-properties'))
                <h4>No properties match your search.</h4>
                <p>Try refining your filters or selecting a different city/developer.</p>
            @else
                <h4>No properties found.</h4>
                <p>Please try a different category or check back soon.</p>
            @endif
        </div>
    </div>
@endif

                    </div>
                </div>
                <!--<div class="btn_wrapper text-center" data-animate="fade-up">-->
                <!--    <div class="btn btn-btn border-black">Load More-->
                <!--        <img src="{{url('')}}/frontend_assets/icon/right-arrow.svg" alt="" class="svg">-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</section>

<x-testimonial-section :testimonials="$testimonials" :global-settings="$global_settings" />

@push('scripts') @endpush @stop
