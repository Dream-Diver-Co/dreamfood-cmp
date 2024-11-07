<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyChef;

class MyChefController extends Controller
{
    public function index()
    {
        $mychefs = MyChef::all();
        return view('admin.pages.chef_service.mychef.index', compact('mychefs'));
    }

    public function create()
    {
        return view('admin.pages.chef_service.mychef.create');
    }

    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $input = $request->all();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        // Create a new MyChef record
        MyChef::create($input);

        return redirect()->route('mychef.index')->with('flash_message', 'MyChef created successfully!');
    }

    public function show($id)
    {
        $mychef = MyChef::findOrFail($id);
        return view('admin.pages.chef_service.mychef.show', compact('mychef'));
    }

    public function edit($id)
    {
        $mychef = MyChef::findOrFail($id);
        return view('admin.pages.chef_service.mychef.edit', compact('mychef'));
    }

    public function update(Request $request, $id)
    {
        $mychef = MyChef::findOrFail($id);

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $input = $request->all();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        // Update the MyChef record
        $mychef->update($input);

        return redirect()->route('mychef.index')->with('flash_message', 'MyChef updated successfully!');
    }

    public function destroy($id)
    {
        MyChef::destroy($id);
        return redirect()->route('mychef.index')->with('flash_message', 'MyChef deleted successfully!');
    }
}
