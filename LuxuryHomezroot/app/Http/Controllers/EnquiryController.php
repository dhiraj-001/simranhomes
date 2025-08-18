<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Mail\EnquirySubmitted;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function store(Request $request)
{
    // Define common validation rules
    $commonValidation = [
        'email' => 'required|email|max:255',
        'mobile' => 'required|string|max:15',
        'type' => 'required|string|in:property,general,blog,contact',
    ];

    // Validation based on type
    if ($request->input('type') === 'property') {
        $validatedData = $request->validate(array_merge($commonValidation, [
            'name' => 'required|string|max:255',
            'page_url' => 'required|string',
            'countryCode' => 'required|string|max:255',
            'property_name' => 'required|string|max:255'
        ]));
    } elseif ($request->input('type') === 'general') {
        $validatedData = $request->validate(array_merge($commonValidation, [
            'name' => 'required|string|max:255',
            'page_url' => 'required|string',
            'countryCode' => 'required|string|max:255',
        ]));
    }elseif ($request->input('type') === 'blog') {
        $validatedData = $request->validate(array_merge($commonValidation, [
            'name' => 'required|string|max:255',
            'page_url' => 'required|string',
            'countryCode' => 'required|string|max:255',
            'message' => 'required|string',
        ]));
    } elseif ($request->input('type') === 'contact') {
        $validatedData = $request->validate(array_merge($commonValidation, [
            'name' => 'required|string|max:255',
            'page_url' => 'required|string',
            'budget_range' => 'required|string|max:255',
            'message' => 'required|string',
        ]));
    
    } else {
        return back()->withErrors('Invalid enquiry type.');
    }

    // Create enquiry record
    $enquiry = Enquiry::create($validatedData);

    // Send email notification
    Mail::to('amwdindia1@gmail.com')->send(new EnquirySubmitted($enquiry));

    return redirect()->route('thank-you')->with('success', 'Enquiry submitted successfully.');
}


    // New index method for all enquiries
    public function serviceEnquiries()
    {
        $enquiries = Enquiry::orderBy('created_at', 'desc')->get();
        return view('Admin.enquiry_data.index', compact('enquiries'));
    }
    
    
    // Delete an enquiry
    public function destroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();

        return redirect()->route('Admin.enquiry_data.index')->with('success', 'Enquiry deleted successfully.');
    }

    
}
