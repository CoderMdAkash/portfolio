<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first() ?? new About();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first() ?? new About();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'exp_years' => 'required|integer|min:0',
            'completed_projects' => 'required|integer|min:0',
            'happy_clients' => 'required|integer|min:0',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'cv_link' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'image|mimes:jpeg,png,jpg,webp|max:2048']);
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $filename);
            $data['image'] = 'uploads/about/' . $filename;
        }

        $about->fill($data);
        $about->save();

        return back()->with('success', 'About & Hero section updated successfully!');
    }
}
