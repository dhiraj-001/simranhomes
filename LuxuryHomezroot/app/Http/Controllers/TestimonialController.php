<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('Admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('Admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'star' => 'required|integer|min:1|max:5',
            // Add other validation rules as necessary
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->message = $request->message;
        $testimonial->star = $request->input('star', 5);
        $testimonial->status = $request->status;

        

        $testimonial->save();

        return redirect()->route('Admin.testimonials.index')->with('success', 'Testimonial added successfully!');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('Admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Update testimonial details
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->message = $request->message;
        $testimonial->star = $request->input('star', 5);
        $testimonial->status = $request->status;

        $testimonial->save();

        return redirect()->route('Admin.testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('Admin.testimonials.index')->with('success', 'Testimonial deleted successfully!');
    }

    
    
   
}