<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summer;

class SummerController extends Controller
{
    public function index()
    {
        $summers = Summer::all();
        return view('admin.pages.home.offer.summer_offer.index')->with('summers', $summers);
    }

    public function create()
    {
        return view('admin.pages.home.offer.summer_offer.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        Summer::create($input);
        return redirect('admin/summer')->with('flash_message', 'Summer Added!');
    }

    public function show($id)
    {
        $summer = Summer::find($id);
        return view('admin.pages.home.offer.summer_offer.show')->with('summer', $summer);
    }

    public function edit($id)
    {
        $summer = Summer::find($id);
        return view('admin.pages.home.offer.summer_offer.edit')->with('summer', $summer);
    }

    public function update(Request $request, $id)
    {
        $summer = Summer::find($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        $summer->update($input);
        return redirect('admin/summer')->with('flash_message', 'Summer Updated!');
    }

    public function destroy($id)
    {
        Summer::destroy($id);
        return redirect('admin/summer')->with('flash_message', 'Summer deleted!');
    }
}
