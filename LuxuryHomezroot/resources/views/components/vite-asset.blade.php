@props(['src', 'alt' => '', 'class' => ''])

@php
    // Remove leading slash if present
    $src = ltrim($src, '/');
    
    // Check if it's a Vite-managed asset
    $viteAssets = [
        'frontend_assets/images/fav_sec.png',
        'frontend_assets/images/fav.png',
        'frontend_assets/images/logo.png',
        'frontend_assets/images/main_logo.png',
        'frontend_assets/images/home/fav_sec.png',
        'frontend_assets/images/home/bfacebook.png',
        'frontend_assets/images/home/btwitter.png',
        'frontend_assets/images/home/blinkedin.png',
        'frontend_assets/images/home/bwhatsapp.png',
        'frontend_assets/images/home/bemail.png',
    ];
    
    $isViteAsset = in_array($src, $viteAssets);
    
    if ($isViteAsset) {
        $assetUrl = Vite::asset($src);
    } else {
        // Fallback to URL helper for non-Vite assets
        $assetUrl = asset($src);
    }
@endphp

<img src="{{ $assetUrl }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => $class]) }} />
