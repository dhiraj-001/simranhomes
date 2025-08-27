<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('Admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('Admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add other validation rules as necessary
        ]);

        $blog = new Blog();
        $blog->heading = $request->heading;
        $blog->slug = Str::slug($request->heading);
        $blog->full_content = $request->full_content;
        $blog->status = $request->status;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;

        // Handle the main image upload
        if ($request->hasFile('main_image')) {
            $blog->main_image = $this->uploadImage($request->file('main_image'));
        }

        // Handle breadcrumbs image upload
        if ($request->hasFile('breadcrumbs_image')) {
            $blog->breadcrumbs_image = $this->uploadImage($request->file('breadcrumbs_image'));
        }

        $blog->save();
        
        // Save FAQs if present
    if ($request->has('faqs')) {
        foreach ($request->faqs as $faq) {
            if (!empty($faq['question']) && !empty($faq['answer'])) {
                Faq::create([
                    'blog_id' => $blog->id,
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'status' => 'active',
                ]);
            }
        }
    }

        return redirect()->route('Admin.blogs.index')->with('success', 'Blog added successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('Admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Update blog details
        $blog->heading = $request->heading;
        $blog->slug = Str::slug($request->heading);
        $blog->full_content = $request->full_content;
        $blog->status = $request->status;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $blog->main_image = $this->uploadImage($request->file('main_image'));
        }

        // Handle breadcrumbs image upload
        if ($request->hasFile('breadcrumbs_image')) {
            $blog->breadcrumbs_image = $this->uploadImage($request->file('breadcrumbs_image'));
        }

        $blog->save();
        
         // FAQ Update Handling
    if ($request->has('faqs')) {
        $faqIDs = [];

        foreach ($request->faqs as $faq) {
            if (isset($faq['id'])) {
                // Update existing
                $existingFaq = Faq::find($faq['id']);
                if ($existingFaq) {
                    $existingFaq->question = $faq['question'];
                    $existingFaq->answer = $faq['answer'];
                    $existingFaq->save();
                    $faqIDs[] = $existingFaq->id;
                }
            } else {
                // Create new
                $newFaq = Faq::create([
                    'blog_id' => $blog->id,
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'status' => 'active',
                ]);
                $faqIDs[] = $newFaq->id;
            }
        }

        // Delete removed FAQs
        Faq::where('blog_id', $blog->id)->whereNotIn('id', $faqIDs)->delete();
    }

        return redirect()->route('Admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('Admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }

    private function uploadImage($image)
    {
        $filename = time() . '-' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('blogs/' . date('Y') . '/' . date('m'), $filename, 'public');
        return $path;
    }
    
    //Frontend View
public function blogPage()
{
    $blogs =Blog::paginate(50);
    $banner = Banner::with('images')->where('page', 'blogs')->where('status', 1)->latest()->first();

    return view('Frontend.blogs.all', compact('blogs', 'banner'));
}

public function blog($slug)
{
    // Fetch the specific blog
    $blog = Blog::where('slug', $slug)->firstOrFail();

    // Correct the image paths in full_content
    if ($blog->full_content) {
        $blog->full_content = str_replace('/storage/app/public/', '/storage/', $blog->full_content);
    }

    // Fetch latest 4 blogs for sidebar or related blogs
    $blogs = Blog::latest()->paginate(4);

    // Fetch FAQs only related to this blog
    $faqs = $blog->faqs;
    
    $trendingProperties = Property::where('status', 1)
                            ->orderBy('sequence') // ya jo bhi trending logic ho
                            ->take(10)
                            ->get();

    return view('Frontend.blogs.view', [
        'blog' => $blog,
        'blogs' => $blogs,
        'faqs' => $faqs,
        'trendingProperties' => $trendingProperties,
    ]);
}

}