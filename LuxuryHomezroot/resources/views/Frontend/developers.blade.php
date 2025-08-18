@extends('layouts.master') 
@section('title','Developers | Luxury Homez') 
@section('description','Luxury Homez Description') 
@section('content')
@push('styles')
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

<!-- tab -->
<section>
    <div class="sec-pad ar-dev-pd">
        <div class="container">
            <div class="tab__bar">
                <div class="tab__navigation">
                    <span class="left__btn">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="300" height="300" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs">
                            <g width="100%" height="100%" transform="matrix(-1,0,0,1,24.17136001586914,0)">
                                <path d="M7.412,24,6,22.588l9.881-9.881a1,1,0,0,0,0-1.414L6.017,1.431,7.431.017l9.862,9.862a3,3,0,0,1,0,4.242Z" fill-opacity="1" data-original-color="#000000ff" stroke="none" stroke-opacity="1" />
                            </g>
                        </svg>
                    </span>
                    <span class="right__btn">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512">
                            <path d="M7.412,24,6,22.588l9.881-9.881a1,1,0,0,0,0-1.414L6.017,1.431,7.431.017l9.862,9.862a3,3,0,0,1,0,4.242Z" />
                        </svg>
                    </span>
                    <ul class="tab__menu">
                        <li class="tab__btn active" data-tab="all">All</li>
                        @foreach($cities as $city)
                        <li class="tab__btn" data-tab="{{ Str::slug($city->city_name) }}">{{ $city->city_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab__content">
                <div class="tab active" data-tab="all">
                    <div class="row">
                        @foreach($builders->flatten() as $builder)
                        <a target="_blank" href="{{ url('developer/' . $builder->slug) }}" class="ar-tab-hoz-style">
                            <img src="{{ asset('storage/app/public/' . $builder->logo) }}" alt="{{ $builder->name }}" class="img-fluid" width="150" height="80" />
                        </a>
                        @endforeach
                    </div>
                </div>

                @foreach($builders as $cityName => $cityBuilders)
                <div class="tab" data-tab="{{ Str::slug($cityName) }}">
                    <div class="row">
                        @foreach($cityBuilders as $builder)
                        <a target="_blank" href="{{ url('developer/' . $builder->slug) }}" class="ar-tab-hoz-style">
                            <img src="{{ asset('storage/app/public/' . $builder->logo) }}" alt="{{ $builder->name }}" class="img-fluid" width="150" height="80" />
                        </a>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- tab -->


  <!-- testimonials -->
<x-testimonial-section 
    :testimonials="$testimonials" 
    :global-settings="$global_settings" 
    gray-bg="true" 
/>
 <!-- testimonials -->



@push('scripts')
<!--main tab js -->
<script>
    //js for tab in dev
    $(".developer-div .tab_content").hide();
    $(".developer-div .tab_content:first").show();
    $(".developer-div ul.tabs li").click(function () {
        $(".developer-div .tab_content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();
        $(".developer-div ul.tabs li").removeClass("active");
        $(this).addClass("active");
        $(".developer-div .tab_drawer_heading").removeClass("d_active");
        $(".developer-div .tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
    });
    if (window.matchMedia("(max-width: 991px)").matches) {
        $(".tab_container .tab_content:first").hide();
        $(".developer-div .tab_drawer_heading").removeClass("d_active");
    }

    $(".developer-div .tab_drawer_heading").click(function () {
        var d_activeTab = $(this).attr("rel");
        var content = $("#" + d_activeTab);
        if ($(this).hasClass("d_active")) {
            content.slideUp();
            $(this).removeClass("d_active");
            $(".developer-div ul.tabs li[rel^='" + d_activeTab + "']").removeClass("active");
        } else {
            $(".developer-div .tab_content").slideUp();
            $(".developer-div .tab_drawer_heading").removeClass("d_active");
            $(".developer-div ul.tabs li").removeClass("active");
            content.slideDown();
            $(this).addClass("d_active");
            $(".developer-div ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
        }
    });
    $(".developer-div ul.tabs li").last().addClass("tab_last");
    //js for tab in dev
</script>
<!--main tab js -->

<!-- sample tab js -->
<script>
    // Javascript for tab navigation horizontal scroll buttons

    const btnLeft = document.querySelector(".left__btn");
    const btnRight = document.querySelector(".right__btn");
    const tabMenu = document.querySelector(".tab__menu");

    const iconVisibility = () => {
        let scrollLeftValue = Math.ceil(tabMenu.scrollLeft);
        console.log("1.", scrollLeftValue);

        let scrollableWidth = tabMenu.scrollWidth - tabMenu.clientWidth;
        console.log("2.", scrollableWidth);

        btnLeft.style.display = scrollLeftValue > 0 ? "block" : "none";
        btnRight.style.display = scrollableWidth > scrollLeftValue ? "block" : "none";
    };

    btnRight.addEventListener("click", () => {
        tabMenu.scrollLeft += 300;
        //iconVisibility();
        setTimeout(() => iconVisibility(), 50);
    });

    btnLeft.addEventListener("click", () => {
        tabMenu.scrollLeft -= 300;
        //iconVisibility();
        setTimeout(() => iconVisibility(), 50);
    });

    window.onload = function () {
        btnRight.style.display = tabMenu.scrollWidth > tabMenu.clientWidth || tabMenu.scrollWidth >= window.innerWidth ? "block" : "none";
        btnLeft.style.display = tabMenu.scrollWidth >= window.innerWidth ? "" : "none";
    };

    window.onresize = function () {
        btnRight.style.display = tabMenu.scrollWidth > tabMenu.clientWidth || tabMenu.scrollWidth >= window.innerWidth ? "block" : "none";
        btnLeft.style.display = tabMenu.scrollWidth >= window.innerWidth ? "" : "none";

        let scrollLeftValue = Math.round(tabMenu.scrollLeft);
        btnLeft.style.display = scrollLeftValue > 0 ? "block" : "none";
    };

    // Javascript to make the tab navigation draggable
    let activeDrag = false;

    tabMenu.addEventListener("mousemove", (drag) => {
        if (!activeDrag) return;
        tabMenu.scrollLeft -= drag.movementX;
        iconVisibility();

        tabMenu.classList.add("dragging");
    });

    document.addEventListener("mouseup", () => {
        activeDrag = false;

        tabMenu.classList.remove("dragging");
    });

    tabMenu.addEventListener("mousedown", () => {
        activeDrag = true;
    });

    // Javascript to view tab contents on click tab buttons
    const tabs = document.querySelectorAll(".tab");
    const tabBtns = document.querySelectorAll(".tab__btn");

    const tab_Nav = function (tabBtnClick) {
        tabBtns.forEach((tabBtn) => {
            tabBtn.classList.remove("active");
        });

        tabs.forEach((tab) => {
            tab.classList.remove("active");
        });

        tabBtns[tabBtnClick].classList.add("active");
        tabs[tabBtnClick].classList.add("active");
    };

    tabBtns.forEach((tabBtn, i) => {
        tabBtn.addEventListener("click", () => {
            tab_Nav(i);
        });
    });
</script>
<!-- sample tab js -->
@endpush 
@stop
