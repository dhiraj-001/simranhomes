<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeStatistic;

class HomeStatisticController extends Controller
{
    public function index()
    {
        $stats = HomeStatistic::all();
        return view('Admin.home_statistics.index', compact('stats'));
    }

    public function create()
    {
        return view('Admin.home_statistics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon_path' => 'required|image|mimes:png,svg|max:1024',
            'count' => 'required|integer',
            'label' => 'required|string',
        ]);

        $path = $request->file('icon_path')->store('uploads/stat-icons', 'public');

        HomeStatistic::create([
            'icon_path' => $path,
            'count' => $request->count,
            'label' => $request->label,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('Admin.home_statistics.index')->with('success', 'Stat added.');
    }

    public function edit($id)
    {
        $stat = HomeStatistic::findOrFail($id);
        return view('Admin.home_statistics.edit', compact('stat'));
    }

    public function update(Request $request, $id)
    {
        $stat = HomeStatistic::findOrFail($id);

        $data = $request->only(['count', 'label', 'status']);

        if ($request->hasFile('icon_path')) {
            $path = $request->file('icon_path')->store('uploads/stat-icons', 'public');
            $data['icon_path'] = $path;
        }

        $stat->update($data);

        return redirect()->route('Admin.home_statistics.index')->with('success', 'Stat updated.');
    }

    public function destroy($id)
    {
        HomeStatistic::destroy($id);
        return redirect()->back()->with('success', 'Stat deleted.');
    }
}
