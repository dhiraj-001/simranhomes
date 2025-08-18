@props(['name', 'alt' => '', 'class' => '', 'width' => null, 'height' => null])

@php
    // Map common SVG names to their paths
    $svgMap = [
        'fav_sec' => 'frontend_assets/images/fav_sec.png',
        'fav' => 'frontend_assets/images/fav.png',
        'logo' => 'frontend_assets/images/logo.png',
        'main_logo' => 'frontend_assets/images/main_logo.png',
        'bfacebook' => 'frontend_assets/images/home/bfacebook.png',
        'btwitter' => 'frontend_assets/images/home/btwitter.png',
        'blinkedin' => 'frontend_assets/images/home/blinkedin.png',
        'bwhatsapp' => 'frontend_assets/images/home/bwhatsapp.png',
        'bemail' => 'frontend_assets/images/home/bemail.png',
    ];
    
    $svgPath = $svgMap[$name] ?? "frontend_assets/icon/{$name}.svg";
    
    // Check if it's an SVG or other image
    $isSvg = str_ends_with($svgPath, '.svg');
    $assetUrl = Vite::asset($svgPath);
@endphp

<img src="{{ $assetUrl }}" 
     alt="{{ $alt ?: $name }}" 
     class="{{ $class }}" 
     @if($width) width="{{ $width }}" @endif
     @if($height) height="{{ $height }}" @endif
     {{ $attributes }} />
