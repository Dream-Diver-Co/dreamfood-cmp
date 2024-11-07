<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscribeContact;

class SubscribeContactController extends Controller
{
    public function index()
    {
        $subscribecontacts = SubscribeContact::all();
        return view('admin.pages.subscription.subscribe.index')->with('subscribecontacts', $subscribecontacts);
    }

    public function create()
    {
        return view('admin.pages.subscription.subscribe.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'subject' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        SubscribeContact::create($input);
        return redirect()->back()->with('success', 'Your message has been sent!');
    }

    public function show($id)
    {
        $subscribecontact = SubscribeContact::find($id);
        return view('admin.pages.subscription.subscribe.show')->with('subscribecontact', $subscribecontact);
    }

    public function edit($id)
    {
        $subscribecontact = SubscribeContact::find($id);
        return view('admin.pages.subscription.subscribe.edit')->with('subscribecontacts', $subscribecontact);
    }

    public function update(Request $request, $id)
    {
        $subscribecontact = SubscribeContact::find($id);
        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }
        $subscribecontact->update($input);
        return redirect('admin/subscribecontact')->with('flash_message', 'SubscribeContact Updated!');
    }

    public function destroy($id)
    {
        SubscribeContact::destroy($id);
        return redirect('admin/subscribecontact')->with('flash_message', 'SubscribeContact Deleted!');
    }
}
