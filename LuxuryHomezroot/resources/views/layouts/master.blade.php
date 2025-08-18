<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="UTF-8" />
        <title>@yield('title')</title>
        <meta name="keywords" content="@yield('keywords')" />
        <meta name="description" content="@yield('description')" />
        <link rel="icon" type="image/png" href="{{url('')}}/frontend_assets/images/fav_Sec.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="Luxury Homez" />
        <link rel="manifest" href="/site.webmanifest" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css"
            integrity="sha512-pmAAV1X4Nh5jA9m+jcvwJXFQvCBi3T17aZ1KWkqXr7g/O2YMvO8rfaa5ETWDuBvRq6fbDjlw4jHL44jNTScaKg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
            'frontend_assets/css/aboutus.css',
            'frontend_assets/css/allprojects.css',
            'frontend_assets/css/animate.css',
            'frontend_assets/css/aresponsive.css',
            'frontend_assets/css/arya.css',
            'frontend_assets/css/blogs.css',
            'frontend_assets/css/contact.css',
            'frontend_assets/css/developers.css',
            'frontend_assets/css/fancybox.css',
            'frontend_assets/css/hoztab.css',
            'frontend_assets/css/property.css',
            'frontend_assets/font/font.css',
            'frontend_assets/js/about.js',
            'frontend_assets/js/animate.js',
            'frontend_assets/js/arya.js',
            'frontend_assets/js/fancybox.js',
            'frontend_assets/js/function.js',
            'frontend_assets/js/main.js',
            'frontend_assets/js/whatsapp.js',
            'frontend_assets/sass/header/header.css',
            'frontend_assets/sass/home/home.css'
        ])
        <link rel="stylesheet" href="https://fontlibrary.org//face/champignon">

        
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Allura&display=swap");
            .promo.banner .bg {
    background: url(/frontend_assets/images/home/fixedbg.webp) no-repeat;
}

.promo.banner .bg {
    background: url(/frontend_assets/images/home/fixedbg.webp) no-repeat !important;
    
}

footer {
    background: url(/frontend_assets/images/home/footer_bg.jpg)!important;
  
}

        </style>
        
        
        <style>
        @font-face {
            font-family: 'Champignon';
            src: url('/frontend_assets/font/Champignon.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        
    </style>
        @stack('styles')
    </head>
    <body>
        <header>
            <div class="header-wrapper">
                <div class="colA">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about-us">About us</a></li>
                        <li><a href="/properties">Projects</a></li>
                    </ul>
                </div>
                <div class="colB">
                     @if($global_settings && $global_settings->logo)
                    <img src="{{ asset('storage/app/public/' . $global_settings->logo) }}" alt="" />
                     @endif
                </div>
                <div class="colC">
                    <ul>
                        <li><a href="/developers">Developers</a></li>
                        <li><a href="/locations">Locations</a></li>
                        <li><a href="/blogs">Blogs</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <div class="footer-wrapper">
                <div class="container">
                    <div class="flex">
                        <div class="colA">
                            @if($global_settings && $global_settings->logo)
                            <a href="/" class="logo"><img src="{{ asset('storage/app/public/' . $global_settings->logo) }}" alt="" /></a>
                            @endif
                            <p>{!! $global_settings->footer_about !!}</p>
                            <div class="social-icons">
                                <a href="{{ $global_settings->social_facebook }}" title="Facebook">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47 14 5.5 16 5.5H17.5V2.14C17.174 2.097 15.943 2 14.643 2C11.928 2 10 3.657 10 6.7V9.5H7V13.5H10V22H14V13.5Z" fill="white"></path>
                                    </svg>
                                </a>
                                <a href="{{ $global_settings->social_twitter }}" title="X">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.325 1.03088H20.6989L13.3289 9.47574L22 20.9692H15.2114L9.89057 13.9999L3.80914 20.9692H0.432143L8.31443 11.9335L0 1.03246H6.96143L11.7637 7.40146L17.325 1.03088ZM16.1386 18.9452H18.0086L5.94 2.9496H3.93486L16.1386 18.9452Z"
                                            fill="white"
                                        ></path>
                                    </svg>
                                </a>
                                <a href="{{ $global_settings->social_instagram }}" title="Instagram">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.34 5.46C17.1027 5.46 16.8707 5.53038 16.6733 5.66224C16.476 5.79409 16.3222 5.98151 16.2313 6.20078C16.1405 6.42005 16.1168 6.66133 16.1631 6.89411C16.2094 7.12689 16.3236 7.34071 16.4915 7.50853C16.6593 7.67635 16.8731 7.79064 17.1059 7.83694C17.3387 7.88324 17.5799 7.85948 17.7992 7.76866C18.0185 7.67783 18.2059 7.52402 18.3378 7.32668C18.4696 7.12935 18.54 6.89734 18.54 6.66C18.54 6.34174 18.4136 6.03652 18.1885 5.81147C17.9635 5.58643 17.6583 5.46 17.34 5.46ZM21.94 7.88C21.9206 7.0503 21.7652 6.2294 21.48 5.45C21.2257 4.78313 20.83 4.17928 20.32 3.68C19.8248 3.16743 19.2196 2.77418 18.55 2.53C17.7727 2.23616 16.9508 2.07721 16.12 2.06C15.06 2 14.72 2 12 2C9.28 2 8.94 2 7.88 2.06C7.04915 2.07721 6.22734 2.23616 5.45 2.53C4.78168 2.77665 4.17693 3.16956 3.68 3.68C3.16743 4.17518 2.77418 4.78044 2.53 5.45C2.23616 6.22734 2.07721 7.04915 2.06 7.88C2 8.94 2 9.28 2 12C2 14.72 2 15.06 2.06 16.12C2.07721 16.9508 2.23616 17.7727 2.53 18.55C2.77418 19.2196 3.16743 19.8248 3.68 20.32C4.17693 20.8304 4.78168 21.2234 5.45 21.47C6.22734 21.7638 7.04915 21.9228 7.88 21.94C8.94 22 9.28 22 12 22C14.72 22 15.06 22 16.12 21.94C16.9508 21.9228 17.7727 21.7638 18.55 21.47C19.2196 21.2258 19.8248 20.8326 20.32 20.32C20.8322 19.8226 21.2283 19.2182 21.48 18.55C21.7652 17.7706 21.9206 16.9497 21.94 16.12C21.94 15.06 22 14.72 22 12C22 9.28 22 8.94 21.94 7.88ZM20.14 16C20.1327 16.6348 20.0178 17.2637 19.8 17.86C19.6403 18.2952 19.3839 18.6884 19.05 19.01C18.7256 19.3405 18.3332 19.5964 17.9 19.76C17.3037 19.9778 16.6748 20.0927 16.04 20.1C15.04 20.15 14.67 20.16 12.04 20.16C9.41 20.16 9.04 20.16 8.04 20.1C7.38089 20.1123 6.72459 20.0109 6.1 19.8C5.68578 19.6281 5.31136 19.3728 5 19.05C4.66809 18.7287 4.41484 18.3352 4.26 17.9C4.01586 17.2952 3.88044 16.6519 3.86 16C3.86 15 3.8 14.63 3.8 12C3.8 9.37 3.8 9 3.86 8C3.86448 7.35106 3.98295 6.70795 4.21 6.1C4.38605 5.67791 4.65627 5.30166 5 5C5.30381 4.65617 5.67929 4.3831 6.1 4.2C6.70955 3.98004 7.352 3.86508 8 3.86C9 3.86 9.37 3.8 12 3.8C14.63 3.8 15 3.8 16 3.86C16.6348 3.86728 17.2637 3.98225 17.86 4.2C18.3144 4.36865 18.7223 4.64285 19.05 5C19.3777 5.30718 19.6338 5.68273 19.8 6.1C20.0223 6.70893 20.1373 7.35178 20.14 8C20.19 9 20.2 9.37 20.2 12C20.2 14.63 20.19 15 20.14 16ZM12 6.87C10.9858 6.87198 9.99496 7.17453 9.15265 7.73942C8.31035 8.30431 7.65438 9.1062 7.26763 10.0438C6.88089 10.9813 6.78072 12.0125 6.97979 13.0069C7.17886 14.0014 7.66824 14.9145 8.38608 15.631C9.10392 16.3474 10.018 16.835 11.0129 17.0321C12.0077 17.2293 13.0387 17.1271 13.9755 16.7385C14.9123 16.35 15.7129 15.6924 16.2761 14.849C16.8394 14.0056 17.14 13.0142 17.14 12C17.1413 11.3251 17.0092 10.6566 16.7512 10.033C16.4933 9.40931 16.1146 8.84281 15.6369 8.36605C15.1592 7.88929 14.5919 7.51168 13.9678 7.25493C13.3436 6.99818 12.6749 6.86736 12 6.87ZM12 15.33C11.3414 15.33 10.6976 15.1347 10.15 14.7688C9.60234 14.4029 9.17552 13.8828 8.92348 13.2743C8.67144 12.6659 8.6055 11.9963 8.73398 11.3503C8.86247 10.7044 9.17963 10.111 9.64533 9.64533C10.111 9.17963 10.7044 8.86247 11.3503 8.73398C11.9963 8.6055 12.6659 8.67144 13.2743 8.92348C13.8828 9.17552 14.4029 9.60234 14.7688 10.15C15.1347 10.6976 15.33 11.3414 15.33 12C15.33 12.4373 15.2439 12.8703 15.0765 13.2743C14.9092 13.6784 14.6639 14.0454 14.3547 14.3547C14.0454 14.6639 13.6784 14.9092 13.2743 15.0765C12.8703 15.2439 12.4373 15.33 12 15.33Z"
                                            fill="white"
                                        ></path>
                                    </svg>
                                </a>
                                <a href="{{ $global_settings->social_linkedin }}" title="LinkedIn">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.94 5.00002C6.93974 5.53046 6.72877 6.03906 6.35351 6.41394C5.97825 6.78883 5.46944 6.99929 4.939 6.99902C4.40857 6.99876 3.89997 6.78779 3.52508 6.41253C3.1502 6.03727 2.93974 5.52846 2.94 4.99802C2.94027 4.46759 3.15124 3.95899 3.5265 3.5841C3.90176 3.20922 4.41057 2.99876 4.941 2.99902C5.47144 2.99929 5.98004 3.21026 6.35492 3.58552C6.72981 3.96078 6.94027 4.46959 6.94 5.00002ZM7 8.48002H3V21H7V8.48002ZM13.32 8.48002H9.34V21H13.28V14.43C13.28 10.77 18.05 10.43 18.05 14.43V21H22V13.07C22 6.90002 14.94 7.13002 13.28 10.16L13.32 8.48002Z"
                                            fill="white"
                                        ></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="colB" data-animate="fade-down">
                            <div class="col-md">
                                <h5>Useful Links</h5>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about-us">About Us</a></li>
                                    <li><a href="/properties">Projects</a></li>
                                    <li><a href="/developers">Developers</a></li>
                                    <li><a href="/locations">Locations</a></li>
                                </ul>
                            </div>
                            <div class="col-md">
                                <h5>Projects</h5>
                                <ul>
                                    <li><a href="/blogs">Blogs</a></li>
                                    <li><a href="/contact-us">Contact Us</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                    <li><a href="/terms-condition">Terms & Conditions</a></li>
                                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="colC" data-animate="fade-down">
                            <h5>Contact Us</h5>
                            <ul class="addr-ul">
                                <li>
                                    <a href=""><img class="svg ar-addr-icon" src="{{url('')}}/frontend_assets/icon/adlocation.png" alt="" />{!! $global_settings->address !!}</a>
                                </li>
                                <li>
                                    <a href="mailto:{{ $global_settings->email }}"><img class="svg ar-addr-icon" src="{{url('')}}/frontend_assets/icon/admail.png" alt="" />{{ $global_settings->email }}</a>
                                </li>
                                <li>
                                    <a href="tel:{{ $global_settings->contact_number }}"><img class="svg ar-addr-icon" src="{{url('')}}/frontend_assets/icon/adphone.png" alt="" />{{ $global_settings->contact_number }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bottom-footer over_hidden">
                        
                        
                        
                       @foreach($keyword_sections as $section)
                    @if($section->keywords->count())
                        <div class="keyword">
                            <h5 data-animate="fade-right">{{ $section->title }}</h5>
                            <div class="scroll-wrapper">
                                <ul class="keyword-list">
                                    @foreach($section->keywords as $keyword)
                                        <li>
                                            <a href="{{ url('/keywords/' . $keyword->slug) }}" target="_blank" rel="noopener noreferrer">
                                                {{ $keyword->text }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach

                      
                      
                       
                        
                        @php
$all_states = [
    'andhra_pradesh', 'arunachal_pradesh', 'assam', 'bihar', 'chhattisgarh', 'goa', 'gujarat', 'haryana',
    'himachal_pradesh', 'jharkhand', 'karnataka', 'kerala', 'madhya_pradesh', 'maharashtra', 'manipur',
    'meghalaya', 'mizoram', 'nagaland', 'odisha', 'punjab', 'rajasthan', 'sikkim', 'tamil_nadu',
    'telangana', 'tripura', 'uttar_pradesh', 'uttarakhand', 'west_bengal',
    'andaman_and_nicobar_islands', 'chandigarh', 'dadra_and_nagar_haveli_and_daman_and_diu', 'delhi',
    'jammu_and_kashmir', 'ladakh', 'lakshadweep', 'puducherry'
];
@endphp

<div class="rera_wrapper">
    <div class="grid">
        @foreach($all_states as $state)
            @php
                $value = $global_settings->{'rera_' . $state} ?? null;
            @endphp

            @if(!empty($value))
                <div class="col">
                    <p>{{ ucwords(str_replace('_', ' ', $state)) }} RERA - {{ $value }}</p>
                </div>
            @endif
        @endforeach
    </div>
</div>

                        <p class="ar-disclaimer">
                            {!! $global_settings->footer_disclaimer !!}
                        </p>
                    </div>
                    <div class="copy">
                       {{ $global_settings->copyright }}
                    </div>
                </div>
            </div>
        </footer>
       <div class="overlay"></div>
        <!-- End Hamburger Menu -->
        <!--<div class="model ham-pop">-->
        <!--    <button class="close">-->
        <!--        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.5 0.5L25.5 25.5M0.5 25.5L25.5 0.5" stroke="black" stroke-linecap="round" stroke-linejoin="round" /></svg>-->
        <!--    </button>-->
        <!--    <div class="model-body">-->
        <!--        <ul class="nav-list">-->
        <!--        <li><a href="#">Residential</a></li>-->
        <!--        <li><a href="/about-us">About Us</a></li>-->
        <!--        <li><a href="/contact-us">Contact Us</a></li>-->
        <!--        <li><a href="/blogs">Blogs</a></li>-->
        <!--        </ul>-->
        <!--        <div class="bottom-list">-->
        <!--            <div class="social-icons">-->
                        
        <!--                <a href="#" target="_blank" title="Facebook"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47 14 5.5 16 5.5H17.5V2.14C17.174 2.097 15.943 2 14.643 2C11.928 2 10 3.657 10 6.7V9.5H7V13.5H10V22H14V13.5Z" fill="#5F5F5F"></path> </svg> </a>-->
        <!--                <a href="#" target="_blank" title="Instagram"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M17.34 5.46C17.1027 5.46 16.8707 5.53038 16.6733 5.66224C16.476 5.79409 16.3222 5.98151 16.2313 6.20078C16.1405 6.42005 16.1168 6.66133 16.1631 6.89411C16.2094 7.12689 16.3236 7.34071 16.4915 7.50853C16.6593 7.67635 16.8731 7.79064 17.1059 7.83694C17.3387 7.88324 17.5799 7.85948 17.7992 7.76866C18.0185 7.67783 18.2059 7.52402 18.3378 7.32668C18.4696 7.12935 18.54 6.89734 18.54 6.66C18.54 6.34174 18.4136 6.03652 18.1885 5.81147C17.9635 5.58643 17.6583 5.46 17.34 5.46ZM21.94 7.88C21.9206 7.0503 21.7652 6.2294 21.48 5.45C21.2257 4.78313 20.83 4.17928 20.32 3.68C19.8248 3.16743 19.2196 2.77418 18.55 2.53C17.7727 2.23616 16.9508 2.07721 16.12 2.06C15.06 2 14.72 2 12 2C9.28 2 8.94 2 7.88 2.06C7.04915 2.07721 6.22734 2.23616 5.45 2.53C4.78168 2.77665 4.17693 3.16956 3.68 3.68C3.16743 4.17518 2.77418 4.78044 2.53 5.45C2.23616 6.22734 2.07721 7.04915 2.06 7.88C2 8.94 2 9.28 2 12C2 14.72 2 15.06 2.06 16.12C2.07721 16.9508 2.23616 17.7727 2.53 18.55C2.77418 19.2196 3.16743 19.8248 3.68 20.32C4.17693 20.8304 4.78168 21.2234 5.45 21.47C6.22734 21.7638 7.04915 21.9228 7.88 21.94C8.94 22 9.28 22 12 22C14.72 22 15.06 22 16.12 21.94C16.9508 21.9228 17.7727 21.7638 18.55 21.47C19.2196 21.2258 19.8248 20.8326 20.32 20.32C20.8322 19.8226 21.2283 19.2182 21.48 18.55C21.7652 17.7706 21.9206 16.9497 21.94 16.12C21.94 15.06 22 14.72 22 12C22 9.28 22 8.94 21.94 7.88ZM20.14 16C20.1327 16.6348 20.0178 17.2637 19.8 17.86C19.6403 18.2952 19.3839 18.6884 19.05 19.01C18.7256 19.3405 18.3332 19.5964 17.9 19.76C17.3037 19.9778 16.6748 20.0927 16.04 20.1C15.04 20.15 14.67 20.16 12.04 20.16C9.41 20.16 9.04 20.16 8.04 20.1C7.38089 20.1123 6.72459 20.0109 6.1 19.8C5.68578 19.6281 5.31136 19.3728 5 19.05C4.66809 18.7287 4.41484 18.3352 4.26 17.9C4.01586 17.2952 3.88044 16.6519 3.86 16C3.86 15 3.8 14.63 3.8 12C3.8 9.37 3.8 9 3.86 8C3.86448 7.35106 3.98295 6.70795 4.21 6.1C4.38605 5.67791 4.65627 5.30166 5 5C5.30381 4.65617 5.67929 4.3831 6.1 4.2C6.70955 3.98004 7.352 3.86508 8 3.86C9 3.86 9.37 3.8 12 3.8C14.63 3.8 15 3.8 16 3.86C16.6348 3.86728 17.2637 3.98225 17.86 4.2C18.3144 4.36865 18.7223 4.64285 19.05 5C19.3777 5.30718 19.6338 5.68273 19.8 6.1C20.0223 6.70893 20.1373 7.35178 20.14 8C20.19 9 20.2 9.37 20.2 12C20.2 14.63 20.19 15 20.14 16ZM12 6.87C10.9858 6.87198 9.99496 7.17453 9.15265 7.73942C8.31035 8.30431 7.65438 9.1062 7.26763 10.0438C6.88089 10.9813 6.78072 12.0125 6.97979 13.0069C7.17886 14.0014 7.66824 14.9145 8.38608 15.631C9.10392 16.3474 10.018 16.835 11.0129 17.0321C12.0077 17.2293 13.0387 17.1271 13.9755 16.7385C14.9123 16.35 15.7129 15.6924 16.2761 14.849C16.8394 14.0056 17.14 13.0142 17.14 12C17.1413 11.3251 17.0092 10.6566 16.7512 10.033C16.4933 9.40931 16.1146 8.84281 15.6369 8.36605C15.1592 7.88929 14.5919 7.51168 13.9678 7.25493C13.3436 6.99818 12.6749 6.86736 12 6.87ZM12 15.33C11.3414 15.33 10.6976 15.1347 10.15 14.7688C9.60234 14.4029 9.17552 13.8828 8.92348 13.2743C8.67144 12.6659 8.6055 11.9963 8.73398 11.3503C8.86247 10.7044 9.17963 10.111 9.64533 9.64533C10.111 9.17963 10.7044 8.86247 11.3503 8.73398C11.9963 8.6055 12.6659 8.67144 13.2743 8.92348C13.8828 9.17552 14.4029 9.60234 14.7688 10.15C15.1347 10.6976 15.33 11.3414 15.33 12C15.33 12.4373 15.2439 12.8703 15.0765 13.2743C14.9092 13.6784 14.6639 14.0454 14.3547 14.3547C14.0454 14.6639 13.6784 14.9092 13.2743 15.0765C12.8703 15.2439 12.4373 15.33 12 15.33Z" fill="#5F5F5F" ></path> </svg> </a>-->
        <!--                <a href="#" target="_blank" title="LinkedIn"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M6.94 5.00002C6.93974 5.53046 6.72877 6.03906 6.35351 6.41394C5.97825 6.78883 5.46944 6.99929 4.939 6.99902C4.40857 6.99876 3.89997 6.78779 3.52508 6.41253C3.1502 6.03727 2.93974 5.52846 2.94 4.99802C2.94027 4.46759 3.15124 3.95899 3.5265 3.5841C3.90176 3.20922 4.41057 2.99876 4.941 2.99902C5.47144 2.99929 5.98004 3.21026 6.35492 3.58552C6.72981 3.96078 6.94027 4.46959 6.94 5.00002ZM7 8.48002H3V21H7V8.48002ZM13.32 8.48002H9.34V21H13.28V14.43C13.28 10.77 18.05 10.43 18.05 14.43V21H22V13.07C22 6.90002 14.94 7.13002 13.28 10.16L13.32 8.48002Z" fill="#5F5F5F" ></path> </svg> </a>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- End Hamburger Menu -->
        
        <div class="bottombar"></div>
        <div class="footer-links">
            <ul>
                <li class="" data-model=".enquire-pop">
                    <a href="javascript:;"> <img src="{{url('')}}/frontend_assets/icon/formicon.svg" width="20px" height="auto" alt="" /></a>
                </li>

                <li class="">
                    <a href="{{ $global_settings->contact_number }}"><img src="{{url('')}}/frontend_assets/icon/icons8-call.gif" width="30px" height="auto" alt="" /></a>
                </li>
            </ul>
        </div>
        <!--Enquire Pop -->
        <div class="model enquire-pop">
            <button class="close">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.5 0.5L25.5 25.5M0.5 25.5L25.5 0.5" stroke="black" stroke-linecap="round" stroke-linejoin="round" /></svg>
            </button>
            <div class="model-body">
                <div class="logo-d">
                    <img src="{{url('')}}/frontend_assets/images/main_logo.png" alt="" />
                </div>
                
                
                
                <form class="form form-grid" action="{{ route('enquiry.store') }}" method="post">
                    @csrf
                    <!-- Hidden field for enquiry type -->
                    <input type="hidden" name="type" value="general">

                    <!-- Hidden field for current page URL -->
                    <input type="hidden" name="page_url" value="{{ url()->current() }}">
                    
                    <div class="title">
                        <h4>Get Detailed Information</h4>
                        <p>Connect with our Sales Specialist</p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name"/>
                        <label for="">Name</label>
                    </div>

                    <div class="form-group ar-phone-group">
                        <select class="ar-selectcode" name="countryCode" required>
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
                            <!-- Add more as needed -->
                        </select>
                        <input type="tel" placeholder="Phone Number" name="mobile" class="form-control" />
                        <label for="">Phone</label>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" />
                        <label for="">Email</label>
                    </div>

                    <div class="checked-cst">
                        <input type="checkbox"  name="checkbox" value="check" id="agree" checked="" required/>
                        <label for="terms-checkbox"> I accept the <a href="#"> Terms &amp; Conditions</a> and agree to receive email notifications</label>
                    </div>

                    <div class="sbmt-grp text-center full">
                         <button type="submit" class="btn btn-btn">Submit</button>
                    </div>
                </form>
                
                
                
                
            </div>
        </div>
        <!-- End Enquire Menu -->

        <!-- whatsapp chatbot code -->
        <div class="mobileview-only-wraper">
            <div id="df-btn-cont" class="mobileview-only"  style="display: none;">
                <div class="df-btn">
                    <div class="nip df-btn-content" style="background-image: url('{{url('')}}/frontend_assets/images/home/whatsappbg.svg');">
                        <div class="df-content-topbar">
                            <div class="df-brand-img" style="background: white;">
                                <img src="{{url('')}}/frontend_assets/images/fav.png" height="100%" width="100%" style="border-radius: 50%;" alt="img" />
                            </div>
                            <div style="flex-grow: 1;">
                                <div class="df-brand-name">Luxury Homez</div>
                                <div class="df-brand-sub">online</div>
                            </div>
                            <div class="dfToggle">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1"
                                    id="Layer_1"
                                    x="0px"
                                    y="0px"
                                    viewBox="0 0 492 492"
                                    style="enable-background: new 0 0 492 492;"
                                    xml:space="preserve"
                                    class="df-cancel-svg-icon"
                                >
                                    <g>
                                        <g>
                                            <path
                                                d="M300.188,246L484.14,62.04c5.06-5.064,7.852-11.82,7.86-19.024c0-7.208-2.792-13.972-7.86-19.028L468.02,7.872    c-5.068-5.076-11.824-7.856-19.036-7.856c-7.2,0-13.956,2.78-19.024,7.856L246.008,191.82L62.048,7.872    c-5.06-5.076-11.82-7.856-19.028-7.856c-7.2,0-13.96,2.78-19.02,7.856L7.872,23.988c-10.496,10.496-10.496,27.568,0,38.052    L191.828,246L7.872,429.952c-5.064,5.072-7.852,11.828-7.852,19.032c0,7.204,2.788,13.96,7.852,19.028l16.124,16.116    c5.06,5.072,11.824,7.856,19.02,7.856c7.208,0,13.968-2.784,19.028-7.856l183.96-183.952l183.952,183.952    c5.068,5.072,11.824,7.856,19.024,7.856h0.008c7.204,0,13.96-2.784,19.028-7.856l16.12-16.116    c5.06-5.064,7.852-11.824,7.852-19.028c0-7.204-2.792-13.96-7.852-19.028L300.188,246z"
                                            ></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="df-content-window">
                            <div class="df-window-msg-cont">
                                <div class="df-window-msg-cont-brandname">Ananya Mehra <span>Sales Specialist</span></div>

                                <pre class="df-window-msg">Hi, How can I help you ?</pre>
                            </div>
                        </div>
                        <div class="df-content-bottombar">
                            <!-- <div class="df-bottombar-btn for-mobile" onclick="goToLink()">
                            Start chat
                        </div> -->
                            <a class="df-bottombar-btn for-mobile" href="https://wa.me/{{ $global_settings->social_whatsapp }}" target="blank"> Start chat </a>
                            <a class="df-bottombar-btn for-desktop" href="https://wa.me/{{ $global_settings->social_whatsapp }}" target="blank"> Start chat </a>
                            <!--<div class="" onclick="goToLink()">-->
                            <!--</div>-->
                            <div class="df-bottombar-branding">
                                <img
                                    draggable="false"
                                    role="img"
                                    class="df-emoji"
                                    alt="âš¡"
                                    src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzNiAzNiI+PHBhdGggZmlsbD0iI0ZGQUMzMyIgZD0iTTMyLjkzOCAxNS42NTFDMzIuNzkyIDE1LjI2IDMyLjQxOCAxNSAzMiAxNUgxOS45MjVMMjYuODkgMS40NThjLjIxOS0uNDI2LjEwNi0uOTQ3LS4yNzEtMS4yNDNDMjYuNDM3LjA3MSAyNi4yMTggMCAyNiAwYy0uMjMzIDAtLjQ2Ni4wODItLjY1My4yNDNMMTggNi41ODggMy4zNDcgMTkuMjQzYy0uMzE2LjI3My0uNDMuNzE0LS4yODQgMS4xMDVTMy41ODIgMjEgNCAyMWgxMi4wNzVMOS4xMSAzNC41NDJjLS4yMTkuNDI2LS4xMDYuOTQ3LjI3MSAxLjI0My4xODIuMTQ0LjQwMS4yMTUuNjE5LjIxNS4yMzMgMCAuNDY2LS4wODIuNjUzLS4yNDNMMTggMjkuNDEybDE0LjY1My0xMi42NTVjLjMxNy0uMjczLjQzLS43MTQuMjg1LTEuMTA2eiIvPjwvc3ZnPg=="
                                />
                                by
                                <a href="/" target="_blank"> <i>Luxury Homez</i> </a>
                            </div>
                        </div>
                    </div>

                    <div class="df-btn-text-icon-only what dfToggle df-closed">
                        <svg class="df-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32">
                            <path
                                d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z"
                                fill-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <div class="nhat dfToggle df-btn-text">
                        <svg class="df-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32">
                            <path
                                d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z"
                                fill-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- whatsapp chatbot code -->

        <!-- back to top -->
        <button id="backToTop">↑ Top</button>
        <!-- back to top -->

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-visible/1.2.0/jquery.visible.min.js"
            integrity="sha512-771ZvVCYr4EfUGXr63AcX7thw7EKa6QE1fhxi8JG7mPacB/arC0cyvYPXKUkCrX2sYKnnFCZby3ZZik42jOuSQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"
            integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        

        <!-- whatsapp chatbox -->
        <script>
            $(function () {
                const colors = ["#ccd5ae", "#e9edc9", "#faedcd", "#d4a373", "#fefae0"];
                let i = 0;
                setInterval(function () {
                    $(".bgSearch").animate({ backgroundColor: colors[i] }, 500);
                    i = (i + 1) % colors.length;
                }, 1000);

                document.querySelectorAll(".dfToggle").forEach((toggle) => {
                    toggle.addEventListener("click", () => {
                        document.querySelector(".nip").classList.toggle("df-closed");
                        document.querySelector(".nip").classList.toggle("df-btn-content");
                        document.querySelector(".what").classList.toggle("df-closed");
                        document.querySelector(".what").classList.toggle("df-btn-text");
                        document.querySelector(".nhat").classList.toggle("df-btn-text");
                        document.querySelector(".nhat").classList.toggle("df-closed");
                    });
                });
                function goToLink() {
                    window.location.href = `https://api.whatsapp.com/send/?phone=+919876543210&text=Hi!%20I'm%20Interested%20in%20properties%20Please%20Share%20Details.`;
                }
            });
        </script>
        
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            let chatbox = document.getElementById("df-btn-cont");
            chatbox.style.opacity = 0;
            chatbox.style.display = "block";
            chatbox.style.transition = "opacity 0.6s ease-in-out";
            setTimeout(() => {
                chatbox.style.opacity = 1;
            }, 50);
        }, 7000); // Delay 7 seconds
    });
</script>
        <!-- whatsapp chatbox -->

        @stack('scripts')
    </body>
</html>
