<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.pages.about.index')->with('abouts', $abouts);
    }

    public function create()
    {
        return view('admin.pages.about.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }
        About::create($input);
        return redirect('admin/about')->with('flash_message', 'About Added!');
    }

    public function show($id)
    {
        $about = About::find($id);
        return view('admin.pages.about.show')->with('abouts', $about);
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.pages.about.edit')->with('abouts', $about);
    }

    public function update(Request $request, $id)
    {
        $about = About::find($id);
        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }
        $about->update($input);
        return redirect('admin/about')->with('flash_message', 'About Updated!');
    }

    public function destroy($id)
    {
        About::destroy($id);
        return redirect('admin/about')->with('flash_message', 'About deleted!');
    }
}
