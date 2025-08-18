<?php

namespace App\Http\Controllers;

use App\Models\Kfaq;
use App\Models\Keyword;
use Illuminate\Http\Request;

class KfaqController extends Controller
{
    /**
     * Display a listing of the FAQs.
     */
    public function index()
    {
        $kfaqs = Kfaq::with('keyword')->orderBy('id', 'desc')->get();
        return view('Admin.kfaqs.index', compact('kfaqs'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        $keywords = Keyword::all();
        return view('Admin.kfaqs.create', compact('keywords'));
    }

    /**
     * Store a newly created FAQ in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keyword_id' => 'required|exists:keywords,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Kfaq::create([
            'keyword_id' => $request->keyword_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('Admin.kfaqs.index')->with('success', 'FAQ created successfully.');
    }

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit($id)
    {
        $kfaq = Kfaq::findOrFail($id);
        $keywords = Keyword::all();
        return view('Admin.kfaqs.edit', compact('kfaq', 'keywords'));
    }

    /**
     * Update the specified FAQ in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'keyword_id' => 'required|exists:keywords,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $kfaq = Kfaq::findOrFail($id);
        $kfaq->update([
            'keyword_id' => $request->keyword_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('Admin.kfaqs.index')->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified FAQ from storage.
     */
    public function destroy($id)
    {
        $kfaq = Kfaq::findOrFail($id);
        $kfaq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }
}
