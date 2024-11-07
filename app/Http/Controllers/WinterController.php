<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winter;

class WinterController extends Controller
{
    public function index()
    {
        $winters = Winter::all();
        return view('admin.pages.home.offer.winter_offer.index')->with('winters', $winters);
    }

    public function create()
    {
        return view('admin.pages.home.offer.winter_offer.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }
        Winter::create($input);
        return redirect('admin/winter')->with('flash_message', 'Winter Added!');
    }

    public function show($id)
    {
        $winter = Winter::find($id);
        return view('admin.pages.home.offer.winter_offer.show')->with('winters', $winter);
    }

    public function edit($id)
    {
        $winter = Winter::find($id);
        return view('admin.pages.home.offer.winter_offer.edit')->with('winters', $winter);
    }

    public function update(Request $request, $id)
    {
        $winter = Winter::find($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        $winter->update($input);
        return redirect('admin/winter')->with('flash_message', 'Winter Updated!');
    }

    public function destroy($id)
    {
        Winter::destroy($id);
        return redirect('admin/winter')->with('flash_message', 'Winter deleted!');
    }
}
