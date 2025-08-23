import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // Default Laravel paths
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        
        // Add your custom frontend assets path here
        './frontend_assets/**/*.{html,js,css}', 
    ],

    theme: {
        extend: {
            // Add the new color palette
            colors: {
                'navy': '#081521',
                'golden': '#D4AF37',
            },
            // Add professional font combinations
            fontFamily: {
                // Primary sans-serif for body text
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                // Elegant serif for luxury headings
                display: ['"Playfair Display"', '"Cormorant Garamond"', ...defaultTheme.fontFamily.serif],
                // Sophisticated serif for subheadings
                elegant: ['"Crimson Text"', ...defaultTheme.fontFamily.serif],
                // Modern sans-serif for UI elements
                modern: ['"Source Sans Pro"', ...defaultTheme.fontFamily.sans],
                // Classic serif for luxury accents
                luxury: ['"Libre Baskerville"', ...defaultTheme.fontFamily.serif],
                // Clean sans-serif for navigation
                nav: ['"Poppins"', ...defaultTheme.fontFamily.sans],
            },
            // Add font weights for better control
            fontWeight: {
                'ultralight': '100',
                'thin': '200',
                'book': '350',
                'medium': '500',
                'semibold': '600',
                'bold': '700',
                'extrabold': '800',
                'black': '900',
            },
            // Add letter spacing for luxury feel
            letterSpacing: {
                'ultra-tight': '-0.05em',
                'tight': '-0.025em',
                'normal': '0',
                'wide': '0.025em',
                'wider': '0.05em',
                'widest': '0.1em',
                'luxury': '0.15em',
            },
            // Add line height for better readability
            lineHeight: {
                'luxury': '1.2',
                'elegant': '1.4',
                'comfortable': '1.6',
                'relaxed': '1.8',
            },
        },
    },

    plugins: [forms],
};
