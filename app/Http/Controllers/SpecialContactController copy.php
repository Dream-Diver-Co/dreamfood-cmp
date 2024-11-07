<?php

namespace App\Http\Controllers;

use App\Models\SpecialContact;
use Illuminate\Http\Request;

class SpecialContactController extends Controller
{
    public function index()
    {
        $contacts = SpecialContact::all();
        return view('admin.pages.special.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.pages.special.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string',
            'note' => 'nullable|string',
            'address' => 'required|string',
            'date' => 'required|date',
            'day_name' => 'required|string',
        ]);

        $input = $request->all();

        SpecialContact::create($input);
        return redirect()->back()->with('success', 'Contact added successfully.');
    }

    public function show(SpecialContact $specialcontact)
    {
        return view('admin.pages.special.show', compact('specialcontact'));
    }

    public function edit(SpecialContact $specialcontact)
    {
        return view('admin.pages.special.edit', compact('specialcontact'));
    }

    public function update(Request $request, SpecialContact $specialcontact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string',
            'note' => 'nullable|string',
            'address' => 'required|string',
            'date' => 'required|date',
            'day_name' => 'required|string',
        ]);

        $input = $request->all();

        $specialcontact->update($input);
        return redirect()->route('specialcontacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(SpecialContact $specialcontact)
    {
        $specialcontact->delete();
        return redirect()->route('specialcontacts.index')->with('success', 'Contact deleted successfully.');
    }
}
