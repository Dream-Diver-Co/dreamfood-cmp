<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('admin.pages.home.hero_section.index')->with('heroes', $heroes);
    }

    public function create()
    {
        return view('admin.pages.home.hero_section.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public'); // Save the image in the 'images' directory inside 'public/storage'
            $input['image'] = $path;
        }

        Hero::create($input);
        return redirect('admin/hero')->with('flash_message', 'Hero added successfully!');
    }





    public function show($id)
    {
        $hero = Hero::find($id);
        return view('admin.pages.home.hero_section.show')->with('hero', $hero);
    }

    public function edit($id)
    {
        $hero = Hero::find($id);
        return view('admin.pages.home.hero_section.edit')->with('hero', $hero);
    }

    public function update(Request $request, $id)
    {
        $hero = Hero::find($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public'); // Save the image in the 'images' directory inside 'public/storage'
            $input['image'] = $path;
        }

        $hero->update($input);
        return redirect('admin/hero')->with('flash_message', 'Hero updated successfully!');
    }



    public function destroy($id)
    {
        Hero::destroy($id);
        return redirect('admin/hero')->with('flash_message', 'Hero deleted!');
    }
}
