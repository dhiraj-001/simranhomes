<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        // Fetch the single row or create default one
        $setting = Setting::firstOrCreate([]);
        return view('Admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::firstOrFail();

        // Upload logo if present
        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $setting->logo = $this->uploadImage($request->file('logo'));
        }
        
        if ($request->hasFile('contact_page_logo')) {
            if ($setting->contact_page_logo) {
                Storage::disk('public')->delete($setting->contact_page_logo);
            }
            $setting->contact_page_logo = $this->uploadImage($request->file('contact_page_logo'));
        }

        // Fill all remaining fields except tokens and files
        $setting->fill($request->except([
            '_token', '_method', 'logo', 'contact_page_logo'
        ]));

        $setting->save();

        return redirect()->route('Admin.settings.edit')->with('success', 'Settings updated successfully!');
    }

    private function uploadImage($image)
    {
        $filename = time() . '-' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('settings/' . date('Y') . '/' . date('m'), $filename, 'public');
        return $path;
    }
}
