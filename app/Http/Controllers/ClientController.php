<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.pages.home.client.index')->with('clients', $clients);
    }

    public function create()
    {
        return view('admin.pages.home.client.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        Client::create($input);
        return redirect('admin/client')->with('flash_message', 'client Added!');
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view('admin.pages.home.client.show')->with('client', $client);
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin.pages.home.client.edit')->with('client', $client);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        $client->update($input);
        return redirect('admin/client')->with('flash_message', 'client Updated!');
    }

    public function destroy($id)
    {
        Client::destroy($id);
        return redirect('admin/client')->with('flash_message', 'client Deleted!');
    }
}
