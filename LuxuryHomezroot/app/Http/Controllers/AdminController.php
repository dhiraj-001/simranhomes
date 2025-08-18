<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Property;
use App\Models\Blog;
use App\Models\Enquiry;



use Illuminate\Http\Request;

class AdminController extends Controller
{
    // This constructor applies the 'auth' and 'admin' middleware to all actions in the controller
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        
        $propertyCount = Property::count();
        $blogCount = Blog::count();
        $enquiryCount = Enquiry::count();

        return view('Admin.dashboard', compact('propertyCount', 'blogCount', 'enquiryCount'));
    }
}