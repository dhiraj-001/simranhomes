@extends('layouts.master') @section('title','Contact Us | Luxury Homez') @section('description','Luxury Homez Description') @section('content') @push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/contact.css" />
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

<!-- Main div -->
<section>
    <div class="contact-secA">
        <div class="container">
            <div class="flex">
                <figure>
                    @if($global_settings->contact_page_logo)
                    <img src="{{ asset('storage/app/public/' . $global_settings->contact_page_logo) }}" alt="" />
                    @endif
                </figure>
                <figcaption>
                    <div class="content">
                        <div class="heading h-medium f-secondary">
                            @php
                        $headingParts = explode('||', $global_settings->contact_sec1_heading);
                    @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }}
                        @if(isset($headingParts[1]))
                            <span>{{ $headingParts[1] }}</span>
                        @endif
                        </div>
                        <div class="ar-cont-info">
                            <ul class="contact-info">
                                <h6>Corporate office</h6>
                                <li>
                                    <div class="ico">
                                        <svg width="15" height="22" viewBox="0 0 15 22" fill="#eb9020" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.49967 10.4791C6.80901 10.4791 6.14663 10.2048 5.65825 9.7164C5.16987 9.22803 4.89551 8.56565 4.89551 7.87498C4.89551 7.18431 5.16987 6.52193 5.65825 6.03356C6.14663 5.54518 6.80901 5.27081 7.49967 5.27081C8.19034 5.27081 8.85272 5.54518 9.3411 6.03356C9.82947 6.52193 10.1038 7.18431 10.1038 7.87498C10.1038 8.21696 10.0365 8.5556 9.90561 8.87155C9.77474 9.1875 9.58292 9.47458 9.3411 9.7164C9.09928 9.95822 8.8122 10.15 8.49625 10.2809C8.18029 10.4118 7.84166 10.4791 7.49967 10.4791ZM7.49967 0.583313C5.5658 0.583313 3.71114 1.35154 2.34369 2.71899C0.976235 4.08645 0.208008 5.94111 0.208008 7.87498C0.208008 13.3437 7.49967 21.4166 7.49967 21.4166C7.49967 21.4166 14.7913 13.3437 14.7913 7.87498C14.7913 5.94111 14.0231 4.08645 12.6557 2.71899C11.2882 1.35154 9.43354 0.583313 7.49967 0.583313Z"
                                                fill="#eb9020"
                                            />
                                        </svg>
                                    </div>
                                    <a href="javascript:void(0)" target="_blank">{!! $global_settings->address !!}</a>
                                </li>

                                <h6>Registered office</h6>
                                <li>
                                    <div class="ico">
                                        <svg id="SVGRoot" height="21" fill="#eb9020" viewBox="0 0 512 512" width="21" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                            <g id="g15597" transform="translate(-2.183 -2.615)">
                                                <path
                                                    id="path15587"
                                                    d="m104.73438 2.6152344c-10.270179 0-20.540633 3.8854074-28.312505 11.6582176l-41.054687 41.060594c-38.1222663 38.126541-44.9774866 103.597824-12.304688 147.041194a11.002042 11.002031 0 0 0 .002.01c83.92429 111.52914 181.38343 208.33851 291.42969 291.27768 43.40873 32.71602 108.84661 25.95711 146.97656-12.17774l41.05469-41.0606c15.54374-15.54562 15.54374-41.0814 0-56.62702l-82.09961-82.11143c-15.54375-15.54561-41.08125-15.54561-56.625 0l-20.56255 20.56425c-3.45959 3.45999-6.11442 4.10754-10.7832 3.75781-4.66738-.34962-10.97102-2.55559-17.51367-5.83789l-.006-.002c-49.93083-25.09317-91.21591-60.85286-118.15025-118.0372-3.1988-6.79135-5.45268-13.21499-5.83594-17.90822-.38327-4.69326.18774-7.20236 3.63086-10.6426a11.002042 11.002031 0 0 0 .004-.002l20.5625-20.56642c15.54378-15.54563 15.54378-41.08141 0-56.627023l-82.0997-82.111385c-7.77188-7.7728102-18.04236-11.6582176-28.3125-11.6582176zm-.0156 70.0157076a11.000646 11.001185 0 0 1 7.77734 3.222661l41.05469 41.062557a11.000646 11.001185 0 0 1 -.002 15.55665 11.000646 11.001185 0 0 1 -15.55664 0l-41.05467-41.062549a11.000646 11.001185 0 0 1 .002-15.558612 11.000646 11.001185 0 0 1 7.7793-3.220707zm287.38083 287.416358a11.0009 11.000913 0 0 1 7.7793 3.22266l41.05468 41.0606a11.0009 11.000913 0 0 1 0 15.5586 11.0009 11.000913 0 0 1 -15.55859-.002l-41.05469-41.06059a11.0009 11.000913 0 0 1 .002-15.55666 11.0009 11.000913 0 0 1 7.77734-3.22266z"
                                                    fill="#eb9020"
                                                />
                                            </g>
                                        </svg>
                                    </div>
                                    <p>
                                        <a href="tel:{{ $global_settings->contact_number }}">{{ $global_settings->contact_number }}</a>
                                    </p>
                                </li>
                                <h6>Registered office</h6>
                                <li>
                                    <div class="ico">
                                        <svg id="Capa_1" enable-background="new 0 0 512 512" height="23" fill="#eb9020" viewBox="0 0 512 512" width="23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="m328.041 232.938c-12.918-14.708-22.365-32.534-27.05-52.188h-281.864l198.29 118.043z" />
                                                <path
                                                    d="m351.696 253.77-126.606 75.37c-2.364 1.407-5.019 2.111-7.673 2.111s-5.309-.704-7.673-2.111l-209.744-124.863v232.473c0 8.284 6.716 15 15 15h404.833c8.284 0 15-6.716 15-15v-163.088c-4.917.605-9.922.922-15 .922-25.21-.001-48.66-7.677-68.137-20.814z"
                                                />
                                                <path
                                                    d="m419.833 60.25c-50.82 0-92.166 41.346-92.166 92.167s41.346 92.167 92.166 92.167c50.821 0 92.167-41.346 92.167-92.167s-41.346-92.167-92.167-92.167zm-15 107.229v-30.125c0-8.284 6.716-15 15-15s15 6.716 15 15v30.125c0 8.284-6.716 15-15 15s-15-6.716-15-15z"
                                                    fill="#eb9020"
                                                />
                                            </g>
                                        </svg>
                                    </div>
                                    <p>
                                        <a href="mailto:{{ $global_settings->email }}">{{ $global_settings->email }}</a>
                                    </p>
                                </li>
                            </ul>
                            <div class="btn-div-wrap">
                                <a href="https://api.whatsapp.com/send?phone={{ $global_settings->social_whatsapp }}&text=Hello Team Luxury Homez! I am interested in one of your projects." class="btn btn-btn border-black" target="_blank">
                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.5827 3.09168C13.8187 2.31995 12.9087 1.70807 11.9057 1.29172C10.9028 0.875371 9.82695 0.662893 8.74102 0.666676C4.19102 0.666676 0.482682 4.37501 0.482682 8.92501C0.482682 10.3833 0.866016 11.8 1.58268 13.05L0.416016 17.3333L4.79102 16.1833C5.99935 16.8417 7.35768 17.1917 8.74102 17.1917C13.291 17.1917 16.9993 13.4833 16.9993 8.93334C16.9993 6.72501 16.141 4.65001 14.5827 3.09168ZM8.74102 15.7917C7.50768 15.7917 6.29935 15.4583 5.24102 14.8333L4.99102 14.6833L2.39102 15.3667L3.08268 12.8333L2.91602 12.575C2.2308 11.4808 1.86697 10.216 1.86602 8.92501C1.86602 5.14167 4.94935 2.05834 8.73268 2.05834C10.566 2.05834 12.291 2.77501 13.5827 4.07501C14.2223 4.71165 14.7291 5.46889 15.0738 6.30286C15.4186 7.13683 15.5944 8.03093 15.591 8.93334C15.6077 12.7167 12.5243 15.7917 8.74102 15.7917ZM12.5077 10.6583C12.2993 10.5583 11.2827 10.0583 11.0993 9.98334C10.9077 9.91668 10.7743 9.88334 10.6327 10.0833C10.491 10.2917 10.0993 10.7583 9.98268 10.8917C9.86602 11.0333 9.74102 11.05 9.53268 10.9417C9.32435 10.8417 8.65768 10.6167 7.87435 9.91668C7.25768 9.36668 6.84935 8.69168 6.72435 8.48334C6.60768 8.27501 6.70768 8.16668 6.81601 8.05834C6.90768 7.96667 7.02435 7.81667 7.12435 7.70001C7.22435 7.58334 7.26602 7.49167 7.33268 7.35834C7.39935 7.21667 7.36602 7.10001 7.31602 7.00001C7.26602 6.90001 6.84935 5.88334 6.68268 5.46668C6.51602 5.06668 6.34102 5.11668 6.21602 5.10834H5.81602C5.67435 5.10834 5.45768 5.15834 5.26602 5.36668C5.08268 5.57501 4.54935 6.07501 4.54935 7.09168C4.54935 8.10834 5.29102 9.09168 5.39102 9.22501C5.49102 9.36668 6.84935 11.45 8.91602 12.3417C9.40768 12.5583 9.79101 12.6833 10.091 12.775C10.5827 12.9333 11.0327 12.9083 11.391 12.8583C11.791 12.8 12.616 12.3583 12.7827 11.875C12.9577 11.3917 12.9577 10.9833 12.8993 10.8917C12.841 10.8 12.716 10.7583 12.5077 10.6583Z"
                                            fill="black"
                                        />
                                    </svg>
                                    Whatsapp chat
                                </a>
                                <a href="{{ $global_settings->direction_link }}" target="_blank" class="btn btn-btn border-black">Get Direction</a>
                            </div>
                        </div>
                    </div>
                </figcaption>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="contact-secB gray-bg">
        <div class="container">
            <div class="heading text-center f-secondary">
                <h3>
                    {!! $global_settings->contact_sec2_heading !!}
                </h3>
            </div>
            <div class="form-wrap">
                <form class="form form-grid" action="{{ route('enquiry.store') }}" method="post">
                    @csrf
                    <!-- Hidden field for enquiry type -->
                    <input type="hidden" name="type" value="contact" />

                    <!-- Hidden field for current page URL -->
                    <input type="hidden" name="page_url" value="{{ url()->current() }}" />

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required />
                        <label for="txtNormalFullName">Name*</label>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" required />
                        <label for="txtNormalEmailID">Email*</label>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="mobile" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required />
                        <label for="txtNormalPhoneNo">Phone*</label>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="budget_range" required>
                            <option value="0">What your Budget ?</option>
                            <option value="Under ₹ 50 Lac">Under ₹ 50 Lac</option>
                            <option value="₹ 50 Lac to ₹ 80 Lac">₹ 50 Lac to ₹ 80 Lac</option>
                            <option value="₹ 80 Lac to ₹ 1 Cr">₹ 80 Lac to ₹ 1 Cr</option>
                            <option value="₹ 1 Cr to ₹ 10 Cr">₹ 1 Cr to ₹ 10 Cr</option>
                            <option value="₹ 10 Cr  and above">₹ 10 Cr and above</option>
                        </select>
                        <label>Budget</label>
                    </div>
                    <div class="form-group full">
                        <textarea class="form-control" name="message"></textarea>
                        <label>Message*</label>
                    </div>
                    <div class="submit-grp full text-center"><button type="submit" class="btn btn-btn border-black">Inquire Now</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="contact-secC">
        {!! $global_settings->map_embed_code !!}
    </div>
</section>

@push('scripts') @endpush @stop
