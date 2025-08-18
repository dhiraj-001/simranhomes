<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TestimonialSection extends Component
{
    public $testimonials;
    public $globalSettings;

    public function __construct($testimonials, $globalSettings)
    {
        $this->testimonials = $testimonials;
        $this->globalSettings = $globalSettings;
    }

    public function render()
    {
        return view('components.testimonial-section');
    }
}
