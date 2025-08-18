<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PropertySubType;
use Illuminate\Support\Str;

class PropertySubTypeController extends Controller
{
    public function index()
    {
        $psubtypes = PropertySubType::orderBy('order_number')->get();
        return view('Admin.psubtypes.index', compact('psubtypes'));
    }

    public function create()
    {
        return view('Admin.psubtypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'psubtype_name' => 'required',
            'slug' => 'required|unique:property_sub_types,slug',
            'main_image' => 'nullable|image|max:5024',
        ]);

        $data = $request->only(['psubtype_name', 'slug', 'status']);
        $data['status'] = $request->has('status') ? 1 : 0;

        // Handle image
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/psubtypes'), $filename);
            $data['main_image'] = $filename;
        }

        PropertySubType::create($data);
        return redirect()->route('Admin.psubtypes.index')->with('success', 'Sub Type Created');
    }

    public function edit($id)
    {
        $psubtype = PropertySubType::findOrFail($id);
        return view('Admin.psubtypes.edit', compact('psubtype'));
    }

    public function update(Request $request, $id)
    {
        $psubtype = PropertySubType::findOrFail($id);

        $request->validate([
            'psubtype_name' => 'required',
            'slug' => 'required|unique:property_sub_types,slug,' . $id,
            'main_image' => 'nullable|image|max:512',
        ]);

        $data = $request->only(['psubtype_name', 'slug', 'status']);
        $data['status'] = $request->has('status') ? 1 : 0;

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/psubtypes'), $filename);
            $data['main_image'] = $filename;
        }

        $psubtype->update($data);
        return redirect()->route('Admin.psubtypes.index')->with('success', 'Sub Type Updated');
    }

    public function destroy($id)
    {
        $psubtype = PropertySubType::findOrFail($id);
        $psubtype->delete();
        return redirect()->route('Admin.psubtypes.index')->with('success', 'Deleted successfully');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:property_sub_types,id',
            'order_number' => 'required|integer|min:0',
        ]);

        $psubtype = PropertySubType::find($request->id);
        $psubtype->order_number = $request->order_number;
        $psubtype->save();

        return response()->json(['status' => 'success', 'message' => 'Order updated successfully.']);
    }
}
