@extends('layouts.master') 
@section('title', $property-> heading) 
@section('keywords', $property-> meta_keywords) 
@section('description',$property-> meta_description) 
@section('content') 
@push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/allprojects.css">
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/property.css">
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/fancybox.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
<script type="text/javascript" src="{{url('')}}/frontend_assets/js/arya.js"></script>
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aresponsive.css" />
@endpush

<!-- banner -->
<div class="banner home-banner" id="home">
    <div class="ar-propt-bg">
        <!-- banner slider -->
        <div class="ar-propt-section">
            <div class="ar-propt-slider" id="ar-propt-slider">
                <div class="ar-propt-slide" style="background-image: url('{{ asset('storage/app/public/' . $property->banner_image) }}');"></div>
                <div class="ar-propt-slide" style="background-image: url('{{ asset('storage/app/public/' . $property->banner_image) }}');"></div>
                <div class="ar-propt-slide" style="background-image: url('{{ asset('storage/app/public/' . $property->banner_image) }}');"></div>
                <div class="ar-propt-slide" style="background-image: url('{{ asset('storage/app/public/' . $property->banner_image) }}');"></div>
            </div>
            <div class="btn border-black ar-propt-btn-brochure" onclick="openModal(this)" data-title-first="Download" data-title-highlight="Brochure">
                <img src="{{url('')}}/frontend_assets/icon/downloadicon.svg" alt="" />
                Download Brochure
            </div>
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
<!-- bannr -->

<!-- floating section properties specification -->
<section class="ar-propt-top-info" id="home">
    <div class="ar-propt-container-xl">
        <div class="ar-propt-top-info__inner">
            <figure>
                @if($property->builder && $property->builder->logo)
                    <img src="{{ asset('storage/app/public/' . $property->builder->logo) }}" width="150" height="100" alt="{{ $property->builder->name }}" />
                
                @endif
                
               </figure>
            <div class="lists">
                <div class="lists__items ar-prop-pricing"><span>Starting Price</span>{{ $property->price}}</div>
                <div class="lists__items ar-prop-status"><span>Project Status</span> {{ $property->property_status }}</div>
                <div class="lists__items ar-prop-location"><span>Location</span> {{ $property->location }}</div>
                <div class="lists__items ar-prop-config"><span>Configuration</span> {{ $property->configuration }}</div>
            </div>
        </div>
    </div>
</section>
<!-- floating section properties specification -->

<!--Mobile floating section properties specification -->
<section class="ar-propt-spec-mob-section">
    <div class="ar-propt-spec-mob-div">
        <ul class="gray-bg">
            <li>
                <img src="{{url('')}}/frontend_assets/icon/icon1.webp" alt="" />
                <span>Type:</span> {{ $property->property_type}}
            </li>
            <li>
                <img src="{{url('')}}/frontend_assets/icon/icon2.webp" alt="" />
                <span>Location:</span> {{ $property->location }}
            </li>
            <li>
                <img src="{{url('')}}/frontend_assets/icon/icon3.webp" alt="" />
                <span>Price:</span> {{ $property->price }}
            </li>
            <li>
                <img src="{{url('')}}/frontend_assets/icon/icon4.webp" alt="" />
                <span>size:</span> {{ $property->unit_size }}
            </li>
            <li>
                <img src="{{url('')}}/frontend_assets/icon/icon5.webp" alt="" />
                <span>Configuration:</span> {{ $property->configuration }}
            </li>
            <li>
                <img src="{{url('')}}/frontend_assets/icon/icon6.webp" alt="" />
                <span>Status:</span> {{ $property->property_status }}
            </li>
            <li>
                <img src="{{url('')}}/frontend_assets/icon/icon7.png" alt="" />
                <span>RERA No.:</span> {{ $property->property_rera }}  
            </li>
        </ul>
    </div>
</section>

<!-- about us -->
@php
    $content = strip_tags($property->about_content); // clean HTML
    $words = explode(' ', $content);
    $firstPart = implode(' ', array_slice($words, 0, 200));
    $remainingPart = implode(' ', array_slice($words, 200));
@endphp

<!-- SECTION 1: 300 words + image -->
<section class="ar-two-column-section ar-prop-pd" id="about-us">
    <div class="ar-content-wrapper">
        <div class="ar-left-col ar-propt-pd0">
            <p class="ar-subtitle">About Us</p>
            <h2 class="ar-heading">{{ $property->about_heading }}</h2>
            <p>{!! $firstPart !!}</p>

            @if(!empty($remainingPart))
                <div class="ar-read-func-btn-wrapper">
                    <button class="btn border-black ar-read-func-btna" onclick="showMore()">Read More</button>
                </div>
            @endif
        </div>
        <div class="ar-right-col">
            <div class="ar-image-wrapper">
               
                <img src="{{ asset('storage/app/public/' . $property->about_image) }}" alt="{{ $property->about_heading }}" />
            </div>
        </div>
    </div>
</section>

<!-- SECTION 2: Hidden Remaining Content -->
@if(!empty($remainingPart))
<section class="ar-two-column-section ar-prop-pd" id="readMoreContent" style="display: none;">
    <div class="ar-content-wrapper">
        <div class="ar-left-col ar-propt-pd0" style="width: 100%;">
            <p>{!! $remainingPart !!}</p>
            <div class="ar-read-func-btn-wrapper">
                <button class="btn border-black ar-read-func-btna" onclick="hideMore()">Read Less</button>
            </div>
        </div>
    </div>
</section>
@endif

<!-- SCRIPT -->
<script>
    function showMore() {
        document.getElementById('readMoreContent').style.display = 'block';
        document.querySelector('.ar-read-func-btna').style.display = 'none';
        document.getElementById('readMoreContent').scrollIntoView({ behavior: 'smooth' });
    }

    function hideMore() {
        document.getElementById('readMoreContent').style.display = 'none';
        document.querySelector('.ar-read-func-btna').style.display = 'inline-block';
        document.getElementById('about-us').scrollIntoView({ behavior: 'smooth' });
    }
</script>



<!-- about us -->

<!-- Highlights -->
<section class="ar-two-column-section ar-prop-pd gray-bg" id="highlights">
    <div class="ar-content-wrapper ar-highlight-wrapper">
        <div class="ar-right-col ar-img-high">
            <div class="ar-image-wrapper">
               
                <img src="{{ asset('storage/app/public/' . $property->highlights_img) }}" alt="{{ $property->highlights_heading }}" />
            </div>
        </div>

        <div class="ar-left-col">
            <h2 class="ar-heading ar-highlights-h"> {{ $property->highlights_heading }}</span></h2>
            <p class="ar-description">
               {!! $property->highlights_content !!}
            </p>
        </div>
    </div>
</section>
<!-- highlights -->

<!-- amenities -->
<section class="ar-prop-pd" id="amenities">
    <div class="home-secF">
        <div class="container">
            <h2 class="ar-heading">{{ $property-> heading }} <span>Amenities</span></h2>
            <p class="ar-description">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
            </p>

@php
    $totalAmenities = $property->amenities->count();
@endphp

<div class="global_slider_sec">
    @if ($totalAmenities <= 5)
        <!-- Single Slider for 5 or less amenities -->
        <div class="amntop_slider swiper">
            <div class="swiper-wrapper">
                @foreach ($property->amenities as $item)
                <div class="swiper-slide">
                    <div class="ar-card ar-amn-top-box">
                        <img src="{{ asset('storage/app/public/' . $item->image) }}" alt="{{ $item->title }}" title="{{ $item->title }}"  />
                        <p>{{ $item->title }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        @php
            $chunks = $property->amenities->chunk(ceil($totalAmenities / 2));
        @endphp

        <!-- Top Slider -->
        <div class="amntop_slider swiper">
            <div class="swiper-wrapper">
                @foreach ($chunks[0] as $item)
                <div class="swiper-slide">
                    <div class="ar-card ar-amn-top-box">
                        <img src="{{ asset('storage/app/public/' . $item->image) }}" alt="{{ $item->title }}" title="{{ $item->title }}"  />
                        <p>{{ $item->title }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Bottom Slider -->
        <div class="amnbottom_slider swiper amnbottom_slider-pd">
            <div class="swiper-wrapper">
                @foreach ($chunks[1] ?? [] as $item)
                <div class="swiper-slide">
                    <div class="ar-card ar-amn-top-box">
                        <img src="{{ asset('storage/app/public/' . $item->image) }}" alt="{{ $item->title }}" title="{{ $item->title }}"  />
                        <p>{{ $item->title }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
</div>


            
            
            
        </div>
    </div>
</section>
<!-- amenities -->

<!-- connect for best price -->
<section>
    <div class="banner promo ar-z-index">
        <div class="bg">
            <div class="banner-wrapper">
                <div class="content over_hidden">
                    <div class="text" data-animate="fade-right">
                        <h5>Connect for best Price</h5>
                        <p>Looking for your perfect luxury space? Connect with our experts and explore homes tailored to your aspirations.</p>
                    </div>
                    <a href="javascript:;" class="btn btn-btn" data-animate="fade-left" onclick="openModal(this)" data-title-first="Get in" data-title-highlight="Touch">Get in touch</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- connect for best price -->

<!-- pricing -->
<section class="ar-prop-pd" id="price">
    <div class="home-secF">
        <div class="container">
            <h2 class="ar-heading">{{ $property-> heading }} <span>Price List</span></h2>
            <p class="ar-description">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
            </p>
            <br />

            <!-- price cards -->
            <div class="ar-price-section">
                @foreach($property->prices as $price)
                <div class="ar-price-card">
                    <div class="ar-price-inner">
                        <div class="ar-rc-one">Unit Type <span>{{ $price->unit_type }}</span></div>
                        <div class="ar-rc-one">Unit Sizes <span>{{ $price->unit_size }}</span></div>
                        <div class="ar-rc-one ar-price">
                            Price
                            <span>
                                <img src="{{ url('frontend_assets/icon/ruppe.svg') }}" class="ar-rupee-img" alt="Price" />
                                {{ $price->price }}
                            </span>
                        </div>
                        <button type="button" class="btn border-black ar-read-more-btn" onclick="openModal(this)" data-title-first="Download" data-title-highlight="Price List">Download Price List</button>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- price cards -->
        </div>
    </div>
</section>
<!-- pricing -->

@if ($property->floorPlans->count())
<section class="ar-flr-section sec-pad" id="floor-plans">
    <div class="container ar-flr-wrapper">
        <!-- Left side: Tabs + Button -->
        <div class="ar-flr-left">
            <div class="ar-flr-left-top">
                <h2 class="ar-heading">{{ $property->heading }} <span>Floor Plans</span></h2>
                <p>{{ $property->short_description ?? 'Explore the available floor plans below.' }}</p>
            </div>

            <div class="ar-flr-left-bottom">
                <div class="ar-flr-tabs">
                    @foreach ($property->floorPlans as $index => $plan)
                        <button class="ar-flr-tab {{ $index == 0 ? 'ar-flr-active' : '' }}"
                            onclick="showTab('tab{{ $index }}', event)">
                            {{ $plan->type }}
                        </button>
                    @endforeach
                </div>

                @foreach ($property->floorPlans as $index => $plan)
                    <div class="ar-flr-btn-wrap {{ $index == 0 ? 'ar-flr-active' : '' }}" id="btn-tab{{ $index }}">
                        <button class="btn border-black ar-flr-download-btn"
                            onclick="openModal(this)"
                            data-title-first="Download"
                            data-title-highlight="Floor Plan"
                            data-animate="fade-up">
                            <img src="{{ asset('frontend_assets/icon/pdf-icon.jpg') }}" class="ar-flr-pdf" alt="">
                            File size: {{ $plan->file_size ?? 'N/A' }}
                            <img src="{{ asset('assets/icon/downloadicon.svg') }}" class="ar-flr-dwn" alt="">
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right side: Images -->
        <div class="ar-flr-right-panel">
            @foreach ($property->floorPlans as $index => $plan)
                <div class="ar-flr-image-wrap ar-flr-image-wrapper {{ $index == 0 ? 'ar-flr-active' : '' }}"
                    id="img-tab{{ $index }}">
                    <span class="ar-flr-patch">Artistic Image</span>
                    <img src="{{ asset('storage/app/public/' . $plan->image) }}" alt="{{ $plan->type }} Floor Plan">
                    <div class="ar-flr-overlay">
                        <button class="ar-flr-overlay-btn" onclick="openModal(this)"
                            data-title-first="Download"
                            data-title-highlight="Floor Plan">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" width="44" height="44">
                                <path d="M18.348,7.23c-1.311-3.151-4.395-5.23-7.848-5.23C5.813,2,2,5.813,2,10.5c0,.551,.053,1.097,.157,1.633-1.347,1.032-2.157,2.646-2.157,4.367,0,3.032,2.243,5.5,5,5.5h11.5c4.136,0,7.5-3.364,7.5-7.5,0-3.467-2.344-6.437-5.652-7.27Zm-4.934,10.184c-.39,.39-.902,.585-1.414,.585s-1.024-.195-1.414-.585l-3.293-3.293,1.414-1.414,2.293,2.293v-6h2v6l2.293-2.293,1.414,1.414-3.293,3.293Z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif



<!-- gallery standard-->
<section class="ar-prop-pd" id="gallery">
    <div class="home-secF">
        <div class="container">
            <h2 class="ar-heading">{{ $property->heading }} <span>Gallery Images</span></h2>
            <p class="ar-description">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
            </p>
            <br />

            <section class="ar-gall-section">
                <div class="ar-gall-container">
                    <div class="ar-gall-row">
                        <div class="ar-gall-col">
                            <div class="ar-gall-grid">
                                @foreach ($property->galleries as $index => $item)
                                    @php
                                        $picClass = 'ar-gall-pic' . ($index + 1);
                                        $imgHeightClass = ($index % 2 == 0) ? 'ar-gallery-imgs-height' : 'ar-gallery-imgl-height';
                                    @endphp
                                    <div class="{{ $picClass }} ar-gall-item {{ $imgHeightClass }}">
                                        <span class="ar-galry-patch">{{ $item->name ?? 'Gallery Image' }}</span>
                                        <img src="{{ asset('storage/app/public/' . $item->image) }}" alt="{{ $item->name }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</section>
<!-- gallery standard-->



@php
    $advantages = $property->locationAdvantages->groupBy('type');
@endphp
<!-- location -->
<section class="ar-prop-pd gray-bg" id="location">
    <div class="home-secF">
        <div class="container">
            <h2 class="ar-heading">Location <span>Advantage</span></h2>
            <p class="ar-description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
            <br />

            <section class="ar-loc-section">
                <!-- Tabs -->
                <div class="ar-loc-tabs">
                     @if (!empty($advantages['Education']) && count($advantages['Education']))
                    <div class="ar-loc-tab ar-loc-tab-active" onclick="switchTab('education', this)"><svg version="1.1" id="svg9" xml:space="preserve" width="22" height="22" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg"><defs id="defs13"><clipPath clipPathUnits="userSpaceOnUse" id="clipPath23"><path d="M 0,24 H 24 V 0 H 0 Z" id="path21"></path></clipPath></defs><g id="g15" transform="matrix(1.3333333,0,0,-1.3333333,0,32)"><g id="g17"><g id="g19" clip-path="url(#clipPath23)"><g id="g25" transform="translate(2.374,17.8677)"><path d="m 0,0 7.458,3.558 c 1.32,0.793 3.016,0.793 4.336,0 L 19.252,0 c 1.832,-1.101 1.832,-3.595 0,-4.695 l -7.458,-3.558 c -1.32,-0.793 -3.016,-0.793 -4.336,0 L 0,-4.695 c -1.832,1.1 -1.832,3.594 0,4.695 z" style="stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" id="path27"></path></g><g id="g29" transform="translate(5,11.6113)"><path d="M 0,0 V -5.227 C 0,-6.978 1.13,-8.542 2.807,-9.047 3.865,-9.366 5.249,-9.611 7,-9.611 c 1.751,0 3.135,0.245 4.193,0.564 C 12.87,-8.542 14,-6.978 14,-5.227 V 0" style="stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" id="path31"></path></g><g id="g33" transform="translate(23,16)"><path d="M 0,0 V -12" style="stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" id="path35"></path></g></g></g></g></svg> Education</div>
                    @endif
                    @if (!empty($advantages['Transport']) && count($advantages['Transport']))
                    <div class="ar-loc-tab" onclick="switchTab('transport', this)"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" width="22" height="22" viewBox="0 0 24 24"><path d="M24,19.232c0-1.207-.206-2.395-.612-3.531l-1.443-4.042c-.354-.993-1.3-1.659-2.354-1.659h-6.182c-1.054,0-1.999,.667-2.354,1.659l-1.443,4.041c-.406,1.137-.612,2.325-.612,3.532v2.768h2v2h3v-2h5v2h3v-2h2v-2.768Zm-12.003-7.237c.213-.595,.78-.995,1.412-.995h6.182c.632,0,1.199,.4,1.412,.995l1.43,4.005H10.567l1.43-4.005Zm1.003,11.005h-1v-1h1v1Zm8,0h-1v-1h1v1Zm2-2H10v-1.768c0-.755,.089-1.502,.266-2.232h2.734v1.5c0,.276,.224,.5,.5,.5s.5-.224,.5-.5v-1.5h5v1.5c0,.276,.224,.5,.5,.5s.5-.224,.5-.5v-1.5h2.734c.177,.729,.266,1.477,.266,2.232v1.768ZM13.5,1H2.5c-.827,0-1.5,.673-1.5,1.5V24H0V2.5C0,1.122,1.121,0,2.5,0H13.5c1.379,0,2.5,1.122,2.5,2.5v5.5h-1V2.5c0-.827-.673-1.5-1.5-1.5ZM4,7h3v-3h-3v3Zm1-2h1v1h-1v-1Zm-1,7h3v-3h-3v3Zm1-2h1v1h-1v-1Zm-1,7h3v-3h-3v3Zm1-2h1v1h-1v-1Zm-1,7h3v-3h-3v3Zm1-2h1v1h-1v-1ZM12,7v-3h-3v3h3Zm-2-2h1v1h-1v-1Z"></path></svg> Transport</div>
                    @endif
                    @if (!empty($advantages['Hospital']) && count($advantages['Hospital']))
                    <div class="ar-loc-tab" onclick="switchTab('hospital', this)"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22"><path d="m21.5,6h-1.5v-3.5c0-1.378-1.121-2.5-2.5-2.5H6.5c-1.379,0-2.5,1.122-2.5,2.5v3.5h-1.5c-1.379,0-2.5,1.122-2.5,2.5v15.5h24v-15.5c0-1.378-1.121-2.5-2.5-2.5ZM1,23v-14.5c0-.827.673-1.5,1.5-1.5h1.5v16H1Zm18,0H5V2.5c0-.827.673-1.5,1.5-1.5h11c.827,0,1.5.673,1.5,1.5v20.5Zm4,0h-3V7h1.5c.827,0,1.5.673,1.5,1.5v14.5Zm-15-9h3v1h-3v-1Zm5,0h3v1h-3v-1Zm-5,4h3v1h-3v-1Zm5,0h3v1h-3v-1Zm-.5-10.5v2.5h-1v-2.5h-2.5v-1h2.5v-2.5h1v2.5h2.5v1h-2.5Z"></path></svg> Hospital</div>
                     @endif
                      @if (!empty($advantages['Connectivity']) && count($advantages['Connectivity']))
                    <div class="ar-loc-tab" onclick="switchTab('connectivity', this)"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22">
  <path d="M20,0c-2.206,0-4,1.794-4,4,0,.241,.03,.475,.071,.704L7.63,7.342c-.632-1.378-2.017-2.342-3.63-2.342C1.794,5,0,6.794,0,9s1.794,4,4,4c.985,0,1.876-.371,2.573-.963l6.17,5.656c-.464,.653-.743,1.446-.743,2.307,0,2.206,1.794,4,4,4s4-1.794,4-4c0-1.695-1.063-3.138-2.555-3.719l2.082-8.328c.157,.019,.311,.048,.472,.048,2.206,0,4-1.794,4-4S22.206,0,20,0ZM4,12c-1.654,0-3-1.346-3-3s1.346-3,3-3,3,1.346,3,3-1.346,3-3,3Zm15,8c0,1.654-1.346,3-3,3s-3-1.346-3-3,1.346-3,3-3,3,1.346,3,3Zm-2.528-3.952c-.157-.019-.311-.048-.472-.048-.985,0-1.876,.371-2.573,.963l-6.17-5.657c.464-.653,.743-1.446,.743-2.307,0-.241-.03-.475-.071-.704l8.442-2.638c.432,.941,1.215,1.683,2.184,2.061l-2.082,8.328Zm3.528-9.048c-1.654,0-3-1.346-3-3s1.346-3,3-3,3,1.346,3,3-1.346,3-3,3Z"></path>
</svg> Connectivity</div>
@endif
                </div>

                <!-- Education Tab -->
                <div class="ar-loc-tab-content ar-loc-tab-content-active" id="education">
                    <div class="ar-loc-card-list">
                        @foreach ($advantages['Education'] ?? [] as $item)
                            <div class="ar-loc-card">
                                <span class="ar-loc-icon">
                                   <svg version="1.1" id="svg9" xml:space="preserve" width="22" height="22" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg"><defs id="defs13"><clipPath clipPathUnits="userSpaceOnUse" id="clipPath23"><path d="M 0,24 H 24 V 0 H 0 Z" id="path21"></path></clipPath></defs><g id="g15" transform="matrix(1.3333333,0,0,-1.3333333,0,32)"><g id="g17"><g id="g19" clip-path="url(#clipPath23)"><g id="g25" transform="translate(2.374,17.8677)"><path d="m 0,0 7.458,3.558 c 1.32,0.793 3.016,0.793 4.336,0 L 19.252,0 c 1.832,-1.101 1.832,-3.595 0,-4.695 l -7.458,-3.558 c -1.32,-0.793 -3.016,-0.793 -4.336,0 L 0,-4.695 c -1.832,1.1 -1.832,3.594 0,4.695 z" style="stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" id="path27"></path></g><g id="g29" transform="translate(5,11.6113)"><path d="M 0,0 V -5.227 C 0,-6.978 1.13,-8.542 2.807,-9.047 3.865,-9.366 5.249,-9.611 7,-9.611 c 1.751,0 3.135,0.245 4.193,0.564 C 12.87,-8.542 14,-6.978 14,-5.227 V 0" style="stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" id="path31"></path></g><g id="g33" transform="translate(23,16)"><path d="M 0,0 V -12" style="stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" id="path35"></path></g></g></g></g></svg>
                                </span>
                                <p>{{ $item->name }} - {{ $item->distance }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Transport Tab -->
                <div class="ar-loc-tab-content" id="transport">
                    <div class="ar-loc-card-list">
                        @foreach ($advantages['Transport'] ?? [] as $item)
                            <div class="ar-loc-card">
                                <span class="ar-loc-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" width="22" height="22" viewBox="0 0 24 24"><path d="M24,19.232c0-1.207-.206-2.395-.612-3.531l-1.443-4.042c-.354-.993-1.3-1.659-2.354-1.659h-6.182c-1.054,0-1.999,.667-2.354,1.659l-1.443,4.041c-.406,1.137-.612,2.325-.612,3.532v2.768h2v2h3v-2h5v2h3v-2h2v-2.768Zm-12.003-7.237c.213-.595,.78-.995,1.412-.995h6.182c.632,0,1.199,.4,1.412,.995l1.43,4.005H10.567l1.43-4.005Zm1.003,11.005h-1v-1h1v1Zm8,0h-1v-1h1v1Zm2-2H10v-1.768c0-.755,.089-1.502,.266-2.232h2.734v1.5c0,.276,.224,.5,.5,.5s.5-.224,.5-.5v-1.5h5v1.5c0,.276,.224,.5,.5,.5s.5-.224,.5-.5v-1.5h2.734c.177,.729,.266,1.477,.266,2.232v1.768ZM13.5,1H2.5c-.827,0-1.5,.673-1.5,1.5V24H0V2.5C0,1.122,1.121,0,2.5,0H13.5c1.379,0,2.5,1.122,2.5,2.5v5.5h-1V2.5c0-.827-.673-1.5-1.5-1.5ZM4,7h3v-3h-3v3Zm1-2h1v1h-1v-1Zm-1,7h3v-3h-3v3Zm1-2h1v1h-1v-1Zm-1,7h3v-3h-3v3Zm1-2h1v1h-1v-1Zm-1,7h3v-3h-3v3Zm1-2h1v1h-1v-1ZM12,7v-3h-3v3h3Zm-2-2h1v1h-1v-1Z"></path></svg>
                                </span>
                                <p>{{ $item->name }} - {{ $item->distance }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Hospital Tab -->
                <div class="ar-loc-tab-content" id="hospital">
                    <div class="ar-loc-card-list">
                        @foreach ($advantages['Hospital'] ?? [] as $item)
                            <div class="ar-loc-card">
                                <span class="ar-loc-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22"><path d="m21.5,6h-1.5v-3.5c0-1.378-1.121-2.5-2.5-2.5H6.5c-1.379,0-2.5,1.122-2.5,2.5v3.5h-1.5c-1.379,0-2.5,1.122-2.5,2.5v15.5h24v-15.5c0-1.378-1.121-2.5-2.5-2.5ZM1,23v-14.5c0-.827.673-1.5,1.5-1.5h1.5v16H1Zm18,0H5V2.5c0-.827.673-1.5,1.5-1.5h11c.827,0,1.5.673,1.5,1.5v20.5Zm4,0h-3V7h1.5c.827,0,1.5.673,1.5,1.5v14.5Zm-15-9h3v1h-3v-1Zm5,0h3v1h-3v-1Zm-5,4h3v1h-3v-1Zm5,0h3v1h-3v-1Zm-.5-10.5v2.5h-1v-2.5h-2.5v-1h2.5v-2.5h1v2.5h2.5v1h-2.5Z"></path></svg>
                                </span>
                                <p>{{ $item->name }} - {{ $item->distance }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Connectivity Tab -->
                <div class="ar-loc-tab-content" id="connectivity">
                    <div class="ar-loc-card-list">
                        @foreach ($advantages['Connectivity'] ?? [] as $item)
                            <div class="ar-loc-card">
                                <span class="ar-loc-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22">
  <path d="M20,0c-2.206,0-4,1.794-4,4,0,.241,.03,.475,.071,.704L7.63,7.342c-.632-1.378-2.017-2.342-3.63-2.342C1.794,5,0,6.794,0,9s1.794,4,4,4c.985,0,1.876-.371,2.573-.963l6.17,5.656c-.464,.653-.743,1.446-.743,2.307,0,2.206,1.794,4,4,4s4-1.794,4-4c0-1.695-1.063-3.138-2.555-3.719l2.082-8.328c.157,.019,.311,.048,.472,.048,2.206,0,4-1.794,4-4S22.206,0,20,0ZM4,12c-1.654,0-3-1.346-3-3s1.346-3,3-3,3,1.346,3,3-1.346,3-3,3Zm15,8c0,1.654-1.346,3-3,3s-3-1.346-3-3,1.346-3,3-3,3,1.346,3,3Zm-2.528-3.952c-.157-.019-.311-.048-.472-.048-.985,0-1.876,.371-2.573,.963l-6.17-5.657c.464-.653,.743-1.446,.743-2.307,0-.241-.03-.475-.071-.704l8.442-2.638c.432,.941,1.215,1.683,2.184,2.061l-2.082,8.328Zm3.528-9.048c-1.654,0-3-1.346-3-3s1.346-3,3-3,3,1.346,3,3-1.346,3-3,3Z"></path>
</svg>
                                </span>
                                <p>{{ $item->name }} - {{ $item->distance }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<!-- location -->

<!-- connect for best price -->
<section>
    <div class="banner promo ar-z-index">
        <div class="bg">
            <div class="banner-wrapper">
                <div class="content over_hidden">
                    <div class="text" data-animate="fade-right">
                        <h5>Make an Appointment</h5>
                        <p>Looking for your perfect luxury space? Connect with our experts and explore homes tailored to your aspirations.</p>
                    </div>
                    <a href="javascript:;" class="btn btn-btn" data-animate="fade-left" onclick="openModal(this)" data-title-first="Get in" data-title-highlight="Touch">Get in touch</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- connect for best price -->

<!-- faq -->
<section class="ar-prop-pd">
    <div class="home-secF">
        <div class="container">
            <div class="ar-faqs-card">
                <div class="ar-faqs-header">
                    <h2 class="ar-heading">Frequently <span>Asked Questions</span></h2>
                </div>

                <div class="ar-faqs-body">
                    <div class="ar-faq-container">
                        <div class="ar-faq-accordion">
                        @foreach($pfaqs as $index => $faq)
                        <div class="ar-faq-item">
                            <input class="ar-faq-hidden" type="checkbox" id="ar-faq-q{{ $index }}" />
                            <label class="ar-faq-question" for="ar-faq-q{{ $index }}">
                                {{ $index + 1 }}. {{ $faq->question }}
                            </label>
                            <div class="ar-faq-answer">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                        @endforeach

                        @if($pfaqs->isEmpty())
                            <p>No FAQs available.</p>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq -->

<!-- Testimonial -->
<x-testimonial-section 
    :testimonials="$testimonials" 
    :global-settings="$global_settings" 
    :gray-bg="true" 
/>
<!-- Testimonial -->

<!--Auto Rename Modal HTML-->
<div class="ar-autopop-overlay" id="arAutopopModal">
    <div class="ar-autopop-modal">
        
        <form  action="{{ route('enquiry.store') }}" method="post">
             @csrf
                    <!-- Hidden field for enquiry type -->
                    <input type="hidden" name="type" value="property">
                    
                    <input type="hidden" name="property_name" value="{{ $property->heading }}">

                    <!-- Hidden field for current page URL -->
                    <input type="hidden" name="page_url" value="{{ url()->current() }}">
                    
            <div class="ar-autopop-header-from">
                                    <img src="{{ Vite::asset('frontend_assets/images/main_logo.png') }}" alt="Logo" />
                <div class="ar-autopop-btn-close" onclick="closeModal()">×</div>
            </div>

            <div class="ar-autopop-form-information">
                <h1>Download <span>Brochure</span></h1>
                <p>Connect with our Sales Specialist</p>
            </div>

            <div class="ar-autopop-form-inputs">
                <input type="text" name="name" placeholder="Full Name" required />
                <!-- Inside .ar-autopop-form-inputs -->
                <div style="display: flex; gap: 10px;">
                    <select class="ar-selectcode" name="countryCode" required style="flex: 0 0 110px; padding: 8px 5px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                        <option value="+1">+1 (USA)</option>
                        <option value="+44">+44 (UK)</option>
                        <option value="+91" selected>+91 (India)</option>
                        <option value="+61">+61 (Australia)</option>
                        <option value="+81">+81 (Japan)</option>
                        <option value="+971">+971 (UAE)</option>
                        <option value="+49">+49 (Germany)</option>
                        <option value="+33">+33 (France)</option>
                        <option value="+86">+86 (China)</option>
                        <option value="+55">+55 (Brazil)</option>
                        <option value="+7">+7 (Russia)</option>
                        <option value="+27">+27 (South Africa)</option>
                        <option value="+34">+34 (Spain)</option>
                        <option value="+39">+39 (Italy)</option>
                        <option value="+82">+82 (South Korea)</option>
                        <option value="+880">+880 (Bangladesh)</option>
                        <option value="+234">+234 (Nigeria)</option>
                        <option value="+62">+62 (Indonesia)</option>
                        <option value="+351">+351 (Portugal)</option>
                        <option value="+90">+90 (Turkey)</option>
                    </select>

                    <input type="text" name="mobile" placeholder="Enter valid mobile no." required style="flex: 1;" />
                </div>
                <input type="email" name="email" placeholder="Email Address" required />

                <div class="ar-autopop-checked">
                    <input type="checkbox" id="agree" required checked />
                    <label for="agree"> I accept the <a href="#">Terms &amp; Conditions</a> and agree to receive email notifications </label>
                </div>

                <button type="submit" class="ar-autopop-main-btn" name="submit">Submit</button>
            </div>
        </form>
        
        
        
    </div>
</div>
<!--Auto Rename Modal HTML-->

@push('scripts')
<!-- Auto Rename Modal js -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script type="text/javascript" src="{{url('')}}/frontend_assets/js/fancybox.js"></script>
<script>
    function openModal(button) {
        const firstPart = button.getAttribute("data-title-first");
        const highlightPart = button.getAttribute("data-title-highlight");

        // Set dynamic title with <span> around the highlight part
        const titleElement = document.querySelector(".ar-autopop-form-information h1");
        if (titleElement && firstPart && highlightPart) {
            titleElement.innerHTML = `${firstPart} <span>${highlightPart}</span>`;
        }

        // Show the modal
        document.getElementById("arAutopopModal").classList.add("active");
    }

    function closeModal() {
        document.getElementById("arAutopopModal").classList.remove("active");
    }
</script>

<script>function showTab(tabId, event) {
    // Tabs
    document.querySelectorAll('.ar-flr-tab').forEach(tab => tab.classList.remove('ar-flr-active'));
    event.currentTarget.classList.add('ar-flr-active');

    // Buttons
    document.querySelectorAll('.ar-flr-btn-wrap').forEach(btn => btn.classList.remove('ar-flr-active'));
    document.getElementById('btn-' + tabId).classList.add('ar-flr-active');

    // Images
    document.querySelectorAll('.ar-flr-image-wrap').forEach(img => img.classList.remove('ar-flr-active'));
    document.getElementById('img-' + tabId).classList.add('ar-flr-active');
}
</script>
<!-- Auto Rename Modal js -->
@endpush @stop
