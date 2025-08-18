<?php

namespace App\Http\Controllers;

use App\Models\KeywordSection;
use App\Models\Keyword;
use App\Models\Property;
use App\Models\Testimonial;
use App\Models\Kfaq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeywordController extends Controller
{
    public function index()
    {
        $sections = KeywordSection::with('keywords')->get();
        return view('Admin.keywords.index', compact('sections'));
    }

    public function create()
    {
        $properties = Property::all();
        return view('Admin.keywords.create', compact('properties'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'keywords.*.text' => 'required|string',
        'keywords.*.content' => 'nullable|string',
        'keywords.*.slug' => ['nullable', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i'],
        'keywords.*.properties' => 'nullable|array',
    ]);

    $section = new KeywordSection();
    $section->title = $request->title;
    $section->status = $request->has('status') ? 1 : 0;
    $section->save();

    // Save keywords and attach related properties
    if ($request->has('keywords')) {
        foreach ($request->keywords as $kw) {
            if (!empty($kw['text'])) {
                $keyword = Keyword::create([
                    'keyword_section_id' => $section->id,
                    'text' => $kw['text'],
                    'slug' => !empty($kw['slug']) ? $kw['slug'] : Str::slug($kw['text']),
                    'content' => $kw['content'] ?? null,
                ]);

                // Attach selected properties
                if (!empty($kw['properties'])) {
                    $keyword->properties()->attach($kw['properties']);
                }
            }
        }
    }

    return redirect()->route('Admin.keywords.index')->with('success', 'Keyword section created successfully!');
}


    public function edit($id)
{
    $section = KeywordSection::with('keywords.properties')->findOrFail($id);
    $properties = Property::all(); // ✅ Add this line
    return view('Admin.keywords.edit', compact('section', 'properties'));
}

   public function update(Request $request, $id)
{
    $section = KeywordSection::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'keywords.*.text' => 'required|string',
        'keywords.*.slug' => ['nullable', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i'],
        'keywords.*.properties' => 'nullable|array',
        'keywords.*.content' => 'nullable|string',
    ]);

    $section->title = $request->title;
    $section->status = $request->has('status') ? 1 : 0;
    $section->save();

    $existingKeywordIds = [];

    if ($request->has('keywords')) {
        foreach ($request->keywords as $kw) {
            if (isset($kw['id'])) {
                $keyword = Keyword::find($kw['id']);
                if ($keyword) {
                    $keyword->text = $kw['text'];
                    $keyword->slug = !empty($kw['slug']) ? $kw['slug'] : Str::slug($kw['text']);
                    $keyword->content = $kw['content'] ?? null;
                    $keyword->save();

                    // Sync updated properties
                    if (!empty($kw['properties'])) {
                        $keyword->properties()->sync($kw['properties']);
                    } else {
                        $keyword->properties()->detach(); // Remove all if none selected
                    }

                    $existingKeywordIds[] = $keyword->id;
                }
            } else {
                $newKeyword = Keyword::create([
                    'keyword_section_id' => $section->id,
                    'text' => $kw['text'],
                    'slug' => !empty($kw['slug']) ? $kw['slug'] : Str::slug($kw['text']),
                    'content' => $kw['content'] ?? null,
                ]);

                if (!empty($kw['properties'])) {
                    $newKeyword->properties()->attach($kw['properties']);
                }

                $existingKeywordIds[] = $newKeyword->id;
            }
        }
    }

    // Delete removed keywords and detach their properties
    $toDelete = Keyword::where('keyword_section_id', $section->id)
                ->whereNotIn('id', $existingKeywordIds)
                ->get();

    foreach ($toDelete as $keyword) {
        $keyword->properties()->detach();
        $keyword->delete();
    }

    return redirect()->route('Admin.keywords.index')->with('success', 'Keyword section updated successfully!');
}

public function destroy($id)
{
    $section = KeywordSection::with('keywords')->findOrFail($id);

    // Delete keywords first
    foreach ($section->keywords as $keyword) {
        $keyword->delete();
    }

    $section->delete();

    return redirect()->route('Admin.keywords.index')->with('success', 'Keyword section deleted successfully!');
}



    // Frontend
    public function showSections()
    {
        $sections = KeywordSection::with('keywords')->where('status', 1)->get();
        return view('Frontend.keywords.all', compact('sections'));
    }
    
    public function showKeyword($slug)
{
    $keyword = Keyword::where('slug', $slug)->with('properties')->firstOrFail();

    // Load the related properties
    $properties = $keyword->properties;
    $testimonials = Testimonial::paginate(15);
    $kfaqs = Kfaq::orderBy('id', 'ASC')->get();


    return view('Frontend.keywords.view', compact('keyword', 'properties','testimonials', 'kfaqs'));
}
    
}
