<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Simran Homes')</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ Vite::asset('frontend_assets/images/fav_sec.png') }}" sizes="96x96" />

    <!-- Swiper CSS for sliders -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css"
        xintegrity="sha512-pmAAV1X4Nh5jA9m+jcvwJXFQvCBi3T17aZ1KWkqXr7g/O2YMvO8rfaa5ETWDuBvRq6fbDjlw4jHL44jNTScaKg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <!-- Main App Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* --- START OF CHANGES: Performance optimizations for transitions --- */
        /* * The 'will-change' property hints to the browser about elements that are expected 
         * to be transformed or animated. This allows the browser to perform optimizations 
         * ahead of time, resulting in smoother, less "laggy" transitions.
        */
        #main-header {
            /* Prepares the header for background, filter, and shadow changes on scroll. */
            will-change: background, backdrop-filter, box-shadow;
        }
        #main-logo {
            /* Prepares the logo for height changes on scroll. */
            will-change: height;
        }
        .nav-link::after {
            /* Prepares the nav link's underline for width changes on hover. */
            will-change: width;
        }
        #mobile-menu {
            /* Prepares the mobile menu for its slide-in/out transform animation. */
            will-change: transform;
        }
        /* --- END OF CHANGES --- */

        /* Custom style for the navbar link hover effect */
        .nav-link {
            position: relative;
            padding-bottom: 8px;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #D4AF37; /* Golden color */
            transition: width 0.3s ease-in-out;
        }
        .nav-link:hover {
            color: #D4AF37;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        /* Enhanced glassmorphism effect for the navbar */
        .glass-effect {
            background: linear-gradient(135deg, rgba(10, 35, 66, 0.9), rgba(20, 50, 80, 0.7));
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 0 0 12px 12px;
        }
        /* Mobile menu transition */
        #mobile-menu {
            transition: transform 0.4s ease-in-out;
            background: linear-gradient(135deg, rgba(10, 35, 66, 0.95), rgba(20, 50, 80, 0.85));
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        /* Contact button styling */
        .contact-btn {
            transition: all 0.3s ease-in-out;
            transform: scale(1);
        }
        .contact-btn:hover {
            transform: scale(1.05);
            background-color: #D4AF37;
            color: #0A2342;
        }
        
        /* Enhanced Footer Styles */
        footer {
            background: linear-gradient(135deg, #0A2342 0%, #0f172a 100%);
        }
        
        /* Footer link animations */
        footer a {
            position: relative;
            transition: all 0.3s ease;
        }
        
        footer ul li a:hover {
            transform: translateX(5px);
        }
        
        /* Newsletter input focus effect */
        footer input[type="email"]:focus {
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.3);
        }
        
        /* Social icon pulse effect on hover */
        .group:hover .w-10.h-10 {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(212, 175, 55, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
            }
        }
        
        /* Footer section hover effects */
        footer h5 {
            transition: color 0.3s ease;
        }
        
        footer h5:hover {
            color: #D4AF37;
        }
        
        /* Enhanced golden color utility */
        .text-golden {
            color: #D4AF37;
        }
        
        .bg-golden {
            background-color: #D4AF37;
        }
        
        .border-golden {
            border-color: #D4AF37;
        }
        
        .hover\:text-golden:hover {
            color: #D4AF37;
        }
        
        .hover\:bg-golden:hover {
            background-color: #D4AF37;
        }
        
        .focus\:ring-golden:focus {
            --tw-ring-color: #D4AF37;
        }
        
        .focus\:border-golden:focus {
            border-color: #D4AF37;
        }
        
        /* Styles for Floating Action Buttons & Modal from old code */
        .footer-links {
            position: fixed;
            bottom: 100px;
            right: 20px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .footer-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background-color: #D4AF37; /* navy */
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        .footer-links a:hover {
            background-color: #f2cf5c; /* golden */
            transform: scale(1.1);
        }
        .enquire-pop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            display: none; /* Initially hidden */
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

    </style>
    <!-- Allow individual pages to add their own styles -->
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans text-gray-800 antialiased">

    <!-- Header Section -->
    <header id="main-header" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
        <nav class="container mx-auto px-10 py-4 flex md:justify-around items-center justify-between ">
            <!-- Left Navigation -->
            <div class="hidden md:flex items-center space-x-7 ">
                <a href="/" class="nav-link text-white text-lg font-display">Home</a>
                <a href="/about-us" class="nav-link text-white text-lg font-display">About us</a>
                <a href="/properties" class="nav-link text-white text-lg font-display">Projects</a>
            </div>

            <!-- Logo -->
            <div class=" flex justify-center">
                @if($global_settings && $global_settings->logo)
                    <a href="/">
                        <img src="{{ asset('storage/' . $global_settings->logo) }}" alt="Luxury Homez Logo" class="h-20 w-auto transition-all duration-300" id="main-logo" />
                    </a>
                @endif
            </div>

            <!-- Right Navigation -->
            <div class="hidden md:flex items-center space-x-5 justify-endplay">
                <a href="/developers" class="nav-link text-white text-lg font-display">Developers</a>
                <a href="/locations" class="nav-link text-white text-lg font-display">Locations</a>
                <a href="/blogs" class="nav-link text-white text-lg font-display">Blogs</a>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </nav>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-full max-w-xs z-50 transform translate-x-full md:hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-display text-white font-bold">Menu</h2>
                <button id="close-menu-button" class="text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <nav class="flex flex-col space-y-6 text-lg">
                <a href="/" class="text-white hover:text-golden transition-colors duration-300">Home</a>
                <a href="/about-us" class="text-white hover:text-golden transition-colors duration-300">About us</a>
                <a href="/properties" class="text-white hover:text-golden transition-colors duration-300">Projects</a>
                <a href="/developers" class="text-white hover:text-golden transition-colors duration-300">Developers</a>
                <a href="/locations" class="text-white hover:text-golden transition-colors duration-300">Locations</a>
                <a href="/blogs" class="text-white hover:text-golden transition-colors duration-300">Blogs</a>
                <a href="/contact-us" class="contact-btn mt-4 inline-block text-center px-6 py-3 border border-golden text-golden rounded-full font-medium hover:bg-golden hover:text-navy transition-colors duration-300">
                    Contact Us
                </a>
            </nav>
        </div>
    </div>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Enhanced Footer Section -->
    <footer class="bg-gradient-to-b from-navy to-black text-white pt-20 pb-12 px-12">
        <div class="container mx-auto px-6">
            <!-- Footer Top Section with Enhanced Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
                <!-- Enhanced About Section -->
                <div class="lg:col-span-1">
                    @if($global_settings && $global_settings->logo)
                        <a href="/" class="mb-6 inline-block transform hover:scale-105 transition-transform duration-300">
                            <img src="{{ asset('storage/' . $global_settings->logo) }}" alt="Luxury Homez Logo" class="h-20 filter brightness-110" />
                        </a>
                    @endif
                    <p class="text-gray-300 text-sm leading-relaxed mb-6">{!! $global_settings->footer_about !!}</p>
                    
                    <!-- Enhanced Social Icons with Hover Effects -->
                    <div class="flex space-x-3">
                        <a href="{{ $global_settings->social_facebook }}" title="Facebook" class="group relative">
                            <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47 14 5.5 16 5.5H17.5V2.14C17.174 2.097 15.943 2 14.643 2C11.928 2 10 3.657 10 6.7V9.5H7V13.5H10V22H14V13.5Z"/></svg>
                            </div>
                        </a>
                        <a href="{{ $global_settings->social_twitter }}" title="X" class="group relative">
                            <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:bg-black group-hover:scale-110">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 22 22"><path d="M17.325 1.03088H20.6989L13.3289 9.47574L22 20.9692H15.2114L9.89057 13.9999L3.80914 20.9692H0.432143L8.31443 11.9335L0 1.03246H6.96143L11.7637 7.40146L17.325 1.03088ZM16.1386 18.9452H18.0086L5.94 2.9496H3.93486L16.1386 18.9452Z"/></svg>
                            </div>
                        </a>
                        <a href="{{ $global_settings->social_instagram }}" title="Instagram" class="group relative">
                            <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:bg-gradient-to-r group-hover:from-purple-600 group-hover:to-pink-500 group-hover:scale-110">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.585-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.585-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.585.069-4.85c.149-3.225 1.664-4.771 4.919-4.919C8.415 2.175 8.796 2.163 12 2.163m0-1.646c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.059-1.281.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98C15.667.53 15.259.517 12 .517z M12 7.177c-2.652 0-4.823 2.171-4.823 4.823s2.171 4.823 4.823 4.823 4.823-2.171 4.823-4.823-2.171-4.823-4.823-4.823zm0 8.006c-1.76 0-3.182-1.422-3.182-3.182s1.422-3.182 3.182-3.182 3.182 1.422 3.182 3.182-1.422 3.182-3.182 3.182zm4.965-8.206c-.78 0-1.414.634-1.414 1.414s.634 1.414 1.414 1.414 1.414-.634 1.414-1.414-.634-1.414-1.414-1.414z"/></svg>
                            </div>
                        </a>
                        <a href="{{ $global_settings->social_linkedin }}" title="LinkedIn" class="group relative">
                            <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:bg-blue-700 group-hover:scale-110">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M6.94 5.00002C6.93974 5.53046 6.72877 6.03906 6.35351 6.41394C5.97825 6.78883 5.46944 6.99929 4.939 6.99902C4.40857 6.99876 3.89997 6.78779 3.52508 6.41253C3.1502 6.03727 2.93974 5.52846 2.94 4.99802C2.94027 4.46759 3.15124 3.95899 3.5265 3.5841C3.90176 3.20922 4.41057 2.99876 4.941 2.99902C5.47144 2.99929 5.98004 3.21026 6.35492 3.58552C6.72981 3.96078 6.94027 4.46959 6.94 5.00002ZM7 8.48002H3V21H7V8.48002ZM13.32 8.48002H9.34V21H13.28V14.43C13.28 10.77 18.05 10.43 18.05 14.43V21H22V13.07C22 6.90002 14.94 7.13002 13.28 10.16L13.32 8.48002Z"/></svg>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Enhanced Useful Links with Icons -->
                <div>
                    <h5 class="font-display text-xl font-bold mb-6 text-golden relative">
                        Useful Links
                        <span class="absolute -bottom-2 left-0 w-12 h-0.5 bg-golden"></span>
                    </h5>
                    <ul class="space-y-3">
                        <li><a href="/" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>Home</a></li>
                        <li><a href="/about-us" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>About Us</a></li>
                        <li><a href="/properties" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>Projects</a></li>
                        <li><a href="/developers" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>Developers</a></li>
                        <li><a href="/locations" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>Locations</a></li>
                    </ul>
                </div>

                <!-- Enhanced More Links -->
                <div>
                    <h5 class="font-display text-xl font-bold mb-6 text-golden relative">
                        Quick Access
                        <span class="absolute -bottom-2 left-0 w-12 h-0.5 bg-golden"></span>
                    </h5>
                    <ul class="space-y-3">
                        <li><a href="/blogs" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>Blogs</a></li>
                        <li><a href="/contact-us" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>Contact Us</a></li>
                        <li><a href="/terms-condition" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>Terms & Conditions</a></li>
                        <li><a href="/privacy-policy" class="flex items-center text-gray-300 hover:text-golden transition-colors duration-300 group"><span class="mr-2 text-golden transform group-hover:translate-x-1 transition-transform">&rarr;</span>Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Enhanced Contact Section -->
                <div>
                    <h5 class="font-display text-xl font-bold mb-6 text-golden relative">
                        Get In Touch
                        <span class="absolute -bottom-2 left-0 w-12 h-0.5 bg-golden"></span>
                    </h5>
                    <ul class="space-y-4">
                        <li class="flex items-start group">
                            <div class=" bg-transparent bg-opacity-20 rounded-full flex items-center justify-center mr-3 flex-shrink-0 group-hover:bg-opacity-30 transition-colors">
                                <svg class="w-6 h-6 text-golden" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-gray-300 text-sm leading-relaxed">{!! $global_settings->address !!}</span>
                        </li>
                        <li class="flex items-start group">
                            <div class=" bg-transparent bg-opacity-20 rounded-full flex items-center justify-center mr-3 flex-shrink-0 group-hover:bg-opacity-30 transition-colors">
                                <svg class="w-6 h-6 text-golden" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </div>
                            <a href="mailto:{{ $global_settings->email }}" class="text-gray-300 hover:text-golden transition-colors duration-300">{{ $global_settings->email }}</a>
                        </li>
                        <li class="flex items-start group">
                            <div class=" bg-transparent bg-opacity-20 rounded-full flex items-center justify-center mr-3 flex-shrink-0 group-hover:bg-opacity-30 transition-colors">
                                <svg class="w-6 h-6 text-golden" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                            </div>
                            <a href="tel:{{ $global_settings->contact_number }}" class="text-gray-300 hover:text-golden transition-colors duration-300">{{ $global_settings->contact_number }}</a>
                        </li>
                    </ul>
                    
                    <!-- Newsletter Signup -->
                    <div class="mt-6">
                        <h6 class="text-sm font-semibold text-white mb-3">Stay Updated</h6>
                        <form class="flex">
                            <input type="email" placeholder="Your email" class="flex-1 px-3 py-2 bg-gray-800 border border-gray-700 rounded-l-md text-sm focus:outline-none focus:border-golden transition-colors">
                            <button type="submit" class="px-4 py-2 bg-golden text-navy font-semibold rounded-r-md hover:bg-yellow-500 transition-colors duration-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Enhanced Footer Bottom Section -->
            <div class="border-t border-gray-800 pt-8 mt-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    <div class="text-center md:text-left">
                        <p class="text-gray-400 text-sm mb-2">{!! $global_settings->footer_disclaimer !!}</p>
                        <p class="text-gray-500 text-xs">{{ $global_settings->copyright }}</p>
                    </div>
                    <div class="flex justify-center md:justify-end space-x-6">
                        <a href="/terms-condition" class="text-gray-400 hover:text-golden text-xs transition-colors">Terms</a>
                        <a href="/privacy-policy" class="text-gray-400 hover:text-golden text-xs transition-colors">Privacy</a>
                        <a href="/sitemap" class="text-gray-400 hover:text-golden text-xs transition-colors">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Action Buttons -->
    <div class="footer-links">
        <a href="javascript:;" data-model-trigger=".enquire-pop" title="Enquire Now">
            <img src="{{ Vite::asset('frontend_assets/icon/formicon.svg') }}" width="20" height="auto" alt="Enquire Now" />
        </a>
        <a href="tel:{{ $global_settings->contact_number }}" title="Call Us">
            <img src="{{ Vite::asset('frontend_assets/icon/icons8-call.gif') }}" width="30" height="auto" alt="Call Us" />
        </a>
        <a href="https://wa.me/{{ $global_settings->social_whatsapp }}" target="_blank" title="WhatsApp">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 4.315 1.847 6.062l-1.011 3.697 3.717-1.005z"/></svg>
        </a>
    </div>

    <!-- Enquire Now Pop-up Modal -->
    <div class="model enquire-pop">
        <div class="model-body">
            <button class="close">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.5 0.5L25.5 25.5M0.5 25.5L25.5 0.5" stroke="black" stroke-linecap="round" stroke-linejoin="round" /></svg>
            </button>
            <div class="text-center mb-6">
                <img src="{{ Vite::asset('frontend_assets/images/main_logo.png') }}" alt="Logo" class="h-12 mx-auto" />
                <h4 class="text-2xl font-display font-bold text-navy mt-4">Get Detailed Information</h4>
                <p class="text-gray-600 font-elegant">Connect with our Sales Specialist</p>
            </div>
            <form class="form form-grid space-y-4" action="{{ route('enquiry.store') }}" method="post">
                @csrf
                <input type="hidden" name="type" value="general">
                <input type="hidden" name="page_url" value="{{ url()->current() }}">
                
                <input type="text" class="w-full p-3 border rounded-md focus:ring-golden focus:border-golden" name="name" placeholder="Name*" required/>
                
                <div class="flex">
                    <select class="border rounded-l-md p-3 bg-gray-100" name="countryCode" required>
                        <option value="+91" selected>+91</option>
                        <option value="+1">+1</option>
                        <option value="+44">+44</option>
                    </select>
                    <input type="tel" placeholder="Phone Number*" name="mobile" class="w-full p-3 border rounded-r-md focus:ring-golden focus:border-golden" required/>
                </div>

                <input type="email" name="email" class="w-full p-3 border rounded-md focus:ring-golden focus:border-golden" placeholder="Email*" required/>

                <div class="flex items-start">
                    <input type="checkbox" name="checkbox" value="check" id="agree" checked required class="mt-1"/>
                    <label for="agree" class="ml-2 text-sm text-gray-600"> I accept the <a href="/terms-condition" class="text-navy hover:underline"> Terms & Conditions</a>.</label>
                </div>

                <button type="submit" class="w-full bg-navy text-white font-bold py-3 rounded-md hover:bg-golden hover:text-navy transition-colors duration-300 font-display">Submit</button>
            </form>
        </div>
    </div>
     <button id="back-to-top" class="fixed bottom-20 right-5 z-40 w-12 h-12 bg-golden text-navy rounded-full shadow-lg flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 hover:bg-yellow-500 hover:-translate-y-1">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
    </button>

    <!-- Scripts -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        xintegrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"
        xintegrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- START OF CHANGES: Optimized Navbar scroll effect ---
            const header = document.getElementById('main-header');
            const logo = document.getElementById('main-logo');

            // This function checks the scroll position and applies header changes only when needed,
            // preventing the code from running on every single pixel of scroll, which is more performant.
            const handleHeaderState = () => {
                const isScrolled = window.scrollY > 50;
                // Using a data attribute to track state is a clean way to avoid global variables.
                const isShrunk = header.dataset.shrunk === 'true';

                if (isScrolled && !isShrunk) {
                    header.classList.add('glass-effect', 'shadow-lg');
                    logo.classList.replace('h-20', 'h-16');
                    header.dataset.shrunk = 'true';
                } else if (!isScrolled && isShrunk) {
                    header.classList.remove('glass-effect', 'shadow-lg');
                    logo.classList.replace('h-16', 'h-20');
                    header.dataset.shrunk = 'false';
                }
            };

            // Run once on page load in case the page is reloaded past the scroll point
            handleHeaderState();

            // Attach the optimized handler to the scroll event.
            // { passive: true } tells the browser this listener won't prevent scrolling, further improving performance.
            window.addEventListener('scroll', handleHeaderState, { passive: true });
            // --- END OF CHANGES ---


            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.remove('translate-x-full');
            });

            closeMenuButton.addEventListener('click', () => {
                mobileMenu.classList.add('translate-x-full');
            });

            // Enquire Modal Toggle
            const modalTriggers = document.querySelectorAll('[data-model-trigger]');
            const modal = document.querySelector('.enquire-pop');
            const closeModalButton = modal.querySelector('.close');

            modalTriggers.forEach(trigger => {
                trigger.addEventListener('click', () => {
                    modal.classList.add('active');
                });
            });

            closeModalButton.addEventListener('click', () => {
                modal.classList.remove('active');
            });

            modal.addEventListener('click', function(event) {
                if (event.target === this) {
                    modal.classList.remove('active');
                }
            });
        });
    </script>

    <!-- Allow individual pages to add their own scripts -->
    @stack('scripts')
</body>
</html>
